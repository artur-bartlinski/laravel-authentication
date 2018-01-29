<?php

namespace App\Http\Controllers\Auth;

use App\Address;
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
            'forename' => 'string|max:255',
            'surname' => 'string|max:255',
            'title_id' => 'integer',
            'gender_id' => 'integer',
            'dob' => 'date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',

            'address_line_1' => 'required|string',
            'address_line_2' => 'string',
            'town' => 'required|string',
            'county' => 'string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
            'from_date' => 'required|date',
            'until_date' => 'required|date',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'forename' => $data['forename'],
            'surname' => $data['surname'],
            'title_id' => $data['title_id'],
            'gender_id' => $data['gender_id'],
            'dob' => $data['dob'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->addresses()->save([
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'town' => $data['town'],
            'county' => $data['county'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
            'from_date' => $data['from_date'],
            'until_date' => $data['until_date'],
        ]);

        return $user;
    }
}
