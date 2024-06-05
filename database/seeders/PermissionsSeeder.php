<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit job-cards']);
        Permission::create(['name' => 'delete job-cards']);
        Permission::create(['name' => 'read job-cards']);
        Permission::create(['name' => 'create job-cards']);
        Permission::create(['name' => 'create user']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'employee']);
        $role1->givePermissionTo('read job-cards');
        $role1->givePermissionTo('create job-cards');

        $role2 = Role::create(['name' => 'manager']);
        $role2->givePermissionTo('create job-cards');
        $role2->givePermissionTo('read job-cards');
        $role2->givePermissionTo('edit job-cards');
        $role2->givePermissionTo('delete job-cards');

        $role3 = Role::create(['name' => 'admin']);
        $role3->givePermissionTo('create user');

        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($role3);

        $superAdmin = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $superAdmin->assignRole($role3, $role4);
    
    }
}
