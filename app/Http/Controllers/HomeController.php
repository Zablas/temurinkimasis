<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit(User $id)
    {
        if(!auth()->user()->isAdmin()) abort(403, 'Nesate administratorius.');
        return view('vartotojai/edit', compact('id'));
    }

    public function update(User $id)
    {
        if(!auth()->user()->isAdmin()) abort(403, 'Nesate administratorius.');
        $duomenys = \request()->validate([
            'vardas' => 'required',
            'role' => 'required'
        ]);
        $id->name = $duomenys['vardas'];
        $id->role = $duomenys['role'];
        $id->save();
        return redirect('/userlist');
    }

    public function delete(User $id)
    {
        if(!auth()->user()->isAdmin() || $id->isAdmin()) abort(403, 'Šio veiksmo atlikti negalite.');
        return view('vartotojai/delete', compact('id'));
    }

    public function confirmDeletion(User $id)
    {
        if(!auth()->user()->isAdmin() || $id->isAdmin()) abort(403, 'Šio veiksmo atlikti negalite.');
        if(\request('yes'))
        {
            if($id->pasirinkta_tema)
            {
                $tema = Tema::find($id->pasirinkta_tema);
                $tema->pasirinkusieji--;
                $tema->save();
            }
            if($id->isLecturer())
            {
                $temos = DB::table('temas')->where('lecturer_id', '=', $id->id)->get();
                if($temos->isNotEmpty()) abort(403, 'Dėstytojas yra atsakingas už temą(-as). Dabar jo pašalinti negalima.');
            }
            $id->delete();
        }
        return redirect('/userlist');
    }
}
