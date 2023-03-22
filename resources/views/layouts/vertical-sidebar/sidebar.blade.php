<!-- start sidebar -->
<div class="sidebar-panel">
    <div class="gull-brand pr-3 text-center mt-4 mb-2 d-flex justify-content-center align-items-center">
        <a href="{{ route('home') }}"> <img class="pl-3" src="{{ asset('assets/images/logoe.jpg') }}" alt=""
                style="width: 160px;"></a>
        <!-- <span class=" item-name text-20 text-primary font-weight-700">GULL</span> -->
        <div class="sidebar-compact-switch ml-auto"><span></span></div>

    </div>
    <!-- user -->
    <div class="scroll-nav" data-perfect-scrollbar data-suppress-scroll-x="true">

        <!-- user close -->
        <!-- side-nav start -->
        <div class="side-nav">

            <div class="main-menu">

                <ul class="metismenu" id="menu">
                    <!-- <p class="main-menu-title text-muted ml-3 font-weight-700 text-13 mt-4 mb-2">Apps</p> -->
                    <li class="Ul_li--hover">
                        <a class="has-arrow" href="{{ route('home') }}">
                            <i class="i-Bar-Chart text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">{{ __('Dashboard') }}</span>
                        </a>

                    </li>
                    <li class="Ul_li--hover">
                        <a class="has-arrow" href="{{ route('home') }}">
                            <i class="i-Bar-Chart text-20 mr-2 text-muted"></i>
                            <span class="item-name  text-muted">{{ __('Category') }}</span>
                        </a>

                    </li>
                 
                </ul>
                
            </div>
        </div>
    </div>

    <!-- side-nav-close -->
</div>
<!-- end sidebar -->
<div class="switch-overlay"></div>
