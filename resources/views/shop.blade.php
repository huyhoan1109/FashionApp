@extends('layouts.app')
@section('main')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Shop
                @if ($item_name != null)
                <span></span> {{ $item_name }}
                @endif 
            </div>
        </div>
    </div>
    @livewire('shop-component', [
        'item_name' => $item_name
    ])
@endsection