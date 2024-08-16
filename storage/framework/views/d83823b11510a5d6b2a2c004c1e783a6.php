<?php $__env->startSection('content'); ?>


    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li>Badges</li>
                    </ul>
                    <h2 class="mb-2">Badges</h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="badges">
        <div class="row">
            <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="badges-box" data-aos="fade-up" data-aos-easing="linear">
                    <div class="badges-badge"> Points: <?php echo e($badge->score); ?> </div>
                    <div class="badges-box-img">
                        <img src="<?php echo e(my_asset('uploads/badges/'.$badge->image)); ?>" class="img-fluid" alt="User">
                    </div>
                    <div class="badges-title-box">
                        <h3 class="mb-2"><?php echo e($badge->name); ?></h3>
                        <p><?php echo e($badge->description); ?></p>
                    </div>
                </div><!--/leadeboard-box-->

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pages/badges.blade.php ENDPATH**/ ?>