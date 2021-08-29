@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="my-3">
      <div class="d-flex justify-content-between w-100 align-items-center h-100">
        <a href="{{url('/post')}}" class="pb-2 text-dark text-decoration-none">
          <h3>Posts</h3>
        </a>
        <div class="">
          <form type="get" action="{{url('/search')}}">
            <div class="d-flex">
              <div class="">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
              </div>
              <div class="">
                <button class="btn btn-primary" type="submit">Search Posts</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="d-flex justify-content-end w-100">
      <a href="{{url('/add-post')}}" class="btn btn-primary text-white mb-4">Add Post</a>
    </div>
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->price}}</td>
          <td>{{$post->category->name ?? 'No Category' }}</td>
          <td>
            <img src="{{asset('uploads/images/'.$post->image)}}" width="70px" height="50px" alt="">
          </td>
          <td>
            <a href="{{url('/edit-post/'.$post->id)}}">Edit</a>
            <a href="{{url('/delete-post/'.$post->id)}}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center w-100">
      <div class="">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</div>

@endsection