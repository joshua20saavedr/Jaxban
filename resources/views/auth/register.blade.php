<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
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
        <div class="card-header"></div>
        <h2 class="card-title">Create Account</h2>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label class="form-label" for="name">Full Name</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}" required>
            </div>

            <div>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div style="position: relative;">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" required>
                <span toggle="#password" class="toggle-password fa fa-eye"></span>
            </div>

            <div style="position: relative;">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                <span toggle="#password_confirmation" class="toggle-password fa fa-eye"></span>
            </div>

            <button type="submit" class="btn-register">Register</button>
        </form>

        <div class="text-center">
            <p>Already have an account? <a class="link" href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function() {
                let input = document.querySelector(item.getAttribute('toggle'));
                let type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                item.classList.toggle('fa-eye-slash');
            });
        });
    </script>

</body>

</html>
