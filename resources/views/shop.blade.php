@extends('layouts.app')
@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    @livewire('shop-component')
@endsection