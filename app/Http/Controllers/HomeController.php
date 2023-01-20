<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    public function dashboard()
    {
        $kost = Kost::get();
        return view('user.dashboard', compact('kost'));
    }
}
