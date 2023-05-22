@foreach ($menus as $menu)
    @if (empty($menu->men_nom_controller) || empty($menu->men_nom_action))
        <li 
            class="menu-dropdown {{ $menu->men_nom_controller . '.' . $menu->men_nom_action == Route::currentRouteName() ? 'active' : '' }}"  
            @if($menu->men_nom_controller . '.' . $menu->men_nom_action == Route::currentRouteName()) id="active" @endif
        >
            <a href="javascript:void(0)">
                <i class="menu-icon {{ $menu->men_htm_icon }}"></i>
                <span class="mm-text"> {{ $menu->men_nom_menu }} </span>

                @if (!empty($menu->menu))
                    <span class="fa arrow"></span>
                @endif
            </a>

            <ul class="sub-menu">
                @if (!empty($menu->menu))
                    @include('layout.admin.sidebar_item', ['menus' => $menu->menu])
                @endif
            </ul>
        </li>
    @else
        <li
            class="{{ $menu->men_nom_controller . '.' . $menu->men_nom_action == Route::currentRouteName() ? 'active' : '' }}">
            <a href="{{ route('' . $menu->men_nom_controller . '.' . $menu->men_nom_action) }}">
                <i class="menu-icon {{ $menu->men_htm_icon }}"></i>
                <span class="mm-text"> {{ $menu->men_nom_menu }} </span>
            </a>
        </li>
    @endif
@endforeach
