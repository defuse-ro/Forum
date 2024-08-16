<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <li><a href="<?php echo e(route('home.post', ['post_id' => $post->post_id, 'slug' => $post->slug])); ?>" class="dropdown-item"> <?php echo e($post->title); ?></a></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/partials/search.blade.php ENDPATH**/ ?>