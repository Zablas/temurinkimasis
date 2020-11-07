@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <span class="align-items-center card-header d-flex justify-content-between">
                    {{ __('Temų sąrašas') }}
                    <a href="/tema/insert" class="btn btn-primary float-right">Pridėti</a>
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
                        <th style="width: 25%">Laisvos vietos</th>
                        <th style="width: 25%">Veiksmai</th>
                    </tr>
                    @foreach($temos as $tema)
                        <tr>
                            <td>{{$tema->pavadinimas}}</td>
                            <td>{{ \App\Models\User::find($tema->user_id)->name }}</td>
                            <td>{{ $tema->stud_limitas - $tema->pasirinkusieji }}</td>
                            <td>
                                <a href="/tema/{{$tema->id}}" class="btn btn-primary">Detaliau</a>
                                <a href="/tema/choose/{{$tema->id}}" class="btn btn-primary">Rinktis</a>
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
