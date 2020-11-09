@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <span class="align-items-center card-header d-flex justify-content-between">
                    {{ __('Siūlomų temų sąrašas') }}
                    <div class="float-right">
                        <a href="/siuloma/insert" class="btn btn-primary">Siūlyti</a>
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
                        <th style="width: 10%">Vietų limitas</th>
                        <th style="width: 40%">Veiksmai</th>
                    </tr>
                    @foreach($siulomos as $siuloma)
                        <tr>
                            <td>{{$siuloma->pavadinimas}}</td>
                            <td>{{ \App\Models\User::find($siuloma->user_id)->name }}</td>
                            <td>{{ $siuloma->stud_limitas }}</td>
                            <td>
                                <a href="/siuloma/{{$siuloma->id}}" class="btn btn-primary">Detaliau</a>
                                <a href="/siuloma/edit/{{$siuloma->id}}" class="btn btn-primary">Redaguoti</a>
                                <a href="/tema/delete/{{$siuloma->id}}" class="btn btn-danger">Šalinti</a>
{{--                                @if($tema->stud_limitas - $tema->pasirinkusieji > 0 && !auth()->user()->pasirinkta_tema)--}}
{{--                                    <a href="/tema/choose/{{$tema->id}}" class="btn btn-success">Rinktis</a>   Galima rinktis tik atitikus salygas--}}
{{--                                @endif--}}
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
