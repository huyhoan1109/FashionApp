<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    @if(count($items))
                    <div class="totall-product">
                        <p> Your have <strong class="text-brand">{{ $items->total() }}</strong> items in your wishlist!</p>
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
                                    <span> {{ $sortBy }} <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="{{$sortBy=='Featured' ? 'active':''}}" href="" wire:click.prevent="changeSort('Featured')">Featured</a></li>
                                    <li><a class="{{$sortBy=='Low to High' ? 'active':''}}" href="" wire:click.prevent="changeSort('Low to High')">Price: Low to High</a></li>
                                    <li><a class="{{$sortBy=='High to Low' ? 'active':''}}" href="" wire:click.prevent="changeSort('High to Low')">Price: High to Low</a></li>
                                    <li><a class="{{$sortBy=='Newest' ? 'active':''}}" href="" wire:click.prevent="changeSort('Newest')">Newest</a></li>
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
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('item-detail', ['item_id' => $item->id]) }}">
                                        <img class="default-img" width="200" height="300" src="{{ $item->image }}" alt="">
                                        <img class="hover-img" width="200" height=300" src="{{ $item->image }}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a href="{{ route('item-detail', ['item_id' => $item->id]) }}" aria-label="Quick view" class="action-btn small hover-up"><i class="fi-rs-eye"></i></a>
                                    <a href="" role="button" wire:click.prevent="removeWishlist({{$item->id}})" aria-label="Remove from Wishlist" class="action-btn small hover-up wishlisted" tabindex="0"><i class="fi-rs-heart"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ url('/item-detail/'.$item->id) }}">{{ $item->name }}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span> ${{ number_format($item->discount_price, 2) }} </span>
                                    <span class="old-price"> ${{ number_format($item->price, 2) }}</span>
                                </div>
                                <div class="product-action-1 show">
                                    <a role="button" wire:click.prevent="addToCart({{$item->id}})" aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <div class="d-flex justify-content-center mx-auto">
                        {{ $items->links('vendor.livewire.bootstrap') }}
                    </div> 
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