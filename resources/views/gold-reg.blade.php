@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<head>
    <title>OrnaTrack | Gold Savings Scheme Registration</title>

    <style>
        .form-container {
            max-width: 1000px;
            margin: 10%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .jointitle{
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .checkbox-inline {
        display: flex;
        align-items: center;
        }
        .form-group input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }
        .form-group .terms-link {
            color: #007bff;
            text-decoration: none;
        }
        .form-group .terms-link:hover {
            text-decoration: underline;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary:disabled {
            background-color: #ddd;
        }
        .joinsubmit{
            text-align: center;
        }
        @media (max-width: 1200px) {
            .form-container {
                margin: 5%;
                padding: 15px;
                margin-top:15%;
            }
        }
        @media (max-width: 992px) {
            .form-container {
                margin: 5%;
                padding: 15px;
                margin-top:15%;
            }
        }
        @media (max-width: 768px) {
            .form-container {
                margin: 5%;
                padding: 10px;
                margin-top:20%;
            }
        }
        @media (max-width: 576px) {
            .form-container {
                margin: 5%;
                padding: 10px;
                margin-top:20%;
            }
            .form-group label {
                margin-bottom: 3px;
            }
            .form-group input,
            .form-group textarea,
            .form-group select {
                padding: 8px;
            }
            .btn-primary {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="jointitle">Gold Savings Scheme Registration Form</h2>
            <form action="{{ route('gold-reg.store') }}" method="POST" id="goldsavingsregistrationForm" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="name">Name: <span style="color: red;">*</span></label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number: <span style="color: red;">*</span></label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address: <span style="color: red;">*</span></label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="state">State: <span style="color: red;">*</span></label>
                    <input type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="pincode">Pin Code: <span style="color: red;">*</span></label>
                    <input type="text" id="pincode" name="pincode" required>
                </div>
                <div class="form-group">
                    <label for="state">Country: <span style="color: red;">*</span></label>
                    <input type="text" id="country" name="country" required>
                </div>
                <div class="form-group">
                    <label for="state">Nominee Name: <span style="color: red;">*</span></label>
                    <input type="text" id="nominee" name="nominee" required>
                </div>

                <div class="form-group">
                    <label for="aadhaar">Aadhaar Card Photo: <span style="color: red;">*</span></label>
                    <input type="file" id="aadhaar" name="aadhaar" accept="image/*" required>
                </div>
                <div class="form-group checkbox-inline">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I accept the <a href="{{route('condition.show') }}" class="terms-link">Terms and Conditions</a></label>
                </div>
                <div class="joinsubmit">
                    <button type="submit" class="btn-primary" id="submitBtn" disabled>Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('terms').addEventListener('change', function() {
            document.getElementById('submitBtn').disabled = !this.checked;
        });
    </script>
</body>

