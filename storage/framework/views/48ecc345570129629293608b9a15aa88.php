<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li>Points</li>
                    </ul>
                    <h2 class="mb-2">Points Rewards</h2>
                    <p>Earn points by doing the following</p>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="points">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('login')); ?> Points</h2>
                        <p>Login Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('registration')); ?> Points</h2>
                        <p>Registration Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('new_posts_no')); ?> Points</h2>
                        <p>Post Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('comment')); ?> Points</h2>
                        <p>Comments Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('reply')); ?> Points</h2>
                        <p>Reply Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('like')); ?> Points</h2>
                        <p>Like Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('reaction')); ?> Points</h2>
                        <p>Reaction Points</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                    <div class="counter-box">
                        <div class="box-particles"><img src="<?php echo e(my_asset('uploads/settings/box-particle-2.svg')); ?>" alt="Image"></div>
                        <h2 class="mb-2"><?php echo e(get_setting('share')); ?> Points</h2>
                        <p>Share Points</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="points">
        <div class="container">
            <div class="row">
                <h2 class="my-4" data-aos="fade-up" data-aos-easing="linear">Buy Points</h2>
                <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-easing="linear">
                        <div class="counter-box">
                            <h2 class="mb-2"><?php echo e($point->value); ?> Points</h2>
                            <?php if(Auth::check()): ?>
                                <a href="#point-dialog" class="btn btn-red btn-sm px-2 has-popup">Purchase @ <?php echo e(get_setting('currency_symbol')); ?><?php echo e($point->price); ?></a>
                            <?php else: ?>
                                <a href="#point-dialog" class="btn btn-red btn-sm px-2 has-popup">Purchase @ <?php echo e(get_setting('currency_symbol')); ?><?php echo e($point->price); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php if(Auth::check()): ?>
        <div id="point-dialog" class="white-popup zoom-anim-dialog mfp-hide">
            <div class="mfp-modal-header">
                <span class="mb-2">
                    <img src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" class="rounded-circle" alt="User">
                </span>
                <h4>Your Wallet - <?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->wallet); ?></h4>
            </div>
            <div class="mfp-modal-body py-4">

                <div class="w-100 pt-3 pb-3 px-4">

                    <form id="buy_points" method="POST">
                        <?php echo csrf_field(); ?>
                        <label for="point_id">Choose Points</label>
                        <select name="point_id" id="point_id">
                            <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($point->id); ?>"><?php echo e($point->value); ?> Points - <?php echo e(get_setting('currency_symbol')); ?><?php echo e($point->price); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <button type="submit" class="btn btn-mint w-100 mt-4" id="buy_points_btn"><i class="bi bi-send fs-xl me-2"></i>Pay</button>
                    </form>

                </div>
            </div>
        </div>
    <?php else: ?>
        <div id="point-dialog" class="white-popup zoom-anim-dialog mfp-hide">
                <h4>Please login to purchase points.</h4>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.js')); ?>"></script>
<script>
    $('.has-popup').magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: false,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

    // Pay for Plan
    $(document).on('submit', '#buy_points', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#buy_points_btn").text('Sending...');
        $.ajax({
            url: '<?php echo e(route('points.buy')); ?>',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {

            end_load();

            if (response.status == 200) {

                tata.success("Success", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                window.location.reload();

            }else if(response.status == 401){

                tata.error("Error", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                window.location.reload();

            }

            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/points.blade.php ENDPATH**/ ?>