<div>
    <div class="top-bar">

        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add A New Product</li>
            </ol>
        </nav>
         
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Midone - HTML Admin Template" src="{{ asset('admin/dist/images/profile-5.jpg') }}">
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
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add Product</h2>
    </div>
    <div class="grid grid-cols-11 gap-x-6 mt-5 pb-20">
        <div class="intro-y col-span-11 2xl:col-span-9">
            
            
            <div class="intro-y box p-5 mt-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Product Information
                    </div>
                    <div class="mt-5">
                        @if (session()->has('message'))
                            <br>
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                        <form id="form_add_item" wire:submit.prevent="submitItem(Object.fromEntries(new FormData($event.target)))" method="post" class="items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Product Name</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        Include min. 40 characters to make it more attractive and easy for buyers to find, consisting of product type, brand, and information such as color, material, or type.
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="product-name" type="text" class="form-control" placeholder="Product name" name="product_name">
                                <div class="form-help text-right">Maximum character : 255</div>
                            </div>
                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Category</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select id="category" class="form-select" name="type">
                                    <option value="1">Clothes</option>
                                        <option value="2">Shoes</option>
                                        <option value="3">Shirt</option>
                                        <option value="4">Jacket</option>
                                </select>
                                <div class="form-help text-right">Pick the choice</div>
                            </div>  
                            
                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Gender</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <select id="category" class="form-select" name="for_male">
                                    <option value="1">Men</option>
                                    <option value="2">Women</option>
                                    <option value="3">Both</option>
                                </select>
                                <div class="form-help text-right">Pick the choice</div>
                            </div>  

                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">In Stock</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="product-name" type="number" class="form-control" placeholder="Quantity" name="quantity">
                                <div class="form-help text-right">Enter the quantity</div>
                            </div>
                            
                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Product Image</div>
                                        <!-- <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div> -->
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        <div>The image format is .jpg .jpeg .png and a minimum size of 300 x 300 pixels (For optimal images use a minimum size of 700 x 700 pixels).</div>

                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="product-image" type="text" class="form-control" placeholder="Image" name="image">
                                <div class="form-help text-right">Enter the image</div>
                            </div>

                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Price</div>
                                        <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <div class="sm:grid grid-cols-4 gap-2">
                                    <div class="input-group w-full">
                                        <div class="input-group-text">$</div>
                                        <input type="text" class="form-control mt-3 sm:mt-0 " placeholder="Price" name="price">
                                        <input type="text" class="form-control mt-3 sm:mt-0" placeholder="Discount Price" name="discount_price">
                                    </div>  
                                </div>
                                <div class="form-help text-left">Enter the price</div>
                            </div>                       
                            <br>
                            <div class="form-label ">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Product Description</div>
                                        {{-- <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div> --}}
                                    </div>
                                    <div class="leading-relaxed text-slate-500 text-xs mt-3">
                                        <div>Make sure the product description provides a detailed explanation of your product so that it is easy to understand and find your product.</div>
                                        <div class="mt-2">It is recommended not to enter info on mobile numbers, e-mails, etc. into the product description to protect your personal data.</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <textarea id="product-name" type="text" class="form-control" placeholder="Product description" name="description"></textarea>
                                <div class="form-help text-right">Maximum character 0/2000</div>
                            </div>
                            <br>
                            <br>
                            <div class="w-full mt-3 xl:mt-0 flex-1 xl:text-right">
                                <button class="btn btn-primary w-44" type="submit" form="form_add_item">
                                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Product
                                </button>
                            </div>
                        </form>      
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>