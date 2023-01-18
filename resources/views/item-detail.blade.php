@extends('layouts.app')
@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> {{$item->name}}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{ $item->image }}" alt="product image">
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <div><img src="{{ $item->image }}" alt="product image"></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail"> {{ $item->name }} </h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            @for($i=0; $i<5; $i++)
                                                @if($i < number_format($item->rate, 0))
                                                    <span style="color: #F15412;" class="fa fa-star checked"></span>
                                                @else
                                                    <span style="color: #F15412;" class="fa fa-star-o"></span>
                                                @endif
                                            @endfor
                                            <span class="font-small ml-5 text-muted"> ({{ $item->review }} reviews)</span> 
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">${{ number_format($item->discount_price, 2) }}</span></ins>
                                            <ins><span class="old-price font-md ml-15">${{ number_format($item->price, 2) }}</span></ins>
                                            <span class="save-price  font-md color3 ml-15"> {{number_format(($item->price - $item->discount_price)/($item->price) * 100, 0)}}% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>

                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    @livewire('detail-component', [
                                        'item_id' => $item->id
                                    ])

                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">Tags: 
                                            @switch($item->type)             
                                            @case(0)                 
                                                <a href="#" rel="tag">Clothes</a>,                
                                                @break               
                                            @case(1)                 
                                                <a href="#" rel="tag">Shoes</a>,                 
                                                @break               
                                            @case(2)                 
                                                <a href="#" rel="tag">Shirt</a>,
                                                @break 
                                            @case(3)
                                                <a href="#" rel="tag">Jacket</a>,
                                                @break 
                                            @endswitch
                                            @if ($item->for_male)
                                                <a href="#" rel="tag">Men</a>
                                            @else
                                                <a href="#" rel="tag">Women</a>
                                            @endif 
                                        </li>
                                        <li>Availability:<span class="in-stock text-success ml-5"> {{ $item->quantity }} Items In Stock</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h4 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach($relateds as $related)   
                                        @if($related->id != $item->id)
                                        <div class="col-lg-4">
                                            @livewire('item-component', [
                                                'item_id' => $related->id,
                                            ])
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-header position-relative mb-20 pb-10">
                        <h5 class="widget-title">Trending Now</h5>
                    </div>
                    <div style="width: 80%; height:80%" class="widget-area">
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">
                            @php 
                                $img_src = 'assets/imgs/banner/trend-'.rand(1, 3).'.jpg'
                            @endphp 
                            <img src="{{ asset($img_src) }}" alt="">
                        </div>
                    </div>
                    <div class="sidebar-widget widget_tags mb-50">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title">Popular tags </h5>
                        </div>
                        <div class="tagcloud">
                            <a class="tag-cloud-link" href="">Shoes</a>
                            <a class="tag-cloud-link" href="">Jacket</a>
                            <a class="tag-cloud-link" href="">Men</a>
                            <a class="tag-cloud-link" href="">Shirt</a>
                            <a class="tag-cloud-link" href="">Sport</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection