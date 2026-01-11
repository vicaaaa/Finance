<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    // Gunakan updateOrCreate untuk Role
    $adminRole = \App\Models\Role::updateOrCreate(
        ['nama_role' => 'admin'],
        ['nama_role' => 'admin']
    );

    $userRole = \App\Models\Role::updateOrCreate(
        ['nama_role' => 'user'],
        ['nama_role' => 'user']
    );

    // Gunakan updateOrCreate untuk User berdasarkan Email
    \App\Models\User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin Finance',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,
        ]
    );
}
}
