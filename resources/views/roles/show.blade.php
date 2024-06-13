@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-4">
                <div class="card p-4">
                    <p>Name: <b>{{ $role->name }}</b></p>
                    <p>Permissions: <b>{{ $role->permissions->pluck('name')->implode(', ') }}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
