@extends('admin.layouts.app')

@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <div class="d-sm-flex align-items-baseline report-summary-header">
                    <h5 class="font-weight-semibold">Overall User Summary</h5>
                </div>
                </div>
            </div>
            <div class="row report-inner-cards-wrapper">
                <div class=" col-md-6 col-xl report-inner-card">
                <div class="inner-card-text">
                    <span class="report-title"> All User</span>
                    <h4>{{ App\Models\User::count() }}</h4>
                    <span class="report-count">Users</span>
                </div>
                <div class="inner-card-icon bg-success rounded">
                    <i class="fas fa-user"></i>
                </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                <div class="inner-card-text">
                    <span class="report-title">Gold Savings</span>
                    <h4>{{ App\Models\GoldSavingsRegistration::count() }}</h4>
                    <span class="report-count"> Users</span>
                </div>
                <div class="inner-card-icon bg-danger rounded">
                    <i class="fa-solid fa-coins"></i>
                </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                <div class="inner-card-text">
                    <span class="report-title">Wealth Treasure</span>
                    <h4>{{ App\Models\WealthTreasureRegistration::count() }}</h4>
                    <span class="report-count"> Users</span>
                </div>
                <div class="inner-card-icon bg-warning rounded">
                    <i class="fa-solid fa-box-open"></i>
                </div>
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">User Graph</h4>
            @php
                $gold = App\Models\GoldSavingsRegistration::count();
                $wealth = App\Models\WealthTreasureRegistration::count();
                $user = App\Models\User::count();
                $count = $gold + $wealth;
            @endphp
            <div class="aligner-wrapper py-3">
                <div class="doughnut-chart-height">
                <canvas id="sessionsDoughnutChart" height="210">
                </div>
                <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                <h2 class="text-center mb-0 font-weight-bold">{{ $user }}</h2>
                <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Customers</small>
                </div>
            </div>
            <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                <div class="d-flex">
                <span class="square-indicator bg-danger ms-2"></span>
                <p class="mb-0 ms-2">Wealth Customers</p>
                </div>
                <div class="d-flex">
                <span class="square-indicator bg-success ms-2"></span>
                <p class="mb-0 ms-2">Gold Customers</p>
                </div>
                <div class="d-flex">
                <span class="square-indicator bg-warning ms-2"></span>
                <p class="mb-0 ms-2">All Users</p>
                </div>
            </div>
            </div>
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
        </div>

        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card dashboard-inline-datepicker datepicker-custom">
            <div class="card-body">
            <div id="dashboard-inline-datepicker"></div>
            </div>
        </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
        <div class="card quick-status-card">
            <div class="card-body">
            <h4 class="card-title">Quick Status</h4>
            <div class="row">
                <div class="col-md-6">
                <div id="circle-progress-1"></div>
                </div>
                <div class="col-md-6">
                <div id="circle-progress-2"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">

                <div class="wrapper py-4 d-flex border-bottom">
                    <span class="icon-holder">
                    <i class="icon-wallet"></i>
                    </span>
                    <div class="ms-3">
                    <p class="mb-1">Gold Balance</p>
                    <h6 class="mb-0">₹{{ number_format(App\Models\GoldTransaction::sum('amount'), 2) }}</h6>
                    </div>
                    <div class="ms-auto"><i class="icon-arrow-up-circle"></i><span class="text-muted ms-2">{{ number_format(App\Models\GoldTransaction::sum('weight'), 2) }} grams </span></div>
                </div>
                <div class="wrapper py-4 d-flex">
                    <span class="icon-holder">
                    {{--  <i class="icon-basket-loaded"></i>  --}}
                    <i class="icon-wallet"></i>
                    </span>
                    <div class="ms-3">
                    <p class="mb-1">Wealth Balance</p>
                    <h6 class="mb-0">₹{{ number_format(App\Models\WealthTransaction::sum('amount'), 2) }}</h6>
                    </div>
                    <div class="ms-auto"><i class="icon-arrow-up-circle"></i><span class="text-muted ms-2">{{ number_format(App\Models\WealthTransaction::sum('weight'), 2) }} grams</span></div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <div class="d-sm-flex align-items-baseline report-summary-header">
                    <h5 class="font-weight-semibold">Overall Transaction Summary</h5>
                </div>
                </div>
            </div>
            @php
                $gold = App\Models\GoldTransaction::count();
                $wealth = App\Models\WealthTransaction::count();
                $count = $gold + $wealth;
            @endphp
            <div class="row report-inner-cards-wrapper">
                <div class=" col-md-6 col-xl report-inner-card">
                <div class="inner-card-text">
                    <span class="report-title"> Total Transaction</span>
                    <h4>{{ $count }} +</h4>
                    <span class="report-count">Transactions</span>
                </div>
                <div class="inner-card-icon bg-info rounded">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                <div class="inner-card-text">
                    <span class="report-title">Gold Savings</span>
                    <h4>{{ App\Models\GoldTransaction::count() }}+</h4>
                    <span class="report-count"> Transactions</span>
                </div>
                <div class="inner-card-icon bg-primary rounded">
                    <i class="fas fa-balance-scale"></i>
                </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                <div class="inner-card-text">
                    <span class="report-title">Wealth Treasure</span>
                    <h4>{{ App\Models\WealthTransaction::count() }}+</h4>
                    <span class="report-count"> Transactions</span>
                </div>
                <div class="inner-card-icon bg-danger rounded">
                    <i class="fas fa-gem"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row income-expense-summary-chart-text">
                        <div class="col-xl-4">
                            <h5>Total Transaction Summary</h5>
                            <p class="small text-muted">A comparison between the total income gained by the both schemes, The Gold Savings Scheme and The Wealth Transaction Scheme.</p>
                        </div>
                        <div class="col-md-3 col-xl-2">
                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span> Gold Income</p>
                            <h3>₹{{ App\Models\GoldTransaction::sum('amount') }}</h3>
                        </div>
                        <div class="col-md-3 col-xl-2">
                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span> Wealth Income </p>
                            <h3>₹{{ App\Models\WealthTransaction::sum('amount') }}</h3>
                        </div>
                    </div>
                    <div class="row income-expense-summary-chart mt-3">
                        <div class="col-md-12">
                            <canvas id="income-expense-summary-chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the data from your server-side variables
        const monthlyLabels = @json($monthlyLabels);
        const goldIncomeData = @json($goldIncomeData);
        const wealthIncomeData = @json($wealthIncomeData);

        // Chart configuration
        var ctx = document.getElementById('income-expense-summary-chart').getContext('2d');
        var incomeExpenseChart = new Chart(ctx, {
            type: 'line', // Line chart
            data: {
                labels: monthlyLabels, // X-axis labels (months)
                datasets: [
                    {
                        label: 'Gold Income',
                        data: Object.values(goldIncomeData), // Data for Gold Income
                        borderColor: 'rgba(100, 105, 223, 1)', // Dark blue for Gold Income
                        backgroundColor: 'rgba(100, 105, 223, 0.2)', // Light blue for Gold Income
                        fill: true, // Fill the area under the line
                        tension: 0.1 // Smooth line
                    },
                    {
                        label: 'Wealth Income',
                        data: Object.values(wealthIncomeData), // Data for Wealth Income
                        borderColor: 'rgba(55, 202, 50, 1)', // Dark green for Wealth Income
                        backgroundColor: 'rgba(55, 202, 50, 0.2)', // Light green for Wealth Income
                        fill: true, // Fill the area under the line
                        tension: 0.1 // Smooth line
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Income'
                        }
                    }
                }
            }
        });
    });
</script>
<script>
    if ($("#sessionsDoughnutChart").length) {
        const doughnutChartCanvas = document.getElementById('sessionsDoughnutChart');
        new Chart(doughnutChartCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Total Users', 'Gold Users', 'Wealth Users'],
                datasets: [{
                    data: [{{ $totalUsers }}, {{ $goldUsers }}, {{ $wealthUsers }}],
                    backgroundColor: [
                        '#ffca00',
                        '#38ce3c',
                        '#ff4d6b'
                    ],
                    borderColor: ['#ffca00', '#38ce3c', '#ff4d6b'],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: 75,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                responsive: true,
                maintainAspectRatio: true,
                showScale: false,
                legend: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            },
        });
    }
</script>
@endsection
