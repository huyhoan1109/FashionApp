<?php if($paginator->hasPages()): ?>
<ul class="pager">
    <?php if($paginator->onFirstPage()): ?>
        <li class="page-item disabled"><a>←</a></li>
    <?php else: ?>
        <li class="page-item"><a href="<?php echo e($paginator->previousPageUrl()); ?>">←</a></li>
    <?php endif; ?>
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <li class="page-item disabled"><a class="page-link"><?php echo e($element); ?></a></li>
        <?php endif; ?>
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <li class="page-item active"><a class="page-link"><?php echo e($page); ?></a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($paginator->hasMorePages()): ?>
        <li class="page-item">
            <a href="<?php echo e($paginator->nextPageUrl()); ?>">→</a>
        </li>
    <?php else: ?>
        <li class="page-item disabled">
            <a>→</a>
        </li>
    <?php endif; ?>
</ul>
<?php endif; ?><?php /**PATH /home/kaneki/20221/Lập trình Web/FashionApp/resources/views/layouts/pagination.blade.php ENDPATH**/ ?>