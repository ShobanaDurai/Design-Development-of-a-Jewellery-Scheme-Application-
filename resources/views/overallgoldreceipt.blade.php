@extends('layouts.applink')

<head>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
    <title>OrnaTrack | Receipts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .rcontainer {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }
        .company-info {
            text-align: left;
        }
        .contact-info {
            text-align: right;
            margin-top: 60px;
        }
        .rname{
            margin-left: 30px;
        }
        .rname p{
            font-size:24px;
        }
        .receipt-container {
            margin: 100px auto;
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: none; 
        }

        th, td {
            border: none;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #c0c0c0;
        }

        tbody tr:nth-child(even) {
            background-color: #e0e0e0;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9; /* White background for odd rows */
        }
        .print-button {
            display: block;
            margin: 5px auto;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            outline: none; /* Removes the default outline */
        }
        .print-button:focus {
            outline: none; /* Ensures outline is removed when the button is focused */
        }
        .print-button:hover {
            background-color: #0056b3;
        }
        .sum-block {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .thank-you {
            flex: 1;
            font-weight: bold;
        }
        .amount-weight {
            text-align: right;
        }
        .amount-weight p{
            font-size: 20px;
        }
        p {
            margin: 0;
        }
        .disclaimer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
            text-align: center;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="receipt-container">
       
        <div class="rcontainer">
            <div class="company-info">
                <h1><strong>Aurora Jewels</strong></h1>
                <p>
                    1234 Golden Crescent,<br>
                    Silver Street,<br>
                    Townhall,<br>
                    Coimbatore - 641001,<br>
                    Tamil Nadu, India
                </p>
            </div>
            <div class="contact-info">
                <p>
                    <strong>Phone: </strong>+91 123 456 7890<br>
                    <strong>Email: </strong> contact@aurorajewels.com<br>
                    <strong>Website: </strong> www.aurorajewels.com
                </p>
            </div>
        </div>
        <div class="rname">
            <h6>RECIPIENT:</h6>
            <p><strong>{{ auth()->user()->name }}</strong></p>
        </div>
        <h2>Overall Receipt</h2>

        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Amount (INR)</th>
                    <th>Weight (Grams)</th>
                    <th>Date</th>
                    <th>Payment Method</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ number_format($transaction->amount, 2) }}</td>
                        <td>{{ number_format($transaction->weight, 2) }}</td>
                        <td>{{ $transaction->date }}</td> <!-- No formatting applied here -->
                        <td>Online</td>
                        
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="sum-block">
            <div class="thank-you">
                <p><strong>Thank you for your purchase!</strong></p>
                <p>If you have any queries or technical issues, please contact us at:</p>
                <p>Email: support@aurorajewels.com</p>
                <p>Phone: +91 123 456 7890</p>
            </div>
            <div class="amount-weight">
                <p>Total Amount: <strong><h4>{{ number_format($totalAmount, 2) }} INR</h4></strong></p>
                <p>Total Weight: <strong><h4>{{ number_format($totalWeight, 2) }} grams</h4></strong></p>
            </div>
           
        </div>
        <div class="disclaimer">
            <p><strong>Disclaimer:</strong> This receipt is for informational purposes only. The values and details provided are based on the current rates and may be subject to changes. Please refer to our official terms and conditions for more information.</p>
        </div>
        
    </div>
    <button class="print-button" onclick="window.print()">Print Receipt</button>
</body>
