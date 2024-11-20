@extends('layouts.applink')
@section('title','OrnaTrack | Terms and Conditions')
<style>
    .terms-container {
        margin-top: 10%;
        display: flex;
        margin-bottom: 5%;
        justify-content: center;
    }
    .terms-box {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        width: 80%;
    }
    .terms-box h1 {
        text-align: center;
    }
    @media (max-width: 1500px) {
        .terms-container {
            margin-top: 8%;
        }
        .terms-box {
            width: 90%;
        }
    }

    @media (max-width: 1200px) {
        .terms-container {
            margin-top: 8%;
        }
        .terms-box {
            width: 90%;
        }
    }

    @media (max-width: 992px) {
        .terms-container {
            margin-top: 10%;
        }
    }

    @media (max-width: 768px) {
        .terms-container {
            margin-top: 12%;
        }
    }

    @media (max-width: 576px) {
        .terms-container {
            margin-top: 16%;
        }
        .terms-box {
            width: 95%;
        }
    }
</style>
<body>
    <div class="terms-container">
        <div class="terms-box">
            {!! $terms->description !!}

        </div>
    </div>
</body>
