<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Baloo</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/homepage.css') }}" rel="stylesheet">


    </head>
    <body id="particles-js">

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))





                <div class="top-right">
                  <nav class="cl-effect-21">

                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                    </nav>
                </div>
            @endif
            <div>
              <div style=" position: relative; margin-left:auto;margin-right:auto; left:2%; top:-100px;">
                <div class="content">
                  <div class="title m-b-md">
                      Balloo
                  </div>
                  <div class="row" style="font-weight: bold;">
                    <hr />
                    <div class="col-md-12" >
                      Blockchain
                    </div>
                    <div class="col-md-12" >
                      <label > <i class="fas fa-plus"> </i></label>
                    </div>
                    <div class="col-md-12" >
                      Smart Contracts
                    </div>
                    <div class="col-md-12" >
                      <i class="fas fa-plus"></i>
                    </div>
                    <div class="col-md-12" >
                      Tenancy Agreements
                    </div>
                    <hr />
                  </div>

                  <div class="links" style="font-weight: bold; color: #1d2021;">
                    <p>Bringing you the future at a click of a button</p>
                  </div>


                  </div>
                </div>
              </div>


        </div>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script>
          particlesJS.load('particlesjs/particles-js', 'particlesjs/particles.json', function(){
            console.log('particles.json loaded...');
          });
        </script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


            <script type="text/javascript" src="{{ asset('particlesjs/particles.js') }}"></script>
            <script type="text/javascript" src="{{ asset('particlesjs/app.js') }}"></script>
            <script type="text/javascript" src="{{ asset('particlesjs/particles.min.js') }}"></script>

            <script>
                particlesJS.load('particles-js', 'particlesjs/particles.json', function () {
                    console.log('callback - particles.js config loaded')
                })
            </script>

            <script>
            window.onload = function() {
              Particles.init({
                selector: '.background'
              });
              };
            </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    </body>
</html>
