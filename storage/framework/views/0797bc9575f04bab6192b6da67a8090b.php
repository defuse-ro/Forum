

<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-easing="linear">
        <div class="user-wrap">
            <div class="user-badge">
                <div class="d-flex ms-auto">
                    <?php if(Auth::check()): ?>
                    <?php if(Auth::user()->id != $user->id): ?>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add Friend" href="javascript:void(0);" id="<?php echo e($user->id); ?>" class="btn <?php if(Auth::user()->isFollowing($user)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> btn-rounded ms-2 followUser">
                            <i class="bi <?php if(Auth::user()->isFollowing($user)): ?> bi-person-check <?php else: ?> bi-person-plus <?php endif; ?>" id="follow-icon-<?php echo e($user->id); ?>"></i>
                        </a>

                        <?php if(\App\Models\Chats::where('sender_id', Auth::user()->id)->where('receiver_id', $user->id)->orWhere('sender_id', $user->id)->where('receiver_id',  Auth::user()->id)->exists()): ?>
                            <a href="<?php echo e(route('user.chats')); ?>" class="btn btn-mint btn-rounded ms-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Message">
                            <i class="bi bi-chat-left-text"></i></a>
                        <?php else: ?>
                        <a href="#small-dialog-<?php echo e($user->id); ?>" class="btn btn-mint btn-rounded ms-2 has-popup" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Message">
                        <i class="bi bi-chat-left-text"></i></a>

                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>

                <?php if(Auth::check()): ?>

                <div id="small-dialog-<?php echo e($user->id); ?>" class="white-popup zoom-anim-dialog mfp-hide">
                    <div class="mfp-modal-header">
                        <span class="mb-2">
                            <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" class="rounded-circle" alt="User">
                        </span>
                        <h4><?php echo e($user->name); ?></h4>
                    </div>
                    <div class="mfp-modal-body py-4">

                        <div class="w-100 pt-3 pb-3 px-4">

                            <form id="create_message" method="POST">
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>">
                                <div class="emoji-picker-container">
                                    <textarea name="message" id="message" class="chat-message-input mb-3" rows="5" data-emojiable="true" data-emoji-input="unicode"
                                    placeholder="Start a Conversation with <?php echo e($user->name); ?>..."></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <button type="submit" class="btn btn-mint w-100" id="create_message_btn"><i class="bi bi-send fs-xl me-2"></i><?php echo e(trans('send')); ?></button>
                            </form>

                        </div>
                    </div>
                </div>
                <?php else: ?>

                <div id="small-dialog-<?php echo e($user->id); ?>" class="white-popup zoom-anim-dialog mfp-hide">
                        <h4><?php echo e(trans('please_login_to_send_message')); ?>.</h4>
                </div>
                <?php endif; ?>

                </div>
            </div><!--/user-badge-->
            <div class="user-thumb">
                <a href="<?php echo e(route('user', ['username' => $user->username])); ?>">
                <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" class="img-fluid rounded-circle" alt="User">
                </a>
            </div>
            <div class="user-caption">
                <h4 class="mb-0">
                    <a href="<?php echo e(route('user', ['username' => $user->username])); ?>" class="position-relative"><?php echo e($user->name); ?>

                        <?php if(Cache::has('user-is-online-' . $user->id)): ?>
                            <span class="user_online_lg"></span>
                        <?php endif; ?>
                        <?php if($user->verified == 1): ?>
                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                            <i class="bi bi-patch-check"></i>
                            </span>
                        <?php endif; ?>
                    </a>
                </h4>
                <?php if($user->location != '' || $user->country != ''): ?>
                    <span class="text-muted small mb-0"> <i class="bi bi-geo-alt"></i> <?php echo e($user->location); ?>, <?php echo e($user->country); ?> </span>
                    <br>
                <?php endif; ?>
                <span class="small mb-0"><?php echo e(trans('member_since')); ?> <?php echo e($user->created_at->format('Y')); ?></span>
            </div>
            <ul class="user-stats my-4 pt-3">
                <li><span class="item-number"><?php echo e($user->posts_count()); ?></span> <span class="item-text"><?php echo e(trans('posts')); ?></span> </li>
                <li><span class="item-number" id="followers-<?php echo e($user->id); ?>"><?php echo e($user->followers->count()); ?></span> <span class="item-text"><?php echo e(trans('followers')); ?></span></li>
                <li><span class="item-number" id="following-<?php echo e($user->id); ?>"><?php echo e($user->followings->count()); ?></span> <span class="item-text"><?php echo e(trans('following')); ?></span></li>
            </ul><!--/user-stats-->
        </div>
    </div><!--col-lg-4-->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
    <div class="dashboard-body">
        <div class="upload-image my-3">
            <h4 class="mb-3"><?php echo e(trans('no_users_available')); ?>.</h4>
        </div>

    </div>
</div><!--/dashboard-card-->

<?php endif; ?>


<?php if($users->hasPages()): ?>
<div class="d-flex justify-content-center">
    <?php echo $users->appends(request()->all())->links('layouts.pagination.custom'); ?>

</div>
<?php endif; ?>

<script>
    $('.has-popup').magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: false,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
    $(function () {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '<?php echo e(my_asset('assets/vendors/emoji-picker/lib/img/')); ?>',
            popupButtonClasses: 'bi bi-emoji-smile'
        });

        window.emojiPicker.discover();
    });

</script>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/partials/users.blade.php ENDPATH**/ ?>