<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">


</head>
<body style="background-image: url('/images/background/jaxban_logo_3.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header" style="background-image: url('{{ asset('images/background/Group 1.png') }}');"></div>
        <h2 class="card-title">Login</h2>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn-login">Login</button>
            </div>
        </form>

        <div class="text-center">
            <p>Don't have an account? <a class="link" href="{{ route('register') }}">Register here</a></p>
        </div>
    </div>
</body>
</html>
