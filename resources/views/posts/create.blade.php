@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Create Post Page</h1>

    <form action="{{url('/add-post')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="titleProduct" class="form-labrl">Title</label>
        <input type="text" id="titleProduct" class="form-control" name="title">
      </div>
      <div class="form-group">
        <label for="titlePrice" class="form-labrl">Price</label>
        <input type="number" id="titlePrice" class="form-control" name="price">
      </div>
      <div class="form-group">
        <label for="selectCategory" class="form-labrl">Select Category</label>
        <select name="category_id" class="form-control" id="selectCategory">
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>


        <label for="titleImage" class="form-labrl my-3">Select Image</label>
        <input type="file" id="titleIMage" class="form-control" name="image">

        <button type="submit" class="btn btn-primary mt-4">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection