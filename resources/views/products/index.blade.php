@extends('layouts.app')

@section('main')

<div class="container">
    <div class="text-right">
        <a href="products/create" class="btn btn-dark my-3">New Product</a>
    </div>

    <table class="table table-hover">
        <thead>
          <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <a href="{{ route('product.show', $product->id)}}" class="text-dark">
                    {{ $product->name }}
                  </a>
                  </td>
                  <td>
                    {{ $product->category->name ?? '' }}
                  </td>
                <td>
                    <img src="products/{{ $product->image }}" class="rounded-circle" width="30" height="30" alt={{ $product->image }}>
                </td>
                <td>
                  <a 
                    href="{{ route('product.edit', $product->id)}}" 
                    class="btn btn-dark btn-sm"
                  >
                    Edit
                  </a>
                  <form action="{{ route('product.destroy', $product->id) }}" class="d-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>

                </td>
            </tr>                
            @endforeach
        </tbody>
      </table>

      {{ $products->links() }}

</div>

@endsection
