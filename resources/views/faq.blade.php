@extends('layouts.applink')

@section('title','FAQ')
@section('css')
    <style>
        accordion-button:not(.collapsed) {
            background-color: #FFFFFF;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
        }
        #backgroundContainer {
            background-image: none !important;
            background-color: black !important;
            width: 100%;
            height: 60vh;
            background-size: cover;
            background-position: center;
        }
        .bgImo {
            background: url('images/faq4.jpg') center center / cover no-repeat;
            width: 100%;
            height: 70vh;
            margin: 0;
            padding: 0;
            box-sizing: 0;
            display: flex;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .hding{
            font-size: 10rem;
            font-weight: 50px;
            color: white;
            margin-left: -90px;
        }

        .faq-container {
            background-color: #EBE7E1;
            max-width: 98%;
            margin: 10px auto;
            padding: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;

        }
        .faq {
            border-bottom: 1px solid #ddd;
        }
        .faq-question {
            cursor: pointer;
            padding: 15px;
            background: #EBE7E1;
            transition: background 0.3s ease;
        }

        .faq-question h4 {
            margin: 0;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: #f9f9f9;
            padding: 0 15px;
        }

        .faq-question:hover {
            background: #eee;
        }

        .faq.active .faq-answer {
            max-height: 200px; /* Adjust based on content */
            padding: 15px;
        }

    </style>
@endsection

@section('content')
    <section>
        <div class="bgImo">
            <div class="hding">
                <h1>FAQ</h1>
            </div>
        </div>
    </section>
    <section>

        <div class="all-faqs">
            <div class="faq-container">
                @foreach($faqs as $key=>$faq)
                    <div class="faq">
                        <div class="faq-question">
                            <h6>{{$faq->question}}</h6>
                        </div>
                        <div class="faq-answer">
                            <p> {{$faq->answer}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection

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
