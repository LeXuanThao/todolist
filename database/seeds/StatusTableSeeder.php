<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(['name'=>'complete']);
        DB::table('status')->insert(['name'=>'active']);
        DB::table('status')->insert(['name'=>'deactive']);
        DB::table('status')->insert(['name'=>'testing']);
        DB::table('status')->insert(['name'=>'deploying']);
    }
}
