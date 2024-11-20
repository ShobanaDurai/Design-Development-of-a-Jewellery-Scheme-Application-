@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<title>OrnaTrack | Gold Savings Scheme</title>
<style>
.scheme1-info{
    padding:20px;
}
.scheme1-info h2,
.scheme1-info h3 {
    margin-top: 0; /* Reset default margins */
    margin-bottom: 10px; /* Add some space below headings */
}
.scheme1-info h2{
    font-size:2rem;
    font-weight: bold;
}
.button-container {
    display: flex;
    justify-content: center; /* Center aligns horizontally */
    align-items: center; /* Center aligns vertically */
    padding: 20px; /* Adjust padding as needed */
}

.faq-container {
    max-width: 100%;
    margin: 0 auto;

}
.faq {
    border-bottom: 1px solid #ddd;
}
.faq-question {
    cursor: pointer;
    padding: 15px;
    background: #f9f9f9;
    transition: background 0.3s ease;
}

.faq-question h4 {
    margin: 0;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    background: #fff;
    padding: 0 15px;
}

.faq-question:hover {
    background: #eee;
}

.faq.active .faq-answer {
    max-height: 200px; /* Adjust based on content */
    padding: 15px;
}


.join-button {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid #fd9c6b;
    border-radius: 5px;
    color: #fd9c6b;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.join-button:hover,
.join-button:focus {
    background-color:#fd9c6b ;
    color: white;
}

</style>

<section class="slider_section position-relative">
  <div class="slider_bg_box">
    <img src="{{ asset('images/gold-scheme-1.jpg') }}" alt="">
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
                        Aurora Jewellery offers a seamless investment experience with its elegant design , ensuring customers find the perfect plan effortlessly.
                        <br>We blend beauty with functionality, offering a delightful journey through our variety of schemes.
                        </p>
                        <div>
                            @auth
                                <a href="{{ route('gold-reg') }}" class="slider-link">Join Now</a>
                            @else
                                <a href="{{ route('register') }}?origin=gold-reg" class="slider-link">Register for Gold Savings</a>
                            @endauth
                            {{--  <a href="{{ route('user') }}" class="slider-link">Pay Now</a>  --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
    <div class="scheme1-info">
        {!! $schemegold->description !!}
    </div>

    <div>
        <h3 >Frequently Asked Questions</h3>
        <div class="faq-container">
            <div class="faq">
                <div class="faq-question">
                    <h6>What is the minimum contribution? </h6>
                </div>
                <div class="faq-answer">
                    <p>The minimum contribution is ₹100.</p>
                </div>
            </div>
            <div class="faq">
                <div class="faq-question">
                    <h6>How are the gold prices calculated? </h6>
                </div>
                <div class="faq-answer">
                    <p>The gold price is based on the market rate at the time of each payment.</p>
                </div>
            </div>

            <div class="faq">
                <div class="faq-question">
                    <h6>How can I make contributions? </h6>
                </div>
                <div class="faq-answer">
                    <p>Contributions can be made online through our portal or at our physical branches.</p>
                </div>
            </div>
            <div class="faq">
                <div class="faq-question">
                    <h6>Can I withdraw my savings early? </h6>
                </div>
                <div class="faq-answer">
                    <p>Early withdrawal is possible but may incur a penalty and affect the total savings.</p>
                </div>
            </div>
            <div class="faq">
                <div class="faq-question">
                    <h6>Are there any additional charges? </h6>
                </div>
                <div class="faq-answer">
                    <p>No, there are no hidden charges. However, there may be nominal transaction fees.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="button-container">
        <a href="{{route('gold-reg')}}" class="join-button">Join Now</a>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const faqs = document.querySelectorAll('.faq');

    faqs.forEach(faq => {
        faq.addEventListener('click', () => {
            // Close all other open FAQs
            faqs.forEach(item => {
                if (item !== faq) {
                    item.classList.remove('active');
                    item.querySelector('.faq-answer').style.maxHeight = null;
                }
            });

            // Toggle the current FAQ
            faq.classList.toggle('active');
            const answer = faq.querySelector('.faq-answer');
            if (faq.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
            } else {
                answer.style.maxHeight = null;
            }
        });
    });
});

</script>
