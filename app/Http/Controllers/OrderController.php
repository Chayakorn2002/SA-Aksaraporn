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
        $orders = $user->orders()->get();
        $currentOrder = $user->orders()->where('order_status', 'pending')->first();
        $pastOrders = $user->orders()->where('order_status', 'completed')->get();

        return view('order.history', [
            'currentOrder' => $currentOrder,
            'pastOrders' => $pastOrders,
            'orders' => $orders,
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
            'quantity' => 'required|integer|min:1|max:' . $product->product_stock,
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

        // return redirect()->back()->with('success', 'Product added to the order');
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
                'quantity.*' => 'required|integer|min:1',
            ]);

            foreach ($order->orderItems as $orderItem) {
                $newQuantity = $data['quantity'][$orderItem->id];
                if ($newQuantity <= 0) {
                    // If the quantity is set to 0 or less, remove the order item
                    $orderItem->delete();
                } else {
                    // Update the quantity of the order item
                    $orderItem->quantity = $newQuantity;
                    $orderItem->save();
                }
            }

            // Update the total price of the order
            $order->updateTotalPrice();

            return redirect()->route('order.show-cart')->with('success', 'Order updated successfully');
        }

        return redirect()->route('order.edit-cart')->with('error', 'No active order to update');
    }

    public function deleteOrderItem(OrderItem $orderItem, Request $request)
    {
        $order = auth()->user()->currentOrder;

        if ($order) {
            // Check if the order item belongs to the current order
            if ($orderItem->order_id === $order->id) {
                $orderItem->delete();
                // Update the total price of the order
                $order->updateTotalPrice();
                return redirect()->route('order.edit')->with('success', 'Order item deleted successfully');
            } else {
                return redirect()->route('order.edit')->with('error', 'Order item does not belong to your current order');
            }
        }

        return redirect()->route('order.edit')->with('error', 'No active order to delete item from');
    }
}
