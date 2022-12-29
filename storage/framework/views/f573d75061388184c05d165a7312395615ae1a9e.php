﻿
<?php $__env->startSection('main'); ?>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <?php if(count($items)): ?>
                        <div class="totall-product">
                            <p> Your have <strong class="text-brand"><?php echo e(@count($items)); ?></strong> items in your wishlist!</p>
                        </div>
                        <?php else: ?>
                        <div class="totall-product">
                            <p> Your have no items in your wishlist</p>
                        </div>
                        <?php endif; ?>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
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
                    <?php
                        $witems = DB::table('wishlist')->where('user_id', Session::get('key')['id'])->get()->pluck('item_id')->toArray();
                    ?>
                    <?php if(isset($items)): ?>
                    <div class="row product-grid-3">
                        <?php $__currentLoopData = $witems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-6 col-sm-6 row mt-3">
                            <div class ="border-spacing">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('item-component', [
                                    'item_id' => $item                              
                                ])->html();
} elseif ($_instance->childHasBeenRendered('TZP9NPZ')) {
    $componentId = $_instance->getRenderedChildComponentId('TZP9NPZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('TZP9NPZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TZP9NPZ');
} else {
    $response = \Livewire\Livewire::mount('item-component', [
                                    'item_id' => $item                              
                                ]);
    $html = $response->html();
    $_instance->logRenderedChild('TZP9NPZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div> 
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">16</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                            </ul>
                        </nav>
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
} elseif ($_instance->childHasBeenRendered('Ly7Knpw')) {
    $componentId = $_instance->getRenderedChildComponentId('Ly7Knpw');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ly7Knpw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ly7Knpw');
} else {
    $response = \Livewire\Livewire::mount('category-component');
    $html = $response->html();
    $_instance->logRenderedChild('Ly7Knpw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filter-component')->html();
} elseif ($_instance->childHasBeenRendered('yewmt5h')) {
    $componentId = $_instance->getRenderedChildComponentId('yewmt5h');
    $componentTag = $_instance->getRenderedChildComponentTagName('yewmt5h');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('yewmt5h');
} else {
    $response = \Livewire\Livewire::mount('filter-component');
    $html = $response->html();
    $_instance->logRenderedChild('yewmt5h', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    <!-- Product sidebar Widget -->
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/wishlist.blade.php ENDPATH**/ ?>