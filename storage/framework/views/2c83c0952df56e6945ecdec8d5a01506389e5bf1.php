<div class="product-cart-wrap hover-up">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="<?php echo e(route('item-detail', ['item_id' => $item->id])); ?>">
                <img class="default-img" width="200" height="300" src="<?php echo e($item->image); ?>" alt="">
                <img class="hover-img" width="200" height=300" src="<?php echo e($item->image); ?>" alt="">
            </a>
        </div>
        <?php
            $witems = DB::table('wishlist')->where('user_id', Session::get('key')['id'])->get()->pluck('item_id')->toArray();
        ?>
        <div class="product-action-1">
            <a href="<?php echo e(route('item-detail', ['item_id' => $item->id])); ?>" aria-label="Quick view" class="action-btn small hover-up"><i class="fi-rs-eye"></i></a>
            <?php if(in_array($item->id, $witems)): ?>
                <a href="" role="button" wire:click.prevent="removeWishlist(<?php echo e($item->id); ?>)" aria-label="Remove from Wishlist" class="action-btn small hover-up wishlisted" tabindex="0"><i class="fi-rs-heart"></i></a>
            <?php else: ?> 
                <a href="" role="button" wire:click.prevent="addWishlist(<?php echo e($item->id); ?>)" aria-label="Add To Wishlist" class="action-btn small hover-up" tabindex="0"><i class="fi-rs-heart"></i></a>
            <?php endif; ?>
        </div>
        <div class="product-badges product-badges-position product-badges-mrg">
            <span class="hot">Hot</span>
        </div>
    </div>
    <div class="product-content-wrap">
        <h2><a href="<?php echo e(url('/item-detail/'.$item->id)); ?>"><?php echo e($item->name); ?></a></h2>
        <div class="rating-result" title="90%">
            <span>
            </span>
        </div>
        <div class="product-price">
            <span> $<?php echo e(number_format($item->discount_price, 2)); ?> </span>
            <span class="old-price"> $<?php echo e(number_format($item->price, 2)); ?></span>
        </div>
        <div class="product-action-1 show">
            <a role="button" wire:click.prevent="addToCart(<?php echo e($item->id); ?>)" aria-label="Add To Cart" class="action-btn hover-up" href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
        </div>
    </div>
</div><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/item-component.blade.php ENDPATH**/ ?>