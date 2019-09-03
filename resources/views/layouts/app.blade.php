<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
		.fone {
			background-image: url(/images/header.jpg);
			background-size: 100%;
			height: 1000px;
		}
    </style>
</head>
<body>
<!-- HEADER -->
	<header class="header">
		<div class="container-fluid fone">
			<div class="row">
			    <div class="col-sm-3 logo">LOGO</div>
				<nav class="col-sm-7 top-nav">TOP-NAV</nav>
				<div class="col-sm-2 social">SOCIAL</div>
		    </div>
		</div>
	</header>
<!-- MAIN -->
	<main class="main">
		<div class="container-fluid">
		    <div class="row">
				<div class="col-xl-6 order-xl-1 hero">HERO</div>
				<div class="col-xl-3 order-xl-2 action">ACTION</div>
			    <aside class="col-md-9 col-xl-3 order-xl-4 left">LEFT</aside>
		        <div class="col-md-3 order-xl-3 ad">AD</div>
			    <article class="col-xl-6 order-xl-5 article">ARTICLE</article>
				<aside class="col-xl-3 order-xl-6 right">RIGHT</aside>
		    </div>
		</div>
	</main>
<!-- FOOTER -->
	<footer class="footer">
		<div class="container-fluid">
    FOOTER
		</div>
	</footer>  

</body>
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
            {{-- <div class="container"> --}}
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                {{-- </a> --}}
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> --}}
                    {{-- <span class="navbar-toggler-icon"></span> --}}
                {{-- </button> --}}
{{--  --}}
                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    {{-- <!-- Left Side Of Navbar --> --}}
                    {{-- <ul class="navbar-nav mr-auto"> --}}
{{--  --}}
                    {{-- </ul> --}}
{{--  --}}
                    {{-- <!-- Right Side Of Navbar --> --}}
                    {{-- <ul class="navbar-nav ml-auto"> --}}
                        {{-- <!-- Authentication Links --> --}}
                        {{-- @guest --}}
                            {{-- <li class="nav-item"> --}}
                                {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                            {{-- </li> --}}
                            {{-- @if (Route::has('register')) --}}
                                {{-- <li class="nav-item"> --}}
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                {{-- </li> --}}
                            {{-- @endif --}}
                        {{-- @else --}}
                            {{-- <li class="nav-item dropdown"> --}}
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
                                    {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                {{-- </a> --}}
{{--  --}}
                                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                    {{-- <a class="dropdown-item" href="{{ route('logout') }}" --}}
                                       {{-- onclick="event.preventDefault(); --}}
                                                     {{-- document.getElementById('logout-form').submit();"> --}}
                                        {{-- {{ __('Logout') }} --}}
                                    {{-- </a> --}}
{{--  --}}
                                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> --}}
                                        {{-- @csrf --}}
                                    {{-- </form> --}}
                                {{-- </div> --}}
                            {{-- </li> --}}
                        {{-- @endguest --}}
                    {{-- </ul> --}}
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </nav> --}}
{{--  --}}
        {{-- <main class="py-4"> --}}
            {{-- @yield('content') --}}
        {{-- </main> --}}
    {{-- </div> --}}
{{-- </body> --}}
</html>
