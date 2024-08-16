

<?php $__empty_1 = true; $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="comments-box" data-aos="fade-up" data-aos-easing="linear">

        <div class="card comments-box-header">
            <div class="card-header card-header-action">
                <div class="media align-items-center justify-content-between">
                    <div class="media-head me-2">
                        <div class="avatar">
                            <a href="<?php echo e(route('user', ['username' => $reply->comment->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$reply->comment->user->image )); ?>" alt="user" class="avatar-img rounded-circle"></a>
                        </div>
                    </div>
                    <div class="media-body">
                        <div><a href="<?php echo e(route('home.post', ['post_id' => $reply->comment->post->post_id, 'slug' => $reply->comment->post->slug])); ?>"><?php echo e($reply->comment->post->title); ?></a></div>
                        <div class="fs-7">
                            <a href="<?php echo e(route('user', ['username' => $reply->comment->user->username])); ?>"><?php echo e($reply->comment->user->name); ?></a>
                            <?php if($reply->comment->user->verified == 1): ?>
                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                                    <i class="bi bi-patch-check"></i>
                                </span>
                            <?php endif; ?>
                            <span class="ms-1"> <?php echo e($reply->comment->post->created_at->diffForHumans()); ?> <?php echo e(trans('in')); ?> </span> <a href="<?php echo e(route('category', ['slug' => $reply->comment->post->category->slug])); ?>" class="cat"><?php echo e($reply->comment->post->category->name); ?></a></div>
                    </div>
                </div>
                <div class="card-action-wrap">
                    <?php if(Auth::check()): ?>
                        <?php if(Auth::user()->id === $reply->user->id): ?>
                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="<?php echo e(route('user.replies.edit', ['id' => $reply->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('reply')); ?></a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.replies.destroy')); ?>','<?php echo e($reply->id); ?>','<?php echo e(trans('delete_this_reply')); ?>');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('reply')); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="comments-box-body">
            <div class="content">
                <?php echo $reply->body; ?>

            </div>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="row g-0">
        <div class="col-12">

            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-body">
                    <div class="upload-image my-3">
                        <h4 class="mb-3"><?php echo e(trans('no_replies_available')); ?>.</h4>
                    </div>

                </div>
            </div><!--/dashboard-card-->

        </div>
    </div>

<?php endif; ?>

<?php if($replies->hasPages()): ?>
<div class="d-flex justify-content-center" id="user_replies" data-aos="fade-up" data-aos-easing="linear">
    <?php echo $replies->appends(request()->all())->links('layouts.pagination.custom'); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pagination/user/replies.blade.php ENDPATH**/ ?>