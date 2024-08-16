<?php $__env->startSection('content'); ?>


    <div class="d-flex justify-content-between mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-bell me-2"></i> Notifications</h4>
        <a href="javascript:void(0);" onclick="markAsReadTwo()" class="btn btn-sm btn-danger rounded-pill"><i class="bi bi-check-circle me-2"></i>Mark as Read</a>
    </div>

    <div class="mb-5">

        <?php $__empty_1 = true; $__currentLoopData = Auth::user()->all_notifications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="d-flex align-items-center justify-content-between py-3 border-bottom px-lg-6 px-4 notification-card read" data-aos="fade-up" data-aos-easing="linear">
            <div class="d-flex">
                <div class="avatar avatar-xl me-3">
                    <img class="rounded-circle" src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($notification->sender_id)->image)); ?>" alt="User">
                </div>
                <div class="me-3 flex-1">
                <h5><?php echo e(App\Models\User::find($notification->sender_id)->name); ?></h5>
                <p class="text-muted small mb-2"><?php echo e($notification->created_at->diffForHumans()); ?></p>
                <?php if($notification->notification_type == "Comment"): ?>

                <p><span class="me-1">💬</span>Commented on your Post
                    <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="fw-bold">
                        "<?php echo e(App\Models\Posts::find($notification->post_id)->title); ?>" </a></p>

                <?php elseif($notification->notification_type == "Reply"): ?>

                <p><span class="me-1">💬</span>Replied on your Comment of Post
                    <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="fw-bold">
                        "<?php echo e(App\Models\Posts::find($notification->post_id)->title); ?>" </a></p>

                <?php elseif($notification->notification_type == "Like Post"): ?>

                    <p><span class="me-1">👍</span>Liked your Post
                        <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="fw-bold">
                            "<?php echo e(App\Models\Posts::find($notification->post_id)->title); ?>" </a></p>

                <?php elseif($notification->notification_type == "Like Comment"): ?>

                    <p><span class="me-1">👍</span>Liked your Comment on Post
                        <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="fw-bold">
                            "<?php echo e(App\Models\Posts::find($notification->post_id)->title); ?>" </a></p>

                <?php elseif($notification->notification_type == "Like Reply"): ?>

                    <p><span class="me-1">👍</span>Liked your Reply on Post
                        <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="fw-bold">
                            "<?php echo e(App\Models\Posts::find($notification->post_id)->title); ?>" </a></p>

                <?php elseif($notification->notification_type == "React Post"): ?>

                    <p>
                        <?php if(App\Models\Reactions::find($notification->react_id)->type == 'like'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></span>
                        <?php elseif(App\Models\Reactions::find($notification->react_id)->type == 'love'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></span>
                        <?php elseif(App\Models\Reactions::find($notification->react_id)->type == 'haha'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></span>
                        <?php elseif(App\Models\Reactions::find($notification->react_id)->type == 'wow'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></span>
                        <?php elseif(App\Models\Reactions::find($notification->react_id)->type == 'yay'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></span>
                        <?php elseif(App\Models\Reactions::find($notification->react_id)->type == 'sad'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></span>
                        <?php elseif(App\Models\Reactions::find($notification->react_id)->type == 'mad'): ?>
                            <span class="me-1"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></span>
                        <?php endif; ?>

                        Reacted on your Post
                        <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="fw-bold">
                            "<?php echo e(App\Models\Posts::find($notification->post_id)->title); ?>" </a></p>

                <?php elseif($notification->notification_type == "Following User"): ?>

                    <p>Followed you.</p>

                <?php elseif($notification->notification_type == "Tip"): ?>

                    <p>Sent you a tip of <?php echo e(get_setting('currency_symbol')); ?><?php echo e(App\Models\Payment::find($notification->tip_id)->amount); ?>.</p>

                <?php endif; ?>
                </div>
            </div>
            <a href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.notifications.destroy')); ?>','<?php echo e($notification->id); ?>','Delete this Notification');" class="remove-icon-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove"><i class="bi bi-x"></i></a>
        </div><!--/notification-card-->

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="row g-0">
                <div class="col-12">

                    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                        <div class="dashboard-body">
                            <div class="upload-image my-3">
                                <h4 class="mb-3">No notifications available.</h4>
                             </div>

                        </div>
                    </div><!--/dashboard-card-->

                </div>
            </div>

        <?php endif; ?>


    </div>

    <div class="d-flex justify-content-center">
        <?php echo Auth::user()->all_notifications()->links('layouts.pagination.custom'); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/notifications/index.blade.php ENDPATH**/ ?>