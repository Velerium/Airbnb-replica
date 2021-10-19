<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BoolBnb</title>
  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Braintree --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.js"></script>
    
    {{-- TomTom --}}
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps-web.min.js'></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js"></script>
    
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="path/to/chartjs/dist/chart.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps.css'/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"> 
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>
<body>
    <div id="app">

        {{-- NAVBAR --}}

        <nav class="navbar-expand-md shadow-sm">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{--LOGO  --}}
                <div class="img-container">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('image/logo.png')}}" alt="Boolbnb Logo">
                    </a>
                </div>

                <div class="center-navbar d-flex">
                    @if (Request::route()->getName() !== 'homepage')
                        <div class="nav-item"><a href="{{ route('homepage') }}">Home</a></div>

                        <div class="nav-item">|</div>
                    @endif

                    @guest

                    @else
                        @if ((Request::route()->getName() !== 'dashboard') && (Request::route()->getName() !== 'userApartments.index') && (Request::route()->getName() !== 'userApartments.show') && (Request::route()->getName() !== 'userApartments.create') && (Request::route()->getName() !== 'userApartments.edit'))
                            <div class="nav-item"><a href="{{ route('dashboard') }}">Area personale</a></div>

                            <div class="nav-item">|</div>
                        @endif
                    @endguest

                    <div class="nav-item"><a href="{{ route('searchApartments.index') }}">Alloggio</a></div>

                    <div class="nav-item">|</div>

                    <div class="nav-item"><a href="#">Esperienze</a></div>

                    <div class="nav-item">|</div>

                    <div class="nav-item"><a href="#">Diventa un host</a></div>
                </div>


                <div class="d-flex">
                    <!-- Authentication Links -->
                    @guest
                        <div class="nav-item">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>

                        @if (Route::has('register'))
                            <div class="nav-item">|</div>

                            <div class="nav-item">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        @endif
                    @else
                    
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        {{-- MAIN --}}
        <main>
            @yield('content')
        </main>

        {{-- FOOTER --}}
        @include('layouts.footer')

    </div>
</body>
</html>
