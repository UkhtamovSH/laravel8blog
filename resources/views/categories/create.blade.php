@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Create Category Page</h1>

    <form method="POST" action="{{url('/add-category')}}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nameCategory" class="form-labrl">Name</label>
        <input type="text" id="nameCategory" class="form-control" name="name">
      </div>

      <button class="btn btn-primary mt-4">Save</button>
    </form>
  </div>
</div>
@endsection