<?php

use Illuminate\Database\Seeder;

class LeavetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('leavestype')->delete();
      //insert some dummy records
      DB::table('leavestype')->insert(array(
          array('leavestype'=>'ลาป่วย'),
          array('leavestype'=>'ลากิจ'),

       ));
    }
}
