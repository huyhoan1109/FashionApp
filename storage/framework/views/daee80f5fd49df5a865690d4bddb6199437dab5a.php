
<?php $__env->startSection('main'); ?>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="#" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('checkout-component')->html();
} elseif ($_instance->childHasBeenRendered('KzCdfmu')) {
    $componentId = $_instance->getRenderedChildComponentId('KzCdfmu');
    $componentTag = $_instance->getRenderedChildComponentTagName('KzCdfmu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KzCdfmu');
} else {
    $response = \Livewire\Livewire::mount('checkout-component');
    $html = $response->html();
    $_instance->logRenderedChild('KzCdfmu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/checkout.blade.php ENDPATH**/ ?>