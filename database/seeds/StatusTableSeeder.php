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
      //delete users table records
         DB::table('status')->delete();
         //insert some dummy records
         DB::table('status')->insert(array(
             array('key'=>'0','name'=>'waiting'),
             array('key'=>'1','name'=>'approved'),
             array('key'=>'2','name'=>'disapproved'),

          ));
    }
}
