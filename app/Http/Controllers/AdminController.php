<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\Console;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showCreateAccountForm()
    {
        return view('admin.create-account');
    }

    public function createAccount(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role' => 'required|in:user,staff',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($validatedData['password']);

        if ($validatedData['role'] == 'staff') {
            $user->role = 'STAFF';
        } else if ($validatedData['role'] == 'user') {
            $user->role = 'USER';
        }

        $user->save();

        // $user = User::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'phone_number' => $request->phone_number,
        //     'address' => $request->address,
        //     'password' => Hash::make($validatedData['password']),
        //     'role' => $validatedData['role'],
        // ]);

        // Redirect back with a success message or handle errors
        if (isset($user) || isset($staff)) {
            return redirect()->route('home.index')->with('success', 'Account created successfully.');
        } else {
            return back()->with('error', 'Account creation failed.');
        }
    }
}
