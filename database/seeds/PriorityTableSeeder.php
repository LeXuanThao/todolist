<?php

use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priority')->insert(['name'=>'info','order'=>7]);
        DB::table('priority')->insert(['name'=>'notice','order'=>6]);
        DB::table('priority')->insert(['name'=>'warning','order'=>5]);
        DB::table('priority')->insert(['name'=>'error','order'=>4]);
        DB::table('priority')->insert(['name'=>'critical','order'=>3]);
        DB::table('priority')->insert(['name'=>'alert','order'=>2]);
        DB::table('priority')->insert(['name'=>'emergency','order'=>1]);
    }
}
