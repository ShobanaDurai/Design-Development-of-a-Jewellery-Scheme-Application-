@extends('admin.layouts.app')

@section('css')

<style>
    .about-container {
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
            About Us
        </h2>
        <div class="about-container">
            <div class="layout-px-spacing">
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                <div class="row layout-top-spacing">
                                    <div class="col-lg-12 layout-spacing">
                                        <form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4 style="margin-bottom: 25px;">About Us Details</h4>
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
                                                                <textarea class="form-control @error('content') is-invalid @enderror"  rows="3" id="content" name="content" required>{{ $aboutUs->content }}</textarea>
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
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Global Offices</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <input type="text" class="form-control  @error('offices') is-invalid @enderror" id="offices" name="offices" placeholder="No of Offices"  value="{{ $aboutUs->offices }}" required>
                                                                @error('offices')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Employees</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <input type="text" class="form-control  @error('employees') is-invalid @enderror" id="employees" name="employees" placeholder="No of Employees" value="{{ $aboutUs->employees }}"  required>
                                                                @error('employees')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                            <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Customers</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                                            <div class="form-group" style="border: solid 1px #333;border-radius:5px;">
                                                                <input type="text" class="form-control  @error('customers') is-invalid @enderror" id="customers" name="customers" placeholder="No of Customers" value="{{ $aboutUs->customers }}"  required>
                                                                @error('customers')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class=" form-group">
                                                                <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                                                @error('description')
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

@section('script')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>


<script>
    CKEDITOR.replace('editor', {
        height: 400,
        // Additional customization options if needed
    });
</script>

@endsection


