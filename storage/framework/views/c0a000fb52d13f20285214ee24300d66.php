<?php if($paginator->hasPages()): ?>
<div class="pagination" data-aos="fade-up" data-aos-easing="linear">
    <?php if($paginator->onFirstPage()): ?>
        <a class="page-numbers btn-start"> <i class="b bi-chevron-double-left"></i></a>
    <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="page-numbers btn-start"> <i class="b bi-chevron-double-left"></i></a>
    <?php endif; ?>
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <li class="disabled"><span><?php echo e($element); ?></span></li>
        <?php endif; ?>
        <span class="page-numbers pagination-space"> <i class="bi bi-three-dots"></i> </span>
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <a class="page-numbers current"><span><?php echo e($page); ?></span></a>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>" class="page-numbers"><span><?php echo e($page); ?></span></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <span class="page-numbers pagination-space"> <i class="bi bi-three-dots"></i> </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="page-numbers btn-end"><i class="bi bi-chevron-double-right"></i></a>
    <?php else: ?>
        <a class="page-numbers btn-end"><i class="bi bi-chevron-double-right"></i></a>
    <?php endif; ?>
</div>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/pagination/custom.blade.php ENDPATH**/ ?>