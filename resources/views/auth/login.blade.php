@extends('layouts.applink')
<title>OrnaTrack | Login</title>
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<title> OrnaTrack</title>
<style>
    .login-container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    max-width: 900px;
    margin: 5% auto;
    display: flex;
    margin-top: 8%;
}

.login-container .left-section {
    flex: 1;
    background-image: url('{{ asset('images/gold-chain.jpg') }}');
    background-size: cover;
    background-position: center;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.login-container .right-section {
    flex: 1.5;
    padding: 2rem;
    display: flex;
    flex-direction: column; /* Align children vertically */
    justify-content: center; /* Center children vertically */
}

.login-container h2 {
    text-align: center;
    font-size: 1.5rem;
    color: #4A5568;
    margin-bottom: 1rem;
}

.login-container label {
    font-size: 0.875rem;
    color: #4A5568;
    margin-bottom: 0.5rem;
}

.login-container input[type="email"],
.login-container input[type="password"] {
    background-color: #ffffff;
    border: 1px solid #CBD5E0;
    border-radius: 4px;
    padding: 0.75rem;
    margin-bottom: 1rem;
    width: 100%;
    box-sizing: border-box;
    font-size: 1rem;
    color: #333;
}

.login-container input[type="email"]:focus,
.login-container input[type="password"]:focus {
    outline: none;
    border-color: #333;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
}

.login-container a {
    font-size: 0.875rem;
    color: #000000; /* Change link color to black */
    text-decoration: none;
}

.login-container a:hover {
    text-decoration: underline;
}

.login-container button {
    background-color: #000000; /* Change button color to black */
    color: #ffffff;
    border: none;
    border-radius: 4px;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-container button:hover {
    background-color: #2B2B2B;
}

.remember-me-and-forgot {
    display: flex;
    justify-content: space-between; /* Space between checkbox and link */
    align-items: center; /* Align items vertically */
    margin-top: 1rem;
}

.linkscontainer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
}

.bottom-links-and-login-btn {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-right: 1rem;
}

.bottom-links-and-login-btn a {
    margin-bottom: 0.5rem;
}

.login-btn {
    display: flex;
    align-items: center;
}



@media (max-width: 600px) {
    .login-container {
        padding: 1rem;
        flex-direction: column;
        margin-top: 20%;
    }

    .login-container .left-section {
        display: none; /* Hide the image on smaller screens */
    }

    .login-container .right-section {
        padding: 1rem;
    }

    .remember-me-and-forgot,
    .bottom-links-and-login-btn {
        flex-direction: column; /* Stack items vertically on small screens */
        align-items: stretch; /* Stretch items to full width */
    }
}

</style>


<div class="login-container">
    <div class="left-section"></div>
    <div class="right-section">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h2>{{ __('Login to Your Account') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            {{--  <div class="mt-4 relative">
                <div class="flex items-center">
                    <x-input-label for="password" :value="__('Password')" />
                    <i id="togglePassword" class="fas fa-eye ml-2 mr-3 cursor-pointer" style="color: grey;"></i>
                </div>

                <!-- Input field with padding-right for the icon -->
                <div class="relative">
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="mt-2 pr-10" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <script>
                // Toggle password visibility for the Password field
                document.getElementById('togglePassword').addEventListener('click', function () {
                    const passwordField = document.getElementById('password');
                    const type = passwordField.type === 'password' ? 'text' : 'password';
                    passwordField.type = type;
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            </script>  --}}







            <!-- Remember Me -->
            <div class="remember-me-and-forgot">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="linkscontainer">
                <!-- Create Account and Forgot Password -->
                <div class="bottom-links-and-login-btn">
                    <a href="{{ route('register') }}">
                        {{ __('Create an account') }}
                    </a>

                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>

                <!-- Log In Button -->
                <div class="login-btn">
                    <x-primary-button>
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </div>

        </form>
    </div>
</div>
