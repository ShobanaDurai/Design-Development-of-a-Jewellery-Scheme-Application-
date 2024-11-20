@extends('layouts.applink')
<title>OrnaTrack | Schemes</title>

<style>
    .info-section {
    background-color: #fff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0px 2px rgba(0, 0, 0, 0.1);
}

.info-content {
    display: flex;
    align-items: center;
}

.info-left {
    flex: 1;
    padding-right: 20px;

}

.info-right {
    flex: 2;
}

.scheme-title {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 15px;

}

.info-right p {
    font-size: 1.1rem;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .info-content {
        flex-direction: column;
        text-align: center;
    }

    .info-left {
        padding-right: 0;
        padding-bottom: 20px;
    }
    .card-container {
        justify-content: center;
    }
}

.scheme-list {
    font-size: 3rem;
    font-weight: bold;
    text-align: center;
}

.card-section {
    display: flex;
    justify-content: center;
    margin: 20px;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 140px;

}

.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 400px;
}

.card img {
    width: 100%;
    height: auto;
    display: block;
    border-bottom: 1px solid #ddd;
}

.card-content {
    padding: 20px;
}

.card-content h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.card-content p {
    font-size: 14px;
    color: #666;
    margin-bottom: 15px;
}

.read-more {
    display: inline-block;
    background-color: #fd9c6b;
    color: #fff;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.read-more:hover {
    border: 1px solid #fd9c6f;
    background-color: transparent;
    color: #fd9c6f;
}
</style>

@section('content')
<body>
<section class="info-section">
    <div class="info-content">
        <div class="info-left">
            <img src="{{ asset('images/necklace.jpg') }}" alt="Scheme Image" style="width: 100%; max-width: 400px;margin-top:18%">
        </div>
        <div class="info-right">
            <h1 class="scheme-title" style="margin-top: 8%;">Schemes</h1>
            <p>Aurora Jewellery offers a gold savings scheme designed to help customers accumulate gold systematically. Participants can invest in gold through regular installments, receiving certificates of their holdings. These certificates can be redeemed for physical gold or jewelry, or sold back to the company at market rates. This scheme appeals to investors seeking a stable investment in gold, providing a hedge against inflation and offering discounts on future purchases. It's a popular choice among customers looking to build their gold portfolio while enjoying the beauty of Aurora's jewelry craftsmanship.</p>
        </div>
    </div>
</section>

<h1 class="scheme-list">Schemes List</h1>
    <section class="card-section">
        <div class="card-container">
            <div class="card">
                <img src="{{ asset('images/coins-overflow.jpg') }}" alt="Card Image">
                <div class="card-content">
                    <h3>{{ $schemegold->title }}</h3>
                    <p>{{ $schemegold->short_description }}</p>
                    <a href="{{route('gold-savings')}}" class="read-more">Read More</a>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/gold-bar.jpg') }}" alt="Card Image">
                <div class="card-content">
                    <h3>{{ $schemewealth->title }}</h3>
                    <p>{{ $schemewealth->short_description }}</p>
                    <a href="{{route('wealth-treasure')}}" class="read-more">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!--<script src="scripts.js"></script>  Replace with your JavaScript file -->
</body>

@endsection
