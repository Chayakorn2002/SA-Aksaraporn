<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', ['user' => Auth::user()]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
