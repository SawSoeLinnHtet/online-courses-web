<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Saw Soe Linn Htet',
            'email' => 'admin@gmail.com',
            'password' => '123123123',
            'gender' => 'male'
        ]);

        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole($role->id);
    }
}
