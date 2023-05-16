@extends('layout.main')
@section('admin_assets')
    <link type="text/css" rel="stylesheet" href="{{ asset('clear_theme/css/app.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('clear_theme/css/custom.css') }}">
    <link href="{{ asset('clear_theme/css/custom_css/dashboard1.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection 

@section('content')
    <body class="skin-default">
    
        @include('layout.admin.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            @include('layout.admin.sidebar')
            <aside class="right-side">
                <section class="content-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-8">
                            <div class="header-element">
                                <h3> 
                                    @hasSection('back-button')
                                    <a href="@yield('back-button')"> 
                                        <i class="fa fa-arrow-left text-dark" ></i>
                                    </a>
                                    &nbsp;
                                    @endif

                                    @yield('content-title')
                                </h3>
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

        @routes
        <div id="qn"></div>
        <script src="{{ asset('clear_theme/js/app.js') }}" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
@endsection
