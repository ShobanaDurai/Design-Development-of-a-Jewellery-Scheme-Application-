@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .history-container {
        margin-top: 10%;
    }

    .history-container-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px; /* Adjust margin as needed */
    }
    .history-container-title {
        margin: 0; /* Remove default margin */
    }
    .history-container-top-left {
        flex: 1; /* Take up remaining space */
    }
    .history-container-top-right {
        flex: 1; /* Take up remaining space */
        text-align: right;
    }
    .history-container-top-right input[type="text"],
    .history-container-top-right button {
        margin-left: 5px; /* Add spacing between input and button */
        margin-right: 5px;
        border-radius: 5px;
        height: 35px;
    }
    .gold-history {
            width: 100%;
            height: 60vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
        }

        .table__body {
            width: 95%;
            max-height: calc(89% - 1.6rem);
            background-color: #fffb;
            margin: .8rem auto;
            border-radius: .6rem;
            overflow: auto;
            overflow: overlay;
        }

        .table__body::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        .table__body::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        .table__body:hover::-webkit-scrollbar-thumb {
            visibility: visible;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            padding: 1rem;
            text-align: center;
        }

        thead th {
            position: sticky;
            top: 0;
            background-color: #C0C0C0;
            cursor: pointer;
            text-transform: capitalize;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr {
            --delay: .1s;
            transition: .5s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr:hover {
            background-color: #fff6 !important;
        }
        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }
        thead th span.icon-arrow {
            display: inline-block;
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            border: 1.4px solid transparent;
            text-align: center;
            font-size: 1rem;
            margin-left: .5rem;
            transition: .2s ease-in-out;
        }
        thead th:hover span.icon-arrow {
            border: 1.4px solid #6c00bd;
        }
        thead th:hover {
            color: #fff;
        }
        thead th.active span.icon-arrow {
            background-color: #6c00bd;
            color: #fff;
        }
        thead th.asc span.icon-arrow {
            transform: rotate(180deg);
        }
        thead th.active, tbody td.active {
            color: #6c00bd;
        }
    .gen-overall-btn{
        text-align: center;
        margin-bottom: 30px;
        margin-top: 20px;

    }
    .gen-overall-btn .btn-secondary {
        background-color: #fd9c6b; /* Set the button color */
        color: #fff; /* Text color */
        border: none; /* Remove border */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 5px; /* Optional: Add rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        font-size: 16px; /* Adjust font size */
    }

    .gen-overall-btn .btn-secondary:hover {
        background-color: #f57c5f; /* Slightly darker shade for hover effect */
    }

    .graph-container {
        margin-top: 20px;
        text-align: center; /* Center the content horizontally */
    }

    .graph-container canvas {
        width: 60%; /* Adjust width as needed */
        max-width: 1500px; /*Maximum width */
        height: 500px; /* Adjust height as needed */

    }

    @media (max-width: 1500px) {
        .history-container {
            margin-top: 8%;
        }
    }

    @media (max-width: 992px) {
        .history-container {
            margin-top: 12%;
        }
        .history-container-top {
            flex-direction: column;
            align-items: stretch;
        }

        .history-container-top-left,
        .history-container-top-right {
            width: 100%;
            margin-bottom: 10px;
        }
    }

    @media (max-width: 768px) {
        .history-container-top-left,
        .history-container-top-right {
            margin-bottom: 0;
        }
    }
</style>

<div class="history-container">
    <div class="history-container-top">
        <div class="history-container-top-left">
            <h1 class="history-container-title">Payment History</h1>
        </div>
        <div class="history-container-top-right">
            <form action="{{ route('view.goldhistory') }}" method="GET">
                <input type="text" name="search" placeholder=" Search here!" value="{{ request()->input('search') }}">
                <button type="submit">
                <i class="fas fa-search"></i> Search</button>
            </form>
        </div>
    </div>
    {{-- Table to display transactions --}}
    <div class="gold-history">
            <div class="table__header">
                <div class="input-group">
                </div>
            </div>
            <div class="table__body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Customer Name</th>
                            <th>Amount (INR)</th>
                            <th>Weight (Grams)</th>
                            <th>Date</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($goldtransactions as $goldtransaction)
                            <tr>
                                <td>{{ $goldtransaction->transaction_id }}</td>
                                <td>{{ $goldtransaction->goldSavingsRegistration->name ?? 'N/A' }}</td>
                                <td>{{ $goldtransaction->amount }}</td>
                                <td>{{ $goldtransaction->weight }}</td>
                                <td>{{ $goldtransaction->date }}</td>
                                <td>Online</td>
                                <td>
                                    <span class="status completed">Completed</span>
                                </td>
                                <td>
                                    <a href="{{ route('goldreceipt.show', $goldtransaction->transaction_id) }}" class="btn btn-primary">
                                         Receipt
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

    </div>

    <div class="gen-overall-btn">
        <form action="{{ route('goldreceipt.generate') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-primary">
                Generate Overall Receipt
            </button>
        </form>
    </div>
</div>
<h1>Track Your Transactions Visually!!</h1>
<div class="graph-container" style="margin-top: 20px;">
        <canvas id="goldChart"></canvas>
</div>

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
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Amount (INR)'
                        }
                    }
                }
            }
        });
    });
</script>






