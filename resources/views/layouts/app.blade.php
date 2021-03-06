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
    <script src="{{ asset('js/myJs.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@if (\Request::route()->named('home'))
		<link href="{{ asset('css/myStylesForHome.css') }}" rel="stylesheet">
	@elseif (\Request::route()->named('main'))
		<link href="{{ asset('css/myStylesForMain.css') }}" rel="stylesheet">
	@endif

</head>
<body data-curr-url="{{ session('currUrl') ?? null }}" data-unverified-redirect="{{ session('unverifiedRedirect') ?? null }}" data-resent-redirect="{{ session('resent') ?? null }}" data-route-login="{{ route("login") }}" data-route-register="{{ route("register") }}">

	@include('auth.modal_login')
	@include('auth.modal_register')
	@include('auth.modal_verify')

<!-- HEADER -->
	<header class="header">

		<div class="container-fluid">
			<div class="row">
			    <div class="col-sm-1">
					<a href="{{ route('main') }}"><img src="{{ asset('/images/logo.png') }} " style="width: 100%"></a>
				</div>
				<nav class="col-sm-8">
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link" href="#">@lang('About the site')</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">@lang('How it works')</a>
						</li>
						<li class="nav-item">
						    <a class="nav-link" href="#">@lang('Reviews')</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('home') }}">@lang('Personal area')</a>
						</li>
					</ul>
				</nav>
				<nav class="col-sm-3">
					<ul class="nav justify-content-center">
						@guest
							<li class="nav-item">
								<a id="n-modal-login" class="nav-link" data-toggle="modal" href="#modal-login">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a id="n-modal-register" class="nav-link" data-toggle="modal" href="#modal-register">{{ __('Register') }}</a>
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

</body>
</html>
