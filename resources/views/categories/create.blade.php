@extends('layouts.app')

@section('main')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card mt-3 p-3">
          <form action="/categories/store" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />
              @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" id="" rows="4">{{ old('description') }}</textarea>
              @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection