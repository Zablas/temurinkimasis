<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\User;
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
        $temos = Tema::all();
        return view('home', compact('temos'));
    }

    public function userList()
    {
        $vartotojai = User::all();
        return view('vartotojai/index', compact('vartotojai'));
    }
}
