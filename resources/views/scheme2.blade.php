@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
  <title> OrnaTrack | Wealth Treasure Scheme </title>
<style>
.scheme2-info{
    padding:20px;
}
.scheme2-info h2,
.scheme2-info h3 {
    margin-top: 0;
    margin-bottom: 10px;
}
.scheme2-info h2{
    font-size:2rem;
    font-weight: bold;
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
.button-container {
    display: flex;

    justify-content: center; /* Center aligns horizontally */
    align-items: center; /* Center aligns vertically */
    padding: 20px; /* Adjust padding as needed */
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
<!-- slider section -->
<section class="slider_section position-relative">
  <div class="slider_bg_box">
    <img src="{{ asset('images/necklace-ethnic.avif') }}" alt="">
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
                                <a href="{{ route('wealth-reg') }}" class="slider-link">Join Now</a>
                            @else
                                <a href="{{ route('register') }}?origin=wealth-reg" class="slider-link">Register for Wealth Treasure</a>
                            @endauth
                            {{--  <a href="{{ route('login') }}" class="slider-link">Pay Now</a>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <div class="scheme2-info">
        {!! $schemewealth->description !!}
    </div>
    <div>
        <h3 >Frequently Asked Questions</h3>
        <div class="faq-container">
            <div class="faq">
                <div class="faq-question">
                    <h6>How do I participate in the scheme?</h6>
                </div>
                <div class="faq-answer">
                    <p>You can join the scheme by registering online through our portal or by visiting any of our branches. You will need to commit to making fixed monthly contributions for the duration of the scheme.</p>
                </div>
            </div>
            <div class="faq">
                <div class="faq-question">
                    <h6>How are the monthly contributions converted into gold?</h6>
                </div>
                <div class="faq-answer">
                    <p>Your monthly contributions are accumulated and converted into gold equivalent at the prevailing market rate at the end of the savings period.</p>
                </div>
            </div>

            <div class="faq">
                <div class="faq-question">
                    <h6>Can I change my monthly contribution amount?</h6>
                </div>
                <div class="faq-answer">
                    <p>No, the monthly contribution amount is fixed for the duration of the scheme to ensure disciplined savings.</p>
                </div>
            </div>
            <div class="faq">
                <div class="faq-question">
                    <h6>What happens if I miss a payment?</h6>
                </div>
                <div class="faq-answer">
                    <p>You can catch up on missed payments, but it may affect the total savings and benefits. It's important to stay consistent with your contributions.</p>
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
        <a href="{{route('wealth-reg')}}" class="join-button">Join Now</a>
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
<!-- end slider section -->
