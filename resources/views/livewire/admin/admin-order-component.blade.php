@include('layouts.app')
@section('main')
<style>
    nav svg{
        height: 20px;
    }
    nav .hidden
    {
        display: block; !important
    }
</style>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span>All Orders
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
   
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                         All Orders
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>User Id</th>
                                <th>Coupon ID</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                                <th>Note</th>
                                <th>Payment</th>
                                <th>Is Approved</th>
                                <th>Order Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = ($orders -> currentPage()-1 )*$orders->perPage();
                            @endphp
                                @foreach ($orders as $order)
                                    <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->coupon_id }}</td>
                                    <td>${{ $order->subtotal }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td>{{ $order ->note }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>{{ $order->isApproved}}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{ route('admin.ordersdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm ">Details</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       {{$orders->links()}}
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection