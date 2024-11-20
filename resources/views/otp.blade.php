@extends('layouts.applink')
<title>OrnaTrack | OTP </title>
@section('css')

<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


<style>
    .otp-container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    max-width: 700px;
    margin: 5% auto;
    display: flex;
    margin-top: 8%;
}

.otp-container .left-section {
    flex: 1;
    background-image: url('{{ asset('images/gold-chain.jpg') }}');
    background-size: cover;
    background-position: center;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.otp-container .right-section {
    flex: 1.5;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.otp-container h2 {
    text-align: center;
    font-size: 1.5rem;
    color: #4A5568;
    margin-bottom: 1rem;
}

.otp-container label {
    font-size: 0.875rem;
    color: #4A5568;
    margin-bottom: 0.5rem;
}

.otp-container p {
    font-size: 14px;
    margin-bottom: 25px;
    color: #666;
}
.otp-inputs {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.otp-inputs input {
    width: 45px;
    height: 45px;
    font-size: 24px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.otp-inputs input:focus {
    border-color: #007bff;
    outline: none;
}
.resend {
    font-size: 12px;
    color: #999;
    text-align: center;
}
.resend span {
    color: #5474B0;
    font-weight: bold;
}
.verify-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 0;
    border: none;
    border-radius: 5px;
    width: 100%;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.verify-btn:hover {
    background-color: #0056b3;
}
#otp-message
{
    margin-top: 10px;
    padding: 10px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

</style>
@endsection
@section('content')

<div class="otp-container">
    <div class="left-section"></div>
    <div class="right-section">
        <!-- Session Status -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <h2>OTP Verification</h2>
        <form action="{{ route('validate.goldotp') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            {{--  <input type="text" name="user_id" value="{{ $user->id }}" readonly>  --}}

            <p class="text-center mt-3 mb-3 font-16">One Time Password (OTP) has been sent via SMS</p>
            <p class="text-center text-muted mt-3 mb-3 font-12">Enter the OTP below to verify it.</p>

            <div class="otp-inputs">
                <input type="text" maxlength="1" oninput="moveToNext(this, 'otp2')" onkeydown="moveToPrevious(event, 'otp1')" id="otp1" name="otp[]" required>
                <input type="text" maxlength="1" oninput="moveToNext(this, 'otp3')" onkeydown="moveToPrevious(event, 'otp1')" id="otp2" name="otp[]" required>
                <input type="text" maxlength="1" oninput="moveToNext(this, 'otp4')" onkeydown="moveToPrevious(event, 'otp2')" id="otp3" name="otp[]" required>
                <input type="text" maxlength="1" onkeydown="moveToPrevious(event, 'otp3')" id="otp4" name="otp[]" required>
            </div>

            <div class="resend">
                <a href="#" id="resend-otp-link">Resend OTP</a>
            </div>

            <div id="otp-message" class="alert" style="display: none;"></div>

            <div class="login-one-inputs mt-4 d-flex justify-content-end">
                <button class="ripple-button ripple-button-primary btn-sm btn-login" type="submit" style="background-color: black; color: white;">
                    <div class="ripple-ripple js-ripple">
                        <span class="ripple-ripple__circle"></span>
                    </div>
                    Verify OTP
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function moveToNext(current, nextFieldID) {
        if (current.value.length >= 1) {
            document.getElementById(nextFieldID).focus();
        }
    }

    function moveToPrevious(event, prevFieldID) {
        // Check if the pressed key is 'Backspace' and if the current field is empty
        if (event.key === "Backspace" && event.target.value === "") {
            document.getElementById(prevFieldID).focus();
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="user_id" content="{{ $user->id }}">

<script>
    document.getElementById('resend-otp-link').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default anchor behavior

        // Hide any previous messages
        const messageContainer = document.getElementById('otp-message');
        messageContainer.style.display = 'none';

        // Assuming you have a way to get the user_id
        const userId = document.querySelector('meta[name="user_id"]').getAttribute('content'); // Example of getting user_id

        fetch('/resend-otp', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ user_id: userId }) // Pass user_id in the request payload
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageContainer.textContent = 'OTP has been resent successfully!';
                messageContainer.className = 'alert alert-success'; // Style as success
            } else {
                messageContainer.textContent = 'Failed to resend OTP. Please try again.';
                messageContainer.className = 'alert alert-danger'; // Style as error
            }
            messageContainer.style.display = 'block'; // Show the message

            // Hide the message after 5 seconds
            setTimeout(() => {
                messageContainer.style.display = 'none';
            }, 4000);
        })
        .catch(error => {
            console.error('Error:', error);
            messageContainer.textContent = 'An error occurred. Please try again later.';
            messageContainer.className = 'alert alert-danger';
            messageContainer.style.display = 'block';

            // Hide the message after 5 seconds
            setTimeout(() => {
                messageContainer.style.display = 'none';
            }, 4000);
        });
    });


</script>


@endsection

