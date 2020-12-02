@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <span class="align-items-center card-header d-flex justify-content-between">
                    {{ __('Vartotojų sąrašas') }}
                </span>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="col-md-12" border="1">
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 56%">Vardas</th>
                                <th style="width: 33%">Veiksmai</th>
                            </tr>
                            @foreach($vartotojai as $vartotojas)
                                <tr>
                                    <td>{{ $vartotojas->id }}</td>
                                    <td>{{ $vartotojas->name }}</td>
                                    <td>
                                        <a href="/userlist/{{$vartotojas->id}}" class="btn btn-primary">Detaliau</a>
                                        <a href="/siuloma/edit/{{$vartotojas->id}}" class="btn btn-primary">Redaguoti</a>
                                        <a href="/siuloma/delete/{{$vartotojas->id}}" class="btn btn-danger">Šalinti</a>
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
