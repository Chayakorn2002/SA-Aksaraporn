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
    public function showOverallProductView()
    {
        return view('staff.product.index', [
            'products' => Product::all(),
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
            'product_stock' => 'required',
            'category_id' => 'required',
            // 'images' => 'required|array',
            // 'product_images' => 'array', // Ensure that product_images is an array
            // 'product_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define rules for each image
        ]);

        $images = [];

        foreach ($request->images as $image) {
            // $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path =  $image->storeAs('images', $fileName, 'public');

            array_push($images, $image_path);
        }

        $validatedData['images'] = $images;

        // Product::create($validatedData);

        $product = new Product();

        $product->product_name = $validatedData['product_name'];
        $product->product_description = $validatedData['product_description'];
        $product->product_price = $validatedData['product_price'];
        $product->product_stock = $validatedData['product_stock'];
        $product->category_id = $validatedData['category_id'];
        $product->images = $validatedData['images'];

        // // Upload and store images
        // // if ($request->hasFile('product_images')) {
        // //     $images = [];
        // //     foreach ($request->file('product_images') as $image) {
        // //         $imageName = time() . '_' . $image->getClientOriginalName();
        // //         $image->storeAs('product_images', $imageName, 'public');
        // //         $images[] = $imageName;
        // //     }
        // //     $product->images = $images;
        // // }

        $product->save();

        // foreach ($request->file('images') as $imagefile) {
        //     $image = new ImageCatalogue();
        //     $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
        //     $image->image_url = $path;
        //     $image->product_id = $product->id;
        //     $image->save();
        //   }

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

            // Delete the existing images from the storage
            foreach ($existingImages as $existingImage) {
                Storage::disk('public')->delete($existingImage);
            }
        }

        $product->product_name = $validatedData['product_name'];
        $product->product_description = $validatedData['product_description'];
        $product->product_price = $validatedData['product_price'];
        $product->product_stock = $validatedData['product_stock'];
        $product->product_status = $validatedData['product_status'];
        $product->images = $validatedData['images'];
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('staff.products.show', $product->id)
            ->with('success', 'Product updated successfully');
    }


    public function showOverallOrderView()
    {
        return view('staff.order.index', [
            'orders' => Order::all()
        ]);
    }


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
}
