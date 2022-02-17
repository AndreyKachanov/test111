<?php

namespace Database\Seeders;

use App;
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
        if (App::environment('local')) {
            \Artisan::call('migrate:fresh');
            $this->call(RolesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(PermissionsTableSeeder::class);
            $this->call(PermissionRolesTableSeeder::class);
            $this->call(ItemsCategorySeeder::class);
            $this->call(ItemsSeeder::class);
        }
    }
}
