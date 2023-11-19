<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'ADMIN',
            'phone_number' => '0625456055',
            'address' => 'Admin Address',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'role' => 'STAFF',
            'phone_number' => '0625450000',
            'address' => 'Staff Address',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Customer',
            'email' => 'user@gmail.com',
            'role' => 'USER',
            'phone_number' => '0625450001',
            'address' => 'Customer Address',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);
        
        User::factory(10)->create();
    }
}
