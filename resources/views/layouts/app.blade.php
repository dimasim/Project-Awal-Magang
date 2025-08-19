<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"
                            >{{ __('Login') }}</a
                        >
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"
                            >{{ __('Register') }}</a
                        >
                    </li>
                    @endif 
                    @else
                    <li class="nav-item">
                        <a
                            class="navbar-nav-link d-flex align-items-center"
                            href="{{ route('categories.index') }}"
                            >Categories</a
                        >
                    </li>
                    <li class="nav-item ">
                        <a class="navbar-nav-link d-flex align-items-center " href="{{ route('products.index') }}"
                            >Products</a
                        >
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

                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <a href="#" class="dropdown-item"
                                ><i class="icon-user-plus"></i> My profile</a
                            >
                            <a href="#" class="dropdown-item"
                                ><i class="icon-coins"></i> My balance</a
                            >
                            <a href="#" class="dropdown-item"
                                ><i class="icon-comment-discussion"></i>
                                Messages
                                <span class="badge badge-pill bg-blue ml-auto"
                                    >58</span
                                ></a
                            >
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="icon-cog5"></i> Account settings
                            </a> -->
                            <a  class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >
                                <i class="icon-cog5"></i>{{ __('Logout') }}
                            </a>

                            <form
                                id="logout-form"
                        
                                action="{{ route('logout') }}"
                                method="POST"
                                style="display: none "
                            >
                                @csrf
                            </form>
                            
                        </div>
                    </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

   
    <!-- 1. SCRIPT BAWAAN LARAVEL (SUDAH TERMASUK JQUERY & BOOTSTRAP JS) -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- 2. SCRIPT DATATABLES (DIMUAT SETELAH JQUERY DARI APP.JS SIAP) -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- 3. SCRIPT CUSTOM DARI HALAMAN LAIN (PALING AKHIR) -->
    @stack('scripts')

</body>
</html>