@extends('layouts.applink')

<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<title>OrnaTrack | Receipts</title>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .goldreceipt-container {
            width: 80%;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #fff;
            max-width: 800px; /* Adjust width for better appearance */
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
        .rname {
            margin-left: 30px;
        }
        .rname p {
            font-size: 24px;
        }
        .tcontainer {
            text-align: center;
        }
        .thank-you {
            margin-top: 30px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        .print-btn {
            display: block;
            width: 200px;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto;
            text-align: center;
        }
        .print-btn:hover {
            background-color: #0056b3;
        }

        /* Table styles */
        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .receipt-table th, .receipt-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .receipt-table th {
            background-color: #f2f2f2;
            text-align: left;
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
        .disclaimer{
            margin-top:12px;
            font-size:12px;
        }
        
    
       
    </style>
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="goldreceipt-container">
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
        <div class="tcontainer">
            <h1>Receipt</h1>
            <table class="receipt-table">
                <tbody>
                    <tr>
                        <th>Transaction ID</th>
                        <td>{{ $transaction->transaction_id }}</td>
                    </tr>
                    <tr>
                        <th>Amount (INR)</th>
                        <td>{{ $transaction->amount }}</td>
                    </tr>
                    <tr>
                        <th>Weight (Grams)</th>
                        <td>{{ $transaction->weight }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $transaction->date }}</td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td>Online</td>
                    </tr>
                </tbody>
            </table>
        
            <div class="thank-you">
                Thank you for your purchase!
            </div>
            <div class="disclaimer">
                <p><strong>Disclaimer:</strong> This receipt is for informational purposes only. The values and details provided are based on the current rates and may be subject to changes. Please refer to our official terms and conditions for more information.</p>
            </div>
            
        </div>
    </div>
    <button class="print-btn" onclick="printReceipt()">Print Receipt</button>
    
</body>
