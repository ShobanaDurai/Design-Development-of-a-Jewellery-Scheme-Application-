@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

    <style>
        .privacy {
            margin-left: 250px;
            padding: 40px 20px 20px 20px;
            flex: 1;
            top: 30%;
            max-width: 100%;
            margin: 0 auto;
            margin-top: 30px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .button-container {
            text-align: right;
            margin-top: 10px;
        }

        .btn-update {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-update:hover {
            background-color: #45a049;
        }
    </style>
@endsection

@section('content')

    <div class="content">
        <h2 style="font-size: 1.5rem; color: #333; margin-bottom: 2px; margin-top: 1px; font-weight: bold;">
            Privacy Policy
        </h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('privacy.storeOrUpdate') }}" method="POST">
            @csrf
            <div class="privacy">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Description</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="form-group row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea id="summernote-editor" name="description" class="form-control @error('description') is-invalid @enderror">
                                        {{ old('description', $description->description ?? '') }}
                                    </textarea>

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
                <div class="button-container">
                    <button type="submit" class="btn-update">Update</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote-editor').summernote({
                height: 300,
                placeholder: 'Enter the description here...',
                tabsize: 2,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
