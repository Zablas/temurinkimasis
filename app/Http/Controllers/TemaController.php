<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\User;
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
            'stud_limitas' => 'required|numeric|min:0'
        ]);
        auth()->user()->temas()->create($duomenys);
        return redirect('/home');
    }

    public function accept(Tema $id)
    {
        if(auth()->user()->pasirinkta_tema) abort(404, 'Temą jau esate pasirinkę.'); // Galima rinktis tik jei dar nera pasirinktos temos
        if($id->stud_limitas - $id->pasirinkusieji <= 0) abort(404, 'Temos pasirinkit nebegalima.'); // Galima rinktis tik jei dar yra laisvu vietu
        if(\request('yes')) // Jei buvo paspaustas "Taip" mygtukas
        {
            $id->pasirinkusieji++;
            auth()->user()->pasirinkta_tema = $id->id;
            $id->save();
            auth()->user()->save();
        }
        return redirect('/home');
    }

    public function show(Tema $id)
    {
        return view('temos/show', compact('id'));
    }

    public function choose(Tema $id)
    {
        if(auth()->user()->pasirinkta_tema) abort(404, 'Temą jau esate pasirinkę.'); // Galima rinktis tik jei dar nera pasirinktos temos
        if($id->stud_limitas - $id->pasirinkusieji <= 0) abort(404, 'Temos pasirinkit nebegalima.'); // Galima rinktis tik jei dar yra laisvu vietu
        return view('temos/choose', compact('id'));
    }

    public function abandon()
    {
        $tema = Tema::findOrFail(auth()->user()->pasirinkta_tema);
        return view('temos/abandon', compact('tema'));
    }

    public function confirmAbandonment(Tema $id)
    {
        if(\request('yes')) // Jei buvo paspaustas "Taip" mygtukas
        {
            $id->pasirinkusieji--;
            auth()->user()->pasirinkta_tema = null;
            $id->save();
            auth()->user()->save();
        }
        return redirect('/home');
    }

    public function edit(Tema $id)
    {
        return view('temos/edit', compact('id'));
    }

    public function update(Tema $id)
    {
        $duomenys = \request()->validate([
            'pavadinimas' => 'required',
            'aprasas' => 'required',
            'stud_limitas' => "required|numeric|min:$id->pasirinkusieji"
        ]);
        $id->update($duomenys);
        return redirect('/home');
    }

    public function delete(Tema $id)
    {
        return view('temos/delete', compact('id'));
    }

    public function confirmDeletion(Tema $id)
    {
        if(\request('yes'))
        {
            User::where('pasirinkta_tema', '=', $id->id)->update(array('pasirinkta_tema' => null));
            $id->delete();
        }
        return redirect('/home');
    }
}
