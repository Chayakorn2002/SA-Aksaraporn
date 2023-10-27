<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            return view('admin.index', ['users' => User::all()]);
        } else if (Gate::allows('isStaff', auth()->user())) {
            return view('staff.product.index', ['products' => Product::all(), 'categories' => Category::all()]);
        } else if (Gate::allows('isUser', auth()->user())) {
            return view('user.index', ['users' => User::all()]);
        }
        else {
            return view('auth.login', ['users' => User::all()]);
        }
    }
}
