<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/css/emoji.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.css')); ?>">
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/config.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/util.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/jquery.emojiarea.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/emoji-picker/lib/js/emoji-picker.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if(Auth::check() && \App\Models\Block::where('user_id', Auth::user()->id)->where('block_id', $user->id)->exists()): ?>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3"><?php echo e(trans('you_have_blocked')); ?> <?php echo e($user->name); ?>.</h4>
            </div>
        </div>
    </div><!--/dashboard-card-->

<?php elseif(Auth::check() && \App\Models\Block::where('user_id', $user->id)->where('block_id', Auth::user()->id)->exists()): ?>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3"><?php echo e(trans('user_not_available')); ?>.</h4>
            </div>
        </div>
    </div><!--/dashboard-card-->

<?php else: ?>

    <div class="user-header media mb-5" data-aos="fade-down" data-aos-easing="linear">
        <div class="media-head me-4">
            <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" alt="Avatar">
            <?php if(Cache::has('user-is-online-' . $user->id)): ?>
             <span class="text-white wd-1 ht-1 rounded-pill profile-online"></span>
            <?php endif; ?>
        </div>
        <div class="media-body">
                <h3><?php echo e($user->name); ?>

                    <?php if($user->verified == 1): ?>
                        <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                        <i class="bi bi-patch-check"></i>
                        </span>
                    <?php endif; ?>
                </h3>
            <p class="text-muted ms-0 mb-2 my-2">
                <span class="me-3"><i class="bi bi-box-arrow-in-down me-2"></i><?php echo e(trans('joined')); ?>: <?php echo e($user->created_at->format('F jS Y')); ?></span>
                <span><i class="bi bi-eye me-2"></i><?php echo e(trans('last_seen')); ?>: <?php echo e(\Carbon\Carbon::parse($user->last_seen)->diffForHumans()); ?> </span>
            </p>
            <p class="text-muted ms-0 mb-2 my-2">
                <span class="me-3"><i class="bi bi-file-ppt me-2"></i><?php echo e(trans('points')); ?>: <?php echo e($user->total_points()); ?></span>
                <span class="me-3"><i class="bi bi-eye-slash me-2"></i><?php echo e(trans('profile_views')); ?>: <?php echo e($user->views()); ?></span>
                <span class="me-3"><i class="bi bi-piggy-bank me-2"></i><?php echo e(trans('earnings')); ?>: <?php echo e(get_setting('currency_symbol')); ?><?php echo e($user->earnings); ?></span>
            </p>
            <p class="text-muted ms-0 mb-2 my-2">
                <?php if($user->profession != ''): ?>
                <span class="me-3"><i class="bi bi-card-text me-2"></i><?php echo e($user->profession); ?></span>
                <?php endif; ?>
                <?php if($user->location != '' || $user->country != ''): ?>
                <span class="me-3"><i class="bi bi-pin-map me-2"></i><?php echo e($user->location); ?>, <?php echo e($user->country); ?></span>
                <?php endif; ?>
            </p>

            <div class="user-header-socials d-flex my-2">
                <?php if($user->twitter != ''): ?>
                 <a href="<?php echo e($user->twitter); ?>" target="_blank"><i class="bi bi-twitter"></i></a>
                <?php endif; ?>
                <?php if($user->facebook != ''): ?>
                 <a href="<?php echo e($user->facebook); ?>" target="_blank"><i class="bi bi-facebook"></i></a>
                <?php endif; ?>
                <?php if($user->instagram != ''): ?>
                 <a href="<?php echo e($user->instagram); ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                <?php endif; ?>
                <?php if($user->linkedin != ''): ?>
                 <a href="<?php echo e($user->linkedin); ?>" target="_blank"><i class="bi bi-linkedin"></i></a>
                <?php endif; ?>
                <?php if($user->website != ''): ?>
                 <a href="<?php echo e($user->website); ?>" target="_blank"><?php echo e($user->website); ?></a>
                <?php endif; ?>
            </div>

            <div class="user-header-follow d-flex align-items-center g-20">
                <span class="d-flex flex-column me-2">
                    <span class="h6" id="following-<?php echo e($user->id); ?>"><?php echo e($user->followings->count()); ?></span>
                    <span class="meta"><?php echo e(trans('following')); ?></span>
                </span>
                <span class="d-flex flex-column">
                    <span class="h6" id="followers-<?php echo e($user->id); ?>"><?php echo e($user->followers->count()); ?></span>
                    <span class="meta"><?php echo e(trans('followers')); ?></span>
                </span>
                <?php if(Auth::check()): ?>
                 <?php if($user->id != Auth::user()->id): ?>
                    <a href="javascript:void(0);" id="<?php echo e($user->id); ?>" class="btn btn-xs <?php if(Auth::user()->isFollowing($user)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> followUser">
                      <?php if(Auth::user()->isFollowing($user)): ?> <i class="bi bi-person-check me-1"></i> <?php echo e(trans('following')); ?> <?php else: ?> <i class="bi bi-person-add me-1"></i> <?php echo e(trans('follow')); ?> <?php endif; ?>
                    </a>

                    <?php if(\App\Models\Chats::where('sender_id', Auth::user()->id)->where('receiver_id', $user->id)->orWhere('sender_id', $user->id)->where('receiver_id',  Auth::user()->id)->exists()): ?>
                     <a href="<?php echo e(route('user.chats')); ?>" class="btn btn-xs btn-border d-none d-sm-block"><i class="bi bi-chat-text me-1"></i> <?php echo e(trans('message')); ?></a>
                    <?php else: ?>
                     <a href="#small-dialog-<?php echo e($user->id); ?>" class="btn btn-xs btn-border d-none d-sm-block has-popup"><i class="bi bi-chat-text me-1"></i><?php echo e(trans('message')); ?></a>
                    <?php endif; ?>

                    <a href="#tip-dialog-<?php echo e($user->id); ?>" class="btn btn-xs btn-red d-none d-sm-block has-popup"><i class="bi bi-currency-dollar me-1"></i><?php echo e(trans('tip')); ?></a>

                 <?php endif; ?>
                <?php else: ?>
                 <a href="#follow-dialog" class="btn btn-xs btn-mint d-none d-sm-block has-popup"><i class="bi bi-person-add me-1"></i> <?php echo e(trans('follow')); ?></a>
                 <a href="#small-dialog-<?php echo e($user->id); ?>" class="btn btn-xs btn-border d-none d-sm-block has-popup"><i class="bi bi-chat-text me-1"></i><?php echo e(trans('message')); ?></a>
                 <a href="#tip-dialog-<?php echo e($user->id); ?>" class="btn btn-xs btn-red d-none d-sm-block has-popup"><i class="bi bi-currency-dollar me-1"></i><?php echo e(trans('tip')); ?></a>
                <?php endif; ?>
            </div>

            <div class="d-block d-sm-none">
                <?php if(Auth::check()): ?>
                    <?php if($user->id != Auth::user()->id): ?>
                        <a href="javascript:void(0);" id="<?php echo e($user->id); ?>" class="btn <?php if(Auth::user()->isFollowing($user)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> followUser">
                        <?php if(Auth::user()->isFollowing($user)): ?> <i class="bi bi-person-check me-1"></i> <?php echo e(trans('following')); ?> <?php else: ?> <i class="bi bi-person-add me-1"></i> <?php echo e(trans('follow')); ?> <?php endif; ?>
                        </a>

                        <?php if(\App\Models\Chats::where('sender_id', Auth::user()->id)->where('receiver_id', $user->id)->orWhere('sender_id', $user->id)->where('receiver_id',  Auth::user()->id)->exists()): ?>
                        <a href="<?php echo e(route('user.chats')); ?>" class="btn btn-border my-2"><i class="bi bi-chat-text me-1"></i> <?php echo e(trans('message')); ?></a>
                        <?php else: ?>
                        <a href="#small-dialog-<?php echo e($user->id); ?>" class="btn btn-border my-2 has-popup"><i class="bi bi-chat-text me-1"></i><?php echo e(trans('message')); ?></a>
                        <?php endif; ?>
                        <a href="#tip-dialog-<?php echo e($user->id); ?>" class="btn btn-red d-none d-sm-block has-popup"><i class="bi bi-currency-dollar me-1"></i><?php echo e(trans('send')); ?> <?php echo e(trans('tip')); ?></a>

                    <?php endif; ?>
                <?php else: ?>
                <a href="#follow-dialog" class="btn btn-mint my-2 has-popup"><i class="bi bi-person-add me-1"></i> <?php echo e(trans('follow')); ?></a>
                <a href="#small-dialog-<?php echo e($user->id); ?>" class="btn btn-border my-2 has-popup"><i class="bi bi-chat-text me-1"></i><?php echo e(trans('message')); ?></a>
                <a href="#tip-dialog-<?php echo e($user->id); ?>" class="btn btn-red d-none d-sm-block has-popup"><i class="bi bi-currency-dollar me-1"></i><?php echo e(trans('send')); ?> <?php echo e(trans('tip')); ?></a>
                <?php endif; ?>
            </div>

            <?php if(Auth::check()): ?>
                <?php if($user->isFollowing(Auth::user())): ?>
                <p class="small text-muted"><span class="badge bg-red"><?php echo e(trans('follows_you')); ?></span></p>
                <?php endif; ?>
            <?php endif; ?>

        </div>
        <div class="card-action-wrap">
            <?php if(Auth::check()): ?>
                <?php if(Auth::user()->id != $user->id): ?>
                    <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">

                        <a href="#report-dialog" class="dropdown-item has-popup"><i class="bi bi-exclamation-octagon me-2"></i> <?php echo e(trans('report')); ?> <?php echo e(trans('user')); ?></a>

                        <?php if(Auth::user()->subscription()->users === 1): ?>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="block('<?php echo e(route('block')); ?>','<?php echo e($user->id); ?>','Block User?');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('block')); ?> <?php echo e(trans('user')); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row g-4" data-aos="fade-up" data-aos-easing="linear">
        <div class="col-12">
                <ul class="vine-nav pb-0 px-2 px-lg-0 rounded-top">
                    <li class="nav-item">
                        <a class="nav-link mb-0 <?php echo e(Route::is('user') ? 'active' : ''); ?>" href="<?php echo e(route('user', ['username' => $user->username])); ?>">
                            <i class="bi bi-person-lines-fill me-1"></i><?php echo e(trans('bio')); ?> & <?php echo e(trans('badges')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 <?php echo e(Route::is('user.posts') ? 'active' : ''); ?>" href="<?php echo e(route('user.posts', ['username' => $user->username])); ?>">
                            <i class="bi bi-journals me-1"></i><?php echo e(trans('posts')); ?> (<?php echo e($user->posts->count()); ?>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 <?php echo e(Route::is('user.comments') ? 'active' : ''); ?>" href="<?php echo e(route('user.comments', ['username' => $user->username])); ?>">
                            <i class="bi bi-chat-left-dots me-1"></i> <?php echo e(trans('comments')); ?> (<?php echo e($user->comments->count()); ?>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 <?php echo e(Route::is('user.replies') ? 'active' : ''); ?>" href="<?php echo e(route('user.replies', ['username' => $user->username])); ?>">
                            <i class="bi bi-chat-dots me-1"></i> <?php echo e(trans('replies')); ?> (<?php echo e($user->replies->count()); ?>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 <?php echo e(Route::is('user.followers') ? 'active' : ''); ?>" href="<?php echo e(route('user.followers', ['username' => $user->username])); ?>">
                            <i class="bi bi-people me-1"></i><?php echo e(trans('followers')); ?> (<?php echo e($user->followers->count()); ?>)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 <?php echo e(Route::is('user.following') ? 'active' : ''); ?>" href="<?php echo e(route('user.following', ['username' => $user->username])); ?>">
                            <i class="bi bi-people me-1"></i><?php echo e(trans('following')); ?> (<?php echo e($user->followings->count()); ?>)
                        </a>
                    </li>
                </ul>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12">
            <div class="mt-5">
                <?php if(Route::is('user')): ?>

                    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                        <div class="dashboard-body">
                            <h3><?php echo e($user->name); ?></h3>
                            <h6 class="text-muted mt-2 mb-4"><?php echo e('@'.$user->username); ?></h6>
                            <p class="text-muted ms-0 mb-2 my-2">
                                <span class="me-3"><i class="bi bi-file-ppt me-2"></i><?php echo e(trans('points')); ?>: <?php echo e($user->total_points()); ?></span>
                                <span class="me-3"><i class="bi bi-eye-slash me-2"></i><?php echo e(trans('profile_views')); ?>: <?php echo e($user->views()); ?></span>
                                <span class="me-3"><i class="bi bi-piggy-bank me-2"></i><?php echo e(trans('earnings')); ?>: <?php echo e(get_setting('currency_symbol')); ?><?php echo e($user->earnings); ?></span>
                            </p>
                            <p class="text-muted ms-0 mb-2 my-2">
                                <span class="me-3"><i class="bi bi-box-arrow-in-down me-2"></i><?php echo e(trans('joined')); ?>: <?php echo e($user->created_at->format('F jS Y')); ?></span>
                                <span><i class="bi bi-eye me-2"></i><?php echo e(trans('last_seen')); ?>: <?php echo e(\Carbon\Carbon::parse($user->last_seen)->diffForHumans()); ?> </span>
                            </p>
                            <p class="text-muted ms-0 mb-2 my-2">
                                <?php if($user->profession != ''): ?>
                                <span class="me-3"><i class="bi bi-card-text me-2"></i><?php echo e($user->profession); ?></span>
                                <?php endif; ?>
                                <?php if($user->location != '' || $user->country != ''): ?>
                                <span class="me-3"><i class="bi bi-pin-map me-2"></i><?php echo e($user->location); ?>, <?php echo e($user->country); ?></span>
                                <?php endif; ?>
                            </p>

                            <div class="user-header-socials d-flex my-2">
                                <?php if($user->twitter != ''): ?>
                                <a href="<?php echo e($user->twitter); ?>" target="_blank"><i class="bi bi-twitter"></i></a>
                                <?php endif; ?>
                                <?php if($user->facebook != ''): ?>
                                <a href="<?php echo e($user->facebook); ?>" target="_blank"><i class="bi bi-facebook"></i></a>
                                <?php endif; ?>
                                <?php if($user->instagram != ''): ?>
                                <a href="<?php echo e($user->instagram); ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                                <?php endif; ?>
                            </div>

                            <h5 class="mt-4"><?php echo e(trans('bio')); ?></h5>
                            <p><?php echo e($user->bio); ?></p>
                            <h5 class="mt-4"><i class="bi bi-file-ppt me-2"></i><?php echo e(trans('points')); ?> <?php echo e(trans('earned')); ?> </h5>
                            <p><span class="badge bg-red fs-7"><?php echo e($user->total_points()); ?></span></p>

                        </div>
                    </div><!--/dashboard-card-->

                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4">
                                <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                    <div class="dashboard-body">
                                        <div class="badge-position">
                                            <img src="<?php echo e(my_asset('uploads/badges/'.$badge->image)); ?>" class="img-fluid mb-2 <?php echo e($badge->score > $user->total_points() ? 'locked' : ''); ?>" alt="Badge">
                                            <?php if($badge->score > $user->total_points()): ?>
                                              <span class="bi bi-lock-fill badge-locked"></span>
                                            <?php endif; ?>
                                        </div>
                                        <h5><?php echo e($badge->name); ?></h5>
                                        <p> <?php echo e(trans('points')); ?>: <span class="badge bg-green"><?php echo e($badge->score); ?></span> </p>
                                    </div>
                                </div><!--/dashboard-card-->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                <div class="dashboard-body">
                                    <div class="upload-image my-3">
                                        <h4 class="mb-3"><?php echo e(trans('no_badges_available')); ?>.</h4>
                                    </div>

                                </div>
                            </div><!--/dashboard-card-->

                        <?php endif; ?>
                    </div>
                <?php elseif(Route::is('user.posts')): ?>

                    <div class="posts" id="posts">
                        <?php echo $__env->make('frontend.pagination.user.posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div><!--/posts-->

                <?php elseif(Route::is('user.comments')): ?>

                    <div class="comments" id="comments">
                        <?php echo $__env->make('frontend.pagination.user.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div><!--/comments-->

                <?php elseif(Route::is('user.replies')): ?>

                    <div class="replies" id="replies">
                        <?php echo $__env->make('frontend.pagination.user.replies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div><!--/replies-->

                <?php elseif(Route::is('user.followers')): ?>
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $user->followers()->with('followers')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear">
                                <div class="follow-box">
                                    <div class="img">
                                        <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>">
                                            <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="User">
                                        </a>
                                    </div>
                                    <div class="mt10">
                                        <span>
                                            <a class="h5" href="<?php echo e(route('user', ['username' => $follower->username])); ?>"><?php echo e($follower->name); ?></a>
                                        </span>
                                        <?php if($follower->verified == 1): ?>
                                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                                                <i class="bi bi-patch-check"></i>
                                            </span>
                                        <?php endif; ?><br>
                                        <span class="mb-0 small"><i class="bi bi-person-check me-1"></i>
                                            <span id="followers-<?php echo e($follower->id); ?>"><?php echo e($follower->followers->count()); ?></span>
                                            <?php echo e(trans('followers')); ?>

                                        </span>
                                    </div>
                                    <div class="mt10">
                                        <?php if(Auth::check()): ?>
                                            <?php if(Auth::user()->id != $follower->id): ?>
                                            <a href="javascript:void(0);" id="<?php echo e($follower->id); ?>" class="btn rounded-pill <?php if(Auth::user()->isFollowing($follower)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> followUser">

                                                <?php if(Auth::user()->isFollowing($follower)): ?><i class="bi bi-person-check me-1"></i> <?php echo e(trans('following')); ?> <?php else: ?> <i class="bi bi-person-add me-1"></i> <?php echo e(trans('follow')); ?> <?php endif; ?>
                                            </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="#follow-dialog" class="btn btn-mint rounded-pill has-popup"><i class="bi bi-person-add me-1"></i><?php echo e(trans('follow')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                <div class="dashboard-body">
                                    <div class="upload-image my-3">
                                        <h4 class="mb-3"><?php echo e(trans('no_followers_available')); ?>.</h4>
                                    </div>

                                </div>
                            </div><!--/dashboard-card-->

                        <?php endif; ?>
                    </div>
                <?php elseif(Route::is('user.following')): ?>
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $user->followings()->with('followable')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-easing="linear">
                                <div class="follow-box">
                                    <div class="img">
                                        <a href="<?php echo e(route('user', ['username' => $following->followable->username])); ?>">
                                            <img src="<?php echo e(my_asset('uploads/users/'.$following->followable->image)); ?>" alt="User">
                                        </a>
                                    </div>
                                    <div class="mt10">
                                        <span>
                                            <a class="h5" href="<?php echo e(route('user', ['username' => $following->followable->username])); ?>"><?php echo e($following->followable->name); ?></a>
                                        </span>
                                        <?php if($following->followable->verified == 1): ?>
                                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                                                <i class="bi bi-patch-check"></i>
                                            </span>
                                        <?php endif; ?><br>
                                        <span class="mb-0 small"><i class="bi bi-person-check me-1"></i>
                                            <span id="followers-<?php echo e($following->followable->id); ?>"><?php echo e($following->followable->followers->count()); ?></span>
                                            <?php echo e(trans('following')); ?>

                                        </span>
                                    </div>
                                    <div class="mt10">
                                        <?php if(Auth::check()): ?>
                                            <?php if(Auth::user()->id != $following->followable->id): ?>
                                            <a href="javascript:void(0);" id="<?php echo e($following->followable->id); ?>" class="btn rounded-pill <?php if(Auth::user()->isFollowing($following->followable)): ?> btn-danger <?php else: ?> btn-mint <?php endif; ?> followUser">

                                                <?php if(Auth::user()->isFollowing($following->followable)): ?><i class="bi bi-person-check me-1"></i> <?php echo e(trans('following')); ?> <?php else: ?> <i class="bi bi-person-add me-1"></i> <?php echo e(trans('follow')); ?> <?php endif; ?>
                                            </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="#follow-dialog" class="btn btn-mint rounded-pill has-popup"><i class="bi bi-person-add me-1"></i><?php echo e(trans('follow')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                <div class="dashboard-body">
                                    <div class="upload-image my-3">
                                        <h4 class="mb-3"><?php echo e(trans('user_has_not_followed_anyone_yet')); ?>.</h4>
                                    </div>

                                </div>
                            </div><!--/dashboard-card-->

                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

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

        <div id="tip-dialog-<?php echo e($user->id); ?>" class="white-popup zoom-anim-dialog mfp-hide">
            <div class="mfp-modal-header">
                <span class="mb-2">
                    <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" class="rounded-circle" alt="User">
                </span>
                <h4 class="mb-3"><?php echo e($user->name); ?></h4>
                <h6><?php echo e(trans('your')); ?> <?php echo e(trans('wallet')); ?> - <?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->wallet); ?></h6>
            </div>
            <div class="mfp-modal-body py-4">

                <div class="w-100 pt-3 pb-3 px-4">

                    <form id="tip_user" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>">
                        <label for="tip"><?php echo e(trans('send')); ?> <?php echo e(trans('tip')); ?></label>
                        <input type="number" name="tip" id="tip" placeholder="<?php echo e(trans('minimum')); ?> <?php echo e(trans('tip')); ?> - <?php echo e(get_setting('currency_symbol')); ?><?php echo e(get_setting('min_tip')); ?>">

                        <button type="submit" class="btn btn-mint w-100 mt-4" id="tip_user_btn"><i class="bi bi-send fs-xl me-2"></i><?php echo e(trans('tip')); ?></button>
                    </form>

                </div>
            </div>
        </div>

        <div id="report-dialog" class="white-popup zoom-anim-dialog mfp-hide">
            <div class="mfp-modal-header">
                <span class="mb-2">
                    <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" class="rounded-circle" alt="User">
                </span>
                <h4 class="mb-1"><?php echo e($user->name); ?></h4>
            </div>
            <div class="mfp-modal-body py-4">

                <div class="w-100 pt-3 pb-3 px-4">

                    <form id="report_user" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>">
                        <h5 class="mb-3"><?php echo e(trans('report')); ?> <?php echo e(trans('user')); ?></h5>

                        <div>
                            <label><?php echo e(trans('category')); ?></label>
                            <select name="category" id="category">
                                <option value="Hate Speech">Hate Speech</option>
                                <option value="Harassment">Harassment</option>
                                <option value="False Information">False Information</option>
                                <option value="Spam">Spam</option>
                                <option value="Nudity">Nudity</option>
                                <option value="Violence">Violence</option>
                                <option value="Suicide or Self-Injury">Suicide or Self-Injury</option>
                                <option value="Terrorism">Terrorism</option>
                                <option value="Something Else">Something Else</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div>
                            <label><?php echo e(trans('reason')); ?></label>
                            <textarea name="reason" id="reason" rows="4" placeholder="<?php echo e(trans('reason')); ?>"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <button type="submit" class="btn btn-mint w-100 mt-4" id="report_user_btn"><i class="bi bi-send fs-xl me-2"></i><?php echo e(trans('report')); ?> <?php echo e(trans('user')); ?></button>
                    </form>

                </div>
            </div>
        </div>
    <?php else: ?>
        <div id="follow-dialog" class="white-popup zoom-anim-dialog mfp-hide">
                <h4><?php echo e(trans('please_login_to_follow_user')); ?>.</h4>
        </div>
        <div id="small-dialog-<?php echo e($user->id); ?>" class="white-popup zoom-anim-dialog mfp-hide">
                <h4><?php echo e(trans('please_login_to_send_message')); ?>.</h4>
        </div>
        <div id="tip-dialog-<?php echo e($user->id); ?>" class="white-popup zoom-anim-dialog mfp-hide">
                <h4><?php echo e(trans('please_login_to_tip_the_user')); ?>.</h4>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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

    $(function() {

        // create message ajax request
        $(document).on('submit', '#create_message', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#create_message_btn").text('<?php echo e(trans('sending')); ?>...');
            $.ajax({
                url: '<?php echo e(route('user.chats.create')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                end_load();

                if (response.status == 400) {

                    showError('message', response.messages.message);
                    $("#create_message_btn").text('<?php echo e(trans('send')); ?>');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#create_message");
                    $("#create_message")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#create_message")[0].reset();
                    window.location.reload();

                }

                }
            });
        });

        $(document).on('click', '.followUser', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('follow')); ?>',
                method: 'post',
                dataType: "json",
                data: {item: a},
                success: function(e) {

                    var t;

                    if (e.bool === true){

                        $("#" + a).removeClass('btn-mint');
                        $("#" + a).addClass('btn-danger');
                        $("#" + a).text('<?php echo e(trans('following')); ?>');
                        t = $("#followers-" + a).text(), $("#followers-" + a).text(++t);

                    }else if(e.bool === false){

                        $("#" + a).removeClass('btn-danger');
                        $("#" + a).addClass('btn-mint');
                        $("#" + a).text('<?php echo e(trans('follow')); ?>');
                        t = $("#followers-" + a).text(), $("#followers-" + a).text(--t);

                    }

                    if (e.status == 200) {

                        tata.success("Success", e.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                    }
                },
                error: function(e) {

                    tata.error("Error", '<?php echo e(trans('please_login_to_follow_user')); ?>', {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });
                }
            });
        });

        $(document).on('mouseout' , '.btn-danger' , function(e) {
            let a = $(this).attr('id');
            $("#" + a).text('<?php echo e(trans('following')); ?>');
        });
        $(document).on('mouseover' , '.btn-danger' , function(e) {
            let a = $(this).attr('id');
            $("#" + a).text('<?php echo e(trans('unfollow')); ?>');
        });

        // tip user
        $(document).on('submit', '#tip_user', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#tip_user_btn").text('<?php echo e(trans('sending')); ?>...');
            $.ajax({
                url: '<?php echo e(route('user.tip')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                end_load();

                if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    window.location.reload();

                }

                }
            });
        });

        // report user
        $(document).on('submit', '#report_user', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#report_user_btn").text('<?php echo e(trans('sending')); ?>...');
            $.ajax({
                url: '<?php echo e(route('reportuser')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                    end_load();

                    if (response.status == 400) {

                        showError('reason', response.messages.reason);
                        $("#report_user_btn").text('<?php echo e(trans('report')); ?> <?php echo e(trans('user')); ?>');

                    }else if (response.status == 200) {

                        tata.success("Success", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        window.location.reload();

                    }else if(response.status == 401){

                        tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        window.location.reload();

                    }

                }
            });
        });

    });

    function likePost(a) {
        $.ajax({
            url: '<?php echo e(route('like')); ?>',
            method: 'post',
            dataType: "json",
            data: {item: a},
            success: function(e) {
                var t;
                1 == e.bool ? ($("#like-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-" + a).text(), $("#like-" + a).text(++t)) : 0 == e.bool && ($("#like-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-" + a).text(), $("#like-" + a).text(--t))

                if (e.status == 200) {

                    tata.success("Success", e.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                }
            },
            error: function(e) {

                tata.error("Error", '<?php echo e(trans('please_login_to_like')); ?>', {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });
            }
        })
    }

    $(document).on('click', '#user_posts .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "<?php echo e(url('profile/'.$user->username.'/posts/pagination/?page=')); ?>" + page,
            data: {},
            success: function(response) {
                $('#posts').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });

    });

    $(document).on('click', '#user_comments .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "<?php echo e(url('profile/'.$user->username.'/comments/pagination/?page=')); ?>" + page,
            data: {},
            success: function(response) {
                $('#comments').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });

    });

    $(document).on('click', '#user_replies .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "<?php echo e(url('profile/'.$user->username.'/replies/pagination/?page=')); ?>" + page,
            data: {},
            success: function(response) {
                $('#replies').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });

    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/user.blade.php ENDPATH**/ ?>