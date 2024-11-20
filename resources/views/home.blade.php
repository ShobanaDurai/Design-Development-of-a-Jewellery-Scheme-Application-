@extends('layouts.applink')
@section('title', 'Home')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .info_links_menu a {
    display: block;
    padding: 5px 0;
    color: #000;
    font-size:15px;
    text-decoration: none;
    position: relative;
    padding-left: 20px;
    transition: color 0.3s ease, transform 0.3s ease;
}
.info_links_menu a::before {
    content: "▶";
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    transition: transform 0.3s ease;
}
.info_links_menu a:hover::before {
    transform: translateY(-50%) translateX(5px);
}
.info_links_menu a:hover {
    color: #f39c12;
    transform: translateX(5px);
}
a {
    display: block;
    color: #000;
    text-decoration: none;
    font-size: 16px;
}

a i {
    font-size: 24px;
    margin-right: 10px;
    vertical-align: middle;
}
a span {
    font-weight: bold;
}
a address {
    font-style: normal;
    line-height: 1.5;
    margin-top: 5px;
    margin-left: 34px;
    font-size: 14px;
}
.testimonial-wrapper {
    overflow-x: scroll;
    white-space: nowrap;
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.testimonial-wrapper::-webkit-scrollbar {
    display: none;
}
.testimonial-box {
    flex: 0 0 auto;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    border-radius: 10px;
    padding: 15px;
    overflow: hidden;
    box-sizing: border-box;
}
.client-review {
    margin-top: 10px;
    font-style: italic;
    white-space: normal;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.client-review p {
    margin: 0;
}
.rating-stars i {
    font-size: 2rem;
    color: #e0e0e0;
}
.rating-stars i.active {
    color: #f5c518;
}
.feedback-card {
    max-width: 1100px;
    margin: 20px auto;
    bottom: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.rating-stars {
    display: flex;
    cursor: pointer;
}
.rating-stars i {
    font-size: 24px;
    color: #d3d3d3;
    transition: color 0.2s ease;
}
.rating-stars i.filled {
    color: #ffd700;
}

.swal2-popup {
    font-size: 13px;
    padding: 10px;
    width: 250px;
    max-width: 100%;
    box-shadow: none;
}
.rating {
    color: gold;
}

.rating .fa-star {
    font-size: 16px;
}

.rating .fa-star-o {
    color: #ddd;
}
</style>
@endsection
@section('content')
<!-- slider section -->
<section class="slider_section position-relative">
    <div class="slider_bg_box">
        <img src="{{ asset('images/woman-accessories.jpg') }}" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-8">
                <div class="detail-box">
                    <h1>
                        Aurora Jewellery
                        <br> Collection
                    </h1>
                    <p>
                        The Aurora Jewellery offers a seamless shopping experience with its elegant design and intuitive navigation, ensuring customers find the perfect piece effortlessly. Featuring a wide range of exquisite jewellery collections, it combines beauty with functionality for a delightful shopping journey.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end slider section -->
<!-- testimonial section -->
<section class="testimonial_section">
    <div class="container">
        <div class="heading_container text-center p-4">
            <h2>Testimonials</h2>
        </div>
        <div class="testimonial-wrapper">
            @if($feedback->isEmpty())
                <p>No feedback available.</p>
            @else
                <div class="testimonial-container d-flex flex-nowrap">
                    <!-- Testimonial 1 -->
                    @foreach($feedback as $feedbacks)
                        <div class="testimonial-box p-3 m-3">
                            <div class="client-info">
                                <h5 class="mt-3">{{ $feedbacks-> name }}</h5>
                            </div>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star{{ $feedbacks->rating >= $i ? '' : '-o' }}"></i>
                                @endfor
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $feedbacks->rating }} /5 ratings
                            </div>
                            <div class="client-review">
                                <p>"{{ $feedbacks-> thoughts}}"</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
<!-- end testimonial section -->
<!-- feedback section -->
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500,
                customClass: {
                    popup: 'custom-alert-popup'
                }
            });
        });
    </script>
@endif
<section class="feedback_section">
    <div class="container">
        <div class="heading_container text-center p-4">
            <h2> Share Your Feedback </h2>
        </div>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="feedback-container">
                <div class="card feedback-card p-4">
                    <div class="card-body">
                        <p class="card-text">We value your opinion! Please let us know about your experience with Aurora Jewels.!!😄</p>

                        <div class="rating-stars mb-3" id="rating-stars">
                            <i class="fa fa-star" data-value="1"></i>
                            <i class="fa fa-star" data-value="2"></i>
                            <i class="fa fa-star" data-value="3"></i>
                            <i class="fa fa-star" data-value="4"></i>
                            <i class="fa fa-star" data-value="5"></i>
                        </div>
                        <input type="hidden" id="rating" name="rating" value="0">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="occupation" class="form-label">Profession</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your profession" required>
                        </div>
                        <div class="mb-3">
                            <label for="thoughts" class="form-label">Share your thoughts</label>
                            <textarea class="form-control" id="thoughts" name="thoughts" rows="3" placeholder="Share your thoughts..." required></textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn" style="background-color: #0e0101; color: white; border-radius:15px;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- end feedback section -->
<!-- info section -->
<section class="info_section layout_padding2">
    <div class="container">
        <div class="row info_main_row">
            <!-- Introduction Section -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="info_detail" style="font-weight: 100;font-size:15px;">
                    <h4>App Intro</h4>
                    <p class="mb-0">OrnaTrack, simplifies gold savings by allowing customers to easily track and manage their gold investment schemes. With secure payments, real-time tracking, and convenient access to account details, OrnaTrack makes investing in gold effortless and rewarding.</p>
                </div>
            </div>
            <!-- Quick Links Section -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="info_links">
                    <h4>Quick Links</h4>
                    <div class="info_links_menu">
                        <a href="{{ route('about') }}">About</a>
                        <a href="{{ route('contact') }}">Contact Us</a>
                        <a href="{{ route('faq') }}">FAQ</a>
                        <a href="{{ route('schemes') }}">Schemes</a>
                        <a href="{{ route('condition.show') }}">Terms & Conditions</a>
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                    </div>
                </div>
            </div>
            <!-- Contact Information Section -->
            <div class="col-12 col-md-6 col-lg-3">
                <h4 style="margin-bottom: 20px;">Contact Us</h4>
                <div class="info_contact">
                    <a href="#">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span style="font-weight: 100;font-size:14px;">Call +01 1234567890</span>
                    </a>
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span style="font-weight: 100;font-size:14px;">AuroraJewels@gmail.com</span>
                    </a>
                    <a href="#">
                        <i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 18px;"></i>
                        <span style="font-weight: 100; font-size: 14px;">1234 Golden Crescent, Silver Street, Townhall, Coimbatore - 641001, Tamil Nadu, India</span>
                    </a>
                </div>
            </div>
            <!-- CopyRights Section -->
            <div class="col-12 col-md-6 col-lg-3">
                <h4 style="margin-bottom: 20px;">CopyRights</h4>
                <div class="info_contact">
                    <p style="font-weight: 100;font-size:14px;">&copy; 2024 Aurora Jewels. All rights reserved.</p>
                    <p style="font-weight: 100;font-size:14px;">Designed and developed by Aurora Jewels Tech Team.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end info_section -->
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#rating-stars i');
        const ratingInput = document.getElementById('rating');
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = parseInt(this.getAttribute('data-value'));
                ratingInput.value = value;
                stars.forEach(star => {
                    if (parseInt(star.getAttribute('data-value')) <= value) {
                        star.classList.add('filled');
                    } else {
                        star.classList.remove('filled');
                    }
                });
            });
        });
    });
</script>
@endsection

