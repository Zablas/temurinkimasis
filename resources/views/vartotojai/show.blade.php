@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detaliau apie temą') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('userList') }}">

                        <div class="form-group row align-items-baseline">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID:') }}</label>
                            <div class="col-md-6">
                                {{ $id->id }}
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vardas:') }}</label>
                            <div class="col-md-6">
                                {{ $id->name }}
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="aprasas" class="col-md-4 col-form-label text-md-right">{{ __('El. paštas:') }}</label>
                            <div class="col-md-6">
                                {{ $id->email }}
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rolė:') }}</label>
                            <div class="col-md-6">
                                @if($id->isAdmin())
                                    Administratorius
                                @elseif($id->isLecturer())
                                    Dėstytojas
                                @else
                                    Studentas
                                @endif
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="tema" class="col-md-4 col-form-label text-md-right">{{ __('Pasirinkta tema:') }}</label>
                            <div class="col-md-6">
                                @if($id->pasirinkta_tema)
                                    {{ \App\Models\Tema::find($id->pasirinkta_tema)->pavadinimas }}
                                @else
                                    Jokia tema nepasirinkta
                                @endif
                            </div>
                        </div>

                        <div class="form-group row align-items-baseline">
                            <label for="pasirinkta" class="col-md-4 col-form-label text-md-right">{{ __('Ar patvirtinta:') }}</label>
                            <div class="col-md-6">
                                @if($id->ar_patvirtinta_tema)
                                    Taip
                                @else
                                    Ne
                                @endif
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
