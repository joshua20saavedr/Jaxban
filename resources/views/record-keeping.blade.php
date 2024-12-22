<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Records - JAXBAN Auto Care Services</title>
    <link href="{{ asset('css/record-keeping.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Title "Record Keeping" at the center top outside the card -->
    <h1>Record Keeping</h1>

    <div class="container">
        <!-- Back button -->
        <a href="javascript:history.back()" class="btn-back">Back</a>

        <h2>Customer Records</h2>

        <!-- Success message if any -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- No customer records message -->
        @if($customers->isEmpty())
            <div class="alert alert-warning text-center">No customer records found.</div>
        @else
            <!-- Table for displaying customer records -->
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>
                                <!-- Action buttons for view, edit, delete -->
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="pagination">
                {{ $customers->links() }}
            </div>
        @endif
    </div>

</body>
</html>
