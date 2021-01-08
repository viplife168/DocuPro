@php
use App\Http\Controllers\MenuController as Menu;

$titles = Menu::getMenuTitle();
$dashboard = Menu::getDashboard();
// dd($titles);
@endphp

<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/mini/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/mini/images/logo-dark.png" alt="" height="20">
            </span>
        </a>

        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="/mini/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/mini/images/logo-light.png" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{$dashboard->link}}">
                        <i class="{{$dashboard->icon}}"></i>
                        <span>{{$dashboard->name}}</span>
                    </a>
                </li>
            @foreach ($titles as $title)
                <li class="menu-title">{{$title->name}}</li>
                @php
                    $menuitems =Menu::getMenuItem($title->slug);
                    //
                @endphp
                {{-- {{dd($menuitems)}} --}}
                @foreach ($menuitems as $menuitem)
                    <li class="{{Menu::disabledMenu($menuitem->disabled)}}">
                        <a href="{{$menuitem->link}}" class="{{$menuitem->bootclass}}">
                            <i class="{{$menuitem->icon}}"></i>
                            <span>{{$menuitem->name}}</span>
                        </a>
                        @php
                            $childmenus  = Menu::getMenuChildren($menuitem->slug);

                        @endphp
                        @if (count($childmenus) >0)
                        <ul class="sub-menu" aria-expanded="false">
                            @foreach ($childmenus as $childmenu)
                                <li><a href="{{$childmenu->link}}">{{$childmenu->name}}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
