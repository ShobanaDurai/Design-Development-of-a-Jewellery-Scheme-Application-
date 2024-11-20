@extends('layouts.applink')

@section('title','Contact Us')
@section('css')
    <style>
        .border-middle {
            position: relative;
        }

        .border-middle::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: calc(50% - 1px); /* Adjust the position of the border */
            border-left: 2px solid grey; /* Adjust border properties */
        }
        .border-middl {
            position: relative;
        }

        .border-middl::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: calc(55% - 1px); /* Adjust the position of the border */
            border-left: 2px solid grey; /* Adjust border properties */
        }
        @media (max-width: 768px) {
            .border-middle::after {
                display: none; /* Hide the border on mobile screens */
            }
        }
        @media (max-width: 768px) {
            .border-middl::after {
                display: none; /* Hide the border on mobile screens */
            }
        }
        .bgImo {
            background: url('images/contact2.webp') center center / cover no-repeat;
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
            font-size: 9rem;
            font-weight: 50px;
            color: white;

        }


    </style>
@endsection

@section('content')

    <section>
        <div class="bgImo">
            <div class="hding">
                <h1>Contact Us</h1>
            </div>
        </div>
    </section>

    <section class="contc">
        <div class="container" style="margin-top: 20px;margin-bottom: 30px;">
            <div class="row">
                <!-- Contact Information Column -->
                <div class="col-md-6">
                    <h2>Contact Aurora Jewels</h2>
                    <p>{{ $contact->content }}</p>
                    <div class="col-12 col-md-6">
                        <p class="mb-0" style="font-weight: bold;">Headquarters</p>
                        <p>{{ $contact->headquarters }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="mb-0" style="font-weight: bold;">Customer Care</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i>   Call {{ $contact->contact_number }}<br><i class="fa fa-envelope"></i>   {{ $contact->email }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="mb-0" style="font-weight: bold;">Hours of Availability</p>
                        <p>
                            Mon-Fri:{{ date('h:i A', strtotime($contact->monday_friday_open)) }} - {{ date('h:i A', strtotime($contact->monday_friday_close)) }}<br>
                            Weekends:{{ date('h:i A', strtotime($contact->weekend_open)) }} - {{ date('h:i A', strtotime($contact->weekend_close)) }}
                        </p>

                    </div>

                </div>

                <!-- Map Column -->
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item"
                                src="{{ $contact->map }}"
                                width="100%" height="50%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>


                </div>
            </div>
        </div>


    </section>

