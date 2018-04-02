@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('register.all_users_list') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td><b>{{ __('register.name') }}</b></td>
                            <td><b>{{ __('register.email') }}</b></td>
                            <td><b>{{ __('register.territory') }}</b></td>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users', $user->email) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRelations()['territory']->ter_address }}</td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
