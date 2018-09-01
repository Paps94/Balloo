<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Balloo') }}</title>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--  Web3.js file to be able to communicate with the testnet and smart contract-->
    <script type="text/javascript" src="{{ asset('js/web3.min.js') }}"></script>
    <!--  FontAwesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Datepicker -->
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Balloo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-registered"></i> Register</a></li>
                        @else

                          <li><a class="nav-link" href="{{ route('properties.index') }}"><i class="fas fa-home"></i> My Properties</a></li>
                          <li><a class="nav-link" href="{{ route('contracts.index') }}"><i class="fas fa-file-alt"></i> My Contracts</a></li>

                          <li class="nav-item dropdown" style="position:relative; padding-left: 50px;">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="/image/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:3px; left:11px; border-radius:50%"></i> My Account<span class="caret"></span>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" <a href="{{ url('home') }}"><i class="fa fa-home"></i> Dashboard</a>
                                <a class="dropdown-item" <a href="{{ route('users.index') }}"><i class="fas fa-user-circle"></i> My Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>  Logout </a>


                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
          @include('layouts.partials._alert')
        </div>


        <!-- This is where all our HTML pages are located inside the Laravel Layout -->
        @yield('content')

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/numberOnly.js') }}"></script>
</body>
</html>
