<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        
        // return view('welcome', ['users' => User::all()]);
        // return view('welcome', []);
        if (Gate::allows('isAdmin', auth()->user())) {
            $users = User::orderBy("created_at", "desc")->get();
            return view('admin.index', ['users' => $users]);
        } else if (Gate::allows('isStaff', auth()->user())) {
            $orders = Order::orderBy("created_at", "desc")->get();
            return view('staff.order.index', ['orders' => $orders]);
        } else if (Gate::allows('isUser', auth()->user())) {
            $products = Product::where('product_status', 'available')->orderBy('created_at', 'desc')->paginate(12);

            return view('user.index', [
                'products' => $products,
                'categories' => Category::all(),
            ]);
        }
        else {
            return view('auth.login', ['users' => User::all()]);
        }
    }
}
