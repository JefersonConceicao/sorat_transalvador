
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">

                @include('layout.admin.sidebar_item', ['menus' => $menus])
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
