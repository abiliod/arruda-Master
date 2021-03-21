<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
<meta property="og:title" content="Arruda Calçados" />
<meta property="og:type" content="Fabrica e Vendas de calçados" />
<meta property=”og:description” content=”Fabricante"/>
<meta property="og:url" content="http://www.arrudacalcados.com.br" />
<meta property="og:image" content="{{asset('img/institucional/logo.png')}}" />
<meta property="og:site_name" content="Arruda Calçados" />
<meta property="fb:admins" content="100001090152041" />
<meta name="author" content="Abilio Dias Ferreira, Yuri Dumont"/>
<meta name=”creator” content="Abilio Dias Ferreira, Yuri Dumont"/>
<meta http-equiv="content-language" content="pt-br">
<meta name="reply-to" content="abiliobonito@hotmail.com , yuri....">
<meta name="robots" content="index,nofollow">
<meta name="keywords" content="">
<meta name="keywords" content="rasteirinhas, escarpan" />
<meta name="description" content="fabrica de calçados, venda de calçados, locação de calçados, tendencia de moda em calçados feminino, calçados feminino" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>{{ config('app.name', 'Arruda Calçados') }}</title>
</head>
<body" >
<header >
    @auth
        @include('layouts._Admin._nav')
    @else
        <nav>
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <div class="container">
                    <a href="{{ route('index') }}" class="brand-logo center">Arruda Calçados</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                                <li><a href="{{ route('site.contato') }}">Contato</a>


                            @else
                                @if (Route::has('register'))
                                    <li><a href="{{ url('/') }}">Site</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                                    <li><a href="{{ route('site.contato') }}">Contato</a>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif


</header>

<main>
    @if(Session::has('mensagem'))
        <div class="container">
            <div class="row">
                <div class="card {{ Session::get('mensagem')['class'] }}">
                    <div align="center" class="card-content">
                        {{ Session::get('mensagem')['msg'] }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @yield('content')
</main>

@include('layouts._Admin._footer')

<!--Import jQuery.js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="{{asset('js/init.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
