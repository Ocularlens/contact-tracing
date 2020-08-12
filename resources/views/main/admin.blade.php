<!doctype html>
<html lang="en">
  <head>
  	<title>@yield('page title', 'Ocularlens')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
      <!--Side Nav-->
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="/admin" class="logo">Ocularlens</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="{{Request::is('admin')? ' active' : ''}}">
            <a href="/admin"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li class="{{Request::is('admin/users*')? ' active' : ''}}">
              <a href="/admin/users"><span class="fa fa-user mr-3"></span> Users</a>
          </li>
          <li class="{{Request::is('admin/stores*')? ' active' : ''}}">
            <a href="/admin/stores"><span class="fa fa-shopping-cart"></span> Stores</a>
          </li>
          <li class="{{Request::is('admin/account*')? ' active' : ''}}">
            <a href="/admin/account"><span class="fa fa-user-circle-o"></span> Account</a>
          </li>
          <li class="{{Request::is('admin/admins*')? ' active' : ''}}">
            <a href="/admin/admins"><span class="fa fa-user-o"></span> Admins</a>
          </li>
          <li>
            <a href="/admin/logout"><span class="	fa fa-sign-out"></span> Logout</a>
          </li>
        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
          @yield('content') 
      </div>
		</div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>