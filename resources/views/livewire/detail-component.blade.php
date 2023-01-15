@php 
    use Illuminate\Support\Facades\DB;
@endphp
<div>
    <div class="detail-extralink">
        <div class="detail-qty border radius">
            <a href="" wire:click.prevent="raiseItem" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                <span class="qty-val">{{ $quantity }}</span>
            <a href="" wire:click.prevent="reduceItem" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
        </div>
        <div class="product-extra-link2">
            <button type="submit" class="button button-add-to-cart" wire:click.prevent="addToCart">Add to cart</button>
            @php
                $witems = DB::table('wishlist')->where('user_id', $user_id)->get()->pluck('item_id')->toArray();
            @endphp
            @if(in_array($item->id, $witems))
                <a href="" role="button" wire:click.prevent="removeWishlist({{$item->id}})" aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted" tabindex="0"><i class="fi-rs-heart"></i></a>
            @else 
                <a href="" role="button" wire:click.prevent="addWishlist({{$item->id}})" aria-label="Add To Wishlist" class="action-btn hover-up" tabindex="0"><i class="fi-rs-heart"></i></a>
            @endif
        </div>
    </div>
    <div style="width: 80px; float:left"><a style="font-size: 20px; color: #F15412;">Rating: </a></div>
    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5" />
        <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
        <input type="radio" id="star4" name="rating" value="4" />
        <label class="star" for="star4" title="Great" aria-hidden="true"></label>
        <input type="radio" id="star3" name="rating" value="3" />
        <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
        <input type="radio" id="star2" name="rating" value="2" />
        <label class="star" for="star2" title="Good" aria-hidden="true"></label>
        <input type="radio" id="star1" name="rating" value="1" />
        <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
    </div>
</div>
