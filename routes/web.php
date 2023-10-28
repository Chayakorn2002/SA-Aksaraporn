<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes

// Route::resource('admin', AdminController::class);

Route::get(
    '/admin/create-account',
    [AdminController::class, 'showCreateAccountForm']
)->name('admin.create-account');

Route::post(
    '/admin/create-account',
    [AdminController::class, 'createAccount']
)->name('admin.create-account');

// End of admin routes

/*** Staff routes ***/

// Products
Route::get(
    'staff/products',
    [StaffController::class, 'showOverallProductView']
)->name('staff.products');

Route::get(
    'staff/add-product',
    [StaffController::class, 'showAddProductForm']
)->name('staff.add-product');

Route::post(
    'staff/add-product',
    [StaffController::class, 'addProduct']
)->name('staff.add-product');

Route::get(
    '/staff/products/{id}', 
    [StaffController::class, 'showEachProductView']
)->name('staff.products.show');

Route::get(
    'staff/products/{id}/edit', 
    [StaffController::class, 'showEditProductForm']
)->name('staff.products.edit');

Route::put(
    'staff/products/{id}', 
    [StaffController::class, 'updateEachProduct']
)->name('staff.products.update');



// End of products

// Orders
Route::get(
    'staff/orders',
    [StaffController::class, 'showOverallOrderView']
)->name('staff.orders');
// End of Orders

// Categories
Route::get(
    'staff/add-category',
    [StaffController::class, 'showAddCategoryForm']
)->name('staff.add-category');

Route::post(
    'staff/add-category',
    [StaffController::class, 'addCategory']
)->name('staff.add-category');
// End of categories

/***  End of staff routes ***/

Route::resource('user', UserController::class);

Route::resource('product', ProductController::class);

Route::resource('order', OrderController::class);


require __DIR__ . '/auth.php';
