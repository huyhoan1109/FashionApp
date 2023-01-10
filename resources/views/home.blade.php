@extends('layouts.app')
@section('main')
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Trade-in offer</h4>
                                <h2 class="animated fw-900">Supper value deals</h2>
                                <h1 class="animated fw-900 text-brand">On all products</h1>
                                <p class="animated">Save more with coupons & up to 70% off</p>
                                <a class="animated btn btn-brush btn-brush-3" href=""> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{ asset('assets/imgs/slider/slider-1.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Hot promotions</h4>
                                <h2 class="animated fw-900">Fashion Trending</h2>
                                <h1 class="animated fw-900 text-7">Great Collection</h1>
                                <p class="animated">Save more with coupons & up to 20% off</p>
                                <a class="animated btn btn-brush btn-brush-2" href=""> Discover Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2" src="{{ asset('assets/imgs/slider/slider-2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="banners">
        <div class="container">
            <h3 class="section-title mb-20"><span>Top Banner</span></h3>
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
            <h3 class="section-title mb-20"><span>All</span></h3>
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
