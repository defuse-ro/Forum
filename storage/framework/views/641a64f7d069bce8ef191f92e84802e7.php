<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <?php if($user->id != Auth::user()->id): ?>
    <div class="media align-items-center my-4">
        <div class="media-head me-2">
            <div class="avatar custom-tooltip">
                <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" alt="user" class="avatar-img rounded-circle">
            </div>
        </div>
        <div class="media-body d-flex justify-content-between">
            <p><?php echo e($user->name); ?></p>
            <a href="javascript:void(0)" onclick="create_chat(<?php echo e($user->id); ?>);" class="btn btn-mint btn-xs rounded-pill">Create Chat</a>
        </div>
    </div>
   <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/messages/user.blade.php ENDPATH**/ ?>