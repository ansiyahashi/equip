<div class="main-header">
    <div class="logo">
        <img src="{{asset('assets/images/logoe.jpg')}}" alt="">
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="d-flex align-items-center">
        
     <div class="header-toggle">
        <div class="menu-toggle mobile-menu-icon">
            <div></div>
            <div></div>
            <div></div>
        </div>
      <div class="dropdown d-none d-md-block">
            <i class="btn text-muted dropdown-toggle mr-3" role="button" id="dropdownMegaMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">{{ __('Select Language') }}</i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a  class="dropdown-item" href="{{url('lang/en')}}"> English</a>
                 <a  class="dropdown-item" href="{{url('lang/ar')}}"> Arabic</a> 
            </div>
        </div>

    </div>
    </div>

    <div style="margin: auto"></div>

    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- Grid menu Dropdown -->
        <div class="dropdown widget_dropdown">
            <a class="i-Safe-Box text-muted header-icon" href="{{route('calender')}}" role="button"   aria-haspopup="true" aria-expanded="false"></a>
            
        </div>
       
        <!-- Notificaiton End -->

        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{asset('assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                   
                    
                     
                </div>
            </div>
        </div>
    </div>

</div>
<!-- header top menu end -->