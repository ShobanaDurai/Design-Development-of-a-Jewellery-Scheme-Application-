@extends('admin.layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">


<style>
  .gold-container {
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

    .cust-title h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }
    table {

        width: 100%;
        border-collapse: collapse;
        table-layout: auto; /* Ensures table adapts to its container */
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f4f4f4;
    }
    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
            visibility: hidden;
        }
        tr { border: 1px solid #ccc; }
        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            text-align: right;
        }
        td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 10px;
            white-space: nowrap;
            font-weight: bold;
            text-align: left;
        }
    }
</style>
@endsection
@section('content')
    <div class="content">
        <h2 style="font-size: 1.5rem; color: #333; margin-bottom: 10px;margin-top: 1px; font-weight: bold;">
            GoldSavings Scheme
        </h2>
        <div class="gold-container">
            <div class="layout-px-spacing">
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                <div class="row layout-top-spacing">
                                    <div class="col-lg-12 layout-spacing">
                                        <form action="{{ route('admin.gold-savings-scheme.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if(isset($scheme))
                                                <input type="hidden" name="scheme_id" value="{{ $scheme->id }}">
                                            @endif

                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4 style="margin-bottom: 25px;">Scheme Details</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div class="widget-content widget-content-area">
                                                        <div class="form-group row">
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Title</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-9 col-sm-12">
                                                                <div class="form-group" style="border: solid 1px #333;">
                                                                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title"  value="{{ $schemegold->title }}" required>
                                                                    @error('title')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Short Description</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-9 col-sm-12">
                                                                <div class="form-group " style="border: solid 1px #333;">
                                                                    <textarea class="form-control @error('short_description') is-invalid @enderror"  rows="3" id="short_description" name="short_description" required>{{ $schemegold->short_description }}</textarea>
                                                                    @error('short_description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                                <label class="col-form-label" style="font-weight: 600;margin-left:40px;">Image</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-9 col-sm-12">
                                                                <div class="form-group" style="border: solid 1px #333;">
                                                                    <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" id="image" name="image" value="{{ $schemegold->image }}">
                                                                    @error('image')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4 style="margin-bottom: 25px;">Description</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class=" form-group">
                                                                <textarea id="summernote-editor"  name="description" class=" form-control @error('description') is-invalid @enderror">{{ $schemegold->description }}</textarea>

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
                                                <button type="submit" class="btn" style="background-color: #4CAF50; color: white; border: none;">Update</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote-editor').summernote({
                height: 400,
                placeholder: 'Enter the description here...',
                tabsize: 2
            });
        });
    </script>
@endsection
