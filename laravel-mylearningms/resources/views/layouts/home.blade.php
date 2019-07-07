<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ 'Courses' }}</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    	<a class="navbar-brand" href="#">Learning MS</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarResponsive">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active">
	            <a class="nav-link" href="#">Home
	              <span class="sr-only">(current)</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">About</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">Services</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">Contact</a>
	          </li>
	        </ul>
	      </div>
		  <div class="col-lg-8 text-right" style="color: white; padding-top: 10px">
      		@if (Auth::check())
      		  <form action="{{ route('logout') }}" method="post">
      		  	{{ csrf_field() }}
      		  	Logged in as {{ Auth::user()->email }}
      		  	<input type="submit" value="Logout" class="btn btn-info">
      		  </form>
      		@else
      		  <form action="{{ route('login') }}" method="post">
      		  	{{ csrf_field() }}
      		  	<input type="email" name="email" placeholder="Email">
      		  	<input type="password" name="password" placeholder="Password">
      		  	<input type="submit" value="Login" class="btn btn-info">
      		  </form>
      		@endif
      	</div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        @yield('sidebar')

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row my-4">

          @yield('main')

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Learning MS 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
