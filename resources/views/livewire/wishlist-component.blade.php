<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    @if(count($items))
                    <div class="totall-product">
                        <p> Your have <strong class="text-brand">{{ @count($items) }}</strong> items in your wishlist!</p>
                    </div>
                    @else
                    <div class="totall-product">
                        <p> Your have no items in your wishlist</p>
                    </div>
                    @endif
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="{{$pageSize==12 ? 'active':''}}" href="" wire:click.prevent="changePageSize(12)">12</a></li>
                                    <li><a class="{{$pageSize==15 ? 'active':''}}" href="" wire:click.prevent="changePageSize(15)">15</a></li>
                                    <li><a class="{{$pageSize==25 ? 'active':''}}" href="" wire:click.prevent="changePageSize(25)">25</a></li>
                                    <li><a class="{{$pageSize==32 ? 'active':''}}" href="" wire:click.prevent="changePageSize(32)">32</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($items))
                <div class="row product-grid-3">
                    @foreach($items as $item)
                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                @livewire('item-component', [
                                    'item_id' => $item->item_id
                                ])
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                        </ul>
                    </nav> -->
                </div>
                @endif
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
                @livewire('category-component')
                @livewire('filter-component')
                <!-- Product sidebar Widget -->
            </div>
        </div>
    </div>
</section>