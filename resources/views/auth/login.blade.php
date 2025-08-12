@extends('layouts.app')

@section('content')
    <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div
                    class="content d-flex justify-content-center align-items-center"
                >
                    <!-- Login form -->
                    <form
                        class="login-form"
                        method="POST"
                        action="{{ route('login') }}"
                    >
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i
                                        class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"
                                    ></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted"
                                        >Your credentials</span
                                    >
                                </div>

                                <div
                                    class="form-group form-group-feedback form-group-feedback-left"
                                >
                                    <input
                                        placeholder="Username"
                                        id="email"
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div
                                    class="form-group form-group-feedback form-group-feedback-left"
                                >
                                    <input
                                        placeholder="Password"
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                    />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div
                                    class="form-group d-flex align-items-center"
                                >
                                    <div class="form-check mb-0">
                                        <label class="form-check-label">
                                            <input type="checkbox"
                                            name="remember"
                                            class="form-input-styled" checked
                                            data-fouc id="remember" {{
                                            old('remember') ? 'checked' : '' }}
                                            /> {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <a
                                        class="ml-auto"
                                        href="{{ route('password.request') }}"
                                    >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-block"
                                    >
                                        {{ __('Login') }}
                                        <i class="icon-circle-right2 ml-2"></i>
                                    </button>
                                </div>

                                <div
                                    class="form-group text-center text-muted content-divider"
                                >
                                    <span class="px-2"
                                        >Don't have an account?</span
                                    >
                                </div>
                                @if (Route::has('register'))
                                <div class="form-group">
                                    <a
                                        href="{{ route('register') }}"
                                        class="btn btn-light btn-block"
                                        >{{ __('Sign Up') }}</a
                                    >
                                </div>

                                @endif

                                <span class="form-text text-center text-muted"
                                    >By continuing, you're confirming that
                                    you've read our
                                    <a href="#">Terms &amp; Conditions</a> and
                                    <a href="#">Cookie Policy</a></span
                                >
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->
                </div>
                <!-- /content area -->

                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="text-center d-lg-none w-100">
                        <button
                            type="button"
                            class="navbar-toggler dropdown-toggle"
                            data-toggle="collapse"
                            data-target="#navbar-footer"
                        >
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text">
                            &copy; 2015 - 2018.
                            <a href="#">Limitless Web App Kit</a> by
                            <a
                                href="http://themeforest.net/user/Kopyov"
                                target="_blank"
                                >Eugene Kopyov</a
                            >
                        </span>

                        <ul class="navbar-nav ml-lg-auto"></ul>
                    </div>
                </div>
                <!-- /footer -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
@endsection
