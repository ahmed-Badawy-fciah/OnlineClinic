<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
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
        return view('home');
    }

public function control()
{
    if(Auth::user()->role <1){
        return redirect('/');
    }

    return view('control');
}
public function booking()
{
    if(Auth::user()->role >3){
        return redirect('/');
    }

    return view('booking');
}

// public function appointments()
// {
//     if(Auth::user()->role =!2){
//         return redirect('/');
//     }

//     return view('appointments');
// }
public function about()
    {
        return view('about');
    }
    public function connect_us()
    {
        return view('connect_us');
    }
}
