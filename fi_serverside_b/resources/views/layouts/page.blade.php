<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Guests for Restaurant Service</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/restaurantapp.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.3.7.0.js') }}"></script>
    <script src="{{ asset('js/respond.min.1.3.0.js') }}"></script>
    <![endif]-->
</head>
<body>
<a class="sr-only sr-only-focusable" href="#content" tabindex="1"><div class="container"><span class="skiplink-text">Skip to main content</span></div></a>

<div class="navbar navbar-worldskills navbar-static-top">
    <div class="cube-container">
        <div class="cube-right-bottom-blue">&nbsp;</div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url() }}">Reservations</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url() }}">Information</a></li>
                <li><a href="{{ url('reservation/information') }}">Booking</a></li>
                <li><a href="{{ url('management/ReservationManagement.php') }}">Management</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- use the following link for login and logoff -->
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{ url() }}">Home</a></li>
        @yield('breadcrumb')
    </ol>

    <div id="content">
        @foreach ($errors->all() as $messages)
            <div class="messages error">{{ $messages }}</div>
        @endforeach

        @yield('content')

    </div>

    <footer>
        <hr class="hr-extended" />
        <p>© 2015 WorldSkills</p>
    </footer>

</div>

<!-- Bootstrap core JS -->
<script src="../dist/js/jquery.min.1.11.1.js"></script>
<script src="../dist/js/bootstrap.min.js"></script>
<script src="restaurantapp.js"></script>
</body>
</html>
