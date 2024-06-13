@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="text-right">
            <a href="{{ route('permissions.create') }}" class="btn btn-dark my-3">Create Permission</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="text-dark">
                                {{ $permission->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
