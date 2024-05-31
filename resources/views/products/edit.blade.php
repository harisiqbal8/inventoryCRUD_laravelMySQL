@extends('layouts.app')

@section('main')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card mt-3 p-3">
          <h3>Product Edit: {{ $product->name }}</h3>
          <form action="{{ route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" />
              @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" id="" rows="4">{{ old('description', $product->description) }}</textarea>
              @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="">Category</label>
              <br />
              <select name="category_id" id="category">
                <option disabled>Choose a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" class="form-control" />
              @if ($errors->has('image'))
                  <span class="text-danger">{{ $errors->first('image') }}</span>
              @endif
            </div>

            <button type="submit" class="btn btn-dark">Update</button>
            
          </form>
        </div>
      </div>
    </div>
</div>

@endsection
