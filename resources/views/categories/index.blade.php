@extends('layouts.app')

@section('main')

<div class="container">
    <div class="text-right">
        <a href="categories/create" class="btn btn-dark my-3">New Category</a>
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <a href="{{ route('category.show', $category->id)}}" class="text-dark">
                    {{ $category->name }}
                  </a>
                  </td>
                <td>
                  <a 
                    href="{{ route('category.edit', $category->id)}}" 
                    class="btn btn-dark btn-sm"
                  >
                    Edit
                  </a>
                  <form action="{{ route('category.destroy', $category->id) }}" class="d-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>

                </td>
            </tr>                
            @endforeach
        </tbody>
      </table>

      {{ $categories->links() }}

@endsection