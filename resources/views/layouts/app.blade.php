<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Starve Your Garbage</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @yield('top-scripts')

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Starve Your Garbage
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    
                    
                @if (Auth::user() )
                    <li><a href="{{ url('/home') }}">Your Dashboard</a></li>
                     <!-- li class="dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Your Challenges <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="/challenges">Show</a></li>
                              <li><a href="#">that</a></li>
                              <li><a href="{{ url('/challenges/create') }}">Initiate a Challenge!</a></li>
                            </ul>
                        </li -->
                    <li><a href="/challenges">Your Challenges</a></li>
                    <li><a href="{{ url('/waste/record') }}">Record Waste</a></li>
                    <li><a href="{{ url('/waste/') }}">Site-wide Statistics</a></li>

                  {{--  @if (Auth::user()->team_id == 1) --}}
                       
                   {{--  @else --}}
                        
                    {{-- @endif --}}
                @else
                    <li><a href="{{ url('/about') }}">About</a></li>
                @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              <img src="{{ Gravatar::src(Auth::user()->email, 25) }}">  {{ Auth::user()->team_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/user/') }}/{{ Auth::user()->id }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (Session::has('message'))
           <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="/js/dateformat.js"></script>
    <script src="/js/main.js"></script>
    @yield('bottom-scripts')
  <script>
  $(function() {
    
    // df = new dateFormat();
    //$( "#datepicker" ).datepicker();
    if( $('.enddate').val() == ''){
        $('.dateboxes').hide();
    }
    $( ".datepicker, .startdate, .enddate" ).datepicker({dateFormat: 'yy-mm-dd'});
    $('.startdate, .length').change(function(){
        var future = new Date( $('.startdate').val()+ " 01:00:00 EST");
        var enddate=future.setTime(future.getTime() + $('.length').val() * 24 * 60 * 60 * 1000);
        $('.dateboxes').show();
        $('.enddate').val( dateFormat(enddate, "yyyy-mm-dd") );
    });
  });
  </script>
</body>
</html>
