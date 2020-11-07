@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <span class="align-items-center card-header d-flex justify-content-between">
                    {{ __('Temų sąrašas') }}
                    <a href="/tema/create" class="btn btn-primary float-right">Pridėti</a>
                </span>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="col-md-12" border="1">
                    <th style="width: 34%">Labas</th>
                    <th style="width: 33%">As</th>
                    <th style="width: 33%">krabas</th>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
