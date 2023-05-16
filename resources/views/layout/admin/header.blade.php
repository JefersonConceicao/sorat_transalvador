<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the marginin -->
            <img src="{{ asset('clear_theme/img/logo_white.png') }}" alt="logo"/>
        </a>

        <div class="mr-auto">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
                <i class="fa fa-fw ti-menu"></i>
            </a>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                        <span class="badge badge-pill badge-success">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages table-striped">
                        <li class="dropdown-title">New Messages</li>
                        <li>
                            <a href="" class="message striped-col dropdown-item">
                                <img class="message-image rounded-circle" src="{{ asset('clear_theme/img/authors/avatar7.jpg') }}" alt="avatar-image">

                                <div class="message-body"><strong>Ernest Kerry</strong>
                                    <br>
                                    Can we Meet?
                                    <br>
                                    <small>Just Now</small>
                                    <span class="badge badge-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message dropdown-item">
                                <img class="message-image rounded-circle" src="{{asset('clear_theme/img/authors/avatar6.jpg') }}" alt="avatar-image">

                                <div class="message-body"><strong>John</strong>
                                    <br>
                                    Dont forgot to call...
                                    <br>
                                    <small>5 minutes ago</small>
                                    <span class="badge badge-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col dropdown-item">
                                <img class="message-image rounded-circle" src="{{ asset('clear_theme/img/authors/avatar5.jpg') }} " alt="avatar-image">
                                <div class="message-body">
                                    <strong>Wilton Zeph</strong>
                                    <br>
                                    If there is anything else &hellip;
                                    <br>
                                    <small>14/10/2014 1:31 pm</small>
                                </div>

                            </a>
                        </li>
                        <li>
                            <a href="" class="message dropdown-item">
                                <img class="message-image rounded-circle" src="{{ asset('clear_theme/img/authors/avatar1.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col dropdown-item">
                                <img class="message-image rounded-circle" src="{{ asset('clear_theme/img/authors/avatar.jpg') }}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#"> View All messages</a></li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                        <img src=" {{ asset('clear_theme/img/authors/avatar1.jpg') }}" width="35" class="rounded-circle img-fluid float-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                {{ Auth::user()->usu_nom_usuario }}
                                <span><i class="fa fa-sort-down"></i></span>
                            </div>
                        </div>
                    </a>
                    
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('clear_theme/img/authors/avatar1.jpg') }}" class="rounded-circle" alt="User Image">
                            <p> {{ Auth::user()->usu_nom_usuario }} </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3"><a href="user_profile.html" class="dropdown-item"> <i class="fa fa-fw ti-user"></i> Meu Perfil </a>
                        </li>
                        <li role="presentation"></li>
                        <li><a href="edit_user.html" class="dropdown-item"><i class="fa fa-fw ti-settings"></i> Configurações </a></li>
                        <li role="presentation" class="dropdown-divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                <a href="lockscreen.html">
                                    <i class="fa fa-fw ti-lock"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('auth.logout') }}" class="text-danger">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>