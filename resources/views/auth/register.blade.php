@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('register.register') }}</div>

                <div class="card-body">

                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('register.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('register.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>


                        <div class="form-group row" id="_regions">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('register.region') }}</label>

                            <div class="col-md-6">

                                <select data-placeholder="{{ __('register.choose') }}..." class="chosen-select-region">
                                    <option></option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->getKey() }}">{{ $region->ter_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row" id="_districts" style="display: none">
                            <label for="_districts" class="col-md-4 col-form-label text-md-right">{{ __('register.district') }}</label>

                            <div class="col-md-6">

                                <select data-placeholder="{{ __('register.choose') }}..." data-url="{{ route('ajax.territory.districts') }}" class="chosen-select-district">
                                    <option></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="_cities" style="display: none">
                            <label for="_cities" class="col-md-4 col-form-label text-md-right">{{ __('register.city') }}</label>

                            <div class="col-md-6">

                                <select name="territory" data-placeholder="{{ __('register.choose') }}..." data-url="{{ route('ajax.territory.cities') }}" class="chosen-select-city">
                                    <option></option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('register.register') }}
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
