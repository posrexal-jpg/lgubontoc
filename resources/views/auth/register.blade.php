@extends('layouts.auth')
@section('content')

<title>Register | Municipality of Bontoc</title>

@include('layouts.partials.message')


<a href="{{ url('register') }}"></a>

<div class="app-auth-body mx-auto"> 
    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html">
    <img class="logo-icon me-2" src="{{ asset('assets/images/bontoclogo.png')}}" alt="logo"></a>
    </div>
    <h2 class="auth-heading text-center mb-5">Register</h2>
    <div class="auth-form-container text-start mx-auto">
        <form class="auth-form auth-signup-form needs-validation" action="" method="post" >
        {{ csrf_field() }}         
            <div class="email mb-3">
            <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                    </div>
            </div>
            <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                    </div>
            <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div><br>
            <div class="extra mb-3">
                <div class="form-check">
                    <input class="form-check-input" name="terms" type="checkbox" id="acceptTerms" required>
                    <label class="form-check-label" for="acceptTerms">
                    I accept the <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Statement of the Portal</a>.
                    </label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
            </div>
        </form>
        <div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="{{ url('login')}}">Log in.</a></div>
    </div>                 
</div>
@endsection