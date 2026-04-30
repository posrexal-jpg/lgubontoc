@extends('layouts.auth')

@section('content')
<title>Login | Municipality of Bontoc</title>

<style>
    .auth-main-col {
        background: linear-gradient(135deg, #f7fbf4 0%, #eef8e8 100%);
    }

    .login-shell {
        width: min(440px, 100%);
        margin: 0 auto;
        padding: 1rem 0;
        text-align: left;
    }

    .login-card {
        background: #ffffff;
        border: 1px solid #dce7da;
        border-top: 6px solid #1f7a3f;
        border-radius: 10px;
        box-shadow: 0 22px 60px rgba(11, 61, 42, .14);
        overflow: hidden;
    }

    .login-card__header {
        padding: 2rem 2rem 1.25rem;
        border-bottom: 1px solid #edf2ec;
    }

    .login-brand {
        display: flex;
        align-items: center;
        gap: .9rem;
        margin-bottom: 1.35rem;
    }

    .login-brand img {
        width: 64px;
        height: 64px;
        object-fit: contain;
    }

    .login-brand span {
        display: grid;
        gap: .1rem;
    }

    .login-brand small {
        color: #6d7a72;
        font-weight: 700;
        line-height: 1.2;
    }

    .login-brand strong {
        color: #0b3d2a;
        font-size: 1.35rem;
        font-weight: 800;
        line-height: 1.05;
    }

    .login-card h1 {
        margin: 0 0 .45rem;
        color: #143226;
        font-size: 1.7rem;
        font-weight: 800;
    }

    .login-card__subtitle {
        margin: 0;
        color: #5f6b76;
        font-size: .98rem;
    }

    .login-card__body {
        padding: 1.5rem 2rem 2rem;
    }

    .login-card .form-label {
        color: #24342c;
        font-weight: 800;
    }

    .login-card .form-control {
        height: 46px;
        border-color: #d9e5d7;
        border-radius: 6px;
        color: #1f2f27;
    }

    .login-card .form-control:focus {
        border-color: #1f7a3f;
        box-shadow: 0 0 0 .2rem rgba(31, 122, 63, .12);
    }

    .login-card__meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin: .25rem 0 1.35rem;
        font-size: .9rem;
    }

    .login-card__meta a,
    .login-card__register a {
        color: #146c38;
        font-weight: 800;
    }

    .login-card .form-check-label {
        color: #56645d;
    }

    .login-submit {
        width: 100%;
        min-height: 48px;
        border: 0;
        border-radius: 6px;
        background: #1f7a3f;
        color: #ffffff;
        font-weight: 900;
        letter-spacing: .02em;
    }

    .login-submit:hover,
    .login-submit:focus {
        background: #0b3d2a;
        color: #ffffff;
    }

    .login-card__register {
        margin: 1.25rem 0 0;
        color: #5f6b76;
        font-size: .92rem;
        text-align: center;
    }

    .login-support {
        margin-top: 1rem;
        color: #60726a;
        font-size: .86rem;
        text-align: center;
    }

    @media (max-width: 767.98px) {
        .auth-main-col {
            min-height: 100vh;
            padding: 1.5rem !important;
        }

        .login-card__header,
        .login-card__body {
            padding-left: 1.35rem;
            padding-right: 1.35rem;
        }

        .login-card__meta {
            align-items: flex-start;
            flex-direction: column;
            gap: .7rem;
        }
    }
</style>

<div class="login-shell">
    @include('layouts.partials.message')

    <div class="login-card">
        <div class="login-card__header">
            <a class="login-brand" href="{{ route('home') }}" aria-label="Municipality of Bontoc homepage">
                <img src="{{ asset('assets/images/bontoclogo.png') }}" alt="Municipality of Bontoc seal">
                <span>
                    <small>Municipal Government</small>
                    <strong>Bontoc LGU</strong>
                </span>
            </a>
            <h1>Admin Login</h1>
            <p class="login-card__subtitle">Access the content management dashboard.</p>
        </div>

        <div class="login-card__body">
            <form class="needs-validation" action="{{ route('login.perform') }}" method="post">
                {{ csrf_field() }}

                <div class="mb-3">
                    <label for="yourEmail" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" value="{{ old('email') }}" autocomplete="email" required>
                </div>

                <div class="mb-3">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" autocomplete="current-password" required>
                </div>

                <div class="login-card__meta">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="{{ url('forgot-password') }}">Forgot password?</a>
                </div>

                <button type="submit" class="btn login-submit">Sign In</button>
            </form>

            <p class="login-card__register">No account? <a href="{{ url('register') }}">Register here</a>.</p>
        </div>
    </div>

    <p class="login-support">Authorized access only for Municipality of Bontoc website administrators.</p>
</div>
@endsection
