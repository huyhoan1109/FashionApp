@php
    use App\Models\Order;
    use App\Models\Coupon;
    use Illuminate\Support\Facades\DB;
@endphp
<head>
    <style>
        th {
            text-align: center;
        }
        td {
            text-align: center;
        }
        body{
            margin-top:20px;
            background:#eee;
        }

        .invoice {
            background: #fff;
            padding: 20px
        }

        .invoice-company {
            font-size: 20px
        }

        .invoice-header {
            margin: 0 -20px;
            background: #f0f3f4;
            padding: 20px
        }

        .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%
        }

        .invoice-from,
        .invoice-to {
            padding-right: 20px
        }

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px
        }

        .invoice-note {
            color: #999;
            margin-top: 80px;
            font-size: 85%
        }

        .invoice>div:not(.invoice-footer) {
            margin-bottom: 20px
        }

        .btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
                <span class="pull-right hidden-print"></span>
                Nike, Inc
            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            @php
                $order = Order::find($order_id);
                $items = DB::table('orderItem')->where('order_id', $order_id)->get();
            @endphp
            <div class="invoice-header">
                <div class="invoice-from">
                <small>From</small>
                <address class="m-t-8 m-b-8">
                    <strong class="text-inverse">Nike, Inc.</strong><br>
                    Street Address<br>
                    City, Zip Code<br>
                    Phone: (123) 456-7890<br>
                    Fax: (123) 456-7890
                </address>
                </div>
                <div class="invoice-to">
                <small>To</small>
                <address class="m-t-8 m-b-8">    
                    <span style="white-space: pre-line;">{{$order->note}}</span>
                </address>
                </div>
                <div class="invoice-date">
                    <small>Invoice</small>
                    <div class="date text-inverse m-t-5">{{ now() }}</div>
                </div>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                <table class="table table-invoice">
                    <thead>
                        <tr>
                            <th width="50%">PRODUCT</th>
                            <th width="20%">PRICE</th>
                            <th width="20%">DISCOUNT PRICE</th>
                            <th width="10%">QUANTITY</th>
                            <th width="30%">PAID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td width="50%"> {{$item->name}}</td>
                            <td width="20%"> ${{ number_format($item->price, 2) }} </td>
                            <td width="20%"> ${{ number_format($item->discount_price, 2) }} </td>
                            <td width="10%"> {{ $item->quantity }} </td>
                            <td width="30%"> ${{ number_format($item->quantity * $item->discount_price, 2) }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
                <div class="invoice-price-left">
                    <div class="invoice-price-row">
                        <div class="sub-price">
                            <small>SUBTOTAL</small>
                            <span class="text-inverse">${{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        @if(isset($order->coupon_id))
                            @php 
                                $coupon = Coupon::find($order->coupon_id);
                            @endphp
                            <div class="sub-price">
                            </div>
                            <div class="sub-price">
                                <small>COUPON ({{number_format(100 * $coupon->discount, 2)}}%)</small>
                                <span class="text-inverse">${{number_format($order->subtotal * $coupon->discount, 2)}}</span>
                            </div>
                        @endif 
                    </div>
                </div>
                <div class="invoice-price-right">
                    <small>TOTAL</small> <span class="f-w-600">${{ number_format($order->total, 2) }}</span>
                </div>
                </div>
                <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
            <!-- <div class="invoice-note">
                * Make all cheques payable to [Your Company Name]<br>
                * Payment is due within 30 days<br>
                * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
            </div> -->
            <!-- end invoice-note -->
            <!-- begin invoice-footer -->
            <div class="invoice-footer">
                <p class="text-center m-b-5 f-w-600">
                THANK YOU FOR YOUR BUSINESS
                </p>
                <p class="text-center">
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:0000000000</span>
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> get-nike.com.vn</span>
                </p>
            </div>
            <!-- end invoice-footer -->
        </div>
    </div>
</div>