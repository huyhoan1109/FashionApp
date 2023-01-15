@extends('layouts.app')
@section('main')
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <a href="{{ route('shop') }}">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated slider-1-1" width="100%" height="100%" src="{{ asset('assets/imgs/slider/slider-1.png') }}">
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <a href="{{ route('shop') }}">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated slider-1-2" width="100%" height="100%" src="{{ asset('assets/imgs/slider/slider-2.png') }}" alt="">
                        </div>
                    </div>
                </div>
                </a>
            </div>   
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <br>
    <section class="banners">
        <div class="container">
            <h4 class="section-title mb-20"><span>Most valuable</span></h4>
            <div class="card-1">
                <a href="{{ route('shop') }}">
                    <figure class=" img-hover-scale overflow-hidden">
                        <img src="{{ asset('assets/imgs/banner/banner-4.png') }}" alt="">
                    </figure>
                </a>
            </div>
        </div>
    </section>
    <br>
    <section class="banners">
        <div class="container">
            <h4 class="section-title mb-20"><span>Discover now</span></h4>
            <div class="row">
                <div class="col-lg-4 col-md-auto">
                    <div class="card-1">
                        <a href="{{ route('shop') }}">
                            <figure class="img-hover-scale overflow-hidden">
                                <img src="{{ asset('assets/imgs/banner/banner-1.png') }}" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-auto">
                    <div class="card-1">
                        <a href="{{ route('shop') }}">
                            <figure class="img-hover-scale overflow-hidden">
                                <img src="{{ asset('assets/imgs/banner/banner-2.png') }}" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="card-1">
                        <a href="{{ route('shop') }}">
                            <figure class="img-hover-scale overflow-hidden">
                                <img src="{{ asset('assets/imgs/banner/banner-3.png') }}" alt="">
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection
