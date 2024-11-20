@extends('layouts.applink')
@section('css')
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    {{--  .gold-rate-display h6 {
        top: 80px;
    }  --}}
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
        height: 29vh;
        max-width: 40%;
        margin-top: 125px;
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
    .main-container {
        display: flex;
        justify-content: space-between; /* Adds space between the two containers */
        align-items: flex-start; /* Align items at the start of the container */
    }

    .conversion-container, .saved-weight {
        flex: 1; /* Allow the containers to share space equally */
        margin-right: 40px; /* Optional: Adds some spacing between the containers */
    }

    .saved-weight .image-container {
        max-width: 600px; /* Adjust as per image size */
    }

    .saved-weight .content-container {
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .main-container {
            flex-direction: column;
        }

        .conversion-container, .saved-weight {
            margin-right: 0;
            margin-bottom: 20px;
        }
    }

    .payment-table {
        margin: 0 20px 20px 20px; /* Top margin is set to 0, others remain 20px */
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

        .conversion-symbol {
            margin: 0 10px;
        }
        .payment-table {
            width: 90%;
        }
    }
    .paid-button {
        background-color: #fd9c6c;
        color: white;
        border: 2px solid #28a745;
        cursor: not-allowed;
    }
</style>
@endsection
@section('content')
    <div class="main-container">
        <div class="conversion-container">
            <div class="input-container amt-container">
                <h6>Amt (₹)</h6>
                <input type="number" id="amount" placeholder="Enter amount in ₹">
            </div>
            <div class="conversion-symbols">
                <div class="conversion-symbol">&#8594;</div>
                <div class="conversion-symbol">&#8592;</div>
            </div>
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
                <p style="font-weight: 700;font-family:Georgia, 'Times New Roman', Times, serif;" id="totalSavedWeightWel">{{ $totalSavedWeightWel ?? 'Not Available' }} grams</p>
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
            @foreach ($weltransactions as $weltransaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $weltransaction->transaction_id }}</td>
                    <td>{{ $weltransaction->amount }}</td>
                    <td class="weight-cell">{{ $weltransaction->weight }}</td>
                    <td>{{ $weltransaction->date }}</td>
                    <td>{{ $weltransaction->time }}</td>
                    <td><button class="btn btn-success" disabled>Paid</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="transaction">
        <button class="viewhistory" onclick="window.location='{{ route('view.wealthhistory') }}'">View History</button>
    </div>
</div>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let goldRatePerGram = 0; // Initialize with a placeholder value
        const apiUrl = 'https://api.metalpriceapi.com/v1/latest?api_key=e76f2dd8a8d01e5700445b458ea1d67e&base=INR&currencies=XAU';

        const amountInput = document.getElementById('amount');
        const weightInput = document.getElementById('weight');

        function fetchGoldRate() {
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Assuming the API provides price per ounce in INR
                    const pricePerOunce = data.rates.INRXAU; // Use the correct property name
                    goldRatePerGram = pricePerOunce / 31.1035; // Convert to price per gram
                    calculateWeight(); // Recalculate weight with the updated rate
                    calculateAmount(); // Recalculate amount with the updated rate
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

            // Convert amount to weight
            const weight = amount / goldRatePerGram;
            weightInput.value = weight.toFixed(2); // Display weight with 2 decimal places
        }

        function calculateAmount() {
            const weight = parseFloat(weightInput.value);
            if (isNaN(weight) || weight <= 0 || goldRatePerGram <= 0) {
                amountInput.value = '';
                return;
            }

            // Convert weight to amount
            const amount = weight * goldRatePerGram;
            amountInput.value = amount.toFixed(2); // Display amount with 2 decimal places
        }

        amountInput.addEventListener('input', calculateWeight);
        weightInput.addEventListener('input', calculateAmount);

        // Fetch the gold rate on page load
        fetchGoldRate();
    });
</script>

<script>
    async function fetchTotalSavedWeightWel() {
        try {
            const response = await fetch('{{ route('total-saved-weight-wel') }}');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();

            // Update the content with the total saved weight
            const totalWeightWelElement = document.querySelector('.content-container p');
            if (data.totalSavedWeightWel) {
                // Format to two decimal places
                const formattedWeight = parseFloat(data.totalSavedWeightWel).toFixed(2);
                totalWeightWelElement.textContent = `Your Total Saved Weight: ${formattedWeight} grams`;
            } else {
                totalWeightWelElement.textContent = 'Total Saved Weight is not set.';
            }
        } catch (error) {
            console.error('Error fetching total saved weight:', error);
        }
    }

    // Call the function to fetch and display the total saved weight
    fetchTotalSavedWeightWel();
</script>

<script>
    let goldRatePerGram = 0; // Placeholder value
const apiUrl = 'https://api.metalpriceapi.com/v1/latest?api_key=e76f2dd8a8d01e5700445b458ea1d67e&base=INR&currencies=XAU';
let paymentsStatus = {}; // Track payment status

// Fetch gold rate from API and convert it to per gram
function fetchGoldRate() {
    return fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const pricePerOunce = data.rates.INRXAU; // Correct property name
            goldRatePerGram = pricePerOunce / 31.1035; // Convert to grams
        })
        .catch(error => console.error('Error fetching gold rate:', error));
}

// Initialize transactions table
function initializeTransactions() {
    fetchGoldRate().then(() => {
        const schemeStartDate = new Date('{{ $startDate }}');
        const schemeDurationMonths = {{ $timePeriod }};
        const currentDate = new Date();

        const monthsElapsed = Math.floor((currentDate - schemeStartDate) / (1000 * 60 * 60 * 24 * 30));
        const tbody = document.getElementById('transactionsTableBody');
        const monthlyInstallment = parseFloat('{{ $monthlyInstallment }}'); // Convert to float

        for (let i = tbody.children.length + 1; i <= schemeDurationMonths; i++) {
            const row = document.createElement('tr');
            const transactionId = `AJWS-${Date.now()}-${i}`;
            const amount = monthlyInstallment;
            const isPaymentDone = paymentsStatus[i] || false;

            row.innerHTML = `
                <td>${i}</td>
                <td>${transactionId}</td>
                <td>
                    <input type="number" class="form-control amount"
                           placeholder="Enter amount" step="0.01"
                           oninput="updateWeight(this, ${i})" />
                </td>
                <td class="weight-cell" id="weight-${i}">0.00</td>
                <td><input type="date" class="form-control date-cell" readonly></td>
                <td><input type="time" class="form-control time-cell" readonly></td>
                <td>
                    <button class="btn btn-success" ${isPaymentDone ? 'disabled' : ''}
                            onclick="payTransaction(${i}, this)">Pay</button>
                </td>
            `;

            tbody.appendChild(row);
        }
    });
}

// Update the weight dynamically when user inputs the amount
function updateWeight(amountInput, rowId) {
    const amount = parseFloat(amountInput.value) || 0; // Handle empty input as 0
    const weightCell = document.getElementById(`weight-${rowId}`);

    if (goldRatePerGram <= 0) {
        weightCell.textContent = 'N/A'; // If rate isn't available
    } else {
        const weight = (amount / goldRatePerGram).toFixed(2);
        weightCell.textContent = weight;
    }
}

// Handle payment logic and send data to server
function payTransaction(transactionIndex, button) {
    const row = button.parentNode.parentNode;
    const transactionId = row.children[1].textContent;
    const amountInput = row.querySelector('.amount');
    const amount = parseFloat(amountInput.value) || 0; // Handle empty input
    const weight = calculateWeight(amount);

    if (!weight || weight === 'N/A') {
        alert('Invalid weight calculation.');
        return;
    }

    Swal.fire({
        title: 'Confirm Payment',
        text: `Are you sure you want to proceed with the payment for transaction ${transactionId}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, pay it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const now = new Date();
            const formattedDate = now.toISOString().split('T')[0];
            const formattedTime = now.toTimeString().split(' ')[0];

            row.querySelector('input[type="date"]').value = formattedDate;
            row.querySelector('input[type="time"]').value = formattedTime;

            row.querySelector('.weight-cell').textContent = weight;

            button.classList.add('paid-button');
            button.textContent = 'Paid';
            button.disabled = true;
            paymentsStatus[transactionIndex] = true;

            fetch('{{ route('wealth-transaction.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    transaction_id: transactionId,
                    amount: amount,
                    weight: weight,
                    date: formattedDate,
                    time: formattedTime
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message);
                } else {
                    console.error('Error:', data);
                }
            })
            .catch(error => console.error('Error:', error));

            const nextPaymentRow = row.nextElementSibling;
            if (nextPaymentRow) {
                const nextButton = nextPaymentRow.querySelector('button');
                if (nextButton) nextButton.disabled = false;
            }
        } else {
            Swal.fire('Canceled', 'Your payment has been canceled.', 'error');
        }
    });
}

// Calculate weight using the gold rate
function calculateWeight(amount) {
    return goldRatePerGram > 0 ? (amount / goldRatePerGram).toFixed(2) : 'N/A';
}

window.onload = initializeTransactions;

</script>
@endsection
