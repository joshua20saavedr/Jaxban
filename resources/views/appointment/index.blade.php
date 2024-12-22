
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List - JAXBAN Auto Care Services</title>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Appointments</h1>

    <div class="appointments-container">
        @if($appointments->isEmpty())
            <div class="no-appointments">
                <p>No appointments scheduled yet!</p>
                <a href="{{ route('appointments.create') }}" class="back-button">Schedule an Appointment</a>
            </div>
        @else
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Service</th>
                        <th>Appointment Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->customer_name }}</td>
                            <td>{{ $appointment->service }}</td>
                            <td>{{ $appointment->appointment_date->format('F j, Y') }}</td>
                            <td>
                                <!-- Delete Button -->
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <a href="{{ route('home') }}" class="back-button">Back to Home</a>
</body>
</html>
