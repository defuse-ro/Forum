<?php $__env->startSection('content'); ?>

    <div class="mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-people me-2"></i> Followers & Following</h4>
    </div>

    <div class="row g-4" data-aos="fade-up" data-aos-easing="linear">
        <div class="col-12">
            <div class="vine-tabs pb-0 px-2 px-lg-0 rounded-top">
                <ul class="nav nav-tabs nav-bottom-line nav-responsive border-0 nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link mb-0 <?php echo e(Route::is('followers') ? 'active' : ''); ?>" href="<?php echo e(route('followers')); ?>">
                            <i class="bi bi-people fa-fw me-2"></i>Followers (<?php echo e(Auth::user()->followers->count()); ?>)
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link mb-0 <?php echo e(Route::is('following') ? 'active' : ''); ?>" href="<?php echo e(route('following')); ?>">
                            <i class="bi bi-person-add me-2"></i> Following (<?php echo e(Auth::user()->followings->count()); ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="mt-5">
                <?php if(Route::is('followers') ): ?>
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = Auth::user()->followers()->with('followers')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear">
                                <div class="follow-box">
                                    <div class="img">
                                        <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>">
                                            <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="User">
                                        </a>
                                    </div>
                                    <div class="mt10">
                                        <span>
                                            <a class="h5" href="<?php echo e(route('user', ['username' => $follower->username])); ?>"><?php echo e($follower->name); ?></a>
                                        </span>
                                        <?php if($follower->verified == 1): ?>
                                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                                                <i class="bi bi-patch-check"></i>
                                            </span>
                                        <?php endif; ?><br>
                                        <span class="mb-0 small"><i class="bi bi-person-check me-1"></i>
                                            <span id="followers-<?php echo e($follower->id); ?>"><?php echo e($follower->followers->count()); ?></span>
                                             followers
                                        </span>
                                    </div>
                                    <div class="mt10">
                                        <?php if(Auth::check()): ?>
                                            <?php if(Auth::user()->id != $follower->id): ?>
                                            <a href="javascript:void(0);" id="<?php echo e($follower->id); ?>" class="btn rounded-pill <?php if(Auth::user()->isFollowing($follower)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> followUser">

                                                <?php if(Auth::user()->isFollowing($follower)): ?><i class="bi bi-person-check me-1"></i> Following <?php else: ?> <i class="bi bi-person-add me-1"></i> Follow <?php endif; ?>
                                            </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="#follow-dialog" class="btn btn-mint rounded-pill has-popup"><i class="bi bi-person-add me-1"></i>Follow</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                <div class="dashboard-body">
                                    <div class="upload-image my-3">
                                        <h4 class="mb-3">No Followers available.</h4>
                                    </div>

                                </div>
                            </div><!--/dashboard-card-->

                        <?php endif; ?>
                    </div>

                <?php elseif(Route::is('following')): ?>
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = Auth::user()->followings()->with('followable')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear">
                                <div class="follow-box">
                                    <div class="img">
                                        <a href="<?php echo e(route('user', ['username' => $following->followable->username])); ?>">
                                            <img src="<?php echo e(my_asset('uploads/users/'.$following->followable->image)); ?>" alt="User">
                                        </a>
                                    </div>
                                    <div class="mt10">
                                        <span>
                                            <a class="h5" href="<?php echo e(route('user', ['username' => $following->followable->username])); ?>"><?php echo e($following->followable->name); ?></a>
                                        </span>
                                        <?php if($following->followable->verified == 1): ?>
                                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                                                <i class="bi bi-patch-check"></i>
                                            </span>
                                        <?php endif; ?><br>
                                        <span class="mb-0 small"><i class="bi bi-person-check me-1"></i>
                                            <span id="followers-<?php echo e($following->followable->id); ?>"><?php echo e($following->followable->followers->count()); ?></span>
                                             following
                                        </span>
                                    </div>
                                    <div class="mt10">
                                        <?php if(Auth::check()): ?>
                                            <?php if(Auth::user()->id != $following->followable->id): ?>
                                            <a href="javascript:void(0);" id="<?php echo e($following->followable->id); ?>" class="btn rounded-pill <?php if(Auth::user()->isFollowing($following->followable)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> followUser">

                                                <?php if(Auth::user()->isFollowing($following->followable)): ?><i class="bi bi-person-check me-1"></i> Following <?php else: ?> <i class="bi bi-person-add me-1"></i> Follow <?php endif; ?>
                                            </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="#follow-dialog" class="btn btn-mint rounded-pill has-popup"><i class="bi bi-person-add me-1"></i>Follow</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                <div class="dashboard-body">
                                    <div class="upload-image my-3">
                                        <h4 class="mb-3">User has not followed anyone yet.</h4>
                                    </div>

                                </div>
                            </div><!--/dashboard-card-->

                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

    $(document).on('click', '.followUser', function(e) {
        e.preventDefault();
        let a = $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '<?php echo e(route('follow')); ?>',
            method: 'post',
            dataType: "json",
            data: {item: a},
            success: function(e) {

                var t;

                if (e.bool === true){

                    $("#" + a).removeClass('btn-mint');
                    $("#" + a).addClass('btn-danger');
                    $("#" + a).text("Following");
                    t = $("#followers-" + a).text(), $("#followers-" + a).text(++t);

                }else if(e.bool === false){

                    $("#" + a).removeClass('btn-danger');
                    $("#" + a).addClass('btn-mint');
                    $("#" + a).text("Follow");
                    t = $("#followers-" + a).text(), $("#followers-" + a).text(--t);

                }

                if (e.status == 200) {

                    tata.success("Success", e.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                }
            },
            error: function(e) {

                tata.error("Error", 'Please Login to Follow', {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });
            }
        });
    });

    $(document).on('mouseout' , '.btn-danger' , function(e) {
        let a = $(this).attr('id');
        $("#" + a).text("Following");
    });
    $(document).on('mouseover' , '.btn-danger' , function(e) {
        let a = $(this).attr('id');
        $("#" + a).text("UnFollow");
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/overview/followers.blade.php ENDPATH**/ ?>