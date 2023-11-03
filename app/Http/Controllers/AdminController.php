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

    public function showActiveAccount() {
        $users = User::where('status', 'active')->get();

        return view('admin.index', [
            'users' => $users,
        ]);
    }

    public function showSuspendedAccount() {
        $users = User::where('status', 'suspended')->get();

        return view('admin.index', [
            'users' => $users,
        ]);
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

        // Redirect back with a success message or handle errors
        if (isset($user) || isset($staff)) {
            return redirect()->route('home.index')->with('success', 'Account created successfully.');
        } else {
            return back()->with('error', 'Account creation failed.');
        }
    }

    public function showUserAccount($id) {
        $user = User::find($id);

        return view('admin.show-user', [
            'user' => $user,
        ]);
    }

    public function suspendAccount($id) {
        $user = User::find($id);
        $user->status = 'suspended';
        $user->save();

        return redirect()->route('home.index')->with('success', 'Account suspended successfully.');
    }

    public function activateAccount($id) {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        return redirect()->route('home.index')->with('success', 'Account activated successfully.');
    }
}
