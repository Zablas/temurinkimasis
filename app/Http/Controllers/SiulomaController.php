<?php

namespace App\Http\Controllers;

use App\Models\Siuloma;
use Illuminate\Http\Request;

class SiulomaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siulomos = Siuloma::all();
        return view('siulomos/index', compact('siulomos'));
    }

    public function insert()
    {
        return view('siulomos/insert');
    }

    public function create()
    {
        $duomenys = \request()->validate([
            'pavadinimas' => 'required',
            'aprasas' => 'required',
            'stud_limitas' => 'required|numeric'
        ]);
        auth()->user()->siulomas()->create($duomenys);
        return redirect('/siuloma');
    }
}