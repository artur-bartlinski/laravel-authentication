<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Gender;
use App\Title;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $titles = Title::all();
        $genders = Gender::all();

        return view('auth.register', compact('genders','titles'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
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
            'forename' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'title_id' => 'nullable|integer',
            'gender_id' => 'nullable|integer',
            'dob' => 'required|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',

            'address_line_1' => 'addressLength:{$data["address_line_2"]}|required|string|max:60',
            'address_line_2' => 'addressLength:{$data["address_line_1"]}|nullable|string|max:60',
            'town' => 'required|string',
            'county' => 'nullable|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
            'from_date' => 'required|date|after_or_equal:dob|before:until_date',
            'until_date' => 'required|date|after:from_date',
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
        $address = Address::create([
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'town' => $data['town'],
            'county' => $data['county'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
            'from_date' => $data['from_date'],
            'until_date' => $data['until_date'],
        ]);

        $user = User::create([
            'forename' => $data['forename'],
            'surname' => $data['surname'],
            'title_id' => $data['title_id'],
            'gender_id' => $data['gender_id'],
            'dob' => $data['dob'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address_id' => $address->id
        ]);

        return $user;
    }
}
