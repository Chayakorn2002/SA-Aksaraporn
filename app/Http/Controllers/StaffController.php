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
        $products = Product::paginate(12);
        $categories = Category::all();
        return view('staff.product.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function showAvailableProductView()
    {
        $products = Product::where('product_status', 'available')->paginate(10);
        return view('staff.product.index', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }

    public function showUnavailableProductView()
    {
        $products = Product::where('product_status', 'unavailable')->paginate(10);
        return view('staff.product.index', [
            'products' => $products,
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
            'product_description' => 'required|max:255',
            'product_price' => ['required', 'numeric', 'min:0.01'], // Positive value validation
            'product_minimum_quantity' => ['required', 'numeric', 'min:1'], // Positive value validation
            'product_stock' => ['required', 'numeric', 'min:1'], // Positive value validation
            'category_id' => 'required',
            'images' => 'required|array|min:1', // Ensure at least one image is required
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define rules for each image file
        ], [
            'product_name.required' => 'The product name field is required.',
            'product_name.max' => 'The product name should not exceed 100 characters.',
            'product_description.required' => 'The product description field is required.',
            'product_description.max' => 'The product description should not exceed 100 characters.',
            'product_price.required' => 'The product price field is required.',
            'product_price.numeric' => 'The product price must be a number.',
            'product_price.min' => 'The product price should be a positive value.',
            'product_minimum_quantity.required' => 'The product minimum quantity field is required.',
            'product_minimum_quantity.numeric' => 'The product minimum quantity must be a number.',
            'product_minimum_quantity.min' => 'The product minimum quantity should be a positive value.',
            'product_stock.required' => 'The product stock field is required.',
            'product_stock.numeric' => 'The product stock must be a number.',
            'product_stock.min' => 'The product stock should be a positive value.',
            'category_id.required' => 'The category ID field is required.',
            'images.required' => 'Please upload at least one image.',
            'images.array' => 'The uploaded images must be in an array.',
            'images.min' => 'Please upload at least one image.',
            'images.*.image' => 'The uploaded file must be an image.',
            'images.*.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, or gif.',
            'images.*.max' => 'The image size should not exceed 2MB.',
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
        ], [
            'product_name.required' => 'The product name is required.',
            'product_name.max' => 'The product name should not exceed 100 characters.',
            'product_description.required' => 'The product description is required.',
            'product_description.max' => 'The product description should not exceed 100 characters.',
            'product_price.required' => 'The product price is required.',
            'product_minimum_quantity.required' => 'The product minimum quantity is required.',
            'product_stock.required' => 'The product stock is required.',
            'product_status.required' => 'The product status is required.',
            'product_status.in' => 'Invalid product status. It should be either "available" or "unavailable".',
            'images.array' => 'The images field should be an array.',
            'images.*.image' => 'Each image should be a valid image (jpeg, png, jpg, gif).',
            'images.*.mimes' => 'Each image should be in jpeg, png, jpg, or gif format.',
            'images.*.max' => 'Each image size should not exceed 2048 KB.',
            'category_id.required' => 'The category is required.'
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

        $product->checkStockAndChangeStatus();

        $product->save();

        return redirect()->route('staff.products.show', $product->id)
            ->with('success', 'Product updated successfully');
    }

    /***        End of Product Related Methods        ***/

    /***        Order Related Methods        ***/

    public function showOverallOrder()
    {
        $orders = Order::orderBy("created_at", "desc")->get();
        return view('staff.order.index', [
            'orders' => $orders
        ]);
    }


    public function showPendingOrder()
    {
        $orders = Order::where('order_status', 'pending')->orderBy("created_at", "desc")->get();
        return view('staff.order.index', [
            'orders' => $orders
        ]);
    }

    public function showConfirmedOrder()
    {
        $orders = Order::where('order_status', 'confirmed')->orderBy("created_at", "desc")->get();
        return view('staff.order.index', [
            'orders' => $orders
        ]);
    }

    public function showProcessingOrder()
    {
        $orders = Order::where('order_status', 'processing')->orderBy("created_at", "desc")->get();
        return view('staff.order.index', [
            'orders' => $orders
        ]);
    }

    public function showCompletedOrder()
    {
        $orders = Order::where('order_status', 'completed')->orderBy("created_at", "desc")->get();
        return view('staff.order.index', [
            'orders' => $orders
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
        ], [
            'category_name.required' => 'Category name is required.',
            'category_name.max' => 'Category name should not exceed 100 characters.',
            'category_description.required' => 'Category description is required.',
            'category_description.max' => 'Category description should not exceed 100 characters.',
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

        return redirect()->route('staff.processing-orders', $id);
    }

    public function updateOrderStatusProcessingToCompleted($id)
    {
        $order = Order::find($id);
        $order->order_status = 'completed';
        $order->save();

        return redirect()->route('staff.completed-orders', $id);
    }
}
