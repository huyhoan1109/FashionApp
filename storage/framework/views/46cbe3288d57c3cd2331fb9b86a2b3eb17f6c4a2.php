<section class="mt-50 mb-50">
    <div class="container">
        <form wire:submit.prevent="createOrder(Object.fromEntries(new FormData($event.target)))" method="post"> 
        <div class="row">
            <div class="col-md-6">
                <div class="mb-25">
                    <h4>Billing Details</h4>
                </div>
                <?php if($user->type != 2): ?>
                    <div class="form-group">
                        <input type="text" required="" name="firstname" value="<?php echo e($user->firstname); ?>" placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" name="lastname" required="" value="<?php echo e($user->lastname); ?>" placeholder="Last name *">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" name="billing_address" value="<?php echo e($user->address); ?>" placeholder="Billing address *">
                    </div>
                    <div class="form-group">
                        <input type="text" required="" name="phone" type="text" value="<?php echo e($user->phone); ?>" placeholder="Phone *">
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <input type="text" name="firstname" required="" placeholder="First name *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" required="" placeholder="Last name *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="billing_address" required="" placeholder="Billing address *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" required="" placeholder="Phone *">
                    </div>
                <?php endif; ?>
                <div class="mb-20">
                    <h5>Additional information</h5>
                </div>
                <div class="form-group mb-30">
                    <textarea rows="5" name="extra_note" placeholder="Order notes"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="mb-20">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    use App\Models\Item;
                                ?>
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $info = Item::find($item->item_id);
                                    $subtotal = $item->quantity * $info->discount_price;
                                ?>
                                <tr>
                                    <td class="image product-thumbnail"><img src="<?php echo e($info->image); ?>"></td>
                                    <td>
                                        <i class="ti-check-box font-small text-muted mr-10"></i>
                                        <h5><a href="<?php echo e(url('/item-detail/'.$info->id)); ?>"><?php echo e($info->name); ?></a></h5> <span class="product-qty">x <?php echo e($item->quantity); ?></span>
                                    </td>
                                    <td>$<?php echo e(number_format($subtotal, 2)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th>Price</th>
                                    <td class="product-subtotal" colspan="2">$<?php echo e(number_format($price, 2)); ?></td>
                                </tr>
                                <?php if($user->type != 2): ?>
                                <tr>
                                    <th>Shipping + Coupon</th>
                                    <td colspan="2"><em>Free Shipping + (<?php echo e(number_format($coupon->discount * 100, 2)); ?>% discount)</em></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>Total</th>
                                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900" >$<?php echo e(number_format($total, 2)); ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    <div class="payment_method">
                        <div class="mb-25">
                            <h5>Payment</h5>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="pay1" value="pay1" checked>
                                <label class="form-check-label" for="pay1" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="pay2" value="pay2">
                                <label class="form-check-label" for="pay2" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="pay3" value="pay3">
                                <label class="form-check-label" for="pay3" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</section><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/checkout-component.blade.php ENDPATH**/ ?>