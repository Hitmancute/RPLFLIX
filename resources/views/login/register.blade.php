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
            <h1>Register</h1>
            <p>Silakan Isi Form Register</p>
        </div>

        @error('login')
            <span class="error">{{ $message }}</span>
        @enderror

        <form action="{{ route('register') }}" method="post">
            @csrf

            <!-- Name -->
            <div class="field">
                <label for="name">Name</label>
                <input type="name" name="name" id="name" value="{{ old('name') }}" placeholder="username21"
                    autocomplete="off">

                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="you@email.com">

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

            <div class="field">
                <label for="gender">Gender: </label>
                <label for="optmale">
                    <input type="radio" name="gender" id="gender" value="male" checked>
                    Male
                </label>

                <label for="optfemale">
                    <input type="radio" name="gender" id="gender" value="female">
                    Female
                </label>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-primary">
                Register
            </button>
        </form>
        <p class="register-text">
            Belum punya akun?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</body>
<script src="{{ asset('js/script.js') }}"></script>

</html>
