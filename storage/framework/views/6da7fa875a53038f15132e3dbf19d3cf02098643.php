<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p> We found <strong class="text-brand"><?php echo e(@count($items)); ?></strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> <?php echo e($pageSize); ?> <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="<?php echo e($pageSize==12 ? 'active':''); ?>" href="" wire:click.prevent="changePageSize(12)">12</a></li>
                                    <li><a class="<?php echo e($pageSize==15 ? 'active':''); ?>" href="" wire:click.prevent="changePageSize(15)">15</a></li>
                                    <li><a class="<?php echo e($pageSize==25 ? 'active':''); ?>" href="" wire:click.prevent="changePageSize(25)">25</a></li>
                                    <li><a class="<?php echo e($pageSize==32 ? 'active':''); ?>" href="" wire:click.prevent="changePageSize(32)">32</a></li>
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
                <?php if(count($items)>0): ?>
                <div class="row product-grid-3">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="<?php echo e(route('item-detail', ['item_id' => $item->id])); ?>">
                                        <img class="default-img" width="200" height="300" src="<?php echo e($item->image); ?>" alt="">
                                        <img class="hover-img" width="200" height=300" src="<?php echo e($item->image); ?>" alt="">
                                    </a>
                                </div>
                                <?php
                                    if (Session::has('key')){
                                        $witems = DB::table('wishlist')->where('user_id', Session::get('key')['id'])->get()->pluck('item_id')->toArray();
                                    } else {
                                        $witems = [];
                                    }
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
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <div class="d-flex justify-content-center mx-auto">
                        <?php echo e($items->links('vendor.livewire.bootstrap')); ?>

                    </div>  
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-component')->html();
} elseif ($_instance->childHasBeenRendered('l3320635235-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3320635235-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3320635235-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3320635235-0');
} else {
    $response = \Livewire\Livewire::mount('category-component');
    $html = $response->html();
    $_instance->logRenderedChild('l3320635235-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filter-component')->html();
} elseif ($_instance->childHasBeenRendered('l3320635235-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3320635235-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3320635235-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3320635235-1');
} else {
    $response = \Livewire\Livewire::mount('filter-component');
    $html = $response->html();
    $_instance->logRenderedChild('l3320635235-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <!-- Product sidebar Widget -->
            </div>
        </div>
    </div>
</section><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/shop-component.blade.php ENDPATH**/ ?>