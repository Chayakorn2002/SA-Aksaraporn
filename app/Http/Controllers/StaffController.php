<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageCatalogue;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /***        Product Related Methods        ***/
    public function showOverallProductView()
    {
        return view('staff.product.index', [
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }

    public function showAvailableProductView()
    {
        return view('staff.product.index', [
            'products' => Product::where('product_status', 'available')->get(),
            'categories' => Category::all(),
        ]);
    }

    public function showUnavailableProductView()
    {
        return view('staff.product.index', [
            'products' => Product::where('product_status', 'unavailable')->get(),
            'categories' => Category::all(),
        ]);
    }

    public function showAddProductForm()
    {
        return view('staff.product.create', [
            'categories' => Category::all()
        ]);
    }

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:100',
            'product_description' => 'required|max:100',
            'product_price' => 'required',
            'product_minimum_quantity' => 'required',
            'product_stock' => 'required',
            'category_id' => 'required',
        ]);

        $images = [];

        foreach ($request->images as $image) {
            // $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path =  $image->storeAs('images', $fileName, 'public');

            array_push($images, $image_path);
        }

        $validatedData['images'] = $images;

        $product = new Product();
        $product->product_name = $validatedData['product_name'];
        $product->product_description = $validatedData['product_description'];
        $product->product_price = $validatedData['product_price'];
        $product->product_minimum_quantity = $validatedData['product_minimum_quantity'];
        $product->product_stock = $validatedData['product_stock'];
        $product->category_id = $validatedData['category_id'];
        $product->images = $validatedData['images'];

        $product->checkStockAndChangeStatus();

        $product->save();

        return redirect()->route('staff.products');
    }

    public function showEachProductView($id)
    {
        return view('staff.product.show', [
            'product' => Product::find($id)
        ]);
    }

    public function showEditProductForm($id)
    {
        return view('staff.product.edit', [
            'product' => Product::find($id),
            'categories' => Category::all()
        ]);
    }

    public function updateEachProduct(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:100',
            'product_description' => 'required|max:100',
            'product_price' => 'required',
            'product_minimum_quantity' => 'required', // This assumes you have a minimum quantity of 1.
            'product_stock' => 'required',
            'product_status' => 'required|in:available,unavailable',
            'images' => 'array', // Ensure that images is an array
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define rules for each image
            'category_id' => 'required'
        ]);

        $product = Product::find($request->input('product_id'));

        // Get the paths of the existing images
        $existingImages = $product->images;

        // Handle image updates
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images', $fileName, 'public');
                $images[] = $imagePath;
            }
            $validatedData['images'] = $images;

            // Check if there are existing images
            if ($existingImages) {
                // Delete the existing images from the storage
                foreach ($existingImages as $existingImage) {
                    Storage::disk('public')->delete($existingImage);
                }
            }
        }


        $product->product_name = $validatedData['product_name'];
        $product->product_description = $validatedData['product_description'];
        $product->product_price = $validatedData['product_price'];
        $product->product_minimum_quantity = $validatedData['product_minimum_quantity'];
        $product->product_stock = $validatedData['product_stock'];
        $product->product_status = $validatedData['product_status'];

        // Check if "images" key exists in the validated data
        if (array_key_exists('images', $validatedData)) {
            $product->images = $validatedData['images'];
        }
        
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('staff.products.show', $product->id)
            ->with('success', 'Product updated successfully');
    }

    /***        End of Product Related Methods        ***/

    /***        Order Related Methods        ***/

    public function showOverallOrder()
    {
        return view('staff.order.index', [
            'orders' => Order::all()
        ]);
    }

    public function showPendingOrder()
    {
        return view('staff.order.index', [
            'orders' => Order::where('order_status', 'pending')->get()
        ]);
    }

    public function showConfirmedOrder()
    {
        return view('staff.order.index', [
            'orders' => Order::where('order_status', 'confirmed')->get()
        ]);
    }

    public function showProcessingOrder()
    {
        return view('staff.order.index', [
            'orders' => Order::where('order_status', 'processing')->get()
        ]);
    }

    public function showCompletedOrder()
    {
        return view('staff.order.index', [
            'orders' => Order::where('order_status', 'completed')->get()
        ]);
    }

    public function showEachOrderView($id)
    {
        return view('staff.order.show', [
            'order' => Order::find($id)
        ]);
    }

    /***        End of Order Related Methods        ***/

    public function showAddCategoryForm()
    {
        return view('staff.category.create');
    }

    public function addCategory(Request $request)
    {

        $validatedData = $request->validate([
            'category_name' => 'required|max:100',
            'category_description' => 'required|max:100',
            // 'category_image' => 'requireid|max:100'
        ]);

        $category = new Category();

        $category->category_name = $validatedData['category_name'];
        $category->category_description = $validatedData['category_description'];

        $category->save();

        return redirect()->route('staff.products');
    }

    public function updateOrderStatusConfirmedToProcessing($id)
    {
        $order = Order::find($id);
        $order->order_status = 'processing';
        $order->save();

        return redirect()->route('staff.show-each-order', $id);
    }

    public function updateOrderStatusProcessingToCompleted($id)
    {
        $order = Order::find($id);
        $order->order_status = 'completed';
        $order->save();

        return redirect()->route('staff.show-each-order', $id);
    }
}
