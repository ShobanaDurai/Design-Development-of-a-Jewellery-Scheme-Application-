<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />

  <title> @yield('title')</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <!-- font awesome style -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    #scrollTopBtn {
        display: none;
        position: fixed;
        bottom: 60px;
        right: 10px;
        z-index: 99;
        font-size: 20px;
        background: linear-gradient(135deg, #6f6f6f, #1f1e1e);
        color: white;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px;
        height: 8vh;
        width: 3%;
        border-radius: 5px;
        transition: background 0.3s ease;
    }
    #scrollTopBtn:hover {
        background: linear-gradient(135deg, #5a5a5a, #0e0e0e);
    }
  </style>
 @yield('css')
</head>
<body>

    <button id="scrollTopBtn" title="Go to top">↑</button>
    <!-- jQery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @include('profile.partials.header')
    @yield('content')

</body>

  <script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        const scrollTopBtn = document.getElementById("scrollTopBtn");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopBtn.style.display = "block";
        } else {
            scrollTopBtn.style.display = "none";
        }
    }
    document.getElementById("scrollTopBtn").addEventListener("click", function() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
</script>
@yield('script')
@include('profile.partials.footer')
</html>
