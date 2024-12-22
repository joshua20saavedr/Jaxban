<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Appointment</title>
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Back Button Section -->
    <div class="title-section">
        <a href="{{ route('home') }}" class="btn-back">Back</a>
    </div>

    <!-- Container for the Appointment Form -->
    <div class="container">
        <h1> Appointment Schedule</h1>
        <!-- Appointment Form Card -->
        <div class="form-card">
            <h2>Schedule an Appointment</h2>
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <label for="customer_name">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name" required>

                <label for="service">Service</label>
                <input type="text" id="service" name="service" required>

                <label for="appointment_date">Appointment Date</label>
                <input type="date" id="appointment_date" name="appointment_date" required>

                <button type="submit">Book Appointment</button>
            </form>
        </div>
    </div>

</body>
</html>