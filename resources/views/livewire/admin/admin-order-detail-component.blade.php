@include('layouts.app')
@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span>Order Details
        </div>
    </div>
  </div>
    <div class="container" style="padding: 30px 0;">

        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header text-danger">
                        <div class="row">
                            <div class="col-md-6">
                                Ordered Items
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('admin.orders') }}" class="btn btn-success float-end">All Orders</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                   
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Discount Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                    <tr>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href=""></a></h5>
                                            <p class="font-xs">{{ $item->name }}
                                            </p>
                                        </td>
                                        <td class="price" data-title="Price"><span>${{ $item->price }} </span></td>
                                        <td class="price" data-title="Price"><span>${{ $item->discount_price }} </span></td>
                                        <td class="price" data-title="Price"><span>{{ $item->quantity }} </span></td>
                                        <td class="price" data-title="Price"><span>${{  $item->quantity * $item->discount_price }} </span></td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding: 30px 0;">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header text-primary ">
                        <div class="row">
                            <div class="col-md-6">
                                Belong to 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                    <tr>
                                        <td class="price" data-title="Price"><span>{{ $item->firstname }} </span></td>
                                        <td class="price" data-title="Price"><span>{{ $item->lastname }} </span></td>
                                        <td class="price" data-title="Price"><span>{{ $item->email }} </span></td>
                                        <td class="price" data-title="Price"><span>{{ $item->address }} </span></td>
                                        <td class="price" data-title="Price"><span>{{ $item->phone }} </span></td>

                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12 ">
                <div class="border p-md-4 p-30 border-radius cart-totals">
                    <div class="heading_s1 mb-3">
                        <h4>Cart Totals</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach ($orderr as $itemm)
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{$itemm->subtotal}}</span></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_lable">Coupon</td>
                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{ $itemm->coupon_id }}</span></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> $1</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{ $itemm->total+1 }}</span></strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
