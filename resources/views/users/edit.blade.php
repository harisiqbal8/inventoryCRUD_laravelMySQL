@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3>{{ isset($user) ? 'Edit User' : 'Create User' }}</h3>

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="password">User Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ isset($user) && $user->roles->contains($role->id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <select name="permissions[]" class="form-control" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}"
                                        {{ isset($user) && $user->permissions->contains($permission->id) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark">{{ isset($user) ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
