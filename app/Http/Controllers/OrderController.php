<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function showOrderHistory()
    {
        // Get the authenticated user's current order and past orders
        $user = auth()->user();
        $orders = $user->orders()->orderBy("created_at", "desc")->paginate(10);

        return view('order.history', [
            'orders' => $orders,
        ]);
    }

    public function showPendingOrder()
    {
        $user = auth()->user();
        $orders = $user->orders()->where('order_status', 'pending')->orderBy("created_at", "desc")->paginate(10);

        return view('order.history', [
            'orders' => $orders,
        ]);
    }

    public function showConfirmedOrder()
    {
        $user = auth()->user();
        $orders = $user->orders()->where('order_status', 'confirmed')->orderBy("created_at", "desc")->paginate(10);

        return view('order.history', [
            'orders' => $orders,
        ]);
    }

    public function showProcessingOrder()
    {
        $user = auth()->user();
        $orders = $user->orders()->where('order_status', 'processing')->orderBy("created_at", "desc")->paginate(10);;

        return view('order.history', [
            'orders' => $orders,
        ]);
    }

    public function showCompletedOrder()
    {
        $user = auth()->user();
        $orders = $user->orders()->where('order_status', 'completed')->orderBy("created_at", "desc")->paginate(10);

        return view('order.history', [
            'orders' => $orders,
        ]);
    }

    public function showEachOrder($id)
    {
        $order = Order::find($id);
        $transactions = $order->processingOrderTransaction()->orderBy('created_at','desc')->get();

        return view('order.show', [
            'order' => $order,
            'transactions' => $transactions,
        ]);
    }


    public function showAddOrderItem($id)
    {
        return view('order.add-order-item', [
            'product' => Product::find($id),
        ]);
    }

    public function showCart()
    {
        $user = auth()->user();
        $currentOrder = $user->orders()->where('order_status', 'pending')->first();

        return view('order.cart', [
            'currentOrder' => $currentOrder,
        ]);
    }

    public function addOrderItemToOrder(Request $request, $id)
    {
        $product = Product::find($id);
        // Get the user and their current pending order
        $user = auth()->user();
        $currentOrder = $user->orders()->where('order_status', 'pending')->first();

        // Validate the input (quantity)
        $request->validate([
            'quantity' => 'required|integer|min:' . $product->product_minimum_quantity . '|max:' . $product->product_stock . '|not_in:0',
        ], [
            'quantity.required' => 'Please fill in the quantity.',
            'quantity.min' => 'The quantity must be at least ' . $product->product_minimum_quantity . '.',
            'quantity.max' => 'The quantity cannot exceed the available stock of ' . $product->product_stock . '.',
            'quantity.not_in' => 'The quantity must be greater than 0.',
        ]);



        // Check if the current order exists; if not, create a new order
        if (!$currentOrder) {
            $currentOrder = new Order();
            $currentOrder->order_name = 'Order ' . now()->format('Y-m-d H:i:s');
            $currentOrder->user_id = $user->id;
            $currentOrder->order_status = 'pending';
            $currentOrder->order_address = $user->address;
            $currentOrder->order_phone = $user->phone;
            $currentOrder->order_email = $user->email;
            $currentOrder->save();
        }

        // Check if the product is already in the order; if so, update the quantity
        $orderItem = $currentOrder->orderItems()->where('product_id', $product->id)->first();
        if ($orderItem) {
            $orderItem->quantity += $request->input('quantity');
            $orderItem->save();
        } else {
            // Create a new order item for the product
            $orderItem = new OrderItem();
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $request->input('quantity');
            $currentOrder->orderItems()->save($orderItem);
        }

        // Update the total price of the current order
        $currentOrder->updateTotalPrice();

        // Create the success message
        $message = $request->input('quantity') . ' ' . $product->product_name . ' added to the order successfully.';

        // Set the success message in the session
        session()->flash('success', $message);

        return redirect()->route('home.index'); // Redirect to the user's home page
    }

    public function showEditCurrentOrderForm()
    {
        $user = auth()->user();
        $currentOrder = $user->orders()->where('order_status', 'pending')->first();

        return view('order.edit-current-order', [
            'currentOrder' => $currentOrder,
        ]);
    }

    public function updateCurrentOrder(Request $request)
    {
        $order = auth()->user()->getCurrentOrder();

        if ($order) {
            $data = $request->validate([
                'quantity' => 'required|array',
                'quantity.*' => 'required|integer|min:0',
            ]);

            // Get the order items associated with the current order
            $orderItems = $order->orderItems;

            $i = 0;
            foreach ($orderItems as $orderItem) {
                // $orderItemId = $orderItem->id;

                // Check if the order item ID exists in the request data
                if (isset($data['quantity'][$i])) {
                    $newQuantity = $data['quantity'][$i];

                    if ($newQuantity <= 0) {
                        // If the quantity is set to 0 or less, remove the order item
                        $orderItem->delete();
                    } else {
                        // Update the quantity of the order item
                        $orderItem->quantity = $newQuantity;
                        $orderItem->save();
                    }
                }
                $i++;
            }

            // Update the total price of the order
            $order->updateTotalPrice();

            return redirect()->route('order.show-cart')->with('success', 'Order updated successfully');
        }

        return redirect()->route('order.edit-cart')->with('error', 'No active order to update');
    }

    public function showPaymentForm()
    {
        // Generate the PromptPay QR code (You should use a library or service to generate this)
        $promptPayQrCode = '/assets/promptpay-qr-code.jpg';

        return view('order.payment-form', [
            'promptPayQrCode' => $promptPayQrCode
        ]);
    }

    public function confirmPayment(Request $request)
    {
        $order = auth()->user()->getCurrentOrder();

        if ($order) {
            // Validate the uploaded image
            $request->validate([
                'slip' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'address' => 'required|string|max:255',
                'phone' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^0[0-9]{9}$/',
                ],
            ], [
                'slip.required' => 'The slip image is required.',
                'slip.image' => 'The file must be an image (jpeg, png, jpg, gif).',
                'slip.mimes' => 'The image must be in jpeg, png, jpg, or gif format.',
                'slip.max' => 'The image size should not exceed 2048 KB.',
                'address.required' => 'The delivery address is required.',
                'address.max' => 'The delivery address should not exceed 255 characters.',
                'phone.required' => 'The phone number is required.',
                'phone.string' => 'The phone number must be a string.',
                'phone.max' => 'The phone number should not exceed 255 characters.',
                'phone.regex' => 'The phone number must be a valid Thai phone number starting with 0 and followed by 9 digits.',
            ]);

            // Upload the image
            $slipPath = $request->file('slip')->store('slips', 'public');


            $order->order_address = $request->input('address');
            $order->order_phone = $request->input('phone');
            // Update the order with the slip path
            $order->order_payment_transaction_image_url = $slipPath;
            // Update the order status to 'confirmed'
            $order->order_status = 'confirmed';
            $order->order_payment_transaction_date = now();
            $order->save();

            foreach ($order->orderItems as $orderItem) {
                $product = $orderItem->product;
                $product->product_stock -= $orderItem->quantity;
                $product->checkStockAndChangeStatus();
                $product->save();
            }

            return redirect()->route('order.show-each-order', [
                "id" => $order->id
            ])->with('success', 'Payment confirmed successfully');
        }

        return redirect()->route('order.show-payment-form')->with('error', 'No active order to confirm payment');
    }
}
