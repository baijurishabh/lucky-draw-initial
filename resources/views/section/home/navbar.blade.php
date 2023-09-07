<?php
$setting = \App\Models\Setting::first();
?>
<nav class="navbar navbar-expand-md navbar">
    <!-- Brand -->
    <a href="{{ url('/') }}"> <img class="nav_logo" height="50px"
            src="{{ asset('storage/settings/' . BobFinder::bob()->value('logo_white')) }}" alt=""
            srcset="" /></a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            {{-- <li class="nav-item">
            @if (Request::fullUrl() == url('/'))
            <a style="font-family: p4;" class="nav-link res active" href="#">{{ __('messages.home') }}</a>
            @else
            <a style="font-family: p4;" class="nav-link res active" href="{{url('/')}}">{{ __('messages.home') }}</a>
            @endif

        </li> --}}
            {{-- <li class="nav-item">
            @if (Request::fullUrl() == url('/'))
            <a style="font-family: p3;" class="nav-link res"  href="#about_us">{{ __('messages.about_us') }}</a>
            @else
            <a style="font-family: p3;" class="nav-link res"  href="{{url('/'.'#about_us')}}">{{ __('messages.about_us') }}</a>
            @endif

        </li> --}}
            <li class="nav-item">
                @if (Request::fullUrl() == url('/'))
                    <a style="font-family: p3;" class="nav-link res "
                        href="#concept">{{ __('messages.how_it_works') }}</a>
                @else
                    <a style="font-family: p3; " class="nav-link res"
                        href="{{ url('/' . '#concept') }}">{{ __('messages.how_it_works') }}</a>
                @endif

            </li>
            <li class="nav-item">
                @if (Request::fullUrl() == url('/'))
                    <a style="font-family: p3;" class="nav-link res" 
                        href="#products">{{ __('messages.products') }}</a>
                @else
                    <a style="font-family: p3; " class="nav-link res" 
                        href="{{ url('/' . '#products') }}">{{ __('messages.products') }}</a>
                @endif

            </li>
            {{-- <li class="nav-item">
            @if (Request::fullUrl() == url('/'))
            <a style="font-family: p3;" class="nav-link res"  href="#blogs">{{ __('messages.blogs') }}</a>
            @else
            <a style="font-family: p3;" class="nav-link res"  href="{{url('/'.'#blogs')}}">{{ __('messages.blogs') }}</a>
            @endif

        </li>
        <li class="nav-item">
            @if (Request::fullUrl() == url('/'))
            <a style="font-family: p3;" class="nav-link res"  href="#testimonials">{{ __('messages.testimonials') }}</a>
            @else
            <a style="font-family: p3;" class="nav-link res"  href="{{url('/'.'#testimonials')}}">{{ __('messages.testimonials') }}</a>
            @endif
        </li> --}}
        <li class="nav-item d-md-none d-block">
          @if (Request::fullUrl() == url('/'))
          <a style="font-family: p3;" class="nav-link res "
          href="#anyquery">Advertise with us</a>
          @else
          <a style="font-family: p3;" class="nav-link res "
          href="#anyquery">Advertise with us</a>
          @endif
      </li> 
      <li class="nav-item d-md-none d-block">
        @if (Request::fullUrl() == url('/'))
        <div class="dropdown">
            
          <button class="dropbtn p-0" style="font-family: p3;">Language</button>
          <div class="dropdown-content">
              <a href="{{ url('/lang/en') }}" style="font-family: p3;">English</a>
              <a href="{{ url('/lang/ml') }}" style="font-family: p3;">Malayalam</a>
              {{-- <a href="#">Link 3</a> --}}
          </div>
      </div>
        @else
        <div class="dropdown">
            
          <button class="dropbtn" style="font-family: p3;">Language</button>
          <div class="dropdown-content">
              <a href="{{ url('/lang/en') }}" style="font-family: p3;">English</a>
              <a href="{{ url('/lang/ml') }}" style="font-family: p3;">Malayalam</a>
              {{-- <a href="#">Link 3</a> --}}
          </div>
      </div>
        @endif
    </li> 
    
        </ul>
        <div class="right " style="align-items: center;">
          <a style="font-family: p3;" class="nav-link res px-5 mt-2 d-none d-md-flex"
          href="#anyquery">Advertise with us</a>
            <div class="dropdown d-none d-md-flex">
            
                <button class="dropbtn" style="font-family: p3;"><p class="res mt-3">Language</p></button>
                <div class="dropdown-content">
                    <a href="{{ url('/lang/en') }}" style="font-family: p3;">English</a>
                    <a href="{{ url('/lang/ml') }}" style="font-family: p3;">Malayalam</a>
                    {{-- <a href="#">Link 3</a> --}}
                </div>
            </div>
            @if (Auth()->user())
                <a href="{{ route('user.dashboard') }}">
                    <li class="nav-item ">
                        <img src="/frontend/assets/image/home/Frame 1.png" alt="" srcset="" />
                    </li>
                </a>
            @else
                <li class="nav-item mt-2">
                    <a href="{{ route('userLogin') }}"> <button>{{ __('messages.login') }}</button></a>
                </li>
            @endif
        </div>
    </div>
</nav>
