@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('register.user_cart') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b>{{ __('register.name') }}:</b> <p>{{ $user->name }}</p>
                    <b>{{ __('register.email') }}</b> <p>{{ $user->email }}</p>
                    <b>{{ __('register.territory') }}</b> <p>{{ $territory->ter_address }}</p>

                    <a href="{{ route('register') }}" class="btn btn-success" role="button">
                        {{ __('register.register_new_user') }}
                    </a>
                    <a href="{{ route('users') }}" class="btn btn-info" role="button">
                        {{ __('register.all_users_list') }}
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
