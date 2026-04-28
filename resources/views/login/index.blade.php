<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-title">
            <h1>Selamat Datang 👋</h1>
            <p>Masuk untuk melanjutkan</p>
        </div>

        @error('login')
            <span class="error">{{ $message }}</span>
        @enderror

        <form action="{{ route('login') }}" method="post">
            @csrf
            <!-- EMAIL -->
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="you@email.com" autofocus>

                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="******">
                <button type="button" class="toggle-password" aria-label="Toggle password visibility"
                    onclick="togglePassword(event)">
                    🙈
                </button>

                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-primary">
                Login
            </button>

            <p class="register-text">
                Belum punya akun?
                <a href="{{ route('register') }}">Register</a>
            </p>
        </form>
    </div>

</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>
