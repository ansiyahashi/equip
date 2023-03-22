<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('home') }}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">{{ __('Dashboard') }}</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::routeIs('item.index') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('item.index') }}">
                    <i class="nav-icon i-Check"></i>
                    <span class="nav-text">{{ __('Assets') }}</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::routeIs('category.index') ? 'active' : '' }}" data-item="group">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">{{ __('Group') }}</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::routeIs('banner.index') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('banner.index') }}">
                    <i class="nav-icon i-Gears"></i>
                    <span class="nav-text">{{ __('Banners') }}</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::routeIs('booking.index') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('booking.index') }}">
                    <i class="nav-icon i-Open-Book"></i>
                    <span class="nav-text">{{ __('Bookings') }}</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ Request::routeIs('report.index') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('report.index') }}">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">{{ __('Report') }}</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="group">

            <li class="nav-item">
                <a class="{{ Route::currentRouteName() == 'category.index' ? 'open' : '' }}"
                    href="{{ route('category.index') }}">
                    <i class="nav-icon i-Clock"></i>
                    <span class="item-name">{{ __('Category') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName() == 'subcategory.index' ? 'open' : '' }}"
                    href="{{ route('subcategory.index') }}">
                    <i class="nav-icon i-Clock"></i>
                    <span class="item-name">{{ __('Sub Category') }}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
