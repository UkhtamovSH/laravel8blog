@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Edit Post Page</h1>

    <form method="POST" action="{{url('/edit-post/'.$post->id)}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="titleProduct" class="form-labrl">Title</label>
        <input type="text" id="titleProduct" class="form-control" value="{{old('title') ?? $post->title}}" name="title">
      </div>
      <div class="form-group">
        <label for="titlePrice" class="form-labrl">Price</label>
        <input type="number" id="titlePrice" class="form-control" value="{{old('price') ?? $post->price}}" name="price">
      </div>
      <div class="form-group">
        <label for="selectCategory" class="form-labrl">Select Category</label>
        <select name="category_id" class="form-control" id="selectCategory">
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>

        <label for="titleImage" class="form-labrl my-3">Select Image</label>
        <input type="file" id="titleIMage" class="form-control" name="image">
        <img src="{{asset('uploads/images/'.$post->image)}}" width="70px" height="50px" alt="">

        <button class="btn btn-primary mt-4">Edit</button>
      </div>
    </form>
  </div>
</div>
@endsection