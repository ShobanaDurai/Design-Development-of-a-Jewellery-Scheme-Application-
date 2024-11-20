
<!-- partial:partials/_navbar.html -->

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ route('home') }}">
            <p style="font-size:22px;color:#38CE3C;font-weight:bold;margin-top:12px;">ORNA TRACK</p>
            {{--  <img src="/assets/images/logo.svg" alt="logo" class="logo-dark" />  --}}
            {{--  <img src="/assets/images/logo-light.svg" alt="logo-light" class="logo-light">  --}}
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/assets/images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Admin Dashboard</h5>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item d-none d-lg-inline-flex">
                    <div id="dateTimeDisplay" class="text-end me-3">
                        <div id="timeDisplay" style="font-size: 1.1rem; font-weight: bold;"></div>
                        <div id="dateDisplay" style="font-size: 0.8rem;"></div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user img-md rounded-circle me-2" style="font-size: 1.5rem;"></i>
                         <span class="font-weight-normal me-4"> Admin  </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <i class="fas fa-user img-md rounded-circle me-4" style="font-size: 1.5rem;"></i>
                        <p class="mb-1 mt-3">Admin</p>
                        <p class="font-weight-light text-muted mb-0">admin@gmail.com</p>
                        </div>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            <i class="dropdown-item-icon icon-user text-primary"></i> My Profile
                        </a>
                        <!-- Sign Out Link -->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="dropdown-item-icon icon-power text-primary"></i> Sign Out
                        </a>

                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>

