@extends('layout.main')
@section('admin_assets')
    <link href="{{ asset('clear_theme/css/bootstrap.css')}}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('clear_theme/css/app.css') }} "/>
    <link rel="stylesheet" href="{{ asset('clear_theme/vendors/swiper/css/swiper.min.css') }}">
    <link href="{{ asset('clear_theme/vendors/nvd3/css/nv.d3.min.css') }}"rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('clear_theme/css/lc_switch.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clear_theme/css/custom.css') }}">
    <link href="{{ asset('clear_theme/css/custom_css/dashboard1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('clear_theme/css/custom_css/dashboard1_timeline.css') }}" rel="stylesheet" /> 
@endsection 

@section('content')
    <body class="skin-default">
        <div class="preloader">
            <div class="loader_img">
                <img src="{{ asset('clear_theme/img/loader.gif') }}" alt="loading..." height="64" width="64" />
            </div>
        </div>

        @include('layout.admin.header')

        <div class="wrapper row-offcanvas row-offcanvas-left">
            @include('layout.admin.sidebar')
            <aside class="right-side">
                <section class="content-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-8">
                            <div class="header-element">
                                <h3> @yield('content-title') </h3>
                            </div>
                        </div>
                        <div class="col-lg-4 ml-auto col-md-6 col-sm-7 col-4">
                            <div class="header-object">
                                <span class="option-search float-right d-none d-sm-block">
                                    <span class="search-wrapper">
                                        <input type="text" placeholder="Search here"><i class="ti-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="content">
                    @yield('content-body')
                </section>
            </aside>
        </div>

        <div id="qn"></div>
        <script src="{{ asset('clear_theme/js/app.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/custom_js/sparkline/jquery.flot.spline.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/flip.min.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/lc_switch.min.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/flot/js/jquery.flot.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/flot/js/jquery.flot.resize.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/flot/js/jquery.flot.stack.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/flotspline/js/jquery.flot.spline.min.js') }}"></script>
        <script type="text/javascript" src=" {{ asset('clear_theme/js/flottooltip/js/jquery.flot.tooltip.js') }}"></script>
        <script type="text/javascript" src="{{ asset('clear_theme/vendors/swiper/js/swiper.min.js') }}"></script>
        <script src="{{ asset('clear_theme/vendors/chartjs/js/Chart.js') }}"></script>
        <script type="text/javascript" src="{{ asset('clear_theme/js/nvd3/d3.v3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('clear_theme/vendors/nvd3/js/nv.d3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('clear_theme/vendors/moment/js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('clear_theme/js/newsTicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('clear_theme/js/dashboard1.js') }}"></script>
    </body>
@endsection
