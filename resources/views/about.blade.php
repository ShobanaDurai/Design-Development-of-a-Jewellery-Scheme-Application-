@extends('layouts.applink')
@section('title', 'About Us')
@section('css')
<style>
    .hero-section {
        background-color: #ffffff;
        color: black;
        padding: 50px 0;
        text-align: left;
        margin-top: 20px;
    }
    .hero-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }
    .hero-section p {
        font-size: 1.2rem;
    }
    .stat-box {
        background-color: white;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 20px;
        margin: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .stat-box:hover {
        transform: translateY(-5px);
    }
    .stat-box .icons {
        width: 90px;
        height: auto;
        margin-bottom: 15px;
    }
    .stat-box .numbers {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #0d6efd;
    }
    .stat-box .learn-more:hover {
        text-decoration: underline;
    }
    .stat-box .stat-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .stats-section {
        padding: 40px;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section d-flex align-items-center justify-content-between">
    <div>
        <h2 style="margin-left: 20px;">About Us</h2>
        <p style="margin-left: 20px; font-size:16px;">{{ $aboutUs->content }}</p>
    </div>
    <div>
        <img src="{{ asset('images/about1.webp') }}" alt="About Us Image" class="img-fluid" style="max-width: 500px; margin-right: 90px;">
    </div>
</div>
<!-- Stats Section -->
<h2 style="text-align: center;font-weight:600;margin-bottom:0;">HubSpot By Numbers</h2>
<div class="stats-section row justify-content-center">
    <div class="col-md-3 stat-box text-center">
        <div class="stat-content">
            <img src={{ asset('images/global2.jpg') }}   class="icons" alt="Global Offices">
            <p class="numbers">{{ $aboutUs->offices }} Global Offices</p>
        </div>
    </div>
    <div class="col-md-3 stat-box text-center">
        <div class="stat-content">
            <img src={{ asset('images/employee.png') }}  class="icons" alt="Employees">
            <p class="numbers">{{ $aboutUs->employees }}+ Employees</p>
        </div>
    </div>
    <div class="col-md-3 stat-box text-center">
        <div class="stat-content">
            <img src={{ asset('images/people1.png') }} class="icons" alt="Customers">
            <p class="numbers">{{ $aboutUs->customers }}+ Customers</p>
        </div>
    </div>
</div>
@endsection


