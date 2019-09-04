
<div style="background-color:#3bafda" class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ url('/dashboard') }}" class="logo"><i class="fa fa-birthday-cake"></i> <span>GESTEVENTO</span></a>
        </div>
    </div>
    
    <ul style="padding-top:22px" class="list-inline float-right mb-0">            
        <span style="color: white;top:200px">{{ Auth::user()->name }}</span>
        <li class="list-inline-item dropdown notification-list">
            <a style="color:#ffff;font-size:24px" class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="index.html#" role="button"
               aria-haspopup="false" aria-expanded="false">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                <!-- item-->
                <a href="#" class="dropdown-item notify-item">
                    <i class="mdi mdi-account"></i> <span>Perfil</span>
                </a>
                <!-- item-->
                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     <i class="mdi mdi-logout"></i> <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>

    <nav class="navbar-custom">
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="fa fa-bars"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
