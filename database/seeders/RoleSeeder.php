<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create specific permissions
        $permissions = [
            'create post',
            'edit post',
            // Add more permissions as needed
        ];

        // Assign permissions to roles
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            $adminRole->givePermissionTo($permission);
        }

        // Create admin user
        $adminUser = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ];

        $user = User::create($adminUser);
        $user->assignRole('admin');
    }
}
