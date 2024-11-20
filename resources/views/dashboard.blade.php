

<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Dashboard') }}
       </h2>
   </x-slot>

    <div class="py-4">
       <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 dark:text-gray-100">
                   {{ __("You're logged in!") }}
               </div>
           </div>
       </div>
   </div>
</x-app-layout>




<!-- <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<title>Orna Track | User Page</title>
<style>
   .alert {
       padding: 20px;
       background-color: #4CAF50;
       color: white;
       max-width: 95%;
       margin-bottom: 10px;
       border-radius: 10px;
       position: fixed;
       top: 40px;
       right: 20px;
       left: 20px;
       z-index: 1000;
       opacity: 1;
       transition: opacity 0.5s ease;
   }

   .alert-success {
       background-color: #4CAF50;
   }

   .alert-danger {
       background-color: #f44336;
   }

   .alert-hidden {
       opacity: 0;
       transition: opacity 0.5s ease;
   }

   .test-left {
       position: absolute;
       top: 80px;
   }

   .test-right {
       position: absolute;
       top: 80px;
       right: 10px;
       display: flex;
       align-items: center;
       border-radius: 5px;
       border: 2px solid;
   }

   .success-container {
       margin-top: 10%;
   }

   .slider-container {
       position: relative;
       width: 90%;
       height: 300px;
       margin: auto;
       overflow: hidden;
       border-radius: 10px;
       margin-top: 10%;
   }

   .slides {
       display: flex;
       transition: transform 0.5s ease-in-out;
   }

   .slide {
       min-width: 100%;
       box-sizing: border-box;
       position: relative;
   }

   .slide img {
       width: 100%;
       height: 100%;
       object-fit: cover;
       border-radius: 10px;
   }

   .quote {
       position: absolute;
       bottom: 20px;
       left: 20px;
       background: rgba(0, 0, 0, 0.5);
       color: #fff;
       padding: 10px 20px;
       border-radius: 5px;
       font-size: 1.2rem;
       width: calc(100% - 40px);
       box-sizing: border-box;
   }

   .nav {
       position: relative;
       display: flex;
       justify-content: center;
       margin-top: 5px;
   }

   .dot {
       background-color: rgba(0, 0, 0, 0.5);
       width: 12px;
       height: 12px;
       border-radius: 50%;
       margin: 0 5px;
       cursor: pointer;
       transition: background-color 0.3s ease;
   }

   .dot.active {
       background-color: #fd9c6b;
   }

   .user-scheme-title {
       margin-top: 20px;
       text-align: center;
       font-size: 34px;
       font-weight: bold;
       color: #000;
   }

   .user-scheme-container {
       width: 90%;
       border: 3px solid #fd9c6f;
       border-radius: 20px;
       padding: 20px;
       margin-top: 3%;
       margin-left: 5%;
       background-color: #000;
       display: flex;
       flex-direction: column;
       justify-content: center;
       transition: background-color 0.3s, box-shadow 0.3s, transform 0.3s;
       cursor: pointer;
       background: linear-gradient(135deg, #000000, #434343);
       color: white;
   }

   .user-scheme-container:hover {
       box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
       transform: translateY(-10px);
   }

   .user-scheme-info {
       margin-bottom: 10px;
   }

   .user-scheme-info h4 {
       margin: 0 0 10px 0;
       color: #fd9c6f;
   }

   .user-scheme-info p {
       margin: 5px 0;
       font-size: 1.2rem;
       color: #fd9c6f;
   }

   .pay-btn {
       align-self: flex-end;
       background-color: #fd9c6f;
       color: white;
       padding: 8px 16px;
       font-size: 16px;
       border: none;
       cursor: pointer;
       border-radius: 5px;
       transition: background-color 0.3s, color 0.3s, border 0.3s;
   }

   .pay-btn:hover {
       background-color: transparent;
       color: #fd9c6f;
       border: 2px solid #fd9c6f;
   }

   @media (max-width: 1500px) {
       .slider-container {
           margin-top: 12%;
           width: 90%;
       }
   }

   @media (max-width: 1200px) {
       .slider-container {
           margin-top: 15%;
           width: 90%;
       }
   }

   @media (max-width: 786px) {
       .alert {
           top: 60px;
           right: 10px;
           left: 10px;
       }

       .slider-container {
           margin-top: 19%;
           width: 90%;
       }
   }

   @media (max-width: 476px) {
       .alert {
           top: 70px;
           right: 10px;
           left: 10px;
           max-width: 95%;
       }

       .slider-container {
           margin-top: 30%;
           width: 90%;
           margin-right: 20px;
       }
   }
</style>
<header>
   <div class="success-container">
       @if (session('success'))
           <div id="success-alert" class="alert alert-success">
               {{ session('success') }}
           </div>
       @endif
   </div>
   <div class="test">
       <h5 class="test-left">Hi,</h5>
       <div class="test-right">
           <select id="rate" name="rate">
               <option value="price">Price</option>
               <option value="gold">Gold Price</option>
               <option value="diamond">Diamond Price</option>
               <option value="silver">Silver Price</option>
           </select>
       </div>
   </div>
</header>
<body>
   <div class="slider-container">
       <div class="slides">
           <div class="slide">
               <img src="{{ asset('images/chain.jpg') }}" alt="Slide 1">
               <div class="quote">"The best time to invest in gold was 20 years ago. The second best time is now."</div>
           </div>
           <div class="slide">
               <img src="{{ asset('images/chain.jpg') }}" alt="Slide 2">
               <div class="quote">"Diamonds are forever, but gold is timeless."</div>
           </div>
           <div class="slide">
               <img src="{{ asset('images/chain.jpg') }}" alt="Slide 3">
               <div class="quote">"Silver is the poor man's gold, but still a precious investment."</div>
           </div>
       </div>
   </div>

   <div class="nav">
       <span class="dot"></span>
       <span class="dot"></span>
       <span class="dot"></span>
   </div>

   <h3 class="user-scheme-title">Your Schemes</h3>
   <div class="user-scheme-container" onclick="navigateToSchemeDetails();">
       <div class="user-scheme-info">
           <h4>Scheme Name: Premium Plan</h4>
           <p>Monthly Installments: ₹2000</p>
           <p>Scheme Period: 12 months</p>
           <p>Installments Paid: 6</p>
           <p>Status: Active</p>
           <p>Date of Joining: 01-Jan-2024</p>
           <p>Date of Maturity: 01-Jan-2025</p>
       </div>
       <button class="pay-btn">Pay Now</button>
   </div>

   <div class="user-scheme-container" onclick="navigateToSchemeDetails();">
       <div class="user-scheme-info">
           <h4>Scheme Name: Premium Plan</h4>
           <p>Monthly Installments: ₹2000</p>
           <p>Scheme Period: 12 months</p>
           <p>Installments Paid: 6</p>
           <p>Status: Active</p>
           <p>Date of Joining: 01-Jan-2024</p>
           <p>Date of Maturity: 01-Jan-2025</p>
       </div>
       <button class="pay-btn">Pay Now</button>
   </div>


   <script>
       function navigateToSchemeDetails() {
           // Example navigation to a scheme details page or performing an action
           console.log("Navigating to scheme details...");
           // Replace 'url' with the actual URL you want to navigate to
           window.location.href = 'scheme/user-scheme-details';
       }
   </script>


<script>
       document.addEventListener('DOMContentLoaded', () => {
           const slides = document.querySelector('.slides');
           const slideCount = document.querySelectorAll('.slide').length;
           const dots = document.querySelectorAll('.dot');
           let index = 0;

           function updateSlide() {
               slides.style.transform = `translateX(-${index * 100}%)`;
               dots.forEach(dot => dot.classList.remove('active'));
               dots[index].classList.add('active');
           }

           dots.forEach((dot, dotIndex) => {
               dot.addEventListener('click', () => {
                   index = dotIndex;
                   updateSlide();
               });
           });

           const prevBtn = document.querySelector('.slider-prev');
           prevBtn.addEventListener('click', () => {
               index = (index - 1 + slideCount) % slideCount;
               updateSlide();
           });

           const nextBtn = document.querySelector('.slider-next');
           nextBtn.addEventListener('click', () => {
               index = (index + 1) % slideCount;
               updateSlide();
           });
       });
   </script>

   <script>
       document.addEventListener('DOMContentLoaded', function () {
           const alert = document.getElementById('success-alert');
           if (alert) {
               setTimeout(() => {
                   alert.classList.add('alert-hidden');
                   setTimeout(() => {
                       alert.remove();
                   }, 500); // Remove the alert after the fade-out transition
               }, 5000); // 3000ms = 3 seconds
           }
       });
   </script>
</body>-->
