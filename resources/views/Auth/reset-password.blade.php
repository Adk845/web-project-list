






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #333;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            color: #fff;
            text-align: center;
        }

        .login-container img {
            max-width: 200px; /* Adjust the size of the logo as needed */
            margin-bottom: 1rem;
        }

        .login-container h1 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .login-container .form-group {
            margin-bottom: 1.5rem;
        }

        .login-container .form-group label {
            display: block;
            margin-bottom: .5rem;
        }

        .login-container .form-group input {
            width: 100%;
            padding: .75rem;
            border: 1px solid #444;
            border-radius: .25rem;
            background: #555;
            color: #fff;
        }

        .login-container .btn {
            width: 100%;
            padding: .75rem;
            background-color: #E8BE28;
            border: none;
            border-radius: .25rem;
            color: #000;
            font-size: 1rem;
        }

        .login-container .btn:hover {
            background-color: #d6a62d;
        }

        .error-container {
            margin-bottom: 1rem;
            padding: .75rem;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: .25rem;
            border: 1px solid #f5c6cb;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Add logo here -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo">

        <!-- <h1>Login</h1> -->

    
        <form method="POST" action="{{ route('reset.password.post') }}">

    @csrf

    
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="username" value="{{ $username }}">
    

    <div class="form-group">
    <label for="password">New Password</label>
            <input type="password" name="password" id="password" required>
    </div>

    <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
    <button type="submit" class="btn">Reset Password</button>
</form>



</body>

</html>
