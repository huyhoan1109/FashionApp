@include('layouts.app')
@section('main')  
   <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span>Add New User
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
                                    Add New User
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route("admin.users") }}" class="btn btn-sucess float-end">All User</a>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>    
                            @endif
                            <form wire:submit.prevent="addUser">
                                <div class="mb-3 mt-3">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Enter User's Firstname " wire:model="firstname">
                                    @error('firstname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="lastname" name="lastname" class="form-control" placeholder="Enter User's Lastname" wire:model="lastname">
                                    @error('lastname')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="gender" class="form-label">Type</label>
                                   <select name="gender" class="form-control" wire:mode="gender" >
                                        <option value="0">Men</option>
                                        <option value="1">Women</option>
                                   </select>
                                    @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter User's Email" wire:model="email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Enter User's Password" wire:model="password ">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter User's Phone Number" wire:model="phone">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="type" class="form-label">Type</label>
                                   <select name="type" class="form-control" wire:mode="type" >
                                        <option value="1">User</option>
                                        <option value="2">Admin</option>
                                   </select>
                                    @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
@endsection@include('layouts.app')
@section('main')  
   <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span>Add New Product
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
                                    Add New Product
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route("admin.products") }}" class="btn btn-sucess float-end">All Products</a>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>    
                            @endif
                            <form wire:submit.prevent="submit">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Product's Name " wire:model="name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter Product's Quantity" wire:model="quantity">
                                    @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="for_male" class="form-label">Type</label>
                                   <select name="for_male" class="form-control" wire:mode="for_male" placeholder="Type">
                                        <option value="1">Men</option>
                                        <option value="2">Women</option>
                                        <option value="3">Both</option>
                                   </select>
                                    @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="type" class="form-label">Type</label>
                                   <select name="type" class="form-control" wire:mode="type" placeholder="Type">
                                        <option value="1">Clothes</option>
                                        <option value="2">Shoes</option>
                                        <option value="3">Shirt</option>
                                        <option value="4">Jacket</option>
                                   </select>
                                    @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter Product's Price" wire:model="price">
                                    @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="discount_price" class="form-label">Discount Price</label>
                                    <input type="text" name="discount_price" class="form-control" placeholder="Enter Product's Discount_price" wire:model="discount_price">
                                    @error('discount_price')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="Enter Product's Description" wire:model="description">
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                     @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
@endsection