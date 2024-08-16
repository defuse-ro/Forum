

<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

<div class="category-box" data-aos="fade-up" data-aos-easing="linear">
   <div class="category-info">
       <img src="<?php echo e(my_asset('uploads/categories/'.$category->image)); ?>" class="img-fluid cat" alt="Image">
       <div class="category-content">
           <h3><a href="<?php echo e(route('category', ['slug' => $category->slug])); ?>"><?php echo e($category->name); ?>

        <?php if($category->pro == 1): ?> <span class="badge bg-cat ms-1"><?php echo e(trans('pro')); ?></span> <?php endif; ?>
    </a></h3>
           <p><?php echo e(Str::limit($category->description, 80)); ?></p>
           <div class="category-users mt-3">
               <span><?php echo e(trans('user_interactions')); ?></span>
               <ul>
                   <?php $__currentLoopData = $category->top_users(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <li>
                           <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>">
                               <img src="<?php echo e(my_asset('uploads/users/'.$post->user->image)); ?>" class="img-fluid" alt="image">
                           </a>
                       </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <li class="plus-sign"><a href="<?php echo e(route('user.posts.add')); ?>">+</a></li>
               </ul>
           </div>
       </div>
   </div>
   <div class="category-stats">
       <div class="category-top d-flex justify-content-between">
           <div class="category-topics">
               <span><?php echo e(trans('posts')); ?></span>
               <h4><?php echo e($category->posts()->count()); ?></h4>
           </div>
           <div class="category-activity">
               <span><?php echo e(trans('last_activity')); ?></span>
               <?php if($category->latest_post() != null): ?>
                   <h4><?php echo e($category->latest_post()->created_at->diffForHumans()); ?></h4>
               <?php else: ?>
                   <h4><?php echo e(trans('no_activity_yet')); ?></h4>
               <?php endif; ?>
           </div>
       </div>
       <div class="category-bottom">
           <span><?php echo e(trans('latest_post')); ?></span>
       <?php if($category->latest_post() != null): ?>
           <div class="d-flex mt-2">
               <a href="<?php echo e(route('user', ['username' => $category->latest_post()->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$category->latest_post()->user->image)); ?>" alt="User"></a>
               <div>
               <h6><a href="<?php echo e(route('home.post', ['post_id'=> $category->latest_post()->post_id, 'slug' => $category->latest_post()->slug])); ?>" class="d-block"><?php echo e($category->latest_post()->title); ?></a></h6>
               <span class="d-block text-muted small"><?php echo e($category->latest_post()->user->name); ?></span>
               </div>
           </div>
       <?php else: ?>
           <h4><?php echo e(trans('no_activity_yet')); ?></h4>
       <?php endif; ?>
       </div>
   </div>
</div><!--/category-box-->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
   <div class="dashboard-body">
       <div class="upload-image my-3">
           <h4 class="mb-3"><?php echo e(trans('no_categories_available')); ?>.</h4>
       </div>

   </div>
</div><!--/dashboard-card-->

<?php endif; ?>


<?php if($categories->hasPages()): ?>
<div class="d-flex justify-content-center">
   <?php echo $categories->appends(request()->all())->links('layouts.pagination.custom'); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pagination/categories.blade.php ENDPATH**/ ?>