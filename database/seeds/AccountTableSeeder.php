<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accountinfo')->delete();

        DB::table('accountinfo')->insert(array(
          'user_id' => '1',
          'name' => 'Admin',
          'avatar' =>  'default.jpg',
          'birthday' => '2017-06-01',
          'Gender' => 'male',
          'email' => 'Admin@admin.com',
          'employeeID' => '000001',
          'hiredDate' => '2017-06-01',
          'exitDate' => '2017-06-01',
          'salary' => '10000'

         ));
    }
}
