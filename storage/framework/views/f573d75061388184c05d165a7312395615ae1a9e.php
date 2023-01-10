
<?php $__env->startSection('main'); ?>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo e(route('home')); ?>" rel="nofollow">Home</a>
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('wishlist-component')->html();
} elseif ($_instance->childHasBeenRendered('gVvxoWZ')) {
    $componentId = $_instance->getRenderedChildComponentId('gVvxoWZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('gVvxoWZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gVvxoWZ');
} else {
    $response = \Livewire\Livewire::mount('wishlist-component');
    $html = $response->html();
    $_instance->logRenderedChild('gVvxoWZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/wishlist.blade.php ENDPATH**/ ?>