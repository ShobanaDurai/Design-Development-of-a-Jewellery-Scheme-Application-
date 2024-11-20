@extends('layouts.applink')
<title>OrnaTrack | Register</title>
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<title> OrnaTrack</title>

<style>
    .reg-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        max-width: 900px;
        margin: 5% auto;
        display: flex;
        margin-top: 8%;
    }

    .reg-container .left-section {
        flex: 1;
        background-image: url('{{ asset('images/gold-chain.jpg') }}');
        background-size: cover;
        background-position: center;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    .reg-container .right-section {
        flex: 1.5;
        padding: 2rem;
    }

    .reg-container h2 {
        text-align: center;
        font-size: 1.5rem;
        color: #4A5568;
        margin-bottom: 1rem;
    }

    .reg-container label {
        font-size: 0.875rem;
        color: #4A5568;
        margin-bottom: 0.5rem;
    }

    .reg-container input[type="text"],
    .reg-container input[type="email"],
    .reg-container input[type="password"] {
        background-color: #ffffff; /* White background */
        border: 1px solid #CBD5E0;
        border-radius: 4px;
        padding: 0.75rem;
        margin-bottom: 1rem;
        width: 100%;
        box-sizing: border-box;
        font-size: 1rem;
        color: #333;
    }

    .reg-container input[type="text"]:focus,
    .reg-container input[type="email"]:focus,
    .reg-container input[type="password"]:focus {
        outline: none;
        border-color: #333;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }

    .reg-container .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .reg-container a {
        font-size: 0.875rem;
        color: #3182CE;
        text-decoration: none;
    }

    .reg-container a:hover {
        text-decoration: underline;
    }

    .reg-container button {
        background-color: #1F1E1E; /* Black background */
        color: #ffffff; /* White text */
        border: none;
        border-radius: 4px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .reg-container button:hover {
        background-color: #333333; /* Darker black on hover */
    }

    .reg-container .mt-4 {
        margin-top: 1rem;
    }

    .reg-container .ms-4 {
        margin-left: 1rem;
    }

    .reg-container .mt-2 {
        margin-top: 0.5rem;
    }
    .reg-container a {
        font-size: 0.875rem;
        color: #000000; /* Black color */
        text-decoration: none;
    }

    .reg-container a:hover {
        text-decoration: underline;
    }
</style>


<div class="reg-container">
    <div class="left-section">
        <!-- Left section for image -->
    </div>
    <div class="right-section">
        <h2>{{ __('Create Your Account') }}</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Hidden field to store the origin -->
            <input type="hidden" name="origin" value="{{ request()->input('origin') }}">
            <input type="hidden" name="user_type" value="customer">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <!-- Password -->
            {{--  <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>  --}}

            <div class="mt-4 relative">
                <!-- Label and Icon Container -->
                <div class="flex items-center">
                    <!-- Password Label -->
                    <x-input-label for="password" :value="__('Password')" />
                    <!-- Eye Icon next to the label -->
                    <i id="togglePassword" class="fas fa-eye ml-2 mr-3 cursor-pointer" style="color: grey;"></i>
                </div>

                <!-- Input field with padding-right for the icon -->
                <div class="relative">
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" class="mt-2 pr-10" />
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

              <!-- Confirm Password Field -->
              <div class="mt-4 relative">
                  <!-- Label and Icon Container -->
                  <div class="flex items-center">
                      <!-- Confirm Password Label with inline-flex for the icon -->
                      <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="inline-flex items-center" />
                      <!-- Eye Icon next to the label with grey color -->
                      <i id="toggleConfirmPassword" class="fas fa-eye ml-2 mr-3 cursor-pointer" style="color: grey;"></i>
                  </div>

                  <!-- Input field with padding-right for the icon -->
                  <div class="relative">
                      <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="mt-2 pr-10" />
                  </div>

                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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

                // Toggle password visibility for the Confirm Password field
                document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
                    const confirmPasswordField = document.getElementById('password_confirmation');
                    const type = confirmPasswordField.type === 'password' ? 'text' : 'password';
                    confirmPasswordField.type = type;
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            </script>


            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4" style="color: #374151">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
