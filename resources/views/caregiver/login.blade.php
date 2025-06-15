<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body class="login-page-body">
    <x-navbar_caregiver />

    <div class="login-container">
        <div class="login-card">
            <h2>Welcome Back CareGiver</h2>
            @if (session('error'))
                <span class="text-danger">{{ session('error') }}</span>
            @endif
            <form method="POST" action="{{ route('careGiver.authenticate') }}">
                @csrf
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email address" required
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot password?</a> --}}
                <button type="submit" class="btn-login-submit">Log In</button>
            </form>
            <a href="{{ route('login') }}" class="login-page-link caregiver-login-link">Log in as a
                patient</a>
            <p class="login-page-link signup-text">
                Don't have an account?
                <a href="{{ route('careGiver.register') }}" class="actual-signup-link">Sign up</a>
            </p>
        </div>
    </div>

    <x-footer />
    <x-js-link />
</body>

</html>
