@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
  .gold-transaction-container {
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

    .no-link-style {
        color: inherit; /* Inherit color from parent element */
        text-decoration: none; /* Remove underline */
        margin-right: 0; /* Ensure no right margin */
        display: inline-block; /* Ensure element stays inline */
    }

    .no-outline {
        border: none; /* Remove any border */
        outline: none; /* Remove outline on focus */
        background: none; /* Remove default button background */
        margin: 0; /* Ensure no margin */
        display: inline-block; /* Ensure element stays inline */
    }

    /* Adjust space between the two elements */
    .no-link-style + .btn.no-outline {
        margin-left: 2px; /* Adjust this value to control the spacing */
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
             Gold Savings Transaction Details
        </h2>
        <div class="container mt-4">
            <div class="card" style="border-radius:10px;background-color:#ECF0F4;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);">
                <div class="card-body">
                    <p class="card-text small text-muted" >A comparison between dates and amounts over the range.</p>
                    <div class="graph-container" style="margin-top: 20px;">
                        <canvas id="goldChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="gold-transaction-container">
            <!-- Search Bar -->
            <div class="d-flex justify-content-between mb-3">
                <h3 class="me-3"> Customer Transaction Details</h3>
                <form action="{{ route('admin_gold_transaction', ['id' => request()->route('id')]) }}" method="GET" class="d-flex" id="searchForm">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control rounded-start" placeholder="Search..." value="{{ request('search') }}" id="searchInput" style="background-color: #fcf9f9; color: #333; border-color: #ccc;">
                        <span class="input-group-text rounded-end" id="searchIcon" style="cursor: pointer; background-color: #fcf9f9; color: #333; border-color: #ccc;">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </form>
            </div>
            <table >
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>ID</th>
                        <th>Transaction ID</th>
                        <th>Weight</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $key=>$transaction)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->transaction_id }}</td>
                            <td>{{ $transaction->weight }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->date }}</td>
                            <td>{{ $transaction->time }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex mt-4 flex-wrap align-items-center">
                <p class="text-muted mb-sm-0">Showing {{  $transactions->firstItem() }} to {{  $transactions->lastItem() }} of {{  $transactions->total() }} entries</p>
                <nav class="ms-auto">
                    {{  $transactions->links('pagination::bootstrap-4') }} <!-- Use 'pagination::bootstrap-4' or adjust as per your pagination style -->
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    document.getElementById('searchIcon').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prepare data for the graph
        const graphData = @json($graphData);

        // Extract labels and data
        const labels = graphData.map(item => item.date);
        const data = graphData.map(item => item.amount);

        // Create the chart
        const ctx = document.getElementById('goldChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Transaction Amounts',
                    data: data,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Date'
                        },
                        grid: {
                            color: '#e2e6ea',
                        },
                        ticks: {
                            color: '#495057',
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount (₹)'
                        },
                        grid: {
                            color: '#e2e6ea',
                        },
                        ticks: {
                            color: '#495057',
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#495057'
                        }
                    },
                    tooltip: {
                        backgroundColor: '#ffffff',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                    }
                }
            }
        });
    });
</script>
@endsection

