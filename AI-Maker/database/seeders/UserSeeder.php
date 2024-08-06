<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);

        $role = Role::where('role', 'superadmin')->first();
        $user->roles()->attach($role);
    }
}
