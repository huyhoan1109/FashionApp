<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p> We found <strong class="text-brand">{{$items->total()}}</strong> items for you!</p>
                    </div>
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
                @if(count($items)>0)
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
                                @php
                                    $witems = DB::table('wishlist')->where('user_id', $user_id)->get()->pluck('item_id')->toArray();
                                @endphp
                                <div class="product-action-1">
                                    <a href="{{ route('item-detail', ['item_id' => $item->id]) }}" aria-label="Quick view" class="action-btn small hover-up"><i class="fi-rs-eye"></i></a>
                                    @if(in_array($item->id, $witems))
                                        <a href="" role="button" wire:click.prevent="removeWishlist({{$item->id}})" aria-label="Remove from Wishlist" class="action-btn small hover-up wishlisted" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    @else 
                                        <a href="" role="button" wire:click.prevent="addWishlist({{$item->id}})" aria-label="Add To Wishlist" class="action-btn small hover-up" tabindex="0"><i class="fi-rs-heart"></i></a>
                                    @endif
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ url('/item-detail/'.$item->id) }}">{{ $item->name }}</a></h2>
                                @for($i=0; $i<5; $i++)
                                    @if($i < number_format($item->rate, 0))
                                        <span style="color: #F15412;" class="fa fa-star checked"></span>
                                    @else
                                        <span style="color: #F15412;" class="fa fa-star-o"></span>
                                    @endif
                                @endfor
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
            <div class="col-lg-3 primary-sidebar">
                <div class="widget-category mb-30">
                    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                    <ul class="categories">
                        <li><a role="button" href="" wire:click.prevent="getCategory(0)">All Products</a></li>
                        <li><a role="button" href="" wire:click.prevent="getCategory(1)">Clothes</a></li>
                        <li><a role="button" href="" wire:click.prevent="getCategory(2)">Shoes</a></li>
                        <li><a role="button" href="" wire:click.prevent="getCategory(3)">Shirt</a></li>
                        <li><a role="button" href="" wire:click.prevent="getCategory(4)">Jacket</a></li>
                    </ul>
                </div>
                <div class="sidebar-widget price_range range mb-30">
                    <form wire:submit.prevent="getFilter(Object.fromEntries(new FormData($event.target)))">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Filtering</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Pricing</label>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="price_filter" id="price1" value="price1">
                                    <label class="form-check-label" for="price1" data-bs-toggle="collapse">Less than $30</label>
                                    <br>
                                    <input class="form-check-input" type="radio" name="price_filter" id="price2" value="price2">
                                    <label class="form-check-label" for="price2" data-bs-toggle="collapse">$30 - $60</label>
                                    <br>
                                    <input class="form-check-input" type="radio" name="price_filter" id="price3" value="price3">
                                    <label class="form-check-label" for="price3" data-bs-toggle="collapse">$60 - $100</label>
                                    <br>
                                    <input class="form-check-input" type="radio" name="price_filter" id="price4" value="price4">
                                    <label class="form-check-label" for="price4" data-bs-toggle="collapse">$100 - $300</label>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900 mt-15">Gender</label>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="for_male" id="gender1" value="1">
                                    <label class="form-check-label" for="gender1" data-bs-toggle="collapse"><span>Male</span></label>
                                    <br>
                                    <input class="form-check-input" type="radio" name="for_male" id="gender2" value="0">
                                    <label class="form-check-label" for="gender2" data-bs-toggle="collapse"><span>Female</span></label>
                                    <br>
                                </div>
                            </div>
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Rating</label>
                                <div class="custome-radio">
                                    @for($i=1; $i<6; $i++)
                                        <input class="form-check-input" type="radio" name="rating_star" id="rating_star{{$i}}" value={{$i}}>
                                        <label class="form-check-label" for="rating_star{{$i}}" data-bs-toggle="collapse">
                                            @for($j=0; $j<$i; $j++)
                                                <span style="color: #F15412;" class="fa fa-star checked"></span>
                                            @endfor
                                        </label>
                                        <br>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <button class="submit" type="submit"><i class="fi-rs-filter mr-5"></i>Fillter</button>
                    </form>
                </div>
                <!-- Product sidebar Widget -->
            </div>
        </div>
    </div>
</section>