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
		body {
			background-image: url(/images/header.jpg);
			color: white;
		}
		.nav a {
			color: white;
		}
		footer {
			position: fixed; /* Фиксированное положение */
			bottom: 0; /* Прижимаем к низу экрана */
		}
    </style>

</head>
<body>
<!-- HEADER -->
	<header class="header">
		<div class="container-fluid">
			<div class="row">
			    <div class="col-sm-2">
					<img src="{{ asset('/images/logo.png') }} " style="height: 100px">
				</div>
				<nav class="col-sm-7">
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
				</nav>
				<div class="col-sm-3">auth</div>
		    </div>
		</div>
	</header>
<!-- MAIN -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<aside class="col-sm-2">
					@include('layouts.aside_left')
				</aside>
				<article class="col-sm-8">
					@yield('content')
				</article>
				<aside class="col-sm-2">
					@include('layouts.aside_right')
				</aside>
			</div>
		</div>
	</main>
<!-- FOOTER -->
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
    FOOTER
			</div>
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
