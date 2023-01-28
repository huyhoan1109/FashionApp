@include('layouts.app')
@section('main')
<div class="page-header breadcrumb-wrap">
  <div class="container">
      <div class="breadcrumb">
          <a href="/" rel="nofollow">Home</a>
          <span></span>Dashboard
      </div>
  </div>
</div>
<div class="content">   
  <style>
      .content {
        padding-top: 40px;
        padding-bottom: 40px;
      }
      .icon-stat {
          display: block;
          overflow: hidden;
          position: relative;
          padding: 15px;
          margin-bottom: 1em;
          background-color: #fff;
          border-radius: 4px;
          border: 1px solid #ddd;
      }
      .icon-stat-label {
          display: block;
          color: #999;
          font-size: 13px;
      }
      .icon-stat-value {
          display: block;
          font-size: 28px;
          font-weight: 600;
      }
      .icon-stat-visual {
          position: relative;
          top: 22px;
          display: inline-block;
          width: 32px;
          height: 32px;
          border-radius: 4px;
          text-align: center;
          font-size: 16px;
          line-height: 30px;
      }
      .bg-pri {
          color: #fff;
          background: #d74b4b;
      }
      .bg-second {
          color: #fff;
          background: #6685a4;
      }
      
      .icon-stat-footer {
          padding: 10px 0 0;
          margin-top: 10px;
          color: #aaa;
          font-size: 12px;
          border-top: 1px solid #eee;
      }
  </style>
  <div class="container">
      <div class="row">
          <div class="col-md-3 col-sm-6">    
            <div class="icon-stat">    
              <div class="row">
                <div class="col-xs-8 text-left">
                  <span class="icon-stat-label">Total Revenue</span>
                  <br>
                  <span class="icon-stat-value">${{ $totalRevenue }}</span>
                </div>   
                <div class="col-xs-4 text-center">
                  <i class="fa fa-dollar icon-stat-visual bg-pri"></i>
                </div>
              </div>    
              <div class="icon-stat-footer">
                <i class="fas fa-clock"></i> Updated Now
              </div>    
            </div>    
          </div>    
          <div class="col-md-3 col-sm-6">    
            <div class="icon-stat">    
              <div class="row">
                <div class="col-xs-8 text-left">
                  <span class="icon-stat-label">Total Users</span>
                  <br>
                  <span class="icon-stat-value">{{ $totalUser }}</span>
                </div>    
                <div class="col-xs-4 text-center">
                  <i class="fa fa-gift icon-stat-visual bg-second"></i>
                </div>
              </div>    
              <div class="icon-stat-footer">
                <i class="fa fa-clock-o"></i> Updated Now
              </div>   
            </div>
          </div>
          <div class="col-md-3 col-sm-6">    
            <div class="icon-stat">    
              <div class="row">
                <div class="col-xs-8 text-left">
                  <span class="icon-stat-label">Today Revenue</span>
                  <br>
                  <span class="icon-stat-value">${{ $todayRevenue }}</span>
                </div>    
                <div class="col-xs-4 text-center">
                  <i class="fa fa-dollar icon-stat-visual bg-pri"></i>
                </div>
              </div>    
              <div class="icon-stat-footer">
                <i class="fa fa-clock-o"></i> Updated Now
              </div>
            </div>    
          </div>    
          <div class="col-md-3 col-sm-6">    
            <div class="icon-stat">    
              <div class="row">
                <div class="col-xs-8 text-left">
                  <span class="icon-stat-label">Today Orders</span>
                  <br>
                  <span class="icon-stat-value">{{ $todayOrder }}</span>
                </div>    
                <div class="col-xs-4 text-center">
                  <i class="fa fa-gift icon-stat-visual bg-second"></i>
                </div>
              </div>    
              <div class="icon-stat-footer">
                <i class="fa fa-clock-o"></i> Updated Now
              </div>    
            </div>    
          </div>    
        </div>        
  </div>    
</div>
<section class="mt-50 mb-50">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6">
                              Today's Orders
                          </div>
                          <div class="col-md-6">
                              <a href="{{ route('admin.orders') }}" class="btn btn-sucess float-end"> All Orders</a>
                          </div>
                      </div>
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
                          $i = ($todayshowOrder -> currentPage()-1 )*$todayshowOrder->perPage();
                      @endphp
                          @foreach ($todayshowOrder as $order)
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
                 {{$todayshowOrder->links()}}
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection