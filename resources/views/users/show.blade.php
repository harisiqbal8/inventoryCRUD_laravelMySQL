@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-4">
                <div class="card p-4">
                    <p>Name: <b>{{ $user->name }}</b></p>
                    <p>Email: <b>{{ $user->email }}</b></p>
                    <p>Roles: <b>{{ $user->getRoleNames()->implode(', ') }}</b></p>
                    <p>Permissions: <b>{{ $user->getPermissionNames()->implode(', ') }}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
