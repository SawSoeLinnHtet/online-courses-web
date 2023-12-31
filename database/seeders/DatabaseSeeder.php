<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(30)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\Instructor::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Course::factory(20)->create();
        \App\Models\Episode::factory(30)->create();
    
        $this->call(
            PermissionSeeder::class
        );

        $this->call(
            SuperAdminSeeder::class
        );
    }
}
