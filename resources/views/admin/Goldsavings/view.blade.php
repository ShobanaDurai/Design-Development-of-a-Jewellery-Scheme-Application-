@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .gold-reg {
        margin-left: 250px;
        padding: 40px 20px 20px 20px;
        flex: 1;
        top: 30%;
        max-width: 100%;
        margin: 0 auto;
        margin-top: 50px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* Add box shadow */
    }
</style>
@endsection

@section('content')
    <div class="content">
        <h2 style="font-size: 1.5rem; color: #333; margin-bottom: 2px;margin-top: 1px; font-weight: bold;">
            Gold Savings Customer
        </h2>
        <div class="gold-reg">
            {{--  <h4 class="me-3">Customer Details</h4>  --}}
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Name</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="{{ $golddetail->name }}" style="border-color: #9fa2a5; border-width: 1px; color: black;font-size:14px;" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label " style="font-weight: bold; margin-left:40px;">ID</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id" placeholder="ID" required value={{ $golddetail->id }} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">User ID</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User Id" required value={{ $golddetail->user_id }} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;"readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Email</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required value={{ $golddetail->email }} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Address</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control"  rows="3" id="address" name="address"  required style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;" readonly>{{ $golddetail->address}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">State</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required value={{ $golddetail->state }} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Pincode</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required value={{ $golddetail->pincode }} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;"readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Country</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" required value={{ $golddetail->country }} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;"readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Nominee</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nominee" name="nominee" placeholder="Nominee" required value={{ $golddetail->nominee}} style="border-color: #9fa2a5; border-width: 1px;color: black;font-size:14px;"readonly>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                    <label class="col-form-label" style="font-weight: bold; margin-left:40px;">Image</label>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="form-group" >
                        {{--  <!-- Display existing image -->
                        @if($blog->image)
                            <div class="mb-3">
                                <img src="{{uploaded_asset($blog->image)}}" alt="Blog Image" class="img-thumbnail" style="width:100px;">
                            </div>
                        @endif
                        <!-- File input for new image -->
                        <input type="file" class="form-control" accept="image/*" id="image" name="image">  --}}
                    </div>
                </div>


        </div>
    </div>

@endsection







