<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      
      //insert some dummy records
      DB::table('users')->insert(array(
        'name' => 'Admin',
        'username' => 'Administration',
        'email' => 'Admin@admin.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),

       ));


    }
}
