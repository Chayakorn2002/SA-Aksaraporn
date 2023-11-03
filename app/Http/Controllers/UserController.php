<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showUserProfile()
    {
        $user = Auth::user();
        return view('user.profile', [
            'user' => $user,
        ]);
    }
    public function showEditProfileForm()
    {
        $user = Auth::user();
        return view('user.edit-profile', [
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Update phone number and address
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Save the user
        $user->save();

        // Redirect back with a success message
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', ['user' => Auth::user(), 'products' => Product::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userTemp = Auth::user();
        $user = User::find($userTemp->id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|size:10',
            'address' => 'nullable|string|max:255',
        ]);

        $user->name = $request->get('name');
        $user->phone_number = $request->get('phone_number');
        $user->address = $request->get('address');

        $user_name = $request->get('name');
        if ($user_name == null) {
            $user->name = Auth::user()->name;
        }

        $user_phone_number = $request->get('phone_number');
        if ($user_phone_number == null) {
            $user->user_phone_number = Auth::user()->phone_number;
        }

        $user_address = $request->get('address');
        if ($user_address == null) {
            $user->address = Auth::user()->address;
        }

        $user->save();

        return redirect()->route('user.index', $user);
    }
}
