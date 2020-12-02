@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detaliau apie temą') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('home') }}">

                        <div class="form-group row align-items-baseline">
                            <label for="pavadinimas" class="col-md-4 col-form-label text-md-right">{{ __('Pavadinimas:') }}</label>
                            <div class="col-md-6">
                                {{$id->pavadinimas}}
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="destytojas" class="col-md-4 col-form-label text-md-right">{{ __('Dėstytojas:') }}</label>
                            <div class="col-md-6">
                                {{ \App\Models\User::find($id->lecturer_id)->name }}
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="aprasas" class="col-md-4 col-form-label text-md-right">{{ __('Aprašas:') }}</label>
                            <div class="col-md-6">
                                {{$id->aprasas}}
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="aprasas" class="col-md-4 col-form-label text-md-right">{{ __('Užimtos / iš viso:') }}</label>
                            <div class="col-md-6">
                                {{$id->pasirinkusieji}} / {{$id->stud_limitas}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Grįžti') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
