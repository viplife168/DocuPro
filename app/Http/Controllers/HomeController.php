<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        if (count(Profile::where('profile_id', $user_id)->get()) != 0) {
            return view('home');
        }
        else return redirect()->action('ProfileController@viewAddProfile');
    }
}
