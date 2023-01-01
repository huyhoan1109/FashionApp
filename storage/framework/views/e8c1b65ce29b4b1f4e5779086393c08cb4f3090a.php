
<?php $__env->startSection('main'); ?>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> <?php echo e($item->name); ?>

            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="<?php echo e($item->image); ?>" alt="product image">
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <div><img src="<?php echo e($item->image); ?>" alt="product image"></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-facebook.svg')); ?>" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-twitter.svg')); ?>" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-instagram.svg')); ?>" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-pinterest.svg')); ?>" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail"> <?php echo e($item->name); ?> </h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">$<?php echo e(number_format($item->discount_price, 2)); ?></span></ins>
                                            <ins><span class="old-price font-md ml-15">$<?php echo e(number_format($item->price, 2)); ?></span></ins>
                                            <span class="save-price  font-md color3 ml-15"> <?php echo e(number_format(($item->price - $item->discount_price)/($item->price) * 100, 0)); ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p><?php echo e($item->description); ?></p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <ul class="list-filter color-filter">
                                            <li class="active">
                                                <a href="#" data-color="Red"><span class="product-color-red"></span></a>
                                            </li>
                                            <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                            <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                            <li><a href="#" data-color="Blue"><span class="product-color-blue"></span></a></li>
                                            <li><a href="#" data-color="White"><span class="product-color-white"></span></a>
                                            <li><a href="#" data-color="Black"><span class="product-color-black"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <ul class="list-filter size-filter font-small">
                                            <li><a href="#">S</a></li>
                                            <li class="active"><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#"><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">Tags: 
                                            <?php switch($item->type):             
                                            case (0): ?>                 
                                                <a href="#" rel="tag">Clothes</a>,                
                                                <?php break; ?>               
                                            <?php case (1): ?>                 
                                                <a href="#" rel="tag">Shoes</a>,                 
                                                <?php break; ?>               
                                            <?php case (2): ?>                 
                                                <a href="#" rel="tag">Shirt</a>,
                                                <?php break; ?> 
                                            <?php case (3): ?>
                                                <a href="#" rel="tag">Jacket</a>,
                                                <?php break; ?> 
                                            <?php endswitch; ?>
                                            <?php if($item->for_male): ?>
                                                <a href="#" rel="tag">Men</a>
                                            <?php else: ?>
                                                <a href="#" rel="tag">Women</a>
                                            <?php endif; ?> 
                                        </li>
                                        <li>Availability:<span class="in-stock text-success ml-5"> <?php echo e($item->stock); ?> Items In Stock</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <?php $__currentLoopData = $relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                    <div class="col-lg-4">
                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('item-component', [
                                            'item_id' => $related->id,
                                        ])->html();
} elseif ($_instance->childHasBeenRendered('y3gdNxF')) {
    $componentId = $_instance->getRenderedChildComponentId('y3gdNxF');
    $componentTag = $_instance->getRenderedChildComponentTagName('y3gdNxF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('y3gdNxF');
} else {
    $response = \Livewire\Livewire::mount('item-component', [
                                            'item_id' => $related->id,
                                        ]);
    $html = $response->html();
    $_instance->logRenderedChild('y3gdNxF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-component')->html();
} elseif ($_instance->childHasBeenRendered('aX70PN0')) {
    $componentId = $_instance->getRenderedChildComponentId('aX70PN0');
    $componentTag = $_instance->getRenderedChildComponentTagName('aX70PN0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('aX70PN0');
} else {
    $response = \Livewire\Livewire::mount('category-component');
    $html = $response->html();
    $_instance->logRenderedChild('aX70PN0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filter-component')->html();
} elseif ($_instance->childHasBeenRendered('OeKWi5a')) {
    $componentId = $_instance->getRenderedChildComponentId('OeKWi5a');
    $componentTag = $_instance->getRenderedChildComponentTagName('OeKWi5a');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OeKWi5a');
} else {
    $response = \Livewire\Livewire::mount('filter-component');
    $html = $response->html();
    $_instance->logRenderedChild('OeKWi5a', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="<?php echo e(asset('assets/imgs/shop/thumbnail-3.jpg')); ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="#">Chen Cardigan</a></h5>
                                <p class="price mb-0 mt-5">$99.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="<?php echo e(asset('assets/imgs/shop/thumbnail-4.jpg')); ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="#">Chen Sweater</a></h6>
                                <p class="price mb-0 mt-5">$89.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:80%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="<?php echo e(asset('assets/imgs/shop/thumbnail-5.jpg')); ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="#">Colorful Jacket</a></h6>
                                <p class="price mb-0 mt-5">$25</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/item-detail.blade.php ENDPATH**/ ?>