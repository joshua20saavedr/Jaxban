<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JAXBAN Auto Care Services')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Inline Styles for Layout Design -->
    <style>
        /* Reset body margin and padding */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        /* Overall Layout container */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(234, 233, 233, 0.1);
        }

        /* Navigation Bar */
        nav {
            background-color: rgb(33, 32, 32);
            padding: 15px;
            border-radius: 5px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ddd;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }

        /* Success message */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Main Content Section */
        .main-content {
            margin-top: 30px;
        }

        /* Inventory Management Section */
        .inventory-management {
            background-color: #fff; /* White background for the section */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
            color: rgb(33, 32, 32); /* Dark text color */
            text-align: center; /* Center text */
        }

        .inventory-management h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .inventory-management .form-group {
            margin-bottom: 15px;
        }

        .inventory-management label {
            display: block;
            font-size: 1rem;
        }

        .inventory-management input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .inventory-management button {
            padding: 10px 20px;
            background-color: rgb(4, 249, 8);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .inventory-management button:hover {
            background-color: rgb(4, 249, 8);
        }

        /* Table for Current Inventory Items */
        .inventory-list {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inventory-table th,
        .inventory-table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .inventory-table th {
            background-color: rgb(33, 32, 32);
            color: white;
        }

        .inventory-table td {
            background-color: #fff;
        }

        /* Button Styles for Edit and Delete */
        .inventory-table td button,
        .inventory-table td a {
            padding: 6px 12px;
            margin: 2px;
            border: none;
            background-color: rgb(199, 72, 68); /* Default background for buttons */
            color: white;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .inventory-table td a {
            display: inline-block; /* Ensure it behaves like a button */
            text-decoration: none; /* Remove underline from links */
            background-color: rgb(33, 32, 32); /* Color for Edit Button */
        }

        .inventory-table td button:hover,
        .inventory-table td a:hover {
            background-color: rgb(4, 249, 8); /* Hover effect: Bright green for both buttons */
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('inventory.index') }}">Inventory Management</a></li>
            <!-- Add other links here -->
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Inventory Management Section -->
            <div class="inventory-management">
                <h2>Add New Inventory Item</h2>
                <form action="{{ route('inventory.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" id="item_name" name="item_name" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" step="0.01" required>
                    </div>
                    <button type="submit">Add Item</button>
                </form>
            </div>

            <!-- Current Inventory Items Section -->
            <div class="inventory-list">
                <h3>Current Inventory Items</h3>
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn-edit">Edit</a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 JAXBAN Auto Care Services</p>
    </footer>

</body>

</html>
