@extends('admin.layouts.app')

@section('css')

<style>
    .contact-container {
        margin-left: 250px;
        padding: 40px 20px 20px 20px;
        flex: 1;
        top: 30%;
        max-width: 100%;
        margin: 0 auto;
        margin-top: 30px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* Add box shadow */
    }
</style>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content">
        <h2 style="font-size: 1.5rem; color: #333; margin-bottom: 10px;margin-top: 1px; font-weight: bold;">
            Contact Details
        </h2>
        <div class="contact-container">
            <div class="layout-px-spacing">
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                <div class="row layout-top-spacing">
                                    <div class="col-lg-12 layout-spacing">
                                        <form action="{{ route('admin.contact.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4 style="margin-bottom: 25px;">Contact Content</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="widget-content widget-content-area">
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Content</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="form-group " style="border: solid 1px #333;border-radius:5px;">
                                                                <textarea class="form-control @error('content') is-invalid @enderror"  rows="3" id="content" name="content" required>{{ $contact->content}}</textarea>
                                                                @error('content')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Add Map</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <input type="text" class="form-control  @error('map') is-invalid @enderror" id="map" name="map" placeholder="Add Map"  value="{{ $contact->map}}"  required>
                                                                @error('map')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Head Quarters</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <input type="text" class="form-control  @error('headquarters') is-invalid @enderror" id="headquarters" name="headquarters" placeholder="Headquarters" value="{{ $contact->headquarters}}"  required>
                                                                @error('headquarters')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Customer Care</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <!-- Phone Number -->
                                                            <div class="form-group" style="border: solid 1px #333; margin-bottom: 15px;border-radius:5px;">
                                                                <label for="contact_number" style="font-weight: 600; margin-left: 15px;margin-top:10px;">Contact Number:</label>
                                                                <div class="d-flex justify-content-between" style="margin: 0 15px;margin-bottom:10px;border: solid 1px #b1b1b1;border-radius:10px; ">
                                                                    <input type="tel" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" placeholder="Enter Contact Number" value="{{ $contact->contact_number}}"  required>
                                                                </div>
                                                                @error('contact_number')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <!-- Email ID -->
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <label for="email" style="font-weight: 600; margin-left: 15px;margin-top:10px;">Email ID:</label>
                                                                <div class="d-flex justify-content-between" style="margin: 0 15px;margin-bottom:10px;border: solid 1px #b1b1b1;border-radius:10px; ">
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email ID" value="{{ $contact->email}}" required>
                                                                </div>
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600; margin-left:40px;">Availability Hours</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <!-- Monday to Friday -->
                                                            <div class="form-group" style="border: solid 1px #333; margin-bottom: 15px;border-radius:5px;">
                                                                <label for="monday_friday" style="font-weight: 600; margin-left: 15px;margin-top:10px;">Monday to Friday:</label>
                                                                <div class="d-flex justify-content-between" style="margin: 0 15px;margin-bottom:10px;border: solid 1px #b1b1b1; border-radius:10px;">
                                                                    <input type="time" class="form-control @error('monday_friday_open') is-invalid @enderror" id="monday_friday_open" name="monday_friday_open" value="{{ $contact->monday_friday_open}}" required>
                                                                    <span style="align-self: center;">to</span>
                                                                    <input type="time" class="form-control @error('monday_friday_close') is-invalid @enderror" id="monday_friday_close" name="monday_friday_close" value="{{ $contact->monday_friday_close}}" required>
                                                                </div>
                                                                @error('monday_friday_open')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                @error('monday_friday_close')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <!-- Weekends -->
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <label for="weekend" style="font-weight: 600; margin-left: 15px;margin-top:10px;">Weekends:</label>
                                                                <div class="d-flex justify-content-between" style="margin: 0 15px;margin-bottom:10px;border: solid 1px #b1b1b1;border-radius:10px;">
                                                                    <input type="time" class="form-control @error('weekend_open') is-invalid @enderror" id="weekend_open" name="weekend_open" value="{{ $contact->weekend_open}}">
                                                                    <span style="align-self: center;">to</span>
                                                                    <input type="time" class="form-control @error('weekend_close') is-invalid @enderror" id="weekend_close" name="weekend_close" value="{{ $contact->weekend_close}}">
                                                                </div>
                                                                @error('weekend_open')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                @error('weekend_close')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-footer" style="text-align: right;">
                                                <button type="submit" class="btn" style="background-color: #4CAF50; color: white; border: none;margin-right:20px;">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
