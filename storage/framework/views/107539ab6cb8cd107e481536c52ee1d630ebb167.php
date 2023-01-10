<div class="row product-grid-4">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 row mt-4">
    <div class ="product-cart-wrap mb-30">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('item-component', [
            'item_id' => $item->id
        ])->html();
} elseif ($_instance->childHasBeenRendered('l3623374933-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3623374933-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3623374933-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3623374933-0');
} else {
    $response = \Livewire\Livewire::mount('item-component', [
            'item_id' => $item->id
        ]);
    $html = $response->html();
    $_instance->logRenderedChild('l3623374933-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/livewire/tab-component.blade.php ENDPATH**/ ?>