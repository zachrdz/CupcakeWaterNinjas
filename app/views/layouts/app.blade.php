<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">


<head>
<!--style sheets-->
<!-- Bootstrap Core CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@yield('head')

</head>

<body>

  <nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">RecipeBois</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        @if(Auth::check())
        <li><a href="/view/myrecipes">My Recipes</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(!Auth::check())
        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @endif
        @if(Auth::check())
        <li><a href="/useraccount"><span class="glyphicon glyphicon-user"></span> Account</a></li>
        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
    @yield('content')
    <!-- /.container -->

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>

            <div class="row">
                <div class="col-lg-12">
                    <p style="color:#ffff;" align="center">RecipeBois Inc &copy;  2016</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

</body>
</html>
