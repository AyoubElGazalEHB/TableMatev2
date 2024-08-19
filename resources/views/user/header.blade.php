<header>
   <div class="header-container">
      <nav class="header-nav-bar">
         <ul class="header-nav-lists">
            <li class="header-nav-list">
               <a class="header-nav-link header-active" href="{{url('home')}}">Home</a>
            </li>
            <li class="header-nav-list"><a class="header-nav-link" href="{{url('about')}}">About us</a></li>
            <li class="header-nav-list"><a class="header-nav-link" href="{{url('contact')}}">Contact Us</a></li>
            <li class="header-nav-list"><a class="header-nav-link" href="{{url('faq')}}">FAQ</a></li>

            @if(Route::has('login'))
            @auth
            <li class="header-nav-list"><a class="header-btn header-btn-custom"
                  href="{{url('myreservation')}}">My reservations</a></li>

            <x-app-layout>
            </x-app-layout>
            @else
            <li class="header-nav-list"><a class="header-btn header-btn-custom" href="{{route('login')}}">Login</a></li>
            <li class="header-nav-list"><a class="header-btn header-btn-custom" href="{{route('register')}}">Register</a></li>
            @endauth
            @endif
         </ul>

         <div class="header-hamburger-icon">
            <div class="header-hamburger-line-1"></div>
            <div class="header-hamburger-line-2"></div>
            <div class="header-hamburger-line-3"></div>
         </div>
      </nav>
   </div>
</header>
