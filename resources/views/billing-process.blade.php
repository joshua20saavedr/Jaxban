<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Process - JAXBAN Auto Care Services</title>
    <link href="{{ asset('css/billing-process.css') }}" rel="stylesheet">
</head>
<body>

    <a href="javascript:history.back()" class="btn-back">Back</a>
    <h1>Billing Process</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="summary">
            <h3>Total Pending Payments</h3>
            <p>{{ number_format($pendingPayments, 2) }} USD</p>

            <h3>Total Completed Payments</h3>
            <p>{{ number_format($completedPayments, 2) }} USD</p>
        </div>

        @if($payments->isEmpty())
            <div class="alert alert-warning text-center">No payment records found.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->customer_name }}</td>
                            <td>{{ number_format($payment->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->date)->format('M d, Y') }}</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('billing-process.destroy', $payment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
