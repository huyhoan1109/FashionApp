@include('layouts.app')

@section('main')
   
   <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span>All Products
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
                                    All Products
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route("admin.product.add") }}" class="btn btn-sucess float-end"> Add New Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Type</th>
                                    <th>Gender</th>
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($product -> currentPage()-1 )*$product->perPage();
                                    @endphp
                                    @foreach ($product as $item)
                                        @switch($item->type)
                                            @case(1)
                                                @php
                                                    $item->type= 'Clothes'
                                                @endphp
                                                
                                                @break
                                            @case(2)
                                                @php
                                                    $item->type= 'Shirt'
                                                @endphp
                                                @break
                                            @case(3)
                                                @php
                                                    $item->type= 'Jacket'
                                                @endphp
                                                @break
                                            @case(4)
                                                @php
                                                    $item->type= 'Shoes'
                                                @endphp
                                                @break
                                            @default
                                            @php
                                            $item->type= 'Unknow'
                                            @endphp
                                            @break

                                                
                                        @endswitch

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

                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="{{ $item->image }}" alt="{{ $item->name }}" width="60"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->for_male }}</td>
                                            <td>${{ $item->price }}</td>
                                            <td>${{ $item->discount_price }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.product.edit',['product_id'=>$item->id]) }}" class="text-info" style="margin-left:20px ">Edit</a>
                                                <a  href="#" onclick="deleteConfirm({{ $item->id }})" class="text-danger" style="margin-left:20px ">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$product->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="deleteConfirm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body pb-30 pt-30">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="pb-3">Do you want to delete this product ?</h4>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirm">Cancel</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" onclick="deleteProduct()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
         <script>
            function deleteConfirm(id)
                {
                    @this.set('product_id',id)
                    {
                        $('#deleteConfirm').modal('show');
                    }
                }
            function deleteProduct(id)
            {
                @this.call('deleteProduct');
                $('#deleteConfirm').modal('hide');
            }
         </script>
            
        @endpush
   </section>

@endsection