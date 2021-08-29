<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<style>
  .navbar-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 100%;
    padding: 20px 5px;
    background-color: grey;
    color: #fff;
  }

  .navbar-sub-flex {
    display: flex;
    align-items: center;
    height: 100%;
  }

  .navbar-sub-flex a {
    color: #fff;
  }

  .navbar-sub-flex a:hover {
    color: #000;
  }

  .navbar-sub-flex2 {
    display: flex;
    align-items: center;
    height: 100%;
  }
</style>

<body>
  <div class="navbar-flex">
    <div class="">
      <div class="navbar-sub-flex">
        <a class="nav-link" href="{{url('/')}}">Home</a>
        <a class="nav-link" href="{{url('/post')}}">Post</a>
        <a class="nav-link" href="{{url('/category')}}">Category</a>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    @yield('content')
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</html>