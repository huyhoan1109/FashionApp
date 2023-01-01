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
                <?php if(count($items)>0): ?>
                <div class="row product-grid-3">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-6 col-sm-6 row mt-3">
                        <div class ="border-spacing">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('item-component', ['item_id' => $item->id])->html();
} elseif ($_instance->childHasBeenRendered('l3320635235-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3320635235-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3320635235-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3320635235-0');
} else {
    $response = \Livewire\Livewire::mount('item-component', ['item_id' => $item->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l3320635235-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('l3320635235-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3320635235-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3320635235-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3320635235-1');
} else {
    $response = \Livewire\Livewire::mount('category-component');
    $html = $response->html();
    $_instance->logRenderedChild('l3320635235-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filter-component')->html();
} elseif ($_instance->childHasBeenRendered('l3320635235-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l3320635235-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3320635235-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3320635235-2');
} else {
    $response = \Livewire\Livewire::mount('filter-component');
    $html = $response->html();
    $_instance->logRenderedChild('l3320635235-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <!-- Product sidebar Widget -->
            </div>
        </div>
    </div>
</section><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/shop-component.blade.php ENDPATH**/ ?>