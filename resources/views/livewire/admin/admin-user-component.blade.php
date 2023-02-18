<div>
<div>
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">

        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">User List</li>
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
    <h2 class="intro-y text-lg font-medium mt-10">User List</h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button class="btn btn-primary shadow-md mr-2"><a href="{{  route('admin.user.add') }}">Add New User</a></button>
                
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            @if (session()->has('message'))
            <div class="alert alert-success show mb-2" role="alert">{{ session('message') }}</div>
                
            @endif
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">USER NAME</th>               
                        <th class="text-center whitespace-nowrap">GENDER</th>
                        <th class="text-center whitespace-nowrap">PHONE</th>
                        <th class="text-center whitespace-nowrap">ADDRESS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $human)
                        <tr class="intro-x">
                            <td>
                                <a href=""class="font-medium whitespace-nowrap">{{ $human->lastname}} {{ $human->firstname }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $human->email }}</div>
                            </td>
                            <td class="text-center text-primary">{{ $human->gender }}</td>
                            <td class="text-center">{{ $human->phone }}</td>
                            <td class="text-center ">{{ $human->address }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-primary whitespace-nowrap mr-5" href="{{ route('admin.user.detail',['user_id'=>$human->id])}}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details
                                    </a>
                                    <a class="flex items-center mr-3" href="{{ route('admin.user.edit',['user_id'=>$human->id]) }}">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <div>
                                        <button class="flex items-center text-danger" wire:click.prevent="getConfirm({{$human->id}})" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
            {{ $user->links() }}
        </div>
        <!-- BEGIN: Modal Toggle -->
     
     <!-- BEGIN: Modal Content -->
     <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete this user? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> 
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> 
                        <button wire:click.prevent="deleteUser()" class="btn btn-danger w-24">Delete</button>
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
</div>