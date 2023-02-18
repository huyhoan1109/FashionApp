<div>
    <div class="top-bar">

        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order {{ $order_id }} Details</li>
            </ol>
        </nav>
        
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-5.jpg')}}">
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary text-white">
                    <li class="p-2">
                        <div class="font-medium">Admin</div>
                        <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Software Engineer</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    
                    <li>
                        <a href="{{route('home')}}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Back to Home </a>
                    </li>
                </ul>
            </div>
        </div>
    </div> 
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Order <i class=" text-primary">{{ $order_id }}</i> Details</h2>
        <button class="btn btn-primary shadow-md mr-2"><a href="{{  route('admin.orders') }}">Back to Order List</a></button>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Order Details</div>
                </div>
                
                <div class="flex items-center">
                    <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> ID: <a href="" class=" ml-1">{{ $order_id }}</a>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>Purchase Date: <p class=" ml-1">{{ $order->created_at }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="clock" class="w-4 h-4 text-slate-500 mr-2"></i>Transaction Status: 
                    <span class="flex items-center justify-center whitespace-nowrap ml-1  text-danger">
                        @switch($order->state)
                                    @case(1)
                                    Completed
                                        @break
                                    @case(0)
                                    Pending Payment
                                        @break
                                    @case(2)
                                        Cancel
                                        @break
                                @endswitch
                       
                    </span>
                </div>
                <div class="flex items-center mt-3">
                <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                <p class=" ml-1"></p>
                <br>
                <span style="white-space: pre-line;">{{$order->note}}</span>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Buyer Details</div>
                    <a href="{{ route('admin.user.detail',['user_id'=>$order->user_id])}}" class="flex items-center ml-auto text-primary">
                        <i data-lucide="edit" class="w-4 h-4 mr-2"></i> View Details
                    </a>
                </div>
                <div class="flex items-center">
                    <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Name: <a href="" class=" ml-1">{{ $order->user->lastname }} {{ $order->user->firstname }}</a>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Phone Number: <p class=" ml-1" >{{$order->user->phone }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i> Address: <p class=" ml-1" >{{$order->user->address }}</p>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Payment Details</div>
                </div>
                <div class="flex items-center">
                    <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Payment Method: 
                    <div class="ml-auto">
                        
                        @switch($order->payment)
                            @case(1)
                                Cash On Delivery
                                @break
                            @case(2)
                                Credit card
                                @break
                            @case(3)
                                Paypal
                                @break
                        @endswitch

                    </div>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total Price ({{ $orderItem->count() }} items): <div class="ml-auto">${{ $order->subtotal }}</div>
                </div>
                @php 
                    use App\Models\Coupon;
                    $coupon = Coupon::find($order->coupon_id);
                @endphp
                @if(isset($coupon))
                <div class="flex items-center mt-3">
                    <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Discount: <div class="ml-auto">{{ $coupon->coupon_code }} {{ $coupon->discount }}%</div>
                </div>
                @endif
                <div class="flex items-center mt-3">
                    <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i>  Shipping Cost : <div class="ml-auto">$1</div>
                </div>
            
                <div class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                    <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Grand Total: <div class="ml-auto">${{  $order->total+1  }}</div>
                </div>
            </div>
        
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Order Details</div>     
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap !py-5">Product</th>
                                <th class="whitespace-nowrap text-right">Unit Price</th>
                                <th class="whitespace-nowrap text-right">Unit Discount Price</th>
                                <th class="whitespace-nowrap text-right">Quantity</th>
                                <th class="whitespace-nowrap text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItem as $ot)
                                <tr>
                                    <td class="!py-4">
                                        <div class="flex items-center">
                                            <a href="" class="font-medium whitespace-nowrap ml-4">{{ Str::limit($ot->name, 10, '...') }}</a>
                                        </div>
                                    </td>
                                    <td class="text-right">${{ $ot->price }}</td>
                                    <td class="text-right">${{ $ot->discount_price }}</td>
                                    <td class="text-right">{{$ot->quantity}}</td>
                                    <td class="text-right">${{ $ot->discount_price * $ot->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- END: Transaction Details -->