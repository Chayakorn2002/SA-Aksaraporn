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
    '/admin/active-account',
    [AdminController::class, 'showActiveAccount']
)->name('admin.active-account');

Route::get(
    '/admin/suspended-account',
    [AdminController::class, 'showSuspendedAccount']
)->name('admin.suspended-account');

Route::get(
    '/admin/create-account',
    [AdminController::class, 'showCreateAccountForm']
)->name('admin.create-account');

Route::post(
    '/admin/create-account',
    [AdminController::class, 'createAccount']
)->name('admin.create-account');

Route::get(
    '/admin/user-account/{id}',
    [AdminController::class, 'showUserAccount']
)->name('admin.show-account');

Route::put(
    '/admin/user-account/{id}/suspend',
    [AdminController::class, 'suspendAccount']
)->name('admin.suspend-account');

Route::put(
    '/admin/user-account/{id}/activate',
    [AdminController::class, 'activateAccount']
)->name('admin.activate-account');

// End of admin routes

/*** Staff routes ***/

// Products
Route::get(
    '/staff/products',
    [StaffController::class, 'showOverallProductView']
)->name('staff.products');

Route::get(
    '/staff/products/available',
    [StaffController::class, 'showAvailableProductView']
)->name('staff.available-products');

Route::get(
    '/staff/products/unavailable',
    [StaffController::class, 'showUnavailableProductView']
)->name('staff.unavailable-products');

Route::get(
    '/staff/add-product',
    [StaffController::class, 'showAddProductForm']
)->name('staff.add-product');

Route::post(
    '/staff/add-product',
    [StaffController::class, 'addProduct']
)->name('staff.add-product');

Route::get(
    '/staff/products/{id}',
    [StaffController::class, 'showEachProductView']
)->name('staff.products.show');

Route::get(
    '/staff/products/{id}/edit',
    [StaffController::class, 'showEditProductForm']
)->name('staff.products.edit');

Route::put(
    '/staff/products/{id}',
    [StaffController::class, 'updateEachProduct']
)->name('staff.products.update');



// End of products

// Orders
Route::get(
    '/staff/orders',
    [StaffController::class, 'showOverallOrder']
)->name('staff.orders');

Route::get(
    '/staff/orders/pending',
    [StaffController::class, 'showPendingOrder']
)->name('staff.pending-orders');

Route::get(
    '/staff/orders/confirmed',
    [StaffController::class, 'showConfirmedOrder']
)->name('staff.confirmed-orders');

Route::get(
    '/staff/orders/processing',
    [StaffController::class, 'showProcessingOrder']
)->name('staff.processing-orders');

Route::get(
    '/staff/orders/completed',
    [StaffController::class, 'showCompletedOrder']
)->name('staff.completed-orders');

Route::get(
    '/staff/orders/{id}',
    [StaffController::class, 'showEachOrderView']
)->name('staff.show-each-order');

Route::put(
    '/staff/orders/{id}/confirmed-to-processing',
    [StaffController::class, 'updateOrderStatusConfirmedToProcessing']
)->name('staff.update-order-status-confirmed-to-processing');

Route::get(
    'staff/orders/{id}/create-processing-order-transaction',
    [StaffController::class,'showCreateProcessingOrderTransactionForm']
)->name('staff.show-create-processing-order-transaction-form');

Route::post(
    'staff/orders/{id}/create-processing-order-transaction',
    [StaffController::class, 'createProcessingOrderTransaction']
)->name('staff.create-processing-order-transaction');

Route::put(
    '/staff/orders/{id}/processing-to-completed',
    [StaffController::class, 'updateOrderStatusProcessingToCompleted']
)->name('staff.update-order-status-processing-to-completed');

// End of Orders

// Categories
Route::get(
    '/staff/add-category',
    [StaffController::class, 'showAddCategoryForm']
)->name('staff.add-category');

Route::post(
    '/staff/add-category',
    [StaffController::class, 'addCategory']
)->name('staff.add-category');
// End of categories

/***  End of staff routes ***/

/***  Begin of User routes ***/

Route::get(
    '/user-profile',
    [UserController::class, 'showUserProfile']
)->name('user.profile');

Route::get(
    '/user/edit-profile',
    [UserController::class, 'showEditProfileForm']
)->name('user.edit-profile');

Route::put('/user/edit-profile', [
    UserController::class, 
    'updateProfile']
)->name('user.update-profile');


/***  End of User routes ***/

/*** Begin of Product routes ***/

Route::get(
    '/products',
    [ProductController::class, 'index']
)->name('products.index');

Route::get(
    '/products/category/{id}',
    [ProductController::class, 'showByCategory']
)->name('products.show-by-category');

// Route::get(
//     '/products/{id}',
//     [ProductController::class, 'show']
// )->name('products.show');

/*** End of Product routes ***/

/***  Begin of Order routes ***/

Route::get(
    '/order-history',
    [OrderController::class, 'showOrderHistory']
)->name('order.history');

Route::get(
    '/order-history/pending',
    [OrderController::class, 'showPendingOrder']
)->name('order.pending');

Route::get(
    '/order-history/confirmed',
    [OrderController::class, 'showConfirmedOrder']
)->name('order.confirmed');

Route::get(
    '/order-history/processing',
    [OrderController::class, 'showProcessingOrder']
)->name('order.processing');

Route::get(
    '/order-history/completed',
    [OrderController::class, 'showCompletedOrder']
)->name('order.completed');

Route::get(
    '/order-history/{id}',
    [OrderController::class, 'showEachOrder']
)->name('order.show-each-order');


Route::get(
    '/product/{id}',
    [OrderController::class, 'showAddOrderItem']
)->name('order.add-order-item');

// Route::post(
//     '/product/{id}',
//     [OrderController::class, 'addToOrder']
// )->name('order.create-order');

Route::post(
    '/product/{id}',
    [OrderController::class, 'addOrderItemToOrder']
)->name('order.add-order-item-to-order');

Route::get(
    '/cart',
    [OrderController::class, 'showCart']
)->name('order.show-cart');

Route::get(
    '/cart/edit',
    [OrderController::class, 'showEditCurrentOrderForm']
)->name('order.edit-cart');

Route::put(
    '/cart/edit',
    [OrderController::class, 'updateCurrentOrder']
)->name('order.update-cart');

Route::get(
    '/cart/payment',
    [OrderController::class, 'showPaymentForm']
)->name('order.show-payment-form');

Route::post(
    '/cart/payment',
    [OrderController::class, 'confirmPayment']
)->name('order.submit-payment');
// Route::get(
//     '/cart/edit/{orderItem}',
//     [OrderController::class, 'showOrderItemDetail']
// )->name('order.show-each-order-item');

// Route::delete(
//     '/cart/edit/{orderItem}',
//     [OrderController::class, 'deleteOrderItem']
// )->name('order.delete-order-item');

/***  End of Order routes ***/

Route::resource('user', UserController::class);

require __DIR__ . '/auth.php';
