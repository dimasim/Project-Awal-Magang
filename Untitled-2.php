<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('globalassets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>
<body>
        <!-- Main navbar -->
        <div class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
            </a>

            <div class="d-md-none">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbar-mobile"
                >
                    <i class="icon-tree5"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-mobile">
                <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

                <ul class="navbar-nav">
					@guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
					@else
						<li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                        </li>
						<li class="nav-item dropdown dropdown-user">
							<a
								href="#"
								class="navbar-nav-link d-flex align-items-center dropdown-toggle"
								data-toggle="dropdown"
							>
								<img
									src="../../../../global_assets/images/placeholders/placeholder.jpg"
									class="rounded-circle mr-2"
									height="34"
									alt=""
								/>
								<span>{{ Auth::user()->name }}</span>
							</a>


   
    <!-- 1. SCRIPT BAWAAN LARAVEL (SUDAH TERMASUK JQUERY & BOOTSTRAP JS) -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- 2. SCRIPT DATATABLES (DIMUAT SETELAH JQUERY DARI APP.JS SIAP) -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- 3. SCRIPT CUSTOM DARI HALAMAN LAIN (PALING AKHIR) -->
    @stack('scripts')

</body>
</html>