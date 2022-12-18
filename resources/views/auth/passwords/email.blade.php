@extends('layouts.app')
@section('main')
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- /Account Logo -->
            <div class="auth-container">
                <div class="account-wrapper">
                    <h3 class="account-title">Forgot Password</h3>
                    <p class="account-subtitle">Input your email send you a reset password link.</p>
                    <!-- Account Form -->
                    <form method="POST" action="/forget-password">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">SEND</button>
                        </div>
                        <div class="account-footer">
                            <p>Don't have an account yet? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
