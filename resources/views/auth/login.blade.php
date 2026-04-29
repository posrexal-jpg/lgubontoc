@extends('layouts.auth')
@section('content')

<title>Login | Municipality of Bontoc</title>

@include('layouts.partials.message')

    <div class="app-auth-body mx-auto"> 
        <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html">
            <img class="logo-icon me-2" src="{{ asset('assets/images/bontoclogo.png')}}" alt="logo"></a>
        </div>
    <h2 class="auth-heading text-center mb-5">Login</h2>
        <div class="auth-form-container text-start">
            <form class="row g-3 needs-validation" action="{{ route('login.perform') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{url('forgot-password')}}">Forgot Password?</a></p>
                      </div>
                    </div>
                    <div class="text-center">
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Login</button>
            </div>
                  </form>
            <div class="auth-option text-center pt-5">No Account? <a class="text-link" href="{{ url('register')}}" >Register </a>here.
            </div>
        </div> 
    </div>
@endsection