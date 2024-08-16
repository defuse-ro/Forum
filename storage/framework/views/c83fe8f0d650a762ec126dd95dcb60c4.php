

<?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($chat->user_receiver->id != Auth::user()->id): ?>

        <li class="position-relative" data-bs-dismiss="offcanvas">
            <a href="<?php echo e(route('user.chats.messages', ['chat_id' => $chat->id])); ?>" class="nav-link">
                <div class="d-flex">
                    <div class="flex-shrink-0 avatar avatar-md me-2">
                        <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$chat->user_receiver->image)); ?>" alt="User">
                        <?php if(Cache::has('user-is-online-' . $chat->user_receiver->id)): ?>
                            <span class="user_online"></span>
                        <?php endif; ?>
                    </div>
                    <div class="flex-grow-1 message-by">
                        <div class="d-flex justify-content-between">
                            <h5>
                                <?php echo e($chat->user_receiver->name); ?>

                                <?php if($chat->unread_messages() > 0): ?>
                                <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e($chat->unread_messages()); ?></span>
                                <?php endif; ?>
                            </h5>
                            <?php if($chat->latest_message()): ?>
                                <span><?php echo e($chat->latest_message()->created_at->diffForHumans()); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php if($chat->latest_message()): ?>
                        <?php if($chat->latest_message()->file_ext === 'Text'): ?>
                            <p><?php echo e($chat->latest_message()->message); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Gif'): ?>
                            <p><?php echo e(trans('gif_image')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Image'): ?>
                            <p><?php echo e(trans('image_sent')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Video'): ?>
                            <p><?php echo e(trans('video_sent')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Audio'): ?>
                            <p><?php echo e(trans('audio_sent')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Zip'): ?>
                            <p><?php echo e(trans('zip_sent')); ?></p>
                        <?php endif; ?>

                    <?php endif; ?>
                    </div>
                </div>
            </a>
        </li><!-- Chat user item -->

    <?php elseif($chat->user_sender->id != Auth::user()->id): ?>

        <li class="position-relative" data-bs-dismiss="offcanvas">
            <a href="<?php echo e(route('user.chats.messages', ['chat_id' => $chat->id])); ?>" class="nav-link">
                <div class="d-flex">
                    <div class="flex-shrink-0 avatar avatar-md me-2">
                        <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$chat->user_sender->image)); ?>" alt="User">
                        <?php if(Cache::has('user-is-online-' . $chat->user_sender->id)): ?>
                            <span class="user_online"></span>
                        <?php endif; ?>
                    </div>
                    <div class="flex-grow-1 message-by">
                        <div class="d-flex justify-content-between">
                            <h5>
                                <?php echo e($chat->user_sender->name); ?>

                                <?php if($chat->unread_messages() > 0): ?>
                                <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e($chat->unread_messages()); ?></span>
                                <?php endif; ?>
                            </h5>
                            <?php if($chat->latest_message()): ?>
                                <span><?php echo e($chat->latest_message()->created_at->diffForHumans()); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php if($chat->latest_message()): ?>
                        <?php if($chat->latest_message()->file_ext === 'Text'): ?>
                            <p><?php echo e($chat->latest_message()->message); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Gif'): ?>
                            <p><?php echo e(trans('gif_image')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Image'): ?>
                            <p><?php echo e(trans('image_sent')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Video'): ?>
                            <p><?php echo e(trans('video_sent')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Audio'): ?>
                            <p><?php echo e(trans('audio_sent')); ?></p>
                        <?php elseif($chat->latest_message()->file_ext === 'Zip'): ?>
                            <p><?php echo e(trans('zip_sent')); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </a>
        </li><!-- Chat user item -->

    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/messages/chats.blade.php ENDPATH**/ ?>