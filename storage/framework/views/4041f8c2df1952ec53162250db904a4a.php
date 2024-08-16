<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.css')); ?>">
<script src="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-credit-card-2-front me-2"></i> <?php echo e(trans('pricing_plans')); ?></h4>
    </div>

    <div class="plans">
        <div class="row">

            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-easing="linear">
                    <div class="price">
                            <h4><?php echo e($plan->name); ?></h4>
                        <div class="price-price">
                            <span><b><?php echo e(get_setting('currency_symbol')); ?><?php echo e($plan->price); ?></b> /<?php echo e($plan->duration); ?></span>
                        </div>
                        <div class="price-list">
                            <ul>
                                <li><i class="bi bi-check2"></i> <?php echo e($plan->points); ?> <?php echo e(trans('points_topup')); ?></li>
                                <li class="<?php echo e($plan->verified == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->verified == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> <?php echo e(trans('verified_checkmark')); ?>

                                </li>
                                <li class="<?php echo e($plan->categories == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->categories == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('access_to_pro_categories')); ?>

                                </li>
                                <li class="<?php echo e($plan->tips == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->tips == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('access_to_tips')); ?>

                                </li>
                                <li class="<?php echo e($plan->comments == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->comments == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('allow_or_close_comments_on_posts')); ?>

                                </li>
                                <li class="<?php echo e($plan->reactions == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->reactions == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('show_or_hide_reactions_or_likes_on_posts')); ?>

                                </li>
                                <li class="<?php echo e($plan->followers == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->followers == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('allow_user_to_post_discussions_to_only_followers')); ?>

                                </li>
                                <li class="<?php echo e($plan->messages == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->messages == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('mute_chat_messages')); ?>

                                </li>
                                <li class="<?php echo e($plan->users == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->users == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('block_users')); ?>

                                </li>
                                <li class="<?php echo e($plan->viewers == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->viewers == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('view_profile_visitors')); ?>

                                </li>
                                <li class="<?php echo e($plan->ads == '0' ? 'price-disable' : ''); ?>">
                                    <i class="bi <?php echo e($plan->ads == '1' ? 'bi-check2' : 'bi-x'); ?>"></i> <?php echo e(trans('no_ads')); ?>

                                </li>
                            </ul>
                        </div>
                        <?php if(Auth::check()): ?>
                        <div class="mt-3">
                            <?php if(Auth::user()->plan_id == $plan->id): ?>
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm rounded-pill"><i class="bi bi-arrow-repeat me-1"></i><?php echo e(trans('subscribed')); ?></a>
                            <?php else: ?>
                                <a href="#sub-dialog-<?php echo e(Auth::user()->id); ?>" class="btn btn-mint btn-sm rounded-pill has-popup"><i class="bi bi-arrow-repeat me-1"></i><?php echo e(trans('subscribe_now')); ?> / <?php echo e(get_setting('currency_symbol')); ?><?php echo e($plan->price); ?></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                        <div class="dashboard-body">
                            <div class="upload-image my-3">
                                <h4 class="mb-3"><?php echo e(trans('no_pricing_plans_available')); ?>.</h4>
                            </div>
                        </div>
                    </div><!--/dashboard-card-->
                </div>

            <?php endif; ?>

        </div>
    </div>

    <?php if(Auth::check()): ?>
        <div id="sub-dialog-<?php echo e(Auth::user()->id); ?>" class="white-popup zoom-anim-dialog mfp-hide">
            <div class="mfp-modal-header">
                <span class="mb-2">
                    <img src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" class="rounded-circle" alt="User">
                </span>
                <h4><?php echo e(trans('your')); ?> <?php echo e(trans('wallet')); ?> - <?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->wallet); ?></h4>
            </div>
            <div class="mfp-modal-body py-4">

                <div class="w-100 pt-3 pb-3 px-4">

                    <form id="pay_plan" method="POST">
                        <?php echo csrf_field(); ?>
                        <label for="plan_id"><?php echo e(trans('choose_plan')); ?></label>
                        <select name="plan_id" id="plan_id">
                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($plan->id); ?>"><?php echo e($plan->name); ?> - <?php echo e(get_setting('currency_symbol')); ?><?php echo e($plan->price); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <button type="submit" class="btn btn-mint w-100 mt-4" id="pay_plan_btn"><i class="bi bi-send fs-xl me-2"></i><?php echo e(trans('pay')); ?></button>
                    </form>

                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
    $(document).on('submit', '#pay_plan', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#pay_plan_btn").text('<?php echo e(trans('sending')); ?>...');
        $.ajax({
            url: '<?php echo e(route('user.pricing.pay')); ?>',
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

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/plans/index.blade.php ENDPATH**/ ?>