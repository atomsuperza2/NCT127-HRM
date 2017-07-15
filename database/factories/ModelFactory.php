<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [

        'name' => 'Admin',
        'username' => 'Adminstration',
        'email' => 'Admin@admin.com',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\AccountInfo::class, function (Faker\Generator $faker) {


    return [
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

    ];
});

$factory->define(App\BankaccountModel::class, function (Faker\Generator $faker) {


    return [
        'user_id' => '1',
        'account_name' => 'Admin',
        'account_number' =>  '123456789',
        'bank_name' => 'Bamk',


    ];
});
