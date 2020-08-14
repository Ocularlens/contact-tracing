<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('page title', 'Ocularlens')</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid" style="margin-top: 10px">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admin Login</h4>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <strong>Success!</strong> Account Created
                                </div>  
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> Account Does Not Exist
                                </div>  
                            @endif
                            <form action="/admin/login" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Username:</span>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password:</span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <input type="checkbox" name="remember" id=""> <label for="">Remember me</label>
                                <div class="row" style="text-align: right;">
                                    <div class="col">
                                        <a href="#" class="btn btn-info btn-sm">Register</a>
                                        <input type="submit" value="Login" class="btn btn-success btn-sm">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>