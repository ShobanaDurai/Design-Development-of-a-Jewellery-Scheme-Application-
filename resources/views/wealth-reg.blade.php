@extends('layouts.applink')
<head>
    <title>OrnaTrack | Wealth Treasure Scheme Registration</title>

    <style>
        .form-container {
            max-width: 1000px;
            margin: 10%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .jointitle{
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .checkbox-inline {
        display: flex;
        align-items: center;
        }
        .form-group input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }
        .form-group .terms-link {
            color: #007bff;
            text-decoration: none;
        }
        .form-group .terms-link:hover {
            text-decoration: underline;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary:disabled {
            background-color: #ddd;
        }
        .joinsubmit{
            text-align: center;
        }
        @media (max-width: 1200px) {
            .form-container {
                margin: 5%;
                padding: 15px;
                margin-top:15%;
            }
        }
        @media (max-width: 992px) {
            .form-container {
                margin: 5%;
                padding: 15px;
                margin-top:15%;
            }
        }
        @media (max-width: 768px) {
            .form-container {
                margin: 5%;
                padding: 10px;
                margin-top:20%;
            }
        }
        @media (max-width: 576px) {
            .form-container {
                margin: 5%;
                padding: 10px;
                margin-top:20%;
            }
            .form-group label {
                margin-bottom: 3px;
            }
            .form-group input,
            .form-group textarea,
            .form-group select {
                padding: 8px;
            }
            .btn-primary {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="jointitle"> Wealth Treasure Scheme Registration Form</h2>
            <form action="{{ route('wealth-reg.store') }}" method="POST" id="wealthtreasureregistrationForm">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="pincode">Pin Code:</label>
                    <input type="text" id="pincode" name="pincode" required>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required>
                </div>
                <div class="form-group">
                    <label for="nominee">Nominee Name:</label>
                    <input type="text" id="nominee" name="nominee" required>
                </div>


                <div class="form-group">
                    <label for="timeperiod">Scheme Period:</label>
                    <select id="timeperiod" name="timeperiod" required>
                        <option value="">Select Time Period</option>
                        <option value="11">11 Months</option>
                        <option value="12">12 Months</option>
                        <option value="13">13 Months</option>
                        <option value="14">14 Months</option>
                        <option value="15">15 Months</option>
                        <option value="16">16 Months</option>
                        <option value="17">17 Months</option>
                        <option value="18">18 Months</option>
                        <option value="19">19 Months</option>
                        <option value="20">20 Months</option>
                        <option value="21">21 Months</option>
                        <option value="22">22 Months</option>
                        <option value="23">23 Months</option>
                        <option value="24">24 Months</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="installment">Monthly Installments:</label>
                    <input type="number" id="installment" name="installment"  required>
                </div>

                <div class="form-group">
                    <label for="aadhaar">Aadhaar Card Photo:</label>
                    <input type="file" id="aadhaar" name="aadhaar" accept="image/*" required>
                </div>
                <div class="form-group checkbox-inline">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I accept the <a href="{{route('condition.show') }}" class="terms-link">Terms and Conditions</a></label>
                </div>
                <div class="joinsubmit">
                    <button type="submit" class="btn-primary" id="submitBtn" disabled>Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function checkFormValidity() {
            const form = document.getElementById('wealthtreasureregistrationForm');
            const submitBtn = document.getElementById('submitBtn');
            const isValid = form.checkValidity();
            submitBtn.disabled = !isValid;
        }

        document.querySelectorAll('#wealthtreasureregistrationForm input, #wealthtreasureregistrationForm select').forEach(element => {
            element.addEventListener('input', checkFormValidity);
        });

        document.getElementById('terms').addEventListener('change', checkFormValidity);
    </script>
</body>


<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{ url('/home') }}">
        <span  style="margin-left: 60px;">
          Orna Track
        </span>
      </a>
      <div class="custom_menu-btn">
        <button class="hamburger" onclick="openNav()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
          <div id="myNav" class="overlay">
            <div class="overlay-content">
              <a href="{{ url('/home') }}"><i class="fa-solid fa-house"></i> Home</a>
              <a href="{{ url('/about') }}"><i class="fa-solid fa-users"></i> About</a>
              <a href="{{ url('/shop') }}"><i class="fa-solid fa-bag-shopping"></i> Shop</a>
              <a href="{{ url('/schemes') }}"><i class="fa-solid fa-list"></i> Schemes</a>
              <a href="{{ url('/wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
              <a href="{{ url('/cart') }}"><i class="fas fa-shopping-cart"></i> Cart</a>
              @auth
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              @else
                <a href="{{ url('/login') }}"><i class="fas fa-user"></i> Login</a>
                <a href="{{ url('/register') }}"><i class="fas fa-user"></i> Register</a>
              @endauth
            </div>
          </div>
      </div>
    </nav>
    @guest
    <div class="logreg">
      <a class="loginbtn" href="{{ url('/login') }}">Login</a>
      <a class="registerbtn" href="{{ url('/register') }}">Register</a>
    </div>
    @endguest
  </div>
</header>

