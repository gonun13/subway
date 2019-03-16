<?php

use Illuminate\Database\Seeder;

class ListTastesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_tastes')->insert(['name' => 'chicken fajita']);
        DB::table('list_tastes')->insert(['name' => 'veggie']);
        DB::table('list_tastes')->insert(['name' => 'stew']);
    }
}
