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
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">
                {{Auth::user()->name}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="ss">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li><a href="/dashboard/store" class="nav-link{{Request::is('dashboard/store*')? ' active' : ''}}">Store</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                          Account
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="/dashboard/change-password">Change password</a>
                          <a class="dropdown-item" href="/dashboard/change-email">Change email</a>
                          <a class="dropdown-item" href="/dashboard/change-contact">Change contact</a>
                          <a class="dropdown-item" href="/dashboard/logout">Log out</a>
                        </div>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content') 
    </main>
    </div>
</body>
</html>