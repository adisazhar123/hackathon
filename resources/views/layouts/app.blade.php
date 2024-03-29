<html>
    <head>
        <title>Patungan Kuy</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Livvic&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/bootstrap.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/themes/bootstrap.rtl.min.css"/>
       <style>
            .navbar {
                margin-bottom: 20px;
            }
            * {
                font-family: 'Livvic', sans-serif;
            }
        </style>
        @yield('css')

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">

                <a class="navbar-brand" href="/">{{empty($title) ? 'Patungan Kuy' : $title}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @php
                            $isCurrentPathIsLogin = Request::is('login');
                            $isCurrentPathIsRegister = Request::is('register');
                            $isCurrentPathIsHome = Request::is('/');
                        @endphp
                        <li class="nav-item {{$isCurrentPathIsHome ? 'active' : ''}}">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @if (!Auth::check())
                        <li class="nav-item {{$isCurrentPathIsLogin ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>                            
                        </li>
                        <li class="nav-item {{$isCurrentPathIsRegister ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>                            
                        </li>
                        @endif
                        <li class="nav-item active">
                            <a class="nav-link" href="/campaign/donation/create">Buat Donasi <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/campaign/wishlist/create">Buat Wishlist <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                       
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown ml-auto">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">Profil Ku</a>
                                @if (Auth::check())
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        @yield('body')


        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.5.0/alertify.js" integrity="sha256-sYWcd3DUTwi95ed6dby2m5aBnOhO+tgc1jr4Gl5n5Zg=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() { $('body').bootstrapMaterialDesign();
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>

        @yield('script')
    </body>

</html>
