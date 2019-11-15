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
		.dropdown-menu {
			background-color: transparent !important;
		}
		.dropdown-item:active {
			background-color: transparent !important;
		}
		.dropdown-item:hover {
			background-color: transparent !important;
		}
		.modal-windows {
			background-color: black;
		}
		{{-- footer { --}}
			{{-- position: fixed; /* Фиксированное положение */ --}}
			{{-- bottom: 0; /* Прижимаем к низу экрана */ --}}
		{{-- } --}}
    </style>

</head>
<body>
<!-- HEADER -->
	<header class="header">
		<div class="container-fluid">
			<div class="row">
			    <div class="col-sm-1">
					<img src="{{ asset('/images/logo.png') }} " style="width: 100%">
				</div>
				<nav class="col-sm-8">
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link" href="#">О сайте</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Как это работает</a>
						</li>
						<li class="nav-item">
						    <a class="nav-link" href="#">Отзывы</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('home') }}">Личный кабинет</a>
						</li>
					</ul>
				</nav>
				<nav class="col-sm-3">
					<ul class="nav justify-content-center">
						@guest
							<li class="nav-item">
								<a class="nav-link" data-toggle="modal" href="#modal-login">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</nav>
		    </div>
		</div>
	</header>
<!-- MAIN -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<aside class="col-sm-2">
					@if (\Request::route()->named('home'))
						@include('layouts.aside_left_home')
					@else
						@include('layouts.aside_left')
					@endif
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
	<footer class="footer fixed-bottom">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">

    FOOTER
				</div>
				<div class="col-sm-4">
    FOOTER
				</div>
				<div class="col-sm-4">

    FOOTER
				</div>
			</div>
		</div>
	</footer>  

	@include('auth.modal_login')
	@include('auth.modal_register')
	@include('auth.modal_verify')

</body>
</html>
