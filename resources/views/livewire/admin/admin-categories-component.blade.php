<div>
    <!-- BEGIN: Top Bar -->
<div class="top-bar">

    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Nike Store</div>
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
    @switch($category_id)
        @case(1)
            @php
                $category= 'Clothes'
            @endphp     
            @break
        @case(3)
            @php
                $category= 'Shirt'
            @endphp
            @break
        @case(4)
            @php
                $category= 'Jacket'
            @endphp
            @break
        @case(2)
            @php
                $category= 'Shoes'
            @endphp
            @break
        @default
        @php
        $category= 'Unknown'
        @endphp
        @break                
    @endswitch
<h2 class="intro-y text-lg font-medium mt-10">{{ $category }} List</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="dropdown"> 
                    <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">
                        Choose category
                    </button> 
                    <div class="dropdown-menu w-40"> 
                        <ul class="dropdown-content"> 
                            <li> <a href="{{ route('admin.categories',['category_id'=>'1'])  }}" class="dropdown-item">Clothes </a> </li>
                            <li> <a href="{{ route('admin.categories',['category_id'=>'4'])  }}" class="dropdown-item">Jacket</a> </li> 
                            <li> <a href="{{ route('admin.categories',['category_id'=>'3'])  }}" class="dropdown-item">Shirt</a> </li> 
                            <li> <a href="{{ route('admin.categories',['category_id'=>'2'])  }}" class="dropdown-item">Shoes</a> </li> 
                        </ul> 
                    </div> 
                </div> 
                
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">ID</th>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">PRODUCT NAME</th>
                    <th class="text-center whitespace-nowrap">STOCK</th>
                    <th class="text-center whitespace-nowrap">GENDER</th>
                    <th class="text-center whitespace-nowrap">PRICE</th>
                    <th class="text-center whitespace-nowrap">DISCOUNT PRICE</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    @switch($item->for_male)
                    @case(1)
                        @php
                            $item->for_male= 'Men'
                        @endphp
                        
                        @break
                    @case(2)
                        @php
                            $item->for_male= 'Women'
                        @endphp
                        @break
                    @case(3)
                        @php
                            $item->type= 'Both'
                        @endphp
                        @break
                    @default
                        
                    @endswitch
                    <tr class="intro-x">
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="w-60">
                            <div class="flex">
                                <div class="w-20 h-20 image-fit zoom-in -ml-5">
                                    <img alt="Product's Image" class="tooltip rounded-full" src="{{ $item->image }}" title=" {{ $item->description}}" >
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href=""class="font-medium whitespace-nowrap">{{ Str::limit($item->name, 30, '...') }}</a>
                        </td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-center">{{ $item->for_male }}</td>
                        <td class="text-center text-primary">${{ $item->price }}</td>
                        <td class="text-center text-primary">${{ $item->discount_price}}</td>
                        
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-success" href="{{ route('admin.product.edit',['product_id'=>$item->id]) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
        {{ $product->links('vendor.livewire.bootstrap') }}
    </div>
    <!-- BEGIN: Modal Toggle -->
 
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
                    <button wire:click.prevent="deleteProduct()" class="btn btn-danger w-24">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div> 
 
 <!-- END: Modal Content -->
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevron-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div> --}}
    <!-- END: Pagination -->
</div>
