@extends('layouts.applink')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .conversion-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 70%;
        max-width: 1000px;
        margin: 10%;
        margin-left: 40px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .input-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 49%;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .input-container h6 {
        margin-bottom: 10px;
    }

    .input-container input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .conversion-symbols {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 20px;
    }

    .conversion-symbol {
        font-size: 24px;
    }
    #weight::placeholder
     {
        font-size: 12px;
    }
    #amount::placeholder
    {
       font-size: 12px;
    }

    .saved-weight {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        height: 31vh;
        max-width: 40%;
        margin-top: 126px;
        margin-right: 50px;
    }

    .image-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        height: 100%;
    }

    .image-container img
    {
        max-width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px 0 0 5px;
    }

    .content-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        text-align: center;
        border-radius: 0 5px 5px 0;
    }

    .content-container h4 {
        margin: 0;
    }
    .outer-container {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .conversion-container, .saved-weight {
        flex: 1;
        margin-right: 40px;
    }

    .input-container, .content-container {
        margin-bottom: 15px;
    }

    .saved-weight img {
        max-width: 100%;
        height: auto;
    }

    .conversion-symbols {
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }
    .payment-table {
        margin: 0 20px 20px 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .payment-table-title {
        text-align: center;
    }

    .transaction {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .addtransaction {
        display: inline-block;
        padding: 10px 20px;
        border: 2px solid #fd9c6b;
        border-radius: 5px;
        color: #fd9c6b;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        outline:none;
    }
    .addtransaction:hover,
    .addtransaction:focus {
        background-color: #fd9c6b;
        color: white;
        outline:none;
    }
    .viewhistory {
        display: inline-block;
        padding: 10px 20px;
        border: 2px solid #fd9c6b;
        border-radius: 5px;
        color: #fd9c6b;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
        outline:none;
    }
    .viewhistory:hover,
    .viewhistory:focus {
        background-color: #fd9c6b;
        color: white;
        outline:none;
    }
    .paid-button {
        background-color: #28a745;
        color: white;
        border: 2px solid #28a745;
        cursor: not-allowed;
    }
    @media (max-width: 768px) {
        .conversion-container {
            flex-direction: column;
            align-items: center;
            padding: 10px;
            margin-top: 15%;
            margin-left: 30px;
        }

        .input-container {
            width: 90%;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .conversion-symbols {
            display: none;
        }

        {{--  .conversion-symbols-smaller {
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
        }  --}}

        .conversion-symbol {
            margin: 0 10px;
        }
        .payment-table {
            width: 90%;
        }
    }
</style>
@endsection
@section('content')
    <div class="outer-container">
        <div class="conversion-container">
            <div class="input-container amt-container">
                <h6>Amt (₹)</h6>
                <input type="number" id="amount" placeholder="Enter amount in ₹">
            </div>
            <div class="conversion-symbols">
                <div class="conversion-symbol">&#8594;</div>
                <div class="conversion-symbol">&#8592;</div>
            </div>
            {{--  <div class="conversion-symbols-smaller">
                <div class="conversion-symbol">&#8593;</div> <!-- Upward-facing conversion symbol -->
                <div class="conversion-symbol">&#8595;</div> <!-- Downward-facing conversion symbol -->
            </div>  --}}
            <div class="input-container weight-container">
                <h6>Weight (grams)</h6>
                <input type="number" id="weight" placeholder="Enter weight in grams">
            </div>
        </div>

        <div class="saved-weight">
            <div class="image-container">
                <img src="{{ asset('images/diamond-necklace.webp') }}" alt="Saved Weight Image">
            </div>
            <div class="content-container">
                <p style="font-weight: 700;font-family:Georgia, 'Times New Roman', Times, serif;" id="totalSavedWeight">{{ $totalSavedWeight ?? 'Not Available' }} grams</p>
            </div>
        </div>
    </div>

<div class="payment-table">
    <h1 class="payment-table-title">Transactions</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Transaction ID</th>
                <th>Amount (₹)</th>
                <th>Weight (grams)</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="transactionsTableBody">
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->weight }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->time }}</td>
                    <td><button class="btn btn-success" disabled>Paid</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="transaction">
        <button class="addtransaction" onclick="addTransaction()">Add Transaction</button>
        <button class="viewhistory" onclick="window.location='{{ route('view.goldhistory') }}'">View History</button>
    </div>
</div>
@endsection

@section('script')
<script>
    async function fetchTotalSavedWeight() {
        try {
            const response = await fetch('{{ route('total-saved-weight') }}');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();

            // Update the content with the total saved weight
            const totalWeightElement = document.querySelector('.content-container p');
            if (data.totalSavedWeight) {
                // Format to two decimal places
                const formattedWeight = parseFloat(data.totalSavedWeight).toFixed(2);
                totalWeightElement.textContent = `Your Total Saved Weight: ${formattedWeight} grams`;
            } else {
                totalWeightElement.textContent = 'Total Saved Weight is not set.';
            }
        } catch (error) {
            console.error('Error fetching total saved weight:', error);
        }
    }
    fetchTotalSavedWeight();
</script>

<script>
    let transactionCount = {{ $transactions->count() }};
    let goldRatePerGram = 0;

    {{--  const apiUrl = 'https://api.metalpriceapi.com/v1/latest?api_key=4615700f9be512a1a30f02866dde9459&base=INR&currencies=XAU'  --}}
    const apiUrl = 'https://api.metalpriceapi.com/v1/latest?api_key=e76f2dd8a8d01e5700445b458ea1d67e&base=INR&currencies=XAU';
    function fetchGoldRate() {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const pricePerOunce = data.rates.INRXAU; // Get the price per ounce in INR
                goldRatePerGram = pricePerOunce / 31.1035; // Convert to price per gram
                // Call functions to ensure the calculations are updated with the new rate
                document.querySelectorAll('.amount').forEach(input => updateWeight(input));
            })
            .catch(error => {
                console.error('Error fetching gold rate:', error);
            });
    }

    function generateUniqueId() {
        return `AJGS_${Date.now()}_${transactionCount}`;
    }

    function calculateWeight(amount) {
        if (goldRatePerGram <= 0) {
            return '0.00';
        }
        return (amount / goldRatePerGram).toFixed(2);
    }

    function addTransaction() {
        transactionCount++;
        const tbody = document.getElementById('transactionsTableBody');
        const row = document.createElement('tr');
        const uniqueId = generateUniqueId();

        row.innerHTML = `
            <td>${transactionCount}</td>
            <td>${uniqueId}</td>
            <td><input type="number" class="form-control amount" placeholder="Enter amount" oninput="updateWeight(this)"></td>
            <td class="weight-cell">0.00</td> <!-- Display weight dynamically here -->
            <td><input type="date" class="form-control date"></td>
            <td><input type="time" class="form-control time"></td>
            <td><button class="btn btn-success" onclick="payTransaction(${transactionCount}, this, '${uniqueId}')">Pay</button></td>
        `;

        tbody.appendChild(row);
    }

    function updateWeight(amountInput) {
        const row = amountInput.parentNode.parentNode;
        const amount = parseFloat(amountInput.value) || 0;
        const weightCell = row.querySelector('.weight-cell');
        weightCell.textContent = calculateWeight(amount);
    }
    function payTransaction(transactionId, button, uniqueId) {
        Swal.fire({
            title: 'Confirm Payment',
            text: 'Are you sure you want to pay for transaction ' + uniqueId + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Pay it!',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing Payment',
                    text: 'Paying for transaction ' + uniqueId,
                    icon: 'info',
                    showConfirmButton: false,
                    timer: 3500
                });

                const row = button.parentNode.parentNode;
                const amount = row.querySelector('.amount').value;
                const weight = row.querySelector('.weight-cell').textContent;
                const now = new Date();
                const date = now.toISOString().split('T')[0]; // Format: YYYY-MM-DD
                const time = now.toTimeString().split(' ')[0]; // Format: HH:MM:SS

                if (!amount || !weight) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Please fill in all fields',
                        icon: 'error'
                    });
                    return;
                }

                // Set the date and time values in the input fields
                row.querySelector('.date').value = date;
                row.querySelector('.time').value = time;

                // Disable all input fields in the current row
                const inputs = row.querySelectorAll('input');
                inputs.forEach(input => input.disabled = true);

                // Update button appearance
                button.classList.add('paid-button');
                button.textContent = 'Paid';
                button.disabled = true;

                // AJAX call to store the transaction
                fetch('{{ route('gold-transaction.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        transaction_id: uniqueId,
                        amount: amount,
                        weight: weight,
                        date: date,
                        time: time
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Success',
                            text: 'Transaction has been recorded successfully!',
                            icon: 'success'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'There was an error processing the transaction.',
                            icon: 'error'
                        });
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // If the user cancels, show a message or do nothing
                Swal.fire({
                    title: 'Payment Canceled',
                    text: 'No payment was made for transaction ' + uniqueId,
                    icon: 'info',
                    timer: 3500
                });
            }
        });
    }
    fetchGoldRate();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const goldRateUrl = 'https://api.metalpriceapi.com/v1/latest?api_key=e76f2dd8a8d01e5700445b458ea1d67e&base=INR&currencies=XAU';

        const amountInput = document.getElementById('amount');
        const weightInput = document.getElementById('weight');
        let goldRatePerGram = 0;

        function fetchGoldRate() {
            fetch(goldRateUrl)
                .then(response => response.json())
                .then(data => {
                    // Adjust the following line if the API response format is different
                    const pricePerOunce = data.rates.INRXAU; // Use the correct property for price per ounce
                    goldRatePerGram = pricePerOunce / 31.1035; // 1 ounce = 31.1035 grams
                    calculateWeight();
                    calculateAmount();
                })
                .catch(error => {
                    console.error('Error fetching gold rate:', error);
                });
        }


        function calculateWeight() {
            const amount = parseFloat(amountInput.value);
            if (isNaN(amount) || amount <= 0 || goldRatePerGram <= 0) {
                weightInput.value = '';
                return;
            }

            // Convert amount in INR to weight in grams
            const weight = amount / goldRatePerGram;
            weightInput.value = weight.toFixed(2); // Display weight with 2 decimal places
        }

        function calculateAmount() {
            const weight = parseFloat(weightInput.value);
            if (isNaN(weight) || weight <= 0 || goldRatePerGram <= 0) {
                amountInput.value = '';
                return;
            }

            // Convert weight in grams to amount in INR
            const amount = weight * goldRatePerGram;
            amountInput.value = amount.toFixed(2); // Display amount with 2 decimal places
        }

        amountInput.addEventListener('input', calculateWeight);
        weightInput.addEventListener('input', calculateAmount);

        // Fetch the gold rate on page load
        fetchGoldRate();
    });
</script>
@endsection
