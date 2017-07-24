<?php

use Illuminate\Database\Seeder;

class BankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bankaccount')->delete();
        DB::table('bankaccount')->insert(array(
          'user_id' => '1',
          'account_name' => 'Admin',
          'account_number' =>  '123456789',
          'bank_name' => 'Bamk',

         ));
    }
}
