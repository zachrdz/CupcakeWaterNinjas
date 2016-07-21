<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">


<head>
<!--style sheets-->
<!-- Bootstrap Core CSS -->
<link href="{{ url('/vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
@yield('head')

</head>

<body>
<!-- Page Content -->
    @yield('content')
    <!-- /.container -->

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="color:#fff;">RecipeBois Inc &copy;  2016</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

</body>
</html>
