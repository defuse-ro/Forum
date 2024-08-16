<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/simplebar/simplebar.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

    <!-- Sidebar START -->
    <div class="col-lg-4">

        <!-- Divider -->
        <div class="d-flex align-items-center my-5 d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="btn btn-mint bi bi-sliders2"></i>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2">Chats</span>
            </button>
        </div>
                <!-- Advanced filter responsive toggler END -->
        <div class="card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h5 mb-0">Active chats <span class="badge bg-green bg-opacity-10 text-white"><?php echo e($chats->count()); ?></span></h1>
            </div>
        </div>

        <nav class="navbar navbar-light navbar-expand-lg mx-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
                <div class="card card-chat-list card-body">

                    <!-- Chat list tab START -->
                    <div class="mt-4 h-100">
                        <div data-simplebar class="chat-tab-list">
                            <ul class="nav flex-column nav-pills nav-pills-soft" id="sidebarChats">

                                <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($chat->user_receiver->id != Auth::user()->id): ?>

                                        <li class="position-relative" data-bs-dismiss="offcanvas">
                                            <a href="<?php echo e(route('admin.chats.messages', ['chat_id' => $chat->id])); ?>" class="nav-link">
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
                                                            <p>Gif Image</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Image'): ?>
                                                            <p>Image sent</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Video'): ?>
                                                            <p>Video sent</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Audio'): ?>
                                                            <p>Audio sent</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Zip'): ?>
                                                            <p>Zip sent</p>
                                                        <?php endif; ?>

                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- Chat user item -->

                                    <?php elseif($chat->user_sender->id != Auth::user()->id): ?>

                                        <li class="position-relative" data-bs-dismiss="offcanvas">
                                            <a href="<?php echo e(route('admin.chats.messages', ['chat_id' => $chat->id])); ?>" class="nav-link">
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
                                                            <p>Gif Image</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Image'): ?>
                                                            <p>Image sent</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Video'): ?>
                                                            <p>Video sent</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Audio'): ?>
                                                            <p>Audio sent</p>
                                                        <?php elseif($chat->latest_message()->file_ext === 'Zip'): ?>
                                                            <p>Zip sent</p>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- Chat user item -->

                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                    </div>
                    <!-- Chat list tab END -->
                </div>
            </div>
        </div>
        </nav>
    </div>
    <!-- Sidebar START -->

    <!-- Chat conversation START -->
    <div class="col-lg-8 px-lg-4">
        <div class="card card-chat rounded-start-lg-0 border-start-lg-0">
            <div class="card-body h-100">
                <div class="h-100">
                    <!-- Chat conversation START -->
                    <div class="chat-conversation-content chat-conversation-content-lg" id="messagesContent">
                    <div class="chat-display flex-column d-flex justify-content-center text-center h-100">
                        <h2><i class="bi bi-chat-square-text me-1"></i> Messages</h2>
                    </div>

                    </div><!-- Chat conversation END -->
                </div>
            </div>

        </div>
    </div>
        <!-- Chat conversation END -->


      </div><!-- row -->
     </div><!-- container -->
    </section>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(my_asset('assets/vendors/simplebar/simplebar.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/chats.blade.php ENDPATH**/ ?>