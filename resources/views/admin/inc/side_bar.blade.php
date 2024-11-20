
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item navbar-brand-mini-wrapper">
            <a class="nav-link navbar-brand brand-logo-mini" href="{{ route('home') }}"><img src="/assets/images/logo-mini.svg" alt="logo" /></a>
        </li>
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
            <div class="profile-image">
            </div>
            <div class="text-wrapper">
                <p class="profile-name" style="font-size:22px;">Admin</p>
            </div>
            <div class="icon-container">
                <i class="icon-bubbles"></i>
            </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_dashboard') }}">
            <span class="menu-title">Dashboard</span>
            <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
            <span class="menu-title">Customer</span>
            <i class="icon-layers menu-icon"></i>
            </a>
            <div class="collapse" id="customer">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin_customer') }}">All Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin_gold') }}">Gold Savings</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin_wealth') }}">Wealth Treasure</a></li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#schemes" aria-expanded="false" aria-controls="schemes">
                <span class="menu-title">Schemes</span>
                <i class="icon-book-open menu-icon"></i>
            </a>
            <div class="collapse" id="schemes">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.gold-savings-scheme.index') }}">Gold Savings</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.wealth-treasure-scheme.index') }}">Wealth Treasure</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <span class="menu-title">Policies</span>
              <i class="icon-grid menu-icon"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_terms') }}">Terms & Conditions</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin_privacy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
                <span class="menu-title">FAQ</span>
                <i class="fa fa-question-circle menu-icon" aria-hidden="true"></i>
            </a>
            <div class="collapse" id="faq">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('faq.index') }}">All Faqs</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_contact') }}">
            <span class="menu-title">Contact Us</span>
            <i class="fa fa-phone menu-icon" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_about') }}">
            <span class="menu-title">About Us</span>
            <i class="fa fa-users menu-icon" aria-hidden="true"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin_feedback') }}">
            <span class="menu-title">Feedbacks</span>
            <i class="icon-chart menu-icon"></i>
            </a>
        </li>
    </ul>
  </nav>
