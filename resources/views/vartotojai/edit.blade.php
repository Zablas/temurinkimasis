@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Redaguoti vartotoją') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userlist/update', $id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="vardas" class="col-md-4 col-form-label text-md-right">{{ __('Vardas') }}</label>

                            <div class="col-md-6">
                                <input id="vardas"
                                       type="text"
                                       class="form-control @error('vardas') is-invalid @enderror"
                                       name="vardas"
                                       value="{{ $id->name }}"
                                       required
                                       autocomplete="pavadinimas"
                                       autofocus>

                                @error('vardas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Studentų limitas') }}</label>

                            <div class="col-md-6">
                                <select name="role" id="role">
                                    @if($id->isAdmin())
                                        <option value="admin" selected="selected">Administratorius</option>
                                    @else
                                        <option value="admin">Administratorius</option>
                                    @endif
                                    @if($id->isLecturer())
                                        <option value="lecturer" selected="selected">Dėstytojas</option>
                                    @else
                                        <option value="lecturer">Dėstytojas</option>
                                    @endif
                                    @if($id->isStudent())
                                        <option value="student" selected="selected">Studentas</option>
                                    @else
                                        <option value="student">Studentas</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atnaujinti') }}
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
