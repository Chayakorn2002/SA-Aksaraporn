<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isUser(User $user) : bool
    {
        return $user->role === "USER";   
    }

    public function isStaff(User $user) : bool
    {
        return $user->role === "STAFF";   
    }

    public function isAdmin(User $user) : bool
    {
        return $user->role === "ADMIN";   
    }
}
