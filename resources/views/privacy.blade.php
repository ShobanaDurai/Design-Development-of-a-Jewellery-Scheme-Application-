@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<title>Orna Track | Privacy Policy</title>
<style>
    .privacy-container {
        margin-top: 10%;
        margin-bottom: 5%;
        display: flex;
        justify-content: center;
    }
    .privacy-box {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        width: 80%;
    }
    .privacy-box h1 {
        text-align: center;
    }
    @media (max-width: 1500px) {
        .privacy-container {
            margin-top: 8%;
        }
        .privacy-box {
            width: 90%;
        }
    }

    @media (max-width: 1200px) {
        .privacy-container {
            margin-top: 8%;
        }
        .privacy-box {
            width: 90%;
        }
    }

    @media (max-width: 992px) {
        .privacy-container {
            margin-top: 10%;
        }
    }

    @media (max-width: 768px) {
        .privacy-container {
            margin-top: 12%;
        }
    }

    @media (max-width: 576px) {
        .privacy-container {
            margin-top: 16%;
        }
        .privacy-box {
            width: 95%;
        }
    }
</style>
<body>
    <div class="privacy-container">
        <div class="privacy-box">
            {!! $privacy->description !!}
        </div>
    </div>
</body>
</html>
