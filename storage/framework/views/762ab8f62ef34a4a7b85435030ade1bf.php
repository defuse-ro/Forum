<?php $__env->startSection('content'); ?>


    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li><?php echo e($page->title); ?></li>
                    </ul>
                    <h2 class="mb-2"><?php echo e($page->title); ?></h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="content" data-aos="fade-up" data-aos-easing="linear">
                <?php echo $page->description; ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pages/index.blade.php ENDPATH**/ ?>