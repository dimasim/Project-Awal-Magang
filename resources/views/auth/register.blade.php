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
                    <!-- Registration form -->
                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="flex-fill"
                    >
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <i
                                                class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"
                                            ></i>
                                            <h5 class="mb-0">Create account</h5>
                                            <span class="d-block text-muted"
                                                >All fields are required</span
                                            >
                                        </div>

                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right"
                                        >
                                            <input
                                                id="name" type="text" 
                                                class="form-control @error('name') is-invalid @enderror" 
                                                name="name" value="{{ old('name') }}" 
                                                required autocomplete="name" autofocus
                                                placeholder="Choose username"
                                            />
                                            <div class="form-control-feedback">
                                                <i
                                                    class="icon-user-plus text-muted"
                                                ></i>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div
                                            class="form-group form-group-feedback form-group-feedback-right"
                                        >
                                            <input
                                                id="email" type="email" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                name="email" value="{{ old('email') }}" 
                                                required autocomplete="email"
                                                placeholder="Enter email"
                                            />
                                            <div class="form-control-feedback">
                                                <i
                                                    class="icon-mention text-muted"
                                                ></i>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-right"
                                                >
                                                    <input
                                                        type="password"
                                                        id="password" 
                                                        class="form-control @error('password') is-invalid @enderror" 
                                                        name="password" required autocomplete="new-password"
                                                        placeholder="Create password"
                                                    />
                                                    <div
                                                        class="form-control-feedback"
                                                    >
                                                        <i
                                                            class="icon-user-lock text-muted"
                                                        ></i>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-right"
                                                >
                                                    <input
                                                        type="password"
                                                        placeholder="Repeat password"
                                                        id="password-confirm" type="password" 
                                                        class="form-control" name="password_confirmation"
                                                        required autocomplete="new-password"
                                                    />
                                                    <div
                                                        class="form-control-feedback"
                                                    >
                                                        <i
                                                            class="icon-user-lock text-muted"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input
                                                        type="checkbox"
                                                        class="form-input-styled"
                                                        checked
                                                        data-fouc
                                                    />
                                                    Send me
                                                    <a href="#"
                                                        >test account
                                                        settings</a
                                                    >
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input
                                                        type="checkbox"
                                                        class="form-input-styled"
                                                        checked
                                                        data-fouc
                                                    />
                                                    Subscribe to monthly
                                                    newsletter
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input
                                                        type="checkbox"
                                                        class="form-input-styled"
                                                        data-fouc
                                                    />
                                                    Accept
                                                    <a href="#"
                                                        >terms of service</a
                                                    >
                                                </label>
                                            </div>
                                        </div>

                                        <button
                                            type="submit"
                                            class="btn bg-teal-400 btn-labeled btn-labeled-right"
                                        >
                                            <b><i class="icon-plus3"></i></b>
                                            Create account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /registration form -->
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

                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a
                                    href="https://kopyov.ticksy.com/"
                                    class="navbar-nav-link"
                                    target="_blank"
                                    ><i class="icon-lifebuoy mr-2"></i>
                                    Support</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    href="http://demo.interface.club/limitless/docs/"
                                    class="navbar-nav-link"
                                    target="_blank"
                                    ><i class="icon-file-text2 mr-2"></i>
                                    Docs</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"
                                    class="navbar-nav-link font-weight-semibold"
                                    ><span class="text-pink-400"
                                        ><i class="icon-cart2 mr-2"></i>
                                        Purchase</span
                                    ></a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /footer -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
@endsection
