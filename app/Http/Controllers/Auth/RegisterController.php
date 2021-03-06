<?php

namespace App\Http\Controllers\Auth;
use App\AccountInfo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'username' => 'required|string|min:8|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([

                                'name'=> $data['name'],
                                'email' => $data['email'],
                                'username' => $data['username'],
                                'password' => bcrypt($data['birthday'])
        ]);

        $user->accountInfo = AccountInfo::create([

           'name' => $data['name'],
           'birthday' => $data['birthday'],
           'Gender' => $data['Gender'],
           'email' => $data['email'],
           'employeeID' => $data['employeeID'],
           'hiredDate' => $data['hiredDate'],
           'exitDate' => $data['exitDate'],
           'salary' => $data['salary'],
           'user_id' => $user->id,

       ]);

       $user->assignRole('User');

       return $user;
    }
}
