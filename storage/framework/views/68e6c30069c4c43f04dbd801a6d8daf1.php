
<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>



 <div class="col-lg-6" data-aos="fade-up" data-aos-easing="linear">
    <div class="tf-author-box mb-4">
        <div class="author-avatar">
            <a href="<?php echo e(route('user', ['username' => $user->user_username])); ?>">
                <img src="<?php echo e(my_asset('uploads/users/'.$user->user_image)); ?>" alt="User">
            </a>
        </div>
        <div class="author-infor">
            <h5><a href="<?php echo e(route('user', ['username' => $user->user_username])); ?>"><?php echo e($user->user_name); ?></a>
                <?php if($user->user_verified == 1): ?>
                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                    <i class="bi bi-patch-check"></i>
                    </span>
                <?php endif; ?>
            </h5>
            <h6 class="gem"><i class="bi bi-file-ppt me-1"></i><?php echo e($user->sum_score); ?> points
                <?php $__currentLoopData = $week; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($w->user_id == $user->user_id): ?>
                        <?php if($w->sum_score_week != ''): ?>
                        <span class="tf-color ms-2">(<i class="bi bi-capslock"></i><?php echo e($w->sum_score_week); ?> this week)</span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h6>

        </div>

        <?php $__currentLoopData = $total_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($rank->user_id == $user->user_id): ?>
            <div class="order
                <?php if($key == '0' || $key == '1' || $key == '2'): ?> tf-color <?php endif; ?>
            "><?php echo e('#'.($key+1)); ?></div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3">No Users available.</h4>
            </div>

        </div>
    </div><!--/dashboard-card-->

<?php endif; ?>

<?php if($users->hasPages()): ?>
    <div class="d-flex justify-content-center">
        <?php echo $users->appends(request()->all())->links('layouts.pagination.custom'); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/partials/leaderboard.blade.php ENDPATH**/ ?>