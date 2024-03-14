<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Assuming your user model is located in this namespace
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'vendor']);

        // Define permissions
        $permissions = [
            'manage_users',
            'manage_products',
            'manage_orders',
            'view_reports',
            'manage_business_profile',
            'manage_customer_profile',
            'make_payments',
            'view_business_dashboard',
            'view_customer_dashboard'
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign all permissions to superadmin
        $superadminRole = Role::where('name', 'superadmin')->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $superadminRole->syncPermissions($permissions);

        // Create superadmin user
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'), // Change 'password' to your desired superadmin password
        ]);

        // Assign superadmin role to the superadmin user
        $superadmin->assignRole('superadmin');
    }
}
