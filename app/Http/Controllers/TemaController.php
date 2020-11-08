<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert()
    {
        return view('temos/insert');
    }

    public function create()
    {
        $duomenys = \request()->validate([
            'pavadinimas' => 'required',
            'aprasas' => 'required',
            'stud_limitas' => 'required|numeric'
        ]);
        auth()->user()->temas()->create($duomenys);
        return redirect('/home');
    }

    public function accept(Tema $id)
    {
        if($id->stud_limitas - $id->pasirinkusieji <= 0) abort(404, 'Temos pasirinkit nebegalima');
        if(\request('yes'))
        {
            $id->pasirinkusieji++;
            $id->save();
        }
        return redirect('/home');
    }

    public function show(Tema $id)
    {
        return view('temos/show', compact('id'));
    }

    public function choose(Tema $id)
    {
        if($id->stud_limitas - $id->pasirinkusieji <= 0) abort(404, 'Temos pasirinkit nebegalima');
        return view('temos/choose', compact('id'));
    }
}
