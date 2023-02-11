<div>
<!-- BEGIN: Top Bar -->
    <div class="top-bar">

    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
    <!-- END: Top Bar -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="{{ route('admin.dashboard') }}" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i> 
                                        
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $totalCoupon }}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Coupon</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i> 
                                    
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $totalOrder }}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Orders</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i> 
                                    
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $totalItem }}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Products</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i> 
                                        
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{  $totalUser }}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Users</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="dollar-sign" class="report-box__icon text-primary"></i> 
                                        
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">${{ $totalRevenue }}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Revenue</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="dollar-sign" class="report-box__icon text-primary"></i> 
                                        
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">${{ $todayRevenue }}</div>
                                    <div class="text-base text-slate-500 mt-1 text-danger">Today' Revenue</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="credit-card" class="report-box__icon text-pending"></i> 
                                    
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $todayOrder }}</div>
                                    <div class="text-base text-slate-500 mt-1 text-danger">Today's Orders</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Today 's Orders
                        </h2>
                        
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">USER </th>
                                    <th class="text-center whitespace-nowrap">COUPON </th>
                                    <th class="text-center whitespace-nowrap">SUBTOTAL</th>
                                    <th class="text-center whitespace-nowrap">TOTAL</th>
                                    <th class="text-center whitespace-nowrap">STATUS</th>
                                    <th class="text-center whitespace-nowrap">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($todayshowOrder as $order)
                                    
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-success"> {{ $order->user->firstname}}</div>
                                            </td>
                                            <td class="w-40">
                                                @if(isset($order->coupon))
                                                <div class="flex items-center justify-center text-success">  {{ $order->coupon->coupon_code }}</div>
                                                @endif
                                            </td>
                                            {{-- <td class="text-center">88</td> --}}
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-success">  ${{ $order->subtotal}}</div>
                                            </td>
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-success">  ${{ $order->total}}</div>
                                            </td>
                                            <td class="w-40">
                                                <div class="flex items-center justify-center whitespace-nowrap {{ $order->isApproved ? 'text-success' : 'text-pending' }}">
                                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $order->isApproved ? 'Completed' : 'Pending Payment' }}
                                                </div>
                                                {{-- <div class="flex items-center justify-center text-success">  {{ $isApproved}}</div> --}}
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <a class="flex items-center mr-3 text-success" href="{{ route('admin.ordersdetails',['order_id'=>$order->id])}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Detail</a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        {{ $todayshowOrder->links() }}
                    </div>
                </div>    
                <!-- END: Weekly Top Products -->
                </div>
            </div>
        </div>
    </div>
</div>