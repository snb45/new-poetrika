@extends('layouts.master-without-nav')

@section('title') Login @endsection

@section('body')

<body>
    @endsection

    @section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{route('home')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50 mb-0">Enter New Password.</p>
                                <a href="{{route('home')}}" class="logo logo-admin mt-4">
                                    <img src="{{asset('home/images/logo.jpg')}}" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            @include('includes.alerts.error')
                            <div class="p-2">
                                <form method="POST" action="{{ route('saveNewPassword',$id) }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Repeat Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('repeatPassword') is-invalid @enderror" placeholder="Repeat Password" name="repeatPassword" required autocomplete="current-password">
                                        @error('repeatPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="login" type="submit">{{ __('Save') }}</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p><a href="{{route('login')}}" class="font-weight-medium text-primary"> sign in to existing account now </a> </p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="register" class="font-weight-medium text-primary"> Signup now </a> </p>
                        <p>© <script>
                                document.write(new Date().getFullYear())
                            </script> Poetrik. Crafted with <i class="mdi mdi-heart text-danger"></i> by suna</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('libs/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('libs/node-waves/node-waves.min.js')}}"></script>

    <script src="{{ URL::asset('js/app.min.js')}}"></script>
    @endsection
