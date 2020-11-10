<?php

namespace App\Http\Controllers;

use App\Models\Siuloma;
use App\Models\Tema;
use App\Models\User;
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

    public function approve(Siuloma $id)
    {
        if(!auth()->user()->isAdmin()) abort(404, 'Nesate administratorius.');
        return view('siulomos/approve', compact('id'));
    }

    public function accept(Siuloma $id)
    {
        if(!auth()->user()->isAdmin()) abort(404, 'Nesate administratorius.');
        if(\request('yes'))
        {
            $tema = new Tema();
            $tema->pavadinimas = $id->pavadinimas;
            $tema->aprasas = $id->aprasas;
            $tema->stud_limitas = $id->stud_limitas;
            $tema->user_id = $id->user_id;
            $tema->save();
            $id->delete();
        }
        return redirect('/siuloma');
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
            'stud_limitas' => 'required|numeric|min:0'
        ]);
        auth()->user()->siulomas()->create($duomenys);
        return redirect('/siuloma');
    }

    public function show(Siuloma $id)
    {
        return view('siulomos/show', compact('id'));
    }

    public function edit(Siuloma $id)
    {
        if(!auth()->user()->isAdmin() && auth()->user()->id != $id->user_id) abort(404, 'Nesate administratorius.');
        return view('siulomos/edit', compact('id'));
    }

    public function update(Siuloma $id)
    {
        if(!auth()->user()->isAdmin() && auth()->user()->id != $id->user_id) abort(404, 'Nesate administratorius.');
        $duomenys = \request()->validate([
            'pavadinimas' => 'required',
            'aprasas' => 'required',
            'stud_limitas' => "required|numeric|min:$id->pasirinkusieji"
        ]);
        $id->update($duomenys);
        return redirect('/siuloma');
    }

    public function delete(Siuloma $id)
    {
        if(!auth()->user()->isAdmin() && auth()->user()->id != $id->user_id) abort(404, 'Nesate administratorius.');
        return view('siulomos/delete', compact('id'));
    }

    public function confirmDeletion(Siuloma $id)
    {
        if(!auth()->user()->isAdmin() && auth()->user()->id != $id->user_id) abort(404, 'Nesate administratorius.');
        if(\request('yes')) $id->delete();
        return redirect('/siuloma');
    }
}
