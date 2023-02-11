@extends('layouts.admin')
@section('main')
    @switch($value)
    @case(1)
        @livewire("admin.admin-add-coupon-component")
        @break
    @case(2)
        @livewire("admin.admin-add-product-component")
        @break
    @case(3)
        @livewire("admin.admin-add-user-component")
        @break
    @case(4)
        @livewire("admin.admin-coupon-component")
        @break
    @case(5)
        @livewire("admin.admin-edit-product-component",
        [
            'product_id' => $product_id
        ])
        @break
    @case(6)
        @livewire("admin.admin-edit-user-component",
        [
            'user_id' => $user_id
        ])
        @break
    @case(7)
        @livewire("admin.admin-order-component")
        @break
    @case(8)
        @livewire("admin.admin-order-detail-component", [
            'order_id' => $order_id
        ])
        @break
    @case(9)
        @livewire("admin.admin-product-component")
        @break
    @case(10)
        @livewire("admin.admin-user-component")
        @break
    @case(11)
        @livewire("admin.admin-user-detail-component", [
            'user_id' => $user_id
        ])
        @break
    @case(12)
    @livewire("admin.admin-categories-component", [
        'category_id' => $category_id
    ])
    @break
    @default
        @livewire("admin.admin-dashboard-component")
        @break
    @endswitch
@endsection