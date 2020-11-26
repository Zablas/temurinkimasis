@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <span class="align-items-center card-header d-flex justify-content-between">
                    {{ __('Temų sąrašas') }}
                    <div class="text-center">
                        @if(auth()->user()->pasirinkta_tema)
                            Pasirinkta tema: {{ \App\Models\Tema::find(auth()->user()->pasirinkta_tema)->pavadinimas }}
                        @endif
                    </div>
                    <div class="float-right">
                        @if(auth()->user()->pasirinkta_tema) {{-- Jei studentas turi tema, tik tada gali jos atsisakyti --}}
                            <a href="/tema/abandon" class="btn btn-primary">Atsisakyti temos</a>
                        @endif
                        @if(auth()->user()->isAdmin())
                            <a href="/tema/insert" class="btn btn-primary">Pridėti</a>
                        @endif
                    </div>
                </span>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="col-md-12" border="1">
                    <tr>
                        <th style="width: 25%">Pavadinimas</th>
                        <th style="width: 25%">Autorius</th>
                        <th style="width: 10%">Laisvos vietos</th>
                        <th style="width: 40%">Veiksmai</th>
                    </tr>
                    @foreach($temos as $tema)
                        <tr>
                            <td>{{$tema->pavadinimas}}</td>
                            <td>{{ \App\Models\User::find($tema->user_id)->name }}</td>
                            <td>{{ $tema->stud_limitas - $tema->pasirinkusieji }}</td>
                            <td>
                                <a href="/tema/{{$tema->id}}" class="btn btn-primary">Detaliau</a>
                                @if(auth()->user()->isAdmin())
                                    <a href="/tema/edit/{{$tema->id}}" class="btn btn-primary">Redaguoti</a>
                                @endif
                                @if(auth()->user()->isAdmin())
                                    <a href="/tema/delete/{{$tema->id}}" class="btn btn-danger">Šalinti</a>
                                @endif
                                @if($tema->stud_limitas - $tema->pasirinkusieji > 0 && !auth()->user()->pasirinkta_tema)
                                    <a href="/tema/choose/{{$tema->id}}" class="btn btn-success">Rinktis</a>  {{-- Galima rinktis tik atitikus salygas --}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
