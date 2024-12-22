<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAXBAN AUTO CARE SERVICES</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: flex-start; /* Align content to the left */
            align-items: center;
            background-image: url('/images/background/jaxban logo (2).png'); /* Replace with the actual image path */
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
            padding-left: 50px; /* Add padding for better positioning */
            position: relative; /* Enable absolute positioning of the link */
        }

        .container {
            text-align: left; /* Align text to the left */
            background: transparent; 
            padding: 40px;
            border-radius: 15px;
            max-width: 500px; /* Limit the width of the container */
        }

        h1 {
            font-size: 2rem; /* Increase size for "welcome to" */
            margin-bottom: 10px;
            text-transform: lowercase;
        }

        h2 {
            font-size: 4rem; /* Larger size for "JAXBAN AUTO CARE SERVICES" */
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
            line-height: 1.2; /* Adjust line height for better readability */
        }

        a {
            position: absolute; /* Position the link absolutely */
            top: 10px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            display: inline-block;
            padding: 15px 30px;
            color: white;
            font-size: 1.5rem; /* Increase button font size */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        a:hover {
            background-color:rgb(31, 30, 30);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <a href="{{ route('login') }}">Login</a>
    <div class="container">
        <!-- Add your content here -->
    </div>
</body>
</html>
