@extends('layouts.app')
@section('main')      
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    @livewire('cart-component', [
        'user_id' => Session::get('key')['id']
    ])
@endsection