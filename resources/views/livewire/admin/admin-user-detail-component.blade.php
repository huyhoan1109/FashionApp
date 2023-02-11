<div>
    <div class="top-bar">

        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">User List</li>
            </ol>
        </nav>
        
        
        
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="ADMIN" src="{{asset('admin/dist/images/profile-5.jpg')}}">
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
            <h2 class="text-lg font-medium mr-auto">User <i class=" text-primary">{{ $user_id }}</i> Details</h2>
            <button class="btn btn-primary shadow-md mr-2"><a href="{{  route('admin.users') }}">Back to User List</a></button>
        </div>

    <!-- BEGIN: user Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">User Informations</div>
                </div>
                <div class="flex items-center">
                    <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <a href="" class=" ml-1">ID: {{ $user_id }}</a>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="user-check" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Name:  {{ $user->lastname }} {{ $user->firstname }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="user" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Gender: {{ $user->gender }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="mail" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Mail: {{ $user->email }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="phone" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Phone: {{ $user->phone }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Address: {{ $user->address }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Created Date: {{ $user->created_at}}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="dollar-sign" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Total Paying: ${{ $sum }}</p>
                </div>
                <div class="flex items-center mt-3">
                    <i data-lucide="gift" class="w-4 h-4 text-slate-500 mr-2"></i>
                    <p class=" ml-1">Total Order: {{ $orders->count() }}</p>
                </div>
            </div>
            <br>
            <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
                <div class="box p-5 rounded-md">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate">User Coupons</div>                        
                    </div>
                    <div class="overflow-auto lg:overflow-visible -mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap text-center !py-5">Coupon</th>
                                    <th class="whitespace-nowrap text-center">Discount</th>
                                    <th class="whitespace-nowrap text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\HasCoupon;
                                    use App\Models\Coupon;
                                    $myCoupons = HasCoupon::where('user_id', $user->id)->get();
                                @endphp
                                @foreach ($myCoupons as $user_coupon)
                                    <tr>
                                        @php
                                            $thisCoupon = Coupon::find($user_coupon->coupon_id);
                                        @endphp
                                        <td class="!py-4">
                                            <div class="flex items-center">       
                                                <a href="" class="font-medium whitespace-nowrap ml-4">{{ $thisCoupon->coupon_code }}</a>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $thisCoupon->discount }}%</td> 
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <button class="flex items-center text-danger" wire:click.prevent="getConfirm({{$user_coupon->id}})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>         
            </div>
            <br>
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Add Coupon</div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <div class="justify-center flex">
                        <div class="dropdown"> 
                            <button class=" dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">Coupon List</button>
                            <div class="dropdown-menu w-60"> 
                                <ul class="dropdown-content"> 
                                    @foreach ($couponList as $coupon)
                                        <button wire:click.prevent='addCoupon({{$coupon->id}})' class="dropdown-item">{{ $coupon->coupon_code }} - {{ $coupon->discount }}% </button> 
                                    @endforeach                  
                                </ul> 
                            </div> 
                        </div> 
                    </div>
                </div>
                <br>
            </div>
        </div>
        <!-- BEGIN: Modal Content -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">Do you really want to delete this product? <br>This process cannot be undone.</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> 
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> 
                            <button wire:click.prevent="deleteCoupon()" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- END: Modal Content -->
                    
        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Order List</div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap !py-5">Order ID</th>
                                <th class="whitespace-nowrap text-center">Paying</th>
                                <th class="whitespace-nowrap text-center">Day</th>
                                <th class="whitespace-nowrap text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="!py-4">
                                        <div class="flex items-center">
                                            <a href="" class="font-medium whitespace-nowrap ml-4">{{ $order->id }}</a>
                                        </div>
                                    </td>
                                    <td class="text-center">${{ $order->total}}</td>
                                    <td class="text-center">{{ $order->created_at }}</td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="{{ route('admin.ordersdetails',['order_id'=>$order->id])}}">
                                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div> 
    </div>
</div>   