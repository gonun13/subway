<?php

use Illuminate\Database\Seeder;

class ListSaucesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_sauces')->insert(['name' => 'garlic']);
        DB::table('list_sauces')->insert(['name' => 'mustard']);
        DB::table('list_sauces')->insert(['name' => 'ketchup']);
    }
}
