<?php
    use App\Models\Item;
?>
<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="<?php echo e(route('cart')); ?>">
        <img src="<?php echo e(asset('assets/imgs/theme/icons/icon-cart.svg')); ?>">
        <span class="pro-count blue"><?php echo e(@count($cart)); ?></span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $info = Item::find($item->item_id)
            ?>
            <li>
                <div class="shopping-cart-img">
                    <a href="<?php echo e(url('/item-detail/'.$info->id)); ?>"><img src="<?php echo e($info->image); ?>"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="<?php echo e(url('/item-detail/'.$info->id)); ?>"> <?php echo e($info->name); ?></a></h4>
                    <h4><span><?php echo e($item->quantity); ?> × </span> <?php echo e($info->discount_price); ?></h4>
                </div>
                <div class="shopping-cart-delete">
                   <a href="" wire:click="removeItem(<?php echo e($item->id); ?>)"> <i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul> 
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total
                    <span> 
                        <?php
                            $total = 0;
                            foreach($cart as $item){
                                $info = Item::find($item->item_id);
                                $total += $info->discount_price * $item->quantity;
                            }
                        ?>
                        $<?php echo e($total); ?>

                    </span>
                </h4>
            </div>
            <div class="shopping-cart-button">
                <a href="<?php echo e(route('cart')); ?>" class="outline">View cart</a>
                <a href="<?php echo e(route('checkout')); ?>">Checkout</a>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/cart-icon-component.blade.php ENDPATH**/ ?>