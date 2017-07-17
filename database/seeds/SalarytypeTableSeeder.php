<?php

use Illuminate\Database\Seeder;

class SalarytypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //delete users table records
         DB::table('salary_type')->delete();
         //insert some dummy records
         DB::table('salary_type')->insert(array(
             array('key'=>'0','name'=>'hour'),
             array('key'=>'1','name'=>'day'),
             array('key'=>'2','name'=>'month'),

          ));
    }
}
