<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/background/car repair background.jpg'); /* Path to your background image */
            background-size: cover; /* Ensure the image covers the entire body */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent image repetition */
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            backdrop-filter: blur(10px);
        }

        .card-header {
            background-image: url('/images/background/logo.png'); /* Path to your logo image */
            background-size: cover; /* Make the image cover the entire header */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent image repetition */
            height: 150px; /* Adjust the height as needed */
            border-radius: 15px 15px 0 0;
        }

        .card-title {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
            margin-top: 15px;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .btn-login {
            background-color: #3e8e41;
            color: white;
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #45a049;
        }

        .btn-register {
            background-color: #007bff;
            color: white;
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            border: none;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <h5 class="card-title">Welcome to the website</h5>
            <form action="/login" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 text-center">
                    <label>
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="/register" style="text-decoration: none; color: #007bff;">Create an account</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
