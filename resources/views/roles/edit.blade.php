@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h1>{{ isset($role) ? 'Edit Role' : 'Create Role' }}</h1>
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @if(isset($role))
                        @method('PUT')
                        @endif
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name ?? '' }}">
            </div>
            <div class="form-group">
                <label for="permissions">Permissions</label>
                <select name="permissions[]" class="form-control" multiple>
                    @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}" {{ isset($role) && $role->permissions->contains($permission->id) ? 'selected' : '' }}>
                        {{ $permission->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-dark">{{ isset($role) ? 'Update' : 'Create' }}</button>
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
