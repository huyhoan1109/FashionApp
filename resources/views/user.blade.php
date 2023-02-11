@extends('layouts.app')
@section('main')
    <header>
        <style>
             /* Dropdown Button */
            .dropbtn {
                /* background-color: #3498DB; */
                color: #F15412;;
                /* padding: 16px; */
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            /* Dropdown button on hover & focus */
            /* .dropbtn:hover, .dropbtn:focus {
                background-color: #2980B9;
            } */

            /* The container <div> - needed to position the dropdown content */
            .dropdownShow {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: white;
                min-width: 200px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {background-color: #ddd;}

            /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
            .show {display:block;} 
        </style>
    </header>
    @php
        use App\Models\Order;
        use App\Models\Coupon;
    @endphp
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href=" {{route('home')}} " rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="coupon-tab" data-bs-toggle="tab" href="#coupon" role="tab" aria-controls="coupon" aria-selected="false"><i class="fi-rs-diamond mr-10"></i>Coupon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    @if(!$user->type)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.dashboard') }}" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Admin</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href= "{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <i class="fi-rs-sign-out mr-10"></i>Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        @php
                                            $orders = Order::where('user_id', $user->id)->get();
                                        @endphp
                                        @if(@count($orders) > 0)
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{$order->id}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            @if($order->isApproved)
                                                                <td>Approved</td>
                                                            @else
                                                                <td>Processing</td>
                                                            @endif
                                                            @php
                                                                $items = DB::table('orderItem')->where('order_id', $order->id)->get();
                                                            @endphp
                                                            @if(count($items) > 1)
                                                                <td>${{$order->total}} for {{count($items)}} items</td>
                                                            @else
                                                                <td>${{$order->total}} for 1 item</td>
                                                            @endif
                                                            <td> 
                                                                <div class="dropdownShow">
                                                                    <a onmouseover="showDrop('{{$order->id}}')" class="dropbtn">View</a>
                                                                </div> 
                                                                <div id="drop-down-order{{$order->id}}" class="dropdown-content">
                                                                    @foreach($items as $item)
                                                                        <a>{{$item->name}} x {{$item->quantity}} (${{$item->discount_price * $item->quantity}})</a>
                                                                    @endforeach
                                                                    @php 
                                                                        $usedCoupon = Coupon::find($order->coupon_id);
                                                                    @endphp
                                                                    @if(isset($usedCoupon))
                                                                        <div class="divider center_icon"><i class="fi-rs-fingerprint"></i></div>
                                                                        <a>Discount: {{$usedCoupon->discount}}%</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        @else
                                        <div class="card-body">
                                            <p>You didn't have any order</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="coupon" role="tabpanel" aria-labelledby="coupon-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Coupon</h5>
                                        </div>
                                        @php
                                            $lists = DB::table('has_coupon')->where('user_id', $user->id)->get();
                                        @endphp
                                        @if(@count($lists) > 0)
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Coupon code</th>
                                                            <th>Discount</th>
                                                            <th>Available</th>
                                                            <th>Expired at</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($lists as $info)
                                                        @php 
                                                            $coupon = Coupon::find($info->coupon_id);
                                                        @endphp
                                                        <tr>
                                                            <td>{{$coupon->coupon_code}}</td>
                                                            <td>{{$coupon->discount}}%</td>
                                                            @if($info->avail)
                                                                <td>Yes</td>
                                                            @else
                                                                <td>No</td>
                                                            @endif
                                                            <td>{{$info->expired_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        @else
                                        <div class="card-body">
                                            <p>You didn't have any coupon</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Orders tracking</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form id="track_form" class="contact-form-style mt-30 mb-50" action="{{ route('user.track') }}" method="post">
                                                        @csrf 
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing_email" placeholder="Email you used during checkout" type="email" class="square">
                                                        </div>
                                                        <button form="track_form" class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('user.update')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="firstname" type="text" value="{{ $user->firstname }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="lastname" type="text" value="{{ $user->lastname }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="address" type="text" value="{{ $user->address }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input class="form-control square" name="email" type="email" value="{{ $user->email }}" disabled>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="oldpassword" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="newpassword" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="newpassword_confirmation" type="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showDrop(id) {
            current_drop = "drop-down-order"+id;
            document.getElementById(current_drop).classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onmouseover = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
        } 
    </script>
@endsection