<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $title = $user->title;
        $gender = $user->gender;
        $address = $user->currentAddress;
        $addresses = $user->addresses;

        return view('home', array_merge(
            $user->toArray(),
            $title->toArray(),
            $gender->toArray(),
            $address->toArray(),
            $addresses->toArray()
        ));
    }
}
