@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <span class="align-items-center card-header d-flex justify-content-between">
                    {{ __('Studentų sąrašas') }}
                </span>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="col-md-12" border="1">
                    <tr>
                        <th style="width: 33%">Vardas</th>
                        <th style="width: 33%">Tema</th>
                        <th style="width: 33%">Veiksmai</th>
                    </tr>
                    @foreach($studentai as $studentas)
                        <tr>
                            <td>{{ $studentas->name }}</td>
                            <td>{{ \App\Models\Tema::find($studentas->pasirinkta_tema)->pavadinimas }}</td>
                            <td>
                                <a href="/tema/pending/accept/{{ $studentas->id }}" class="btn btn-success">Patvirtinti</a>
                                <a href="/tema/pending/deny/{{ $studentas->id }}" class="btn btn-danger">Atmesti</a>
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
