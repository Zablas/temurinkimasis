@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Redaguoti temą') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('siuloma/update', $id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="pavadinimas" class="col-md-4 col-form-label text-md-right">{{ __('Pavadinimas') }}</label>

                            <div class="col-md-6">
                                <input id="pavadinimas"
                                       type="text"
                                       class="form-control @error('pavadinimas') is-invalid @enderror"
                                       name="pavadinimas"
                                       value="{{ $id->pavadinimas }}"
                                       required
                                       autocomplete="pavadinimas"
                                       autofocus>

                                @error('pavadinimas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aprasas" class="col-md-4 col-form-label text-md-right">{{ __('Aprašas') }}</label>

                            <div class="col-md-6">
                                <textarea id="aprasas" type="text"
                                          class="form-control @error('aprasas') is-invalid @enderror"
                                          style="overflow: auto; resize: none"
                                          name="aprasas"
                                          required autocomplete="aprasas"
                                          rows="10"
                                          autofocus>{{ $id->aprasas }}</textarea>
                                @error('aprasas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
