

<?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="comments-box" data-aos="fade-up" data-aos-easing="linear">
        <div class="card comments-box-header">
            <div class="card-header card-header-action">
                <div class="media align-items-center justify-content-between">
                    <div class="media-head me-2">
                        <div class="avatar">
                            <a href="<?php echo e(route('user', ['username' => $comment->post->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$comment->post->user->image )); ?>" alt="user" class="avatar-img rounded-circle"></a>
                        </div>
                    </div>
                    <div class="media-body">
                        <div><a href="<?php echo e(route('home.post', ['post_id' => $comment->post->post_id, 'slug' => $comment->post->slug])); ?>"><?php echo e($comment->post->title); ?></a></div>
                        <div class="fs-7">
                            <a href="<?php echo e(route('user', ['username' => $comment->post->user->username])); ?>"><?php echo e($comment->post->user->name); ?></a>
                            <?php if($comment->post->user->verified == 1): ?>
                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                                    <i class="bi bi-patch-check"></i>
                                </span>
                            <?php endif; ?>
                            <span class="ms-1"> <?php echo e($comment->post->created_at->diffForHumans()); ?> <?php echo e(trans('in')); ?> </span> <a href="<?php echo e(route('category', ['slug' => $comment->post->category->slug])); ?>" class="cat"><?php echo e($comment->post->category->name); ?></a></div>
                    </div>
                </div>
                <div class="card-action-wrap">
                    <?php if(Auth::check()): ?>
                        <?php if(Auth::user()->id === $comment->user->id): ?>
                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="<?php echo e(route('user.comments.edit', ['id' => $comment->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('comment')); ?></a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.comments.destroy')); ?>','<?php echo e($comment->id); ?>','<?php echo e(trans('delete_this_comment')); ?>');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('comment')); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="comments-box-body">
            <div class="card">
            </div>
            <div class="content">
                <?php echo $comment->body; ?>

            </div>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="row g-0">
        <div class="col-12">

            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-body">
                    <div class="upload-image my-3">
                        <h4 class="mb-3"><?php echo e(trans('no_comments_available')); ?>.</h4>
                    </div>

                </div>
            </div><!--/dashboard-card-->

        </div>
    </div>

<?php endif; ?>

<?php if($comments->hasPages()): ?>
<div class="d-flex justify-content-center" id="user_comments" data-aos="fade-up" data-aos-easing="linear">
    <?php echo $comments->appends(request()->all())->links('layouts.pagination.custom'); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pagination/user/comments.blade.php ENDPATH**/ ?>