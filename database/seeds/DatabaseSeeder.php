<?php

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
        $this->call(UsersSeeder::class);
        $this->call(ListBreadsSeeder::class);
        $this->call(ListSaucesSeeder::class);
        $this->call(ListTastesSeeder::class);
        $this->call(ListVegetablesSeeder::class);
    }
}
