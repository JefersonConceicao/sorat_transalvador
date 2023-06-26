@extends('layout.main')

@section('login_assets')    
    <link href="{{ asset('clear_theme/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('clear_theme/css/themify-icons/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('clear_theme/vendors/iCheck/css/all.css')}}" rel="stylesheet">
    <link href="{{ asset('clear_theme/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet">
    <link href="{{ asset('clear_theme/css/login.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
@endsection

@section('content')
    <body id="sign-in">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-10 col-sm-8 m-auto login-form card-guest-form">
                    <h2 class="text-center logo_h2">
                        <img src="{{ asset('assets/img/transalvador-png.png') }}" alt="Logo">
                    </h2>
                    <div class="card-body">
                        @yield('content-body')
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('clear_theme/js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('clear_theme/js/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('clear_theme/js/bootstrap.min.js') }}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('clear_theme/vendors/iCheck/js/icheck.js') }}"></script>
        <script src=" {{ asset('clear_theme/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/custom_js/login.js') }}"></script>
    </body>
@endsection
