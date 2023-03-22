<!-- header start -->
<header class=" main-header bg-white d-flex justify-content-between p-2">
   <div class="header-toggle">
        <div class="menu-toggle mobile-menu-icon">
            <div></div>
            <div></div>
            <div></div>
        </div>
      <div class="dropdown d-none d-md-block">
            <i class="btn text-muted dropdown-toggle mr-3" role="button" id="dropdownMegaMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Select Language</i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a  class="dropdown-item" href="{{url('lang/en')}}"> English</a>
                 <a  class="dropdown-item" href="{{url('lang/ar')}}"> Arabic</a> 
            </div>
        </div>

    </div>
    <div class="header-part-right">
        
        
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>
              <!-- User avatar dropdown -->
              <div class="dropdown"> 
                <div class="user col align-self-end"> 
                    <img src="" id="userDropdown" alt="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <span style="color:#5e19a3">{{auth()->user()->name}}</span> 
    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!--<div class="dropdown-header">-->
                          
                        <!--</div>-->
                        <!--<a class="dropdown-item">Account settings</a>-->
                        <!--<a class="dropdown-item">Billing history</a>-->
                         <?php if(auth()->user()->user_type == 'Seller'){ ?>
                            <a class="dropdown-item" href="{{route('profile')}}">{{ __('Profile') }}</a>
                        <?php } ?>
                        <?php if(auth()->user()->user_type == 'Seller'){ ?>
                            <a class="dropdown-item" href="{{ route('update_deliveryarea') }}">Update Delivery Area</a>
                        <?php } ?>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        {{-- <a class="dropdown-item" href="{{route('signIn')}}">{{ __('Logout') }}</a> --}}
                    </div>
                </div>
            </div>
       
</header>
<!-- header close -->