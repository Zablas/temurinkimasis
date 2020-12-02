@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ar tikrai norite pašalinti šį vartotoją?') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userlist/cdelete', $id) }}">
                        @csrf
                        @method('DELETE')

                        <div class="form-group row align-items-baseline">
                            <label for="vardas" class="col-md-4 col-form-label text-md-right">{{ __('Vardas:') }}</label>
                            <div class="col-md-6">
                                {{ $id->name }}
                            </div>
                        </div>

                        <div class="form-group row mb-0 align-items-baseline">
                            <div class="col-md-6 offset-md-4">
                                <button name="yes" type="submit" class="btn btn-primary" value="true">
                                    {{ __('Taip') }}
                                </button>
                                <button name="no" type="submit" class="btn btn-primary" value="false">
                                    {{ __('Ne') }}
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
