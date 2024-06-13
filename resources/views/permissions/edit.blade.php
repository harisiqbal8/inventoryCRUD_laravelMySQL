@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3>{{ isset($permission) ? 'Edit Permission' : 'Create Permission' }}</h3>
                    <form
                        action="{{ isset($permission) ? route('permissions.update', $permission->id) : route('permissions.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($permission))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $permission->name ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-dark">{{ isset($permission) ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
