<!-- header section starts -->
 <style>
  .logreg {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .logreg .loginbtn {
      display: inline-block;
      padding: 5px 15px;
      border: 1px solid #fd9c6b;
      border-radius: 5px;
      color: #fd9c6b;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }
    .logreg .registerbtn{
      display: inline-block;
      padding: 5px 15px;
      border: 1px solid #fd9c6b;
      border-radius: 5px;
      color: #fd9c6b;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }
    .loginbtn:hover,
     .loginbtn:focus {
    background-color:#fd9c6b ;
    color: white;
  }
  .registerbtn:hover,
      .registerbtn:focus {
      background-color:#fd9c6b ;
      color: white;
  }
  .user-info {
    display: flex;
    align-items: center;
}

.avatar {
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.logoutbtn {
    color: #FFFFFF;
    text-decoration: none;
    transition: color 0.3s, text-decoration 0.3s;
}

.logoutbtn:hover {
    color: #FD9C6B;
    text-decoration: none;
  }

.d-md-flex {
    display: none;
}

nav.d-none.d-md-flex a {
    color: white;
    text-decoration: none;
}

nav.d-none.d-md-flex a:hover {
    color: #FD9C6B;
}

.nav-center {
    display: flex;
    justify-content: left;
    align-items: center;
    margin-right: 15px;
    width: 100%;
}

.nav-center a {
    color: white;
    text-decoration: none;
    margin: 0 19px;
}

.nav-center a:hover {
    color: #FD9C6B;
}
.nav-center a.active {
    color: #FD9C6B !important;
    font-weight: bold !important;

}




/* Show the direct menu on larger screens */
@media (min-width: 768px) {
    .d-md-flex {
        display: flex; /* Show on screens larger than md */
    }
}

/* Hide the hamburger menu on larger screens */
.d-md-none {
    display: none; /* Hide on screens larger than md */
}

/* Show the hamburger menu on smaller screens */
@media (max-width: 767px) {
    .d-md-none {
        display: block; /* Show on screens smaller than md */
    }
}
/* Ensure brand link aligns to the right on smaller screens */
@media (max-width: 767px) {
    .navbar-brand {
        margin-left: auto;
        margin-right: 0;
    }
}






@media (max-width: 1200px) {
    .overlay a {
        font-size: 22px;
    }
}

@media (max-width: 992px) {
    .overlay a {
        font-size: 20px;
    }
}

@media (max-width: 768px) {
    .overlay a {
        font-size: 18px;
    }
}

@media (max-width: 576px) {
    .overlay a {
        font-size: 14px;
    }
    .logreg{
      display:none;
    }
}
.hide-on-scheme {
  display: none;
}
 </style>
<header class="header_section {{ Request::routeIs('user-scheme') ? 'hide-on-scheme' : '' }}">
  <div class="container-fluid ">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{ route('home') }} ">
        <span  style="margin-left: 10px;">
          Orna Track
        </span>
      </a>

      <nav class="d-none d-md-flex nav-center">
        <a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('about') }}" class="{{ Request::routeIs('about') ? 'active' : '' }}">About Us</a>
        <a href="{{ route('schemes') }}" class="{{ Request::routeIs('schemes') ? 'active' : '' }}">Schemes</a>
        <a href="{{ route('condition.show') }}" class="{{ Request::routeIs('condition.show') ? 'active' : '' }}">Terms & Conditions</a>
        <a href="{{ route('privacy') }}" class="{{ Request::routeIs('privacy') ? 'active' : '' }}">Privacy Policy</a>
        <a href="{{ route('contact') }}" class="{{ Request::routeIs('contact') ? 'active' : '' }}">Contact Us</a>
        <a href="{{ route('faq') }}" class="{{ Request::routeIs('faq') ? 'active' : '' }}">FAQ</a>
    </nav>





        <!-- Hamburger menu for smaller screens -->
        <div class="custom_menu-btn d-block d-md-none {{ Request::routeIs('user-scheme') ? 'hide-on-scheme' : '' }}">
            <button class="hamburger" onclick="openNav()">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <div id="myNav" class="overlay">
                <div class="overlay-content">
                    <a href="{{ url('/home') }}"><i class="fa-solid fa-house"></i> Home</a>
                    <a href="{{ url('/about') }}"><i class="fa-solid fa-users"></i> About</a>
                    <a href="{{ route('schemes') }}"><i class="fa-solid fa-list"></i> Schemes</a>
                    <a href="{{ url('/login') }}"><i class="fas fa-user"></i> Login</a>
                    <a href="{{ url('/register') }}"><i class="fas fa-user"></i> Register</a>
                </div>
            </div>
        </div>


    </nav>
    <div class="logreg  ">
    @guest
        <a class="loginbtn" href="{{ url('/login') }}">Login</a>
        <a class="registerbtn" href="{{ url('/register') }}">Register</a>
      @else
      <div class="user-info {{ Request::routeIs('user-scheme') ? 'hide-on-scheme' : '' }}">
        @php
            $route = app()->make(App\Http\Controllers\OtpController::class)->getUserRedirectRoute();
        @endphp

        <a href="{{ $route }}">
            <svg class="avatar" width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="12" fill="#FFFFFF"/>
                <circle cx="12" cy="8" r="4" fill="#000000"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12C8.13401 12 5 15.134 5 19H19C19 15.134 15.866 12 12 12Z" fill="#000000"/>
            </svg>
        </a>

        <a href="{{ url('/logout') }} "
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logoutbtn">
          {{Auth::user()->name}}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>

    @endguest
    </div>

  </div>
</header>
<!-- end header section -->
