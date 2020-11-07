<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function create()
    {
        return view('temos/create');
    }
}
