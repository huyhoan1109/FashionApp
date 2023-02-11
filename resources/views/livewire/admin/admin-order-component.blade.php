<div>
<!-- BEGIN: Top Bar -->
<div class="top-bar">

    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order List</li>
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
<h2 class="intro-y text-lg font-medium mt-10">Order List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500">
                    <input type="text" class="form-control w-48 box pr-10" placeholder="Search by id...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
 
            </div>
            
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            @if (session()->has('message'))
            <br>
            <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
            <table class="table table-report -mt-2">

                <thead>
                    <tr>
                     
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">BUYER NAME</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="whitespace-nowrap">PAYMENT</th>
                        <th class="text-right whitespace-nowrap">
                            <div class="pr-16">TOTAL </div>
                        </th>
                        <th class="whitespace-nowrap">TIME</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($orders as $order)
                        <tr class="intro-x">
                            
                            <td class="w-40 !py-4">
                                <a href="" class=" whitespace-nowrap">{{ $order->id }}</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">{{ $order->user->firstname }}</a>
                                
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $order->user->address }}</div>

                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap {{ $order->isApproved  ? 'text-success' : 'text-pending' }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $order->isApproved  ? 'Completed' : 'Pending Payment' }}
                                </div>
                            </td>
                            <td>
                                <div class="whitespace-nowrap">
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
                            </td>
                            <td class="w-40 text-right">
                                <div class="pr-16">${{ $order->total }}</div>
                            </td>
                            <td>
                               
                                <div class="whitespace-nowrap">{{ $order->created_at }}</div>
    
                        </td>
                            <td class="table-report__action">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap mr-5" href="{{ route('admin.ordersdetails',['order_id'=>$order->id])}}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details
                                    </a>
                                    <button class="flex items-center text-primary" wire:click.prevent="updateOrder({{ $order->id }})" >
                                        <i data-lucide="arrow-left-right" class="w-4 h-4 mr-1"></i> Change Status
                                    </button>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
        <!-- END: Data List -->
    </div>
</div>