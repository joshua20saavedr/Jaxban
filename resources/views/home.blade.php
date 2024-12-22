<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - JAXBAN Auto Care Services</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    
    <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Title Section -->
    <section class="title-section">
        <h1>JAXBAN Auto Care Services</h1>
    </section>

    <!-- Options Section -->
    <section class="options-section">
        <div class="option">
            <a href="{{ url('/inventory') }}">Inventory Management</a>
        </div>
        <div class="option">
            <a href="{{ route('appointments.create') }}" class="btn btn-primary">Schedule Appointment</a>
        </div>
        <div class="option">
            <a href="{{ route('record-keeping') }}">Record Keeping</a>
        </div>
        <div class="option">
            <a href="{{ url('/billing-process') }}">Billing Process</a>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="services-section">
        <h2>Our Services</h2>
        <div class="service-images">
            <div class="service-item">
                <img src="{{ asset('images/background/Oil-change.jpg') }}" alt="Oil Change">
                <p>Oil Change</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/background/brake repair.jpg') }}" alt="Brake Repair">
                <p>Brake Repair</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/background/tire services.jpg') }}" alt="Tire Services">
                <p>Tire Services</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/background/car painting.jpg') }}" alt="Car Painting">
                <p>Car Painting</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/background/nitrogen refill.jpg') }}" alt="Nitrogen Refill">
                <p>Nitrogen Refill</p>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/background/car tinting.jpg') }}" alt="Car Tinting">
                <p>Car Tinting</p>
            </div>
        </div>
    </section>
</body>

</html>
