@extends('layouts.master')
@section('content')
<div class="">
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-12 my-4">
          <img src="{{asset('uploads/images/'.$postDetail->image)}}" class="w-100 img-fluid" style="height: 400px; object-fit: cover;" alt="">
          <div class="" style="padding: 15px;">
            <p class="text-center">Title: {{$postDetail->title}}</p>
            <p>Price: {{$postDetail->price}}</p>
            <p>By Category: {{$postDetail->category->name ?? 'No Category' }}</p>
            <p>Created_at: {{$postDetail->created_at}}</p>
          </div>
        </div>

        <div class="col-md-12 my-4">
          <h3 class="border-bottom pb-2">Related Posts</h3>
          <div class="row">
            @if($related->count() > 0)
            @foreach($related as $relate)
            <div class="col-md-4 my-4">
              <div class="card shadow">
                <a href="{{url('/detail',['post'=>$relate->id])}}" class="text-dark text-decoration-none">
                  <img src="{{asset('uploads/images/'.$relate->image)}}" class="w-100 img-fluid" style="height: 200px; object-fit: cover;" alt="">
                  <div class="" style="padding: 15px;">
                    <p class="text-center">Title: {{$relate->title}}</p>
                    <p>Price: {{$relate->price}}</p>
                    <p>By Category: {{$relate->category->name ?? 'No Category' }}</p>
                  </div>
                </a>
              </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12 my-4">
              <div class="d-flex justify-content-center mt-4">
                <div class="">
                  <p>No Related Products For this Product</p>
                </div>
              </div>
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2">
      <div class="">
        <h3 class="border-bottom pb-2">Categories</h3>
        @php
        $categories = \App\Models\Category::orderBy('created_at', 'DESC')->get();
        @endphp

        @foreach($categories as $category)
        <div class="d-flex justify-content-end w-100">
          <a href="{{url( '/category',['post'=>$category->id])}}" class="">{{$category->name}}</a>
        </div>
        @endforeach
      </div>
      <div class="mt-5">
        <h3 class="border-bottom pb-2">Latest Posts</h3>
        @php
        $lposts = \App\Models\Post::orderBy('created_at', 'DESC')->get()->take(3);
        @endphp

        @foreach($lposts as $lpost)
        <div class="">
          <a href="{{url('/detail',['product'=>$lpost->id])}}" class="text-dark text-decoration-none">
            <img src="{{asset('uploads/images/'.$lpost->image)}}" class="w-100 img-fluid" style="height: 100px; object-fit: cover;" alt="">
            <p>{{$lpost->title}}</p>
            <p>{{$lpost->created_at}}</p>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection