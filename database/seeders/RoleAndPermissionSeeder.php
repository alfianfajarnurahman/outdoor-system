<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Definisikan semua Permission (CRUD untuk setiap modul)
        $permissions = [
            'manage brands',
            'manage users',
            'manage roles',
            'manage products',
            'manage inventory',
            'manage rentals',
            'manage sales',
            'manage laundry',
            'manage customers',
            'manage reports',
            'manage cms',
            'view dashboard',
        ];

        foreach ($permissions as $permission) {
        Permission::findOrCreate($permission, 'web');
        }

        // 2. Buat Roles
        $superAdmin = Role::findOrCreate('Super Admin', 'web');
        $brandAdmin = Role::findOrCreate('Brand Admin', 'web');
        $staff = Role::findOrCreate('Staff', 'web');
        $cashier = Role::findOrCreate('Cashier', 'web');

        // 3. Assign Permission ke Role
        // Super Admin dapat semua
        $superAdmin->givePermissionTo(Permission::all());

        // Brand Admin dapat semua kecuali manage brands & manage users? (Sesuai PRD)
        $brandAdmin->givePermissionTo([
            'manage products', 'manage inventory', 'manage rentals',
            'manage sales', 'manage laundry', 'manage customers',
            'manage reports', 'manage cms', 'view dashboard'
        ]);

        // Staff (bisa kelola rental, inventory, sales)
        $staff->givePermissionTo([
            'manage products', 'manage inventory', 'manage rentals',
            'manage sales', 'manage customers', 'view dashboard'
        ]);

        // Cashier (hanya sales & dashboard)
        $cashier->givePermissionTo([
            'manage sales', 'view dashboard'
        ]);

         // 4. Buat User Super Admin Default (untuk login pertama)
        $user = User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'superadmin@outdoor.com',
            'phone' => '08123456789',
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);
        $user->syncRoles([$superAdmin]);

        $this->command->info('Seeder berhasil! Super Admin: superadmin@outdoor.com / password');

        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

    }
}
