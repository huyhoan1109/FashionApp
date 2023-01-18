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
    <div style="float:left;" class="star-rating">
        <a style="font-size: 18px; color: #F15412; float:left; width: 80px;">Rating: </a>
        <div class="star-rating__wrap">
            @for($i=5; $i>0; $i--)
                <input class="star-rating__input" wire:click="$emit('post_my_rate')" wire:model="submit_rate" id="star-rating-{{$i}}"" type="radio" name="rating" value="{{$i}}">
                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-{{$i}}" title="{{$i}} out of 5 stars"></label>
            @endfor
        </div>
    </div>
</div>
