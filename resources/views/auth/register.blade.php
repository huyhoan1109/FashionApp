@extends('layouts.app')
@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" rel="nofollow">Home</a>                    
            <span></span> 
            Register
        </div>
    </div>
</div>
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3 class="mb-30">Join Us</h3>
                                </div>
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="firstname" placeholder="First Name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastname" placeholder="Last Name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email" value="" required>
                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" placeholder="Address" value="Ha Noi" required>
                                        @if($errors->has('address'))
                                        <div class="error">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" name="phone" placeholder="Phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                                        @if($errors->has('address'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" required>
                                        @if($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                                        @if($errors->has('password_confirmation'))
                                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" checked>
                                                <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                        <a href="{{ route('privacy-policy') }}"><i class="fi-rs-book-alt mr-5 text-muted"></i>Learn more</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                    </div>
                                </form>                                        
                                <div class="text-muted text-center">Already have an account? 
                                    <a href="{{ route('login') }}">Sign in now</a>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="col-lg-1"></div>                    
                    <div class="col-lg-5">
                        <img src="{{asset('assets/imgs/logo/logo-slogan.png')}}">
                        <img src="{{asset('assets/imgs/logo/logo-black.png')}}">
                    </div>
                    <!-- <div class="col-lg-6">
                        <img src="{{asset('assets/imgs/logo/logo-text.png')}}">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection