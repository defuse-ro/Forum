
<?php $__empty_1 = true; $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="col-lg-6" data-aos="fade-up" data-aos-easing="linear">
        <div class="tag-box">
            <div class="tag-header">
                <h3><a href="<?php echo e(route('tag', ['slug' => $tag->slug])); ?>"><?php echo e('#'.$tag->name); ?></a></h3>
                <p><?php echo e($tag->count); ?> <?php echo e(trans('posts')); ?></p>
            </div><!--/tag-header-->

            <p class="text-center mb-2"><?php echo e(trans('latest_post')); ?></p>

            <?php if(App\Models\Posts::withAnyTag($tag->name)->latest()->first()): ?>

                <div class="post-box d-flex mb-2">
                    <div class="card">
                        <div class="card-header card-header-action py-3">
                            <div class="media align-items-center">
                                <div class="media-head me-2">
                                    <div class="avatar">
                                        <a href="<?php echo e(route('user', ['username' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->image)); ?>" alt="user" class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6><a href="<?php echo e(route('home.post', ['post_id' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->post_id, 'slug' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->slug])); ?>">
                                        <?php echo e(App\Models\Posts::withAnyTag($tag->name)->latest()->first()->title); ?></a>
                                    </h6>
                                    <span><a href="<?php echo e(route('user', ['username' => App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->username])); ?>">
                                        <span class="small"><?php echo e(App\Models\Posts::withAnyTag($tag->name)->latest()->first()->user->name); ?>,</span>
                                        </a><span class="ms-1 small"><?php echo e(App\Models\Posts::withAnyTag($tag->name)->latest()->first()->created_at->diffForHumans()); ?></span> </span>
                                </div>
                            </div>
                        </div>
                    </div><!--/card-->
                </div>

            <?php else: ?>
              <p class="text-center"><?php echo e(trans('no_posts_available')); ?></p>
            <?php endif; ?>

        </div><!--/tag-box-->
    </div><!--/col-lg-6-->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3"><?php echo e(trans('no_tags_available')); ?>.</h4>
            </div>
        </div>
    </div><!--/dashboard-card-->

<?php endif; ?>



<?php if($tags->hasPages()): ?>
<div class="d-flex justify-content-center">
   <?php echo $tags->appends(request()->all())->links('layouts.pagination.custom'); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/partials/tags.blade.php ENDPATH**/ ?>