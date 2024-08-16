<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li>Stats</li>
                    </ul>
                    <h2 class="mb-2">Stats</h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="stats">
        <div class="container">
            <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                            <div class="number-counter"><span class="number"><span class="counter"><?php echo e($users); ?></span></span></div>
                            <h6 class="title">Users</h6>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                            <div class="number-counter"><span class="number"><span class="counter"><?php echo e($posts); ?></span></span></div>
                            <h6 class="title">Posts</h6>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                            <div class="number-counter"><span class="number"><span class="counter"><?php echo e($comments); ?></span></span></div>
                            <h6 class="title">Comments</h6>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                            <div class="number-counter"><span class="number"><span class="counter"><?php echo e($replies); ?></span></span></div>
                            <h6 class="title">Replies</h6>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                            <div class="number-counter"><span class="number"><span class="counter"><?php echo e($categories); ?></span></span></div>
                            <h6 class="title">Categories</h6>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                            <div class="number-counter"><span class="number"><span class="counter"><?php echo e($tags); ?></span></span></div>
                            <h6 class="title">Tags</h6>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="online-users">
        <div class="container">
            <div class="row">
                <h2 class="my-4" data-aos="fade-up" data-aos-easing="linear">Online Users</h2>
                <?php $__empty_1 = true; $__currentLoopData = $online; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-2" data-aos="fade-up" data-aos-easing="linear">
                        <div class="online-user text-center">
                            <a href="<?php echo e(route('user', ['username' => $user->username])); ?>">
                                <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" alt="user"></a>
                            <div class="name"><a href="<?php echo e(route('user', ['username' => $user->username])); ?>"><?php echo e($user->name); ?></a></div>
                            <div class="info"><?php echo e('@'.$user->username); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p data-aos="fade-up" data-aos-easing="linear">No online users currently</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(my_asset('assets/vendors/waypoints/waypoints.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/counter-up/counter-up.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/frontend/js/counterup.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/stats.blade.php ENDPATH**/ ?>