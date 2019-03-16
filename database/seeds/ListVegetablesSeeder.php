<?php

use Illuminate\Database\Seeder;

class ListVegetablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_vegetables')->insert(['name' => 'garlic']);
        DB::table('list_vegetables')->insert(['name' => 'onions']);
        DB::table('list_vegetables')->insert(['name' => 'tomato']);
    }
}
