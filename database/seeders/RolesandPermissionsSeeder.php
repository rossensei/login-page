<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $customer = Role::create(['name' => 'customer']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'create-band']);
        Permission::create(['name' => 'edit-band']);
        Permission::create(['name' => 'view-band']);
        Permission::create(['name' => 'delete-band']);
        // Permission::create(['name' => 'send-email']);

        $admin->givePermissionTo(Permission::all());
        $customer->givePermissionTo('view-band');

        $users = User::all();

        foreach ($users as $user) {
            $user->assignRole('customer');
        }

        $admin1 = User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@email.com',
            'password'  => bcrypt('password123')
        ]);

        $customer1 = User::create([
            'name'      => 'Customer',
            'email'     => 'Estillore@yahoo.com',
            'password'  => bcrypt('password123')
        ]);

        $admin1->assignRole('admin');
        $customer1->assignRole('customer');
    }
}
