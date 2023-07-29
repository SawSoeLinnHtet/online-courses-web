<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Saw Soe Linn Htet',
            'email' => 'superadmin@gmail.com',
            'password' => '11111111',
            'gender' => 'male'
        ]);
    }
}
