<div>
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">

        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </nav>
        
        
        
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Midone" src="{{ asset('admin/dist/images/profile-5.jpg') }}">
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
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">User Information</h2>
    </div>
    
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="ml-auto mr-auto justify-center">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal  font-medium text-lg">{{ $user->lastname}} {{ $user->firstname}}</div>
                    <br>
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i><p>Email :</p>
                        <div class="ml-2 text-slate-500 text-danger">
                            {{ $user->email }}
                        </div>
                    </div>
                    <br>
                    <!-- <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="key" class="w-4 h-4 mr-2"></i><p>Password :</p>
                        <div class="ml-2 text-slate-500 text-danger">
                            {{ $user->password }}
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i><p>Address:</p>
                        <div class="ml-2 text-success">{{ $user->address  }}</div>
                        
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="phone-call" class="w-4 h-4 mr-2"></i> <p>Phone :</p>
                        <div class="ml-2 text-success">{{ $user->phone }}</div>
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i> <p>Gender :</p>
                        <i  class="ml-2 text-success"></i> {{ $user->gender ? 'Female' : 'Male' }}
                    </div>
                    
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5">Created at</div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 flex">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                        <span class=" font-medium text-success">
                            {{ $user->created_at  }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Profile Info -->
    <!-- BEGIN: Product Information -->
    <div class="intro-y box p-5 mt-5">
        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
            <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> User Information
            </div>
            <div class="mt-5">
                @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                @endif
                <form id="form-update-user" wire:submit.prevent="submitUser(Object.fromEntries(new FormData($event.target)))" method="post" class="items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">User 's First Name</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="text" class="form-control" placeholder="{{ $user->firstname }}" name="firstname">
                        <div class="form-help text-right">Maximum character : 255</div>
                    </div>
                    <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">User 's Last Name</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="text" class="form-control" placeholder="{{ $user->lastname}}" name="lastname">
                        <div class="form-help text-right">Maximum character : 255</div>
                    </div>
                     <!--Gender-->
                     <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Gender</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select id="category" class="form-select" name="gender">
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                        </select>
                        <div class="form-help text-right">Pick the choice</div>
                    </div> 
                    <!--EMAIL-->
                    <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Email</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="text" class="form-control" placeholder="{{ $user->email }}" name="email">
                        <div class="form-help text-right">Maximum character : 255</div>
                    </div>
                    
                    
                    <!--Password-->
                    <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Password</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="password" class="form-control" name="password">
                        <div class="form-help text-right">Maximum character : 255</div>
                    </div>

                    <!--Phone-->
                    <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Phone</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="text" class="form-control" placeholder="{{ $user->phone }}" name="phone">
                        <div class="form-help text-right"> Maximum character : 255</div>
                    </div>
      
                    <!--address--> 
                    <br>
                    <div class="form-label ">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Address</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
        
                        </div>
                    </div>
                    
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea id="product-name" type="text" class="form-control" placeholder="{{ $user->address}}" name="address"></textarea>
                        <div class="form-help text-right">Maximum character 0/2000</div>
                    </div>
                    <br>
                    <br>
                    <div class="w-full mt-3 xl:mt-0 flex-1 xl:text-right">
                        <button class="btn btn-primary w-44" type="submit" form="form-update-user">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>Update User
                        </button>
                    </div>
                    <!--image-->
                </form>
                
            </div>
        </div>
    </div>
    <!-- END: Product Information -->
        
        
    </div>
</div>