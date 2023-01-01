<?php 
    use App\Models\Item;
?>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total = 0; 
                            ?>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $info = Item::find($item->item_id); 
                                ?>
                                <tr>
                                    <td class="image product-thumbnail"><img src="<?php echo e($info->image); ?>" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="<?php echo e(url('/item-detail/'.$item->item_id)); ?>"><?php echo e($info->name); ?></a></h5>
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price"><span><?php echo e($info->discount_price); ?> </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius m-auto">
                                            <a href="" wire:click.prevent="raiseItem(<?php echo e($item->id); ?>)" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            <span class="qty-val"><?php echo e($item->quantity); ?></span>
                                            <a href="" wire:click.prevent="reduceItem(<?php echo e($item->id); ?>)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        </div>
                                    </td>
                                    <?php 
                                        $subtotal = $item->quantity * $info->discount_price; 
                                    ?>
                                    <td class="text-right" data-title="Cart">
                                        <span><?php echo e($subtotal); ?> </span>
                                    </td>
                                    <?php 
                                        $total += $subtotal; 
                                    ?>
                                    <td class="action" data-title="Remove"><a href="" wire:click.prevent="removeItem(<?php echo e($item->id); ?>)" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(@count($cart) != 0): ?>
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i>Clear Cart</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="cart-action text-end">
                    <a class="btn mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                    <a href="<?php echo e(route('shop')); ?>"class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                </div>
                <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                <div class="row mb-50">
                    <div class="col-lg-6 col-md-12">
                        <div class="mb-30 mt-50">
                            <div class="heading_s1 mb-3">
                                <h4>Apply Coupon</h4>
                            </div>
                            <div class="total-amount">
                                <div class="left">
                                    <div class="coupon">
                                        <form wire:submit.prevent="addCoupon" target="_blank">
                                            <div class="form-row row justify-content-center">
                                                <div class="form-group col-lg-6">
                                                    <input class="font-medium" wire:model="coupon_code" placeholder="Enter Your Coupon">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <button type="submit" class="btn btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="border p-md-4 p-30 border-radius cart-totals">
                            <div class="heading_s1 mb-3">
                                <h4>Cart Totals</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">All</td>
                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">$<?php echo e(number_format($total, 2)); ?></span></strong></td>
                                        </tr>
                                        <?php if($discount!=0): ?>
                                        <tr>
                                            <td class="cart_total_label">Discount</td>
                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand"><?php echo e(number_format($discount * 100, 2)); ?>%</span></strong></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">$<?php echo e(number_format($total * (1-$discount), 2)); ?></span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="<?php echo e(route('checkout')); ?>" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/cart-component.blade.php ENDPATH**/ ?>