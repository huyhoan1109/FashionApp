<div class="product-cart-wrap hover-up">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="{{ route('item-detail', ['item_id' => $item->id]) }}">
                <img class="default-img" width="200" height="300" src="{{ $item->image }}" alt="">
                <img class="hover-img" width="200" height=300" src="{{ $item->image }}" alt="">
            </a>
        </div>
        @php
            $witems = DB::table('wishlist')->where('user_id', Session::get('key')['id'])->get()->pluck('item_id')->toArray();
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