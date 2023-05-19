
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">
                @foreach($menus as $menu)
                <li class="{{ $menu->men_nom_controller.'.'.$menu->men_nom_action == Route::currentRouteName() ? 'active' : '' }}" id="active">
                    <a href="{{ route(''.$menu->men_nom_controller.'.'.$menu->men_nom_action)}}">
                        <i class="menu-icon {{ $menu->men_htm_icon }}"></i>
                        <span class="mm-text"> {{ $menu->men_nom_menu }} </span>
                    </a>
                </li>
                @endforeach
                {{-- <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Forms</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> Features
                                <span class="fa arrow"></span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
            <!-- / .navigation -->
        </div>
        <!-- menu -->
    </section>
    <!-- /.sidebar -->
</aside>
