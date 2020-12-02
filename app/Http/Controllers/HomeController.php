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
        if(!auth()->user()->isAdmin()) abort(403, 'Nesate administratorius.');
        $vartotojai = User::all();
        return view('vartotojai/index', compact('vartotojai'));
    }

    public function show(User $id)
    {
        if(!auth()->user()->isAdmin()) abort(403, 'Nesate administratorius.');
        return view('vartotojai/show', compact('id'));
    }
}
