<?php

use Illuminate\Database\Seeder;

class ListBreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_breads')->insert(['name' => 'Regular']);
        DB::table('list_breads')->insert(['name' => 'Dry']);
        DB::table('list_breads')->insert(['name' => 'Rich']);
    }
}
