@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<title>Orna Track | User Page</title>
@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.userpage-container {
    display: flex;
    height: 100vh;
}
.sidebar {
    width: 250px;
    background-color: #000;
    padding: 15px;
    height: 100vh;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
    flex-shrink: 0;
}
.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sidebar-menu h2 {
    color: #fff;
    margin-bottom: 20px;
}
.sidebar-menu li {
    margin-bottom: 10px;
}
.sidebar-menu a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}
.sidebar-menu a:hover {
    background-color: #333;
}
.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}
.header {
    height: 10vh;
    width: 100%;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: flex-start;
}
.header-content {
    display: flex;
    align-items: center;
    margin-left: auto;
}
.avatar {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}
h6 {
    margin: 0;
    padding-left: 5px;
}
.alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
    max-width: 95%;
    margin-bottom: 10px;
    border-radius: 10px;
    position: fixed;
    top: 40px;
    right: 20px;
    left: 20px;
    z-index: 1000;
    opacity: 1;
    transition: opacity 0.5s ease;
}
.alert-success {
    background-color: #4CAF50;
}
.alert-danger {
    background-color: #f44336;
}
.alert-hidden {
    opacity: 0;
    transition: opacity 0.5s ease;
}
.schemes-content {
    margin-top: 3%;
}
.scheme-container-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
}
.gold-scheme-container,
.wealth-scheme-container {
    background-size: cover;
    background-position: center;
    position: relative;
    color: white;
    padding: 17px;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.3s ease;
    cursor: pointer;
    overflow: hidden;
    margin-bottom: 20px;
    height: 52vh;
    max-width: 45%;
    box-sizing: border-box;
}
.gold-scheme-container {
    background-image: url('{{ asset('images/goldnecklace.jpg') }}');
}
.wealth-scheme-container {
    background-image: url('{{ asset('images/o3.jpg') }}');
}
.gold-scheme-container::before,
.wealth-scheme-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Adjust opacity here */
    z-index: 1;
}
.gold-scheme-info,
.wealth-scheme-info {
    position: relative;
    z-index: 2;
    display: flex;
    width: 100%;
    justify-content: space-between;
}
.gold-scheme-info-left,
.gold-scheme-info-right,
.left-column,
.right-column {
    display: flex;
    flex-direction: column;
    z-index: 2;
}
.gold-scheme-info-left,
.left-column {
    margin-top: 10px;
    margin-left: 10px;
}
.gold-scheme-info-right,
.right-column {
    align-items: flex-end;
}
.gold-scheme-info h4,
.gold-scheme-info p,
.wealth-scheme-info h4,
.wealth-scheme-info p {
    margin: 5px 0;
    font-size: 1rem;
    color: #fff;
}
.pay-btn {
    align-self: flex-end;
    background-color: #fd9c6f;
    color: white;
    padding: 8px 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s, border 0.3s;
    z-index: 2;
}
.pay-btn:hover {
    background-color: transparent;
    color: #fd9c6f;
    border: 2px solid #fd9c6f;
}
.footer {
    background-color: #fff;
    color: #000;
    padding: 10px 20px;
    text-align: center;
    width: 100%;
    margin-top: auto;
}
</style>
@endsection
@section('content')
    <div class="userpage-container">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <h2>OrnaTrack</h2>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('schemes') }}">Schemes</a></li>
                <li><a href="{{ route('condition.show') }}">Terms & Conditions</a></li>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <h6 style="font-weight:bold">User Dashboard</h6>
                <div class="header-content">
                    <div id="dateTimeDisplay" class="text-end me-3" style="margin-right: 40px;">
                        <div id="timeDisplay" style="font-size: 1.1rem;font-weight: bold;"></div>
                        <div id="dateDisplay" style="font-size: 0.8rem;"></div>
                    </div>
                    <a href="{{ route('dashboard') }}">
                        <svg class="avatar" width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="12" fill="#000000"/>
                            <circle cx="12" cy="8" r="4" fill="#FFFFFF"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12C8.13401 12 5 15.134 5 19H19C19 15.134 15.866 12 12 12Z" fill="#FFFFFF"/>
                        </svg>
                    </a>
                    <h6>{{ auth()->user()->name }}</h6>
                </div>
            </div>

            <div class="success-container">
                {{--  @if (session('success'))
                    <div id="success-alert" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif  --}}
                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: '{{ session('success') }}',
                                timer: 4000,
                                showConfirmButton: false
                            });
                        });
                    </script>
                @endif

            </div>
            <div class="schemes-content">
                <h4 style="text-align: center;margin-bottom:20px;">Your Schemes</h4>
                <div class="scheme-container-wrapper">
                    @if(!$goldSavings)
                        <p>No Gold Savings schemes available.</p>
                    @else
                        @foreach($goldSavings as $scheme1)
                            <div class="gold-scheme-container" onclick="navigateToSchemeDetails({{ $scheme1->id }}, 'gold');">
                                <div class="gold-scheme-info">
                                    <div class="gold-scheme-info-left" style="margin-top:10px;">
                                        <h3>Gold Savings</h3>
                                        <p>Name: {{ $scheme1->name }}</p>
                                        <p>Period: 12 months</p>
                                        <p>Status:{{ $scheme1->status }}</p>
                                    </div>
                                    <div class="gold-scheme-info-right" style="margin-top: 60px;">
                                        <p>Date of Joining: {{ \Carbon\Carbon::parse($scheme1->created_at)->format('d-M-Y') }}</p>
                                        <p>Date of Maturity: {{ \Carbon\Carbon::parse($scheme1->created_at)->addMonths(12)->format('d-M-Y') }}</p>
                                        <button class="pay-btn" style="margin-top:20px;">Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if(!$wealthTreasure->isEmpty())
                        @foreach($wealthTreasure as $scheme2)
                            <div class="wealth-scheme-container" onclick="navigateToSchemeDetails({{ $scheme2->id }}, 'wealth');">
                                <div class="wealth-scheme-info">
                                    <div class="left-column">
                                        <h3>Wealth Treasure</h3>
                                        <p>Name: {{ $scheme2->name }}</p>
                                        <p>Monthly Installment: {{ $scheme2->installment }}</p>
                                        <p>Period: {{ $scheme2->timeperiod }} months</p>
                                        <p>Installments Paid:{{ $scheme2->installments_paid }}</p>
                                        <p>Status: {{ $scheme2->status }}</p>
                                    </div>
                                    <div class="right-column" style="margin-top: 20px;">
                                        <p>Date of Joining: <br>{{ \Carbon\Carbon::parse($scheme2->created_at)->format('d-M-Y') }}</p>

                                        <p>Date of Maturity: <br>
                                            {{ \Carbon\Carbon::parse($scheme2->created_at)->addMonths((int) $scheme2->timeperiod)->format('d-M-Y') }}
                                        </p>

                                        <p id="nextDue-{{ $scheme2->id }}">Next Due: </p>
                                        <button class="pay-btn">Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <footer class="footer">
                <div>
                    Hand-crafted & made with <span style="color: red;">❤️</span>
                </div>
                <div>
                    &copy; {{ date('Y') }} Aurora Jewels
                </div>
            </footer>

        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($wealthTreasure as $scheme2)
                const nextDueElement = document.getElementById('nextDue-{{ $scheme2->id }}');
                const dateOfJoining = '{{ \Carbon\Carbon::parse($scheme2->created_at)->format('Y-m-d') }}';
                const joiningDate = new Date(dateOfJoining);
                function formatDate(date)
                {
                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                    return new Intl.DateTimeFormat('en-GB', options).format(date);
                }
                function calculateNextDueDate(joiningDate)
                {
                    const today = new Date();
                    const nextDueDate = new Date(joiningDate);
                    let dueCount = 0;
                    while (nextDueDate <= today) {
                        dueCount++;
                        nextDueDate.setMonth(nextDueDate.getMonth() + 1);
                    }
                    return nextDueDate;
                }
                const nextDueDate = calculateNextDueDate(joiningDate);
                const formattedNextDueDate = formatDate(nextDueDate); // Format the date
                nextDueElement.textContent = `Next Due: ${formattedNextDueDate}`;
            @endforeach
        });
    </script>
    <script>
        function navigateToSchemeDetails(schemeId, type) {
            if (type === 'gold') {
                window.location.href = `/gold-transaction`;
            } else if (type === 'wealth') {
                window.location.href = `scheme/wealth-scheme-details`;
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelector('.slides');
            const slideCount = document.querySelectorAll('.slide').length;
            const dots = document.querySelectorAll('.dot');
            let index = 0;

            function updateSlide() {
                slides.style.transform = `translateX(-${index * 100}%)`;
                dots.forEach(dot => dot.classList.remove('active'));
                dots[index].classList.add('active');
            }

            dots.forEach((dot, dotIndex) => {
                dot.addEventListener('click', () => {
                    index = dotIndex;
                    updateSlide();
                });
            });

            const prevBtn = document.querySelector('.slider-prev');
            prevBtn.addEventListener('click', () => {
                index = (index - 1 + slideCount) % slideCount;
                updateSlide();
            });

            const nextBtn = document.querySelector('.slider-next');
            nextBtn.addEventListener('click', () => {
                index = (index + 1) % slideCount;
                updateSlide();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.classList.add('alert-hidden');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
    <script>
        function updateDateTime() {
            const now = new Date();

            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const dateOptions = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };

            const time = now.toLocaleTimeString('en-US', timeOptions);
            const date = now.toLocaleDateString('en-US', dateOptions);

            document.getElementById('timeDisplay').textContent = time;
            document.getElementById('dateDisplay').textContent = date;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
@endsection
