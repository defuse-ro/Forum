
<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <?php if($message->sender_id === Auth::user()->id): ?>

    <div class="d-flex align-items-start justify-content-end mb-3 chat-box">
        <div class="pe-2 me-1 chat-message">
            <div class="bg-green text-light p-3 mb-1 chat-text-right">
            <p><?php echo e($message->message); ?></p>
            </div>
            <div class="d-flex justify-content-end align-items-center fs-sm text-muted"><?php echo e($message->created_at->diffForHumans()); ?>

                <i class="bi bi-check-all <?php echo e($message->seen === '1' ? 'text-muted' : 'text-green'); ?> ms-2"></i></div>
        </div>
        <img src="<?php echo e(my_asset('uploads/users/'.$message->user->image)); ?>" class="rounded-circle" width="40" alt="<?php echo e($message->user->name); ?>">
    </div>

   <?php else: ?>

    <div class="d-flex align-items-start mb-3 chat-box">
        <img src="<?php echo e(my_asset('uploads/users/'.$message->user->image)); ?>" class="rounded-circle" width="40" alt="<?php echo e($message->user->name); ?>">
        <div class="ps-2 ms-1 chat-message">
            <div class="chat-text-left p-3 mb-1">
                <p><?php echo e($message->message); ?></p>
            </div>
            <div class="fs-sm text-muted"><?php echo e($message->created_at->diffForHumans()); ?></div>
        </div>
    </div>

   <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/messages/convo.blade.php ENDPATH**/ ?>