@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <a href="{{url('/category')}}" class="pb-2 text-dark text-decoration-none">
      <h3>Categories</h3>
    </a>
    <div class="d-flex justify-content-end w-100">
      <a href="{{url('/add-category')}}" class="btn btn-primary text-white mb-4">Add Category</a>
    </div>
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Date of create</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <th scope="row">{{$category->id}}</th>
          <td>{{$category->name}}</td>
          <td>{{$category->created_at}}</td>
          <td>
            <a href="{{url('/edit-category/'.$category->id)}}">Edit</a>
            <a href="{{url('/delete-category/'.$category->id)}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection