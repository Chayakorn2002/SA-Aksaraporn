<?php

namespace App\Policies;

use App\Models\User;

class StaffPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isStaff(User $user) : bool
    {
        return $user->role === "STAFF";   
    }
}
