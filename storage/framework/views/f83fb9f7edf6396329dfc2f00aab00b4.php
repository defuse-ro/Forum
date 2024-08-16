<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/prism/prism.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span><?php echo e(trans('home')); ?></a></li>
                        <li><a href="<?php echo e(route('home.posts')); ?>"><?php echo e(trans('posts')); ?></a></li>
                        <li><?php echo e($post->title); ?></li>
                    </ul>
                    <h3 class="mb-2"><?php echo e($post->title); ?></h3>
                </div>
            </div>
        </div>
        <?php if(Auth::check()): ?>
            <?php if(get_setting('ads') == 1): ?>
                <?php if(Auth::user()->subscription()->ads == 0): ?>
                    <div class="ad-spot text-center">
                        <div class="ad-box">
                            <?php echo get_setting('top_ad'); ?>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <?php if(get_setting('ads') == 1): ?>
                <div class="ad-spot text-center">
                    <div class="ad-box">
                        <?php echo get_setting('top_ad'); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div><!--/vine-header-->


<?php if($post->category->pro === 1): ?>
    <?php if(Auth::check()): ?>
        <?php if(Auth::user()->subscription()->categories === 1): ?>

            <div class="post-box card d-flex mx-0" data-aos="fade-up" data-aos-easing="linear">

                <?php if($post->solved == '1' && $post->closed == '1'): ?>
                <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solved')); ?> & <i class="bi bi-lock"></i> <?php echo e(trans('closed')); ?></div>
                <?php elseif($post->solved == '1' && $post->closed == '0'): ?>
                <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solved')); ?> </div>
                <?php elseif($post->solved == '0' && $post->closed == '1'): ?>
                <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('closed')); ?> </div>
                <?php endif; ?>

                <div class="card-header card-header-action">
                    <div class="media align-items-center">
                        <div class="media-head me-2">
                            <div class="avatar custom-tooltip">
                                <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>">
                                    <img src="<?php echo e(my_asset('uploads/users/'.$post->user->image)); ?>" alt="user" class="avatar-img rounded-circle">
                                    <?php if(Cache::has('user-is-online-' . $post->user->id)): ?>
                                        <span class="user_online"></span>
                                    <?php endif; ?>
                                </a>

                                <div class="custom-tooltip-dropdown">
                                    <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                        <div class="flex-shrink-0 avatar"><img src="<?php echo e(my_asset('uploads/users/'.$post->user->image)); ?>" class="rounded-circle" alt="avatar"></div>
                                        <div class="ms-2">
                                            <span class="author-username"><?php echo e($post->user->total_points()); ?> <?php echo e(trans('points')); ?></span>
                                            <span class="author-follow-text"><?php echo e($post->user->followers->count()); ?> <?php echo e(trans('followers')); ?></span>
                                        </div>
                                    </div>
                                    <h6 class="author-name mb-1"><?php echo e($post->user->name); ?></h6>
                                    <p class="author-desc smaller mb-3"><?php echo e(Str::limit($post->user->bio, 80)); ?></p>
                                    <div class="follow-wrap mb-3">
                                        <h6 class="mb-1 smaller text-uppercase"><?php echo e(trans('followed_by')); ?></h6>
                                        <div class="avatar-group">
                                            <?php $__currentLoopData = $post->user->followers()->with('followers')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>" class="avatar-group-avatar">
                                                <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="avatar">
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>" class="btn btn-sm btn-mint rounded-pill"><span><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></span></a>
                                </div>

                            </div>
                        </div>
                        <div class="media-body">
                            <div>
                                <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>"><?php echo e($post->user->name); ?></a>
                                <?php if($post->user->verified == 1): ?>
                                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                        <i class="bi bi-patch-check"></i>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="fs-7"><span><?php echo e($post->created_at->diffForHumans()); ?> <?php echo e(trans('in')); ?> </span> <a href="<?php echo e(route('category', ['slug' => $post->category->slug])); ?>" class="cat"><?php echo e($post->category->name); ?></a></div>
                        </div>
                    </div>
                    <div class="card-action-wrap">
                        <?php if($post->pinned == '1'): ?>
                            <p class="me-2 text-danger d-flex"><i class="bi bi-pin"></i> <span class="d-none d-sm-block"><?php echo e(trans('pinned')); ?></span></p>
                        <?php endif; ?>
                        <?php if(Auth::check()): ?>
                            <?php if(Auth::user()->id === $post->user->id): ?>
                                <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <?php if($post->pinned == '0'): ?>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="pin('<?php echo e(route('user.posts.pin')); ?>','<?php echo e($post->id); ?>');"><i class="bi bi-pin me-2"></i> <?php echo e(trans('pin')); ?></a>
                                    <?php elseif($post->pinned == '1'): ?>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="pin('<?php echo e(route('user.posts.unpin')); ?>','<?php echo e($post->id); ?>');"><i class="bi bi-pin me-2"></i> <?php echo e(trans('unpin')); ?></a>
                                    <?php endif; ?>
                                    <?php if($post->closed == '1'): ?>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="open_post(<?php echo e($post->id); ?>)"><i class="bi bi-unlock me-2"></i> <?php echo e(trans('open')); ?> <?php echo e(trans('post')); ?></a>
                                    <?php elseif($post->closed == '0'): ?>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="close_post(<?php echo e($post->id); ?>)"><i class="bi bi-lock me-2"></i> <?php echo e(trans('close')); ?> <?php echo e(trans('post')); ?></a>
                                    <?php endif; ?>

                                    <a class="dropdown-item" href="<?php echo e(route('user.posts.edit', ['id' => $post->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('post')); ?></a>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.posts.destroy')); ?>','<?php echo e($post->id); ?>','<?php echo e(trans('delete_this_post')); ?>');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('post')); ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content content-large">
                        <?php echo $post->body; ?>

                    </div>

                    <div class="tags my-4">
                        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($tag->slug); ?>" class="tag-link"><?php echo e($tag->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php if($post->likes == '1'): ?>
                        <?php if(get_setting('react_like') == 'React'): ?>
                                <?php $reactionSummary = $post->reaction_summary->toArray(); ?>
                                <?php if (array_key_exists('like', $reactionSummary) || array_key_exists('love', $reactionSummary) || array_key_exists('haha', $reactionSummary)
                                || array_key_exists('wow', $reactionSummary) || array_key_exists('yay', $reactionSummary) || array_key_exists('sad', $reactionSummary)
                            || array_key_exists('mad', $reactionSummary)) {  ?>
                                    <ul class="reaction-list">
                                        <?php if (array_key_exists('like', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>">
                                            <p><?php echo $likesCount = $reactionSummary['like']; ?></p>
                                        </li>
                                        <?php } ?>
                                        <?php if (array_key_exists('love', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>">
                                            <p><?php echo $lovesCount = $reactionSummary['love']; ?></p>
                                        </li>
                                        <?php } ?>
                                        <?php if (array_key_exists('haha', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>">
                                            <p><?php echo $hahasCount = $reactionSummary['haha']; ?></p>
                                        </li>
                                        <?php } ?>
                                        <?php if (array_key_exists('wow', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>">
                                            <p><?php echo $wowsCount = $reactionSummary['wow']; ?></p>
                                        </li>
                                        <?php } ?>
                                        <?php if (array_key_exists('yay', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>">
                                            <p><?php echo $yaysCount = $reactionSummary['yay']; ?></p>
                                        </li>
                                        <?php } ?>
                                        <?php if (array_key_exists('sad', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>">
                                            <p><?php echo $sadsCount = $reactionSummary['sad']; ?></p>
                                        </li>
                                        <?php } ?>
                                        <?php if (array_key_exists('mad', $reactionSummary)) {  ?>
                                        <li class="reaction-box">
                                            <img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>">
                                            <p><?php echo $madsCount = $reactionSummary['mad']; ?></p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>

                <div class="card-footer">

                    <div class="qa-stats">
                        <?php if($post->likes == '1'): ?>
                            <?php if(get_setting('react_like') == 'React'): ?>
                                <div class="qa-item post-share react-sec">
                                    <a href="javascript:void(0);" class="qa-link">
                                        <?php if(Auth::check() && $post->is_reacted): ?>
                                        <?php $user_react = json_decode($post->reacted(),true); ?>

                                        <?php if ($user_react['type'] == 'like') { ?>
                                            <div class="qa-icon shown" id="react-icon-like-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-like-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                        <?php if ($user_react['type'] == 'love') { ?>
                                            <div class="qa-icon shown" id="react-icon-love-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-love-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                        <?php if ($user_react['type'] == 'haha') { ?>
                                            <div class="qa-icon shown" id="react-icon-haha-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-haha-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                        <?php if ($user_react['type'] == 'wow') { ?>
                                            <div class="qa-icon shown" id="react-icon-wow-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-wow-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                        <?php if ($user_react['type'] == 'yay') { ?>
                                            <div class="qa-icon shown" id="react-icon-yay-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-yay-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                        <?php if ($user_react['type'] == 'sad') { ?>
                                            <div class="qa-icon shown" id="react-icon-sad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-sad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                        <?php if ($user_react['type'] == 'mad') { ?>
                                            <div class="qa-icon shown" id="react-icon-mad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></div>
                                        <?php }else{ ?>
                                            <div class="qa-icon hiden" id="react-icon-mad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></div>
                                        <?php  } ?>
                                    <?php else: ?>
                                        <div class="qa-icon hiden" id="react-icon-like-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-love-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-haha-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-wow-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-yay-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-sad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></div>
                                        <div class="qa-icon hiden" id="react-icon-mad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></div>
                                    <?php endif; ?>
                                        <div class="qa-text"><?php echo e(trans('react')); ?></div>
                                        <div class="qa-text me-2">(<?php echo e($post->total_reactions()->count()); ?>)</div>
                                    </a>
                                    <ul class="share-list">
                                        <li><a class="reaction-1" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'like')" data-bs-toggle="tooltip" aria-label="like" data-bs-original-title="like">
                                            <img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>"></a>
                                        </li>
                                        <li><a class="reaction-2" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'love')" data-bs-toggle="tooltip" aria-label="love" data-bs-original-title="love">
                                            <img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>"></a>
                                        </li>
                                        <li><a class="reaction-3" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'haha')" data-bs-toggle="tooltip" aria-label="haha" data-bs-original-title="haha">
                                            <img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>"></a>
                                        </li>
                                        <li><a class="reaction-4" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'wow')" data-bs-toggle="tooltip" aria-label="wow" data-bs-original-title="wow">
                                            <img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>"></a>
                                        </li>
                                        <li><a class="reaction-5" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'yay')" data-bs-toggle="tooltip" aria-label="yay" data-bs-original-title="yay">
                                            <img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>"></a>
                                        </li>
                                        <li><a class="reaction-6" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'sad')" data-bs-toggle="tooltip" aria-label="sad" data-bs-original-title="sad">
                                            <img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>"></a>
                                        </li>
                                        <li><a class="reaction-7" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'mad')" data-bs-toggle="tooltip" aria-label="mad" data-bs-original-title="mad">
                                            <img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>"></a>
                                        </li>
                                    </ul>

                                    <?php if($post->user_reactions()->count() > 0): ?>
                                        <ul>
                                            <?php $__currentLoopData = $post->user_reactions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('user', ['username' => $view->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$view->user->image)); ?>" alt="User"></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php elseif(get_setting('react_like') == 'Like'): ?>
                                <div class="qa-item">
                                    <a href="javascript:void(0);" onclick="likePost(<?php echo e($post->id); ?>)" class="qa-link">
                                        <div class="qa-icon"><i id="like-icon-<?php echo e($post->id); ?>" class="bi bi-heart-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasLiked($post)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></i></div>
                                        <div class="qa-text" id="like-<?php echo e($post->id); ?>"><?php echo json_encode($post->likers()->count(), 15, 512) ?></div>
                                    </a>
                                    <div class="qa-text me-2"><?php echo e(trans('likes')); ?></div>
                                    <?php if($post->user_likes()->count() > 0): ?>
                                        <ul>
                                            <?php $__currentLoopData = $post->user_likes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('user', ['username' => $view->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$view->user->image)); ?>" alt="User"></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="qa-item">
                            <div class="qa-icon"><i class="bi bi-eye"></i></div>
                            <div class="qa-text"><?php echo e($post->views()->count()); ?></div>
                            <div class="qa-text"><?php echo e(trans('views')); ?></div>
                        </div>
                    <?php if($post->comments == '1'): ?>
                        <div class="qa-item" id="qa-comments">
                            <a href="#comments" class="qa-link">
                                <div class="qa-icon"><i class="bi bi-chat-dots"></i></div>
                                <div class="qa-text"><?php echo e($post->comments()->count()); ?></div>
                                <div class="qa-text"><?php echo e(trans('comments')); ?></div>
                            </a>
                        </div>
                    <?php endif; ?>
                        <div class="qa-item">
                        <a href="javascript:void(0);" onclick="savePost(<?php echo e($post->id); ?>)" class="qa-link">
                            <div class="qa-icon"><i id="save-icon-<?php echo e($post->id); ?>" class="bi bi-bookmark-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasFavorited($post)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></i></div>
                            <div class="qa-text" id="save-<?php echo e($post->id); ?>"><?php echo json_encode($post->favoriters()->count(), 15, 512) ?></div>
                        </a>
                        </div>
                        <div class="qa-item">
                        <a href="javascript:void(0)" onclick="report('<?php echo e(route('report.post')); ?>','<?php echo e($post->id); ?>','Report this Post');" class="qa-link">
                            <div class="qa-icon"><i class="bi bi-flag"></i></div>
                            <div class="qa-text"><?php echo e(trans('report')); ?></div>
                        </a>
                        </div>
                        <div class="qa-item post-share">
                            <a href="javascript:void(0);" class="qa-link">
                            <div class="qa-icon"><i class="bi bi-share"></i></div>
                            <div class="qa-text"><?php echo e($post->shares()->count()); ?></div>
                            <div class="qa-text"><?php echo e(trans('shares')); ?></div>
                            </a>
                            <ul class="share-list">
                                <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Facebook');" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&t=<?php echo e($post->title); ?>" target="_blank" class="color-fb"><i class="bi bi-facebook"></i></a></li>
                                <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Twitter');" href="https://twitter.com/share?url=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&text=<?php echo e($post->title); ?>" target="_blank" class="color-twitter"><i class="bi bi-twitter"></i></a></li>
                                <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Whatsapp');" href="https://wa.me/?text=<?php echo e($post->title); ?>%20<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>" data-action="share/whatsapp/share" target="_blank" class="color-whatsapp"><i class="bi bi-whatsapp"></i></a></li>
                                <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Reddit');" href="https://www.reddit.com/submit?url=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&title=<?php echo e($post->title); ?>" target="_blank" class="color-reddit"><i class="bi bi-reddit"></i></a></li>
                                <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','LinkedIn');" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&title=<?php echo e($post->title); ?>" target="_blank" class="color-linkedin"><i class="bi bi-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div><!--/post-box-->

            <?php if($post->comments == '1'): ?>

            <?php if($post->closed == '0'): ?>
                <div class="comment-form" data-aos="fade-up" data-aos-easing="linear">
                    <h3 class="comment-form-title"><?php echo e(trans('leave_a_comment')); ?></h3>
                    <form id="add_comment_form" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="post_id" id="post_id" value="<?php echo e($post->id); ?>">
                        <input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo e($post->user->id); ?>">

                    <div class="row">
                        <div class="col-lg-12 d-flex mb-4">
                            <div class="comment-form-avatar d-none d-sm-block">
                                <img src="<?php echo e(Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="User">
                            </div>
                            <div class="comment-input">

                                <p class="small mb-3">* <?php echo e(trans('here_is_a_list_of_sites_you_can_embed_video_from')); ?> <a href="https://noembed.com/#supported-sites" target="_blank"><?php echo e(trans('list_of_sites')); ?></a> </p>

                                <div class="form-group">
                                    <textarea name="bodyComment" id="bodyComment" rows="5"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="comment-btn mt-3">
                                    <button type="submit" class="btn btn-mint" id="add_comment_btn"><?php echo e(trans('post')); ?> <?php echo e(trans('comment')); ?></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            <?php endif; ?>

                <div class="scrollspy-example-2" data-bs-spy="scroll" data-bs-target="qa-comments" data-bs-smooth-scroll="true">
                <div id="comments">
                    <?php if($post->comments()->count() > 0 && $post->closed == '1' || $post->comments()->count() > 0 && $post->closed == '0'): ?>
                        <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear"><?php echo e(trans('comments')); ?></h3>
                    <?php elseif($post->comments()->count() == 0 && $post->closed == '1'): ?>
                    <?php elseif($post->comments()->count() == 0 && $post->closed == '0'): ?>
                        <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear"><?php echo e(trans('comments')); ?></h3>
                    <?php endif; ?>

                    <?php if($post->comments()->count() > 0): ?>

                        <?php $__currentLoopData = $post->comments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="post-box card d-flex mx-0 <?php echo e($comment->solution == '1' ? 'solved' : ''); ?>" data-aos="fade-up" data-aos-easing="linear">

                                <?php if($comment->solution == '1'): ?>
                                <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solution')); ?></div>
                                <?php endif; ?>


                                <div class="card-header card-header-action">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar custom-tooltip">
                                                <a href="<?php echo e(route('user', ['username' => $comment->user->username])); ?>">
                                                    <img src="<?php echo e(my_asset('uploads/users/'.$comment->user->image)); ?>" alt="user" class="avatar-img rounded-circle">
                                                    <?php if(Cache::has('user-is-online-' . $comment->user->id)): ?>
                                                        <span class="user_online"></span>
                                                    <?php endif; ?>
                                                </a>

                                                <div class="custom-tooltip-dropdown">
                                                    <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                        <div class="flex-shrink-0 avatar"><img src="<?php echo e(my_asset('uploads/users/'.$comment->user->image)); ?>" class="rounded-circle" alt="avatar"></div>
                                                        <div class="ms-2">
                                                            <span class="author-username"><?php echo e($comment->user->total_points()); ?> <?php echo e(trans('points')); ?></span>
                                                            <span class="author-follow-text"><?php echo e($comment->user->followers->count()); ?> <?php echo e(trans('followers')); ?></span>
                                                        </div>
                                                    </div>
                                                    <h6 class="author-name mb-1"><?php echo e($comment->user->name); ?></h6>
                                                    <p class="author-desc smaller mb-3"><?php echo e(Str::limit($comment->user->bio, 80)); ?></p>
                                                    <div class="follow-wrap mb-3">
                                                        <h6 class="mb-1 smaller text-uppercase"><?php echo e(trans('followed_by')); ?></h6>
                                                        <div class="avatar-group">
                                                            <?php $__currentLoopData = $comment->user->followers()->with('followers')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>" class="avatar-group-avatar">
                                                                <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="avatar">
                                                            </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>

                                                    <a href="<?php echo e(route('user', ['username' => $comment->user->username])); ?>" class="btn btn-sm btn-mint rounded-pill"><span><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></span></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div><a href="<?php echo e(route('user', ['username' => $comment->user->username])); ?>"><?php echo e($comment->user->name); ?></a>
                                                <?php if($comment->user->verified == 1): ?>
                                                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                                        <i class="bi bi-patch-check"></i>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="fs-7"><span><?php echo e('@'.$comment->user->username); ?> </span></div>
                                        </div>
                                    </div>
                                    <?php if(Auth::check()): ?>
                                    <?php if(Auth::user()->id === $comment->user->id): ?>
                                        <div class="card-action-wrap">
                                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="<?php echo e(route('user.comments.edit', ['id' => $comment->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('comment')); ?></a>
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.comments.destroy')); ?>','<?php echo e($comment->id); ?>','<?php echo e(trans('delete_this_comment')); ?>');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('comment')); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <div class="content content-large">
                                        <?php echo $comment->body; ?>

                                    </div>

                                    <div class="comment-meta">
                                        <span class="publish-date ms-3"> <?php echo e($comment->created_at->diffForHumans()); ?></span>

                                        <a  href="javascript:void(0);" id="<?php echo e($comment->id); ?>" class="likeComment">
                                            <span id="like-comment-icon-<?php echo e($comment->id); ?>" class="bi bi-heart-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasLiked($comment)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></span>
                                            <span class="ms-1" id="like-comment-<?php echo e($comment->id); ?>"><?php echo json_encode($comment->likers()->count(), 15, 512) ?></span> <?php echo e(trans('likes')); ?>

                                        </a>

                                        <?php if($post->closed == '0'): ?>
                                            <a href="javascript:void(0)" class="reply ms-3" onclick="show_reply_form('<?php echo e($comment->id); ?>');"><span class="bi bi-reply-all me-1"></span> <?php echo e(trans('reply')); ?></a>
                                        <?php endif; ?>

                                        <a href="javascript:void(0)" onclick="report('<?php echo e(route('report.comment')); ?>','<?php echo e($comment->id); ?>','<?php echo e(trans('report_this_comment')); ?>');" class="reply ms-3">
                                            <i class="bi bi-flag me-1"></i> <?php echo e(trans('report')); ?>

                                        </a>
                                        <?php if(Auth::check()): ?>
                                        <?php if(Auth::user()->id === $comment->post->user->id): ?>
                                            <?php if($comment->solution == '1'): ?>
                                                <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.comments.unmark')); ?>','<?php echo e($comment->id); ?>','<?php echo e($comment->post->id); ?>');" class="reply ms-3">
                                                    <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('unmark_as_solution')); ?>

                                                </a>
                                            <?php elseif($comment->solution == '0'): ?>
                                                <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.comments.mark')); ?>','<?php echo e($comment->id); ?>','<?php echo e($comment->post->id); ?>');" class="reply ms-3">
                                                    <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('mark_as_solution')); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="post-box-children ms-5">

                                    <div class="comment-form reply-form" id="reply-form-<?php echo e($comment->id); ?>">
                                        <form id="add_reply_form" method="POST">
                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo e($comment->id); ?>">
                                            <input type="hidden" name="post_id" id="post_id" value="<?php echo e($comment->post->id); ?>">
                                            <input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo e($comment->user->id); ?>">

                                        <div class="row">
                                            <div class="col-lg-12 d-flex mb-4">
                                                <div class="comment-form-avatar d-none d-sm-block">
                                                    <img src="<?php echo e(Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="User">
                                                </div>
                                                <div class="comment-input">

                                                    <p class="small mb-3">* <?php echo e(trans('here_is_a_list_of_sites_you_can_embed_video_from')); ?> <a href="https://noembed.com/#supported-sites" target="_blank"><?php echo e(trans('list_of_sites')); ?></a> </p>

                                                    <div class="form-group">
                                                        <textarea name="bodyReply" id="bodyReply" rows="5" placeholder="Post your reply ..."></textarea>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="comment-btn mt-3">
                                                        <button type="submit" class="btn btn-mint" id="add_reply_btn"><?php echo e(trans('post')); ?> <?php echo e(trans('reply')); ?></button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="post-box card d-flex mx-0 <?php echo e($reply->solution == '1' ? 'solved' : 'border-top'); ?>">

                                            <?php if($reply->solution == '1'): ?>
                                            <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solution')); ?></div>
                                            <?php endif; ?>


                                            <div class="card-header card-header-action">
                                                <div class="media align-items-center">
                                                    <div class="media-head me-2">
                                                        <div class="avatar custom-tooltip">
                                                            <a href="<?php echo e(route('user', ['username' => $reply->user->username])); ?>">
                                                                <img src="<?php echo e(my_asset('uploads/users/'.$reply->user->image)); ?>" alt="user" class="avatar-img rounded-circle">
                                                                <?php if(Cache::has('user-is-online-' . $reply->user->id)): ?>
                                                                    <span class="user_online"></span>
                                                                <?php endif; ?>
                                                            </a>

                                                            <div class="custom-tooltip-dropdown">
                                                                <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                                    <div class="flex-shrink-0 avatar"><img src="<?php echo e(my_asset('uploads/users/'.$reply->user->image)); ?>" class="rounded-circle" alt="avatar"></div>
                                                                    <div class="ms-2">
                                                                        <span class="author-username"><?php echo e($reply->user->total_points()); ?> <?php echo e(trans('points')); ?></span>
                                                                        <span class="author-follow-text"><?php echo e($reply->user->followers->count()); ?> <?php echo e(trans('followers')); ?></span>
                                                                    </div>
                                                                </div>
                                                                <h6 class="author-name mb-1"><?php echo e($reply->user->name); ?></h6>
                                                                <p class="author-desc smaller mb-3"><?php echo e(Str::limit($reply->user->bio, 80)); ?></p>
                                                                <div class="follow-wrap mb-3">
                                                                    <h6 class="mb-1 smaller text-uppercase"><?php echo e(trans('followed_by')); ?></h6>
                                                                    <div class="avatar-group">
                                                                        <?php $__currentLoopData = $reply->user->followers()->with('followers')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>" class="avatar-group-avatar">
                                                                            <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="avatar">
                                                                        </a>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>

                                                                <a href="<?php echo e(route('user', ['username' => $reply->user->username])); ?>" class="btn btn-sm btn-mint rounded-pill"><span><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></span></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div><a href="<?php echo e(route('user', ['username' => $reply->user->username])); ?>"><?php echo e($reply->user->name); ?></a>
                                                            <?php if($reply->user->verified == 1): ?>
                                                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                                                    <i class="bi bi-patch-check"></i>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="fs-7"><span><?php echo e('@'.$reply->user->username); ?> </span></div>
                                                    </div>
                                                </div>
                                                <?php if(Auth::check()): ?>
                                                <?php if(Auth::user()->id === $reply->user->id): ?>
                                                    <div class="card-action-wrap">
                                                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="<?php echo e(route('user.replies.edit', ['id' => $reply->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('replyj')); ?></a>
                                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.replies.destroy')); ?>','<?php echo e($reply->id); ?>','Delete this Reply');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('reply')); ?></a>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-body">
                                                <div class="content content-large">
                                                    <?php echo $reply->body; ?>

                                                </div>

                                                <div class="comment-meta">
                                                    <span class="publish-date ms-3"> <?php echo e($reply->created_at->diffForHumans()); ?></span>
                                                    <a  href="javascript:void(0);" id="<?php echo e($reply->id); ?>" class="likeReply">
                                                        <span id="like-reply-icon-<?php echo e($reply->id); ?>" class="bi bi-heart-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasLiked($reply)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></span>
                                                        <span class="ms-1" id="like-reply-<?php echo e($reply->id); ?>"><?php echo json_encode($reply->likers()->count(), 15, 512) ?></span> <?php echo e(trans('likes')); ?>

                                                    </a>
                                                    <a href="javascript:void(0)" onclick="report('<?php echo e(route('report.reply')); ?>','<?php echo e($reply->id); ?>','Report this Reply');" class="reply ms-3">
                                                        <i class="bi bi-flag me-1"></i> <?php echo e(trans('report')); ?>

                                                    </a>

                                                    <?php if(Auth::check()): ?>
                                                    <?php if(Auth::user()->id === $reply->comment->post->user->id || Auth::user()->id === $reply->comment->user_id): ?>
                                                        <?php if($reply->solution == '1'): ?>
                                                            <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.replies.unmark')); ?>','<?php echo e($reply->id); ?>','<?php echo e($reply->comment->post->id); ?>');" class="reply ms-3">
                                                                <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('unmark_as_solution')); ?>

                                                            </a>
                                                        <?php elseif($reply->solution == '0'): ?>
                                                            <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.replies.mark')); ?>','<?php echo e($reply->id); ?>','<?php echo e($reply->comment->post->id); ?>');" class="reply ms-3">
                                                                <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('mark_as_solution')); ?>

                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div><!--/post-box-->

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>

                            </div><!--/post-box-->

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>

                        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                            <div class="dashboard-body">
                                <div class="upload-image my-3">
                                    <h4 class="mb-3"><?php echo e(trans('comments_and_replies_not_posted_yet')); ?>.</h4>
                                </div>
                            </div>
                        </div><!--/dashboard-card-->

                    <?php endif; ?>

                </div>
                </div><!--/scrollspy-->

            <?php elseif($post->comments == '2'): ?>

                <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                    <div class="dashboard-body">
                        <div class="upload-image my-3">
                            <h4 class="mb-3"><?php echo e(trans('comments_closed_for_this_post')); ?>.</h4>
                        </div>
                    </div>
                </div><!--/dashboard-card-->

            <?php endif; ?>


        <?php else: ?>

            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-body">
                    <div class="upload-image my-3">
                        <h4 class="mb-3">To access this Post, <?php echo e(trans('you_need_to_purchase_a_new_pricing_plan')); ?>.</h4>
                        <a href="<?php echo e(route('plans')); ?>" class="btn btn-mint btn-md rounded-pill"><i class="bi bi-send me-2"></i><?php echo e(trans('pricing_plans')); ?></a>
                    </div>

                </div>
            </div><!--/dashboard-card-->
        <?php endif; ?>
    <?php else: ?>

        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
            <div class="dashboard-body">
                <div class="upload-image my-3">
                    <h4 class="mb-3">Login to access this Post.</h4>
                    <a href="<?php echo e(route('auth.login')); ?>" class="btn btn-mint btn-md rounded-pill"><?php echo e(trans('login')); ?></a>
                </div>

            </div>
        </div><!--/dashboard-card-->

    <?php endif; ?>
<?php else: ?>


    <div class="post-box card d-flex mx-0" data-aos="fade-up" data-aos-easing="linear">

        <?php if($post->solved == '1' && $post->closed == '1'): ?>
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solved')); ?> & <i class="bi bi-lock"></i> <?php echo e(trans('closed')); ?></div>
        <?php elseif($post->solved == '1' && $post->closed == '0'): ?>
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solved')); ?> </div>
        <?php elseif($post->solved == '0' && $post->closed == '1'): ?>
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('closed')); ?> </div>
        <?php endif; ?>

        <div class="card-header card-header-action">
            <div class="media align-items-center">
                <div class="media-head me-2">
                    <div class="avatar custom-tooltip">
                        <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>">
                            <img src="<?php echo e(my_asset('uploads/users/'.$post->user->image)); ?>" alt="user" class="avatar-img rounded-circle">
                            <?php if(Cache::has('user-is-online-' . $post->user->id)): ?>
                                <span class="user_online"></span>
                            <?php endif; ?>
                        </a>

                        <div class="custom-tooltip-dropdown">
                            <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                <div class="flex-shrink-0 avatar"><img src="<?php echo e(my_asset('uploads/users/'.$post->user->image)); ?>" class="rounded-circle" alt="avatar"></div>
                                <div class="ms-2">
                                    <span class="author-username"><?php echo e($post->user->total_points()); ?> <?php echo e(trans('points')); ?></span>
                                    <span class="author-follow-text"><?php echo e($post->user->followers->count()); ?> <?php echo e(trans('followers')); ?></span>
                                </div>
                            </div>
                            <h6 class="author-name mb-1"><?php echo e($post->user->name); ?></h6>
                            <p class="author-desc smaller mb-3"><?php echo e(Str::limit($post->user->bio, 80)); ?></p>
                            <div class="follow-wrap mb-3">
                                <h6 class="mb-1 smaller text-uppercase"><?php echo e(trans('followed_by')); ?></h6>
                                <div class="avatar-group">
                                    <?php $__currentLoopData = $post->user->followers()->with('followers')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>" class="avatar-group-avatar">
                                        <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="avatar">
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>" class="btn btn-sm btn-mint rounded-pill"><span><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></span></a>
                        </div>

                    </div>
                </div>
                <div class="media-body">
                    <div>
                        <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>"><?php echo e($post->user->name); ?></a>
                        <?php if($post->user->verified == 1): ?>
                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                <i class="bi bi-patch-check"></i>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="fs-7"><span><?php echo e($post->created_at->diffForHumans()); ?> <?php echo e(trans('in')); ?> </span> <a href="<?php echo e(route('category', ['slug' => $post->category->slug])); ?>" class="cat"><?php echo e($post->category->name); ?></a></div>
                </div>
            </div>
            <div class="card-action-wrap">
                <?php if($post->pinned == '1'): ?>
                    <p class="me-2 text-danger d-flex"><i class="bi bi-pin"></i> <span class="d-none d-sm-block"><?php echo e(trans('pinned')); ?></span></p>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                    <?php if(Auth::user()->id === $post->user->id): ?>
                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <?php if($post->pinned == '0'): ?>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="pin('<?php echo e(route('user.posts.pin')); ?>','<?php echo e($post->id); ?>');"><i class="bi bi-pin me-2"></i> <?php echo e(trans('pin')); ?></a>
                            <?php elseif($post->pinned == '1'): ?>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="pin('<?php echo e(route('user.posts.unpin')); ?>','<?php echo e($post->id); ?>');"><i class="bi bi-pin me-2"></i> <?php echo e(trans('unpin')); ?></a>
                            <?php endif; ?>
                            <?php if($post->closed == '1'): ?>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="open_post(<?php echo e($post->id); ?>)"><i class="bi bi-unlock me-2"></i> <?php echo e(trans('open')); ?> <?php echo e(trans('post')); ?></a>
                            <?php elseif($post->closed == '0'): ?>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="close_post(<?php echo e($post->id); ?>)"><i class="bi bi-lock me-2"></i> <?php echo e(trans('close')); ?> <?php echo e(trans('post')); ?></a>
                            <?php endif; ?>

                            <a class="dropdown-item" href="<?php echo e(route('user.posts.edit', ['id' => $post->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('post')); ?></a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.posts.destroy')); ?>','<?php echo e($post->id); ?>','<?php echo e(trans('delete_this_post')); ?>');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('post')); ?></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <div class="content content-large">
                <?php echo $post->body; ?>

            </div>

            <div class="tags my-4">
                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($tag->slug); ?>" class="tag-link"><?php echo e($tag->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($post->likes == '1'): ?>
                <?php if(get_setting('react_like') == 'React'): ?>
                        <?php $reactionSummary = $post->reaction_summary->toArray(); ?>
                        <?php if (array_key_exists('like', $reactionSummary) || array_key_exists('love', $reactionSummary) || array_key_exists('haha', $reactionSummary)
                        || array_key_exists('wow', $reactionSummary) || array_key_exists('yay', $reactionSummary) || array_key_exists('sad', $reactionSummary)
                    || array_key_exists('mad', $reactionSummary)) {  ?>
                            <ul class="reaction-list">
                                <?php if (array_key_exists('like', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>">
                                    <p><?php echo $likesCount = $reactionSummary['like']; ?></p>
                                </li>
                                <?php } ?>
                                <?php if (array_key_exists('love', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>">
                                    <p><?php echo $lovesCount = $reactionSummary['love']; ?></p>
                                </li>
                                <?php } ?>
                                <?php if (array_key_exists('haha', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>">
                                    <p><?php echo $hahasCount = $reactionSummary['haha']; ?></p>
                                </li>
                                <?php } ?>
                                <?php if (array_key_exists('wow', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>">
                                    <p><?php echo $wowsCount = $reactionSummary['wow']; ?></p>
                                </li>
                                <?php } ?>
                                <?php if (array_key_exists('yay', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>">
                                    <p><?php echo $yaysCount = $reactionSummary['yay']; ?></p>
                                </li>
                                <?php } ?>
                                <?php if (array_key_exists('sad', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>">
                                    <p><?php echo $sadsCount = $reactionSummary['sad']; ?></p>
                                </li>
                                <?php } ?>
                                <?php if (array_key_exists('mad', $reactionSummary)) {  ?>
                                <li class="reaction-box">
                                    <img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>">
                                    <p><?php echo $madsCount = $reactionSummary['mad']; ?></p>
                                </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                <?php endif; ?>
            <?php endif; ?>

        </div>

        <div class="card-footer">

            <div class="qa-stats">
                <?php if($post->likes == '1'): ?>
                    <?php if(get_setting('react_like') == 'React'): ?>
                        <div class="qa-item post-share react-sec">
                            <a href="javascript:void(0);" class="qa-link">
                                <?php if(Auth::check() && $post->is_reacted): ?>
                                <?php $user_react = json_decode($post->reacted(),true); ?>

                                <?php if ($user_react['type'] == 'like') { ?>
                                    <div class="qa-icon shown" id="react-icon-like-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-like-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                                <?php if ($user_react['type'] == 'love') { ?>
                                    <div class="qa-icon shown" id="react-icon-love-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-love-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                                <?php if ($user_react['type'] == 'haha') { ?>
                                    <div class="qa-icon shown" id="react-icon-haha-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-haha-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                                <?php if ($user_react['type'] == 'wow') { ?>
                                    <div class="qa-icon shown" id="react-icon-wow-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-wow-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                                <?php if ($user_react['type'] == 'yay') { ?>
                                    <div class="qa-icon shown" id="react-icon-yay-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-yay-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                                <?php if ($user_react['type'] == 'sad') { ?>
                                    <div class="qa-icon shown" id="react-icon-sad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-sad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                                <?php if ($user_react['type'] == 'mad') { ?>
                                    <div class="qa-icon shown" id="react-icon-mad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></div>
                                <?php }else{ ?>
                                    <div class="qa-icon hiden" id="react-icon-mad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></div>
                                <?php  } ?>
                            <?php else: ?>
                                <div class="qa-icon hiden" id="react-icon-like-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-love-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-haha-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-wow-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-yay-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-sad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>" class="avatar avatar-small"></div>
                                <div class="qa-icon hiden" id="react-icon-mad-<?php echo e($post->id); ?>"><img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>" class="avatar avatar-small"></div>
                            <?php endif; ?>
                                <div class="qa-text"><?php echo e(trans('react')); ?></div>
                                <div class="qa-text me-2">(<?php echo e($post->total_reactions()->count()); ?>)</div>
                            </a>
                            <ul class="share-list">
                                <li><a class="reaction-1" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'like')" data-bs-toggle="tooltip" aria-label="like" data-bs-original-title="like">
                                    <img src="<?php echo e(my_asset('uploads/reactions/like.png')); ?>"></a>
                                </li>
                                <li><a class="reaction-2" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'love')" data-bs-toggle="tooltip" aria-label="love" data-bs-original-title="love">
                                    <img src="<?php echo e(my_asset('uploads/reactions/love.png')); ?>"></a>
                                </li>
                                <li><a class="reaction-3" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'haha')" data-bs-toggle="tooltip" aria-label="haha" data-bs-original-title="haha">
                                    <img src="<?php echo e(my_asset('uploads/reactions/haha.png')); ?>"></a>
                                </li>
                                <li><a class="reaction-4" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'wow')" data-bs-toggle="tooltip" aria-label="wow" data-bs-original-title="wow">
                                    <img src="<?php echo e(my_asset('uploads/reactions/wow.png')); ?>"></a>
                                </li>
                                <li><a class="reaction-5" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'yay')" data-bs-toggle="tooltip" aria-label="yay" data-bs-original-title="yay">
                                    <img src="<?php echo e(my_asset('uploads/reactions/yay.png')); ?>"></a>
                                </li>
                                <li><a class="reaction-6" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'sad')" data-bs-toggle="tooltip" aria-label="sad" data-bs-original-title="sad">
                                    <img src="<?php echo e(my_asset('uploads/reactions/sad.png')); ?>"></a>
                                </li>
                                <li><a class="reaction-7" href="javascript:void(0);" onclick="reactPost(<?php echo e($post->id); ?>, 'mad')" data-bs-toggle="tooltip" aria-label="mad" data-bs-original-title="mad">
                                    <img src="<?php echo e(my_asset('uploads/reactions/mad.png')); ?>"></a>
                                </li>
                            </ul>

                            <?php if($post->user_reactions()->count() > 0): ?>
                                <ul>
                                    <?php $__currentLoopData = $post->user_reactions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('user', ['username' => $view->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$view->user->image)); ?>" alt="User"></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php elseif(get_setting('react_like') == 'Like'): ?>
                        <div class="qa-item">
                            <a href="javascript:void(0);" onclick="likePost(<?php echo e($post->id); ?>)" class="qa-link">
                                <div class="qa-icon"><i id="like-icon-<?php echo e($post->id); ?>" class="bi bi-heart-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasLiked($post)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></i></div>
                                <div class="qa-text" id="like-<?php echo e($post->id); ?>"><?php echo json_encode($post->likers()->count(), 15, 512) ?></div>
                            </a>
                            <div class="qa-text me-2"><?php echo e(trans('likes')); ?></div>
                            <?php if($post->user_likes()->count() > 0): ?>
                                <ul>
                                    <?php $__currentLoopData = $post->user_likes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('user', ['username' => $view->user->username])); ?>"><img src="<?php echo e(my_asset('uploads/users/'.$view->user->image)); ?>" alt="User"></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="qa-item">
                    <div class="qa-icon"><i class="bi bi-eye"></i></div>
                    <div class="qa-text"><?php echo e($post->views()->count()); ?></div>
                    <div class="qa-text"><?php echo e(trans('views')); ?></div>
                </div>
            <?php if($post->comments == '1'): ?>
                <div class="qa-item" id="qa-comments">
                    <a href="#comments" class="qa-link">
                        <div class="qa-icon"><i class="bi bi-chat-dots"></i></div>
                        <div class="qa-text"><?php echo e($post->comments()->count()); ?></div>
                        <div class="qa-text"><?php echo e(trans('comments')); ?></div>
                    </a>
                </div>
            <?php endif; ?>
                <div class="qa-item">
                <a href="javascript:void(0);" onclick="savePost(<?php echo e($post->id); ?>)" class="qa-link">
                    <div class="qa-icon"><i id="save-icon-<?php echo e($post->id); ?>" class="bi bi-bookmark-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasFavorited($post)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></i></div>
                    <div class="qa-text" id="save-<?php echo e($post->id); ?>"><?php echo json_encode($post->favoriters()->count(), 15, 512) ?></div>
                </a>
                </div>
                <div class="qa-item">
                <a href="javascript:void(0)" onclick="report('<?php echo e(route('report.post')); ?>','<?php echo e($post->id); ?>','Report this Post');" class="qa-link">
                    <div class="qa-icon"><i class="bi bi-flag"></i></div>
                    <div class="qa-text"><?php echo e(trans('report')); ?></div>
                </a>
                </div>
                <div class="qa-item post-share">
                    <a href="javascript:void(0);" class="qa-link">
                    <div class="qa-icon"><i class="bi bi-share"></i></div>
                    <div class="qa-text"><?php echo e($post->shares()->count()); ?></div>
                    <div class="qa-text"><?php echo e(trans('shares')); ?></div>
                    </a>
                    <ul class="share-list">
                        <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Facebook');" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&t=<?php echo e($post->title); ?>" target="_blank" class="color-fb"><i class="bi bi-facebook"></i></a></li>
                        <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Twitter');" href="https://twitter.com/share?url=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&text=<?php echo e($post->title); ?>" target="_blank" class="color-twitter"><i class="bi bi-twitter"></i></a></li>
                        <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Whatsapp');" href="https://wa.me/?text=<?php echo e($post->title); ?>%20<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>" data-action="share/whatsapp/share" target="_blank" class="color-whatsapp"><i class="bi bi-whatsapp"></i></a></li>
                        <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','Reddit');" href="https://www.reddit.com/submit?url=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&title=<?php echo e($post->title); ?>" target="_blank" class="color-reddit"><i class="bi bi-reddit"></i></a></li>
                        <li><a onclick="share('<?php echo e(route('share')); ?>','<?php echo e($post->id); ?>','LinkedIn');" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url('post/'.$post->post_id.'/'.$post->slug)); ?>&title=<?php echo e($post->title); ?>" target="_blank" class="color-linkedin"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div><!--/post-box-->

    <?php if($post->comments == '1'): ?>

        <?php if($post->closed == '0'): ?>
            <div class="comment-form" data-aos="fade-up" data-aos-easing="linear">
                <h3 class="comment-form-title"><?php echo e(trans('leave_a_comment')); ?></h3>
                <form id="add_comment_form" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="post_id" id="post_id" value="<?php echo e($post->id); ?>">
                    <input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo e($post->user->id); ?>">

                <div class="row">
                    <div class="col-lg-12 d-flex mb-4">
                        <div class="comment-form-avatar d-none d-sm-block">
                            <img src="<?php echo e(Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="User">
                        </div>
                        <div class="comment-input">

                            <p class="small mb-3">* <?php echo e(trans('here_is_a_list_of_sites_you_can_embed_video_from')); ?> <a href="https://noembed.com/#supported-sites" target="_blank"><?php echo e(trans('list_of_sites')); ?></a> </p>

                            <div class="form-group">
                                <textarea name="bodyComment" id="bodyComment" rows="5"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="comment-btn mt-3">
                                <button type="submit" class="btn btn-mint" id="add_comment_btn"><?php echo e(trans('post')); ?> <?php echo e(trans('comment')); ?></button>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        <?php endif; ?>

            <div class="scrollspy-example-2" data-bs-spy="scroll" data-bs-target="qa-comments" data-bs-smooth-scroll="true">
            <div id="comments">
                <?php if($post->comments()->count() > 0 && $post->closed == '1' || $post->comments()->count() > 0 && $post->closed == '0'): ?>
                    <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear"><?php echo e(trans('comments')); ?></h3>
                <?php elseif($post->comments()->count() == 0 && $post->closed == '1'): ?>
                <?php elseif($post->comments()->count() == 0 && $post->closed == '0'): ?>
                    <h3 class="my-5" data-aos="fade-up" data-aos-easing="linear"><?php echo e(trans('comments')); ?></h3>
                <?php endif; ?>

                <?php if($post->comments()->count() > 0): ?>

                    <?php $__currentLoopData = $post->comments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="post-box card d-flex mx-0 <?php echo e($comment->solution == '1' ? 'solved' : ''); ?>" data-aos="fade-up" data-aos-easing="linear">

                            <?php if($comment->solution == '1'): ?>
                            <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solution')); ?></div>
                            <?php endif; ?>


                            <div class="card-header card-header-action">
                                <div class="media align-items-center">
                                    <div class="media-head me-2">
                                        <div class="avatar custom-tooltip">
                                            <a href="<?php echo e(route('user', ['username' => $comment->user->username])); ?>">
                                                <img src="<?php echo e(my_asset('uploads/users/'.$comment->user->image)); ?>" alt="user" class="avatar-img rounded-circle">
                                                <?php if(Cache::has('user-is-online-' . $comment->user->id)): ?>
                                                    <span class="user_online"></span>
                                                <?php endif; ?>
                                            </a>

                                            <div class="custom-tooltip-dropdown">
                                                <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                    <div class="flex-shrink-0 avatar"><img src="<?php echo e(my_asset('uploads/users/'.$comment->user->image)); ?>" class="rounded-circle" alt="avatar"></div>
                                                    <div class="ms-2">
                                                        <span class="author-username"><?php echo e($comment->user->total_points()); ?> <?php echo e(trans('points')); ?></span>
                                                        <span class="author-follow-text"><?php echo e($comment->user->followers->count()); ?> <?php echo e(trans('followers')); ?></span>
                                                    </div>
                                                </div>
                                                <h6 class="author-name mb-1"><?php echo e($comment->user->name); ?></h6>
                                                <p class="author-desc smaller mb-3"><?php echo e(Str::limit($comment->user->bio, 80)); ?></p>
                                                <div class="follow-wrap mb-3">
                                                    <h6 class="mb-1 smaller text-uppercase"><?php echo e(trans('followed_by')); ?></h6>
                                                    <div class="avatar-group">
                                                        <?php $__currentLoopData = $comment->user->followers()->with('followers')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>" class="avatar-group-avatar">
                                                            <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="avatar">
                                                        </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>

                                                <a href="<?php echo e(route('user', ['username' => $comment->user->username])); ?>" class="btn btn-sm btn-mint rounded-pill"><span><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></span></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div><a href="<?php echo e(route('user', ['username' => $comment->user->username])); ?>"><?php echo e($comment->user->name); ?></a>
                                            <?php if($comment->user->verified == 1): ?>
                                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                                    <i class="bi bi-patch-check"></i>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="fs-7"><span><?php echo e('@'.$comment->user->username); ?> </span></div>
                                    </div>
                                </div>
                                <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->id === $comment->user->id): ?>
                                    <div class="card-action-wrap">
                                        <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="<?php echo e(route('user.comments.edit', ['id' => $comment->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('comment')); ?></a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.comments.destroy')); ?>','<?php echo e($comment->id); ?>','<?php echo e(trans('delete_this_comment')); ?>');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('comment')); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <div class="content content-large">
                                    <?php echo $comment->body; ?>

                                </div>

                                <div class="comment-meta">
                                    <span class="publish-date ms-3"> <?php echo e($comment->created_at->diffForHumans()); ?></span>

                                    <a  href="javascript:void(0);" id="<?php echo e($comment->id); ?>" class="likeComment">
                                        <span id="like-comment-icon-<?php echo e($comment->id); ?>" class="bi bi-heart-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasLiked($comment)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></span>
                                        <span class="ms-1" id="like-comment-<?php echo e($comment->id); ?>"><?php echo json_encode($comment->likers()->count(), 15, 512) ?></span> <?php echo e(trans('likes')); ?>

                                    </a>

                                    <?php if($post->closed == '0'): ?>
                                        <a href="javascript:void(0)" class="reply ms-3" onclick="show_reply_form('<?php echo e($comment->id); ?>');"><span class="bi bi-reply-all me-1"></span> <?php echo e(trans('reply')); ?></a>
                                    <?php endif; ?>

                                    <a href="javascript:void(0)" onclick="report('<?php echo e(route('report.comment')); ?>','<?php echo e($comment->id); ?>','<?php echo e(trans('report_this_comment')); ?>');" class="reply ms-3">
                                        <i class="bi bi-flag me-1"></i> <?php echo e(trans('report')); ?>

                                    </a>
                                    <?php if(Auth::check()): ?>
                                    <?php if(Auth::user()->id === $comment->post->user->id): ?>
                                        <?php if($comment->solution == '1'): ?>
                                            <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.comments.unmark')); ?>','<?php echo e($comment->id); ?>','<?php echo e($comment->post->id); ?>');" class="reply ms-3">
                                                <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('unmark_as_solution')); ?>

                                            </a>
                                        <?php elseif($comment->solution == '0'): ?>
                                            <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.comments.mark')); ?>','<?php echo e($comment->id); ?>','<?php echo e($comment->post->id); ?>');" class="reply ms-3">
                                                <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('mark_as_solution')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="post-box-children ms-5">

                                <div class="comment-form reply-form" id="reply-form-<?php echo e($comment->id); ?>">
                                    <form id="add_reply_form" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="comment_id" id="comment_id" value="<?php echo e($comment->id); ?>">
                                        <input type="hidden" name="post_id" id="post_id" value="<?php echo e($comment->post->id); ?>">
                                        <input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo e($comment->user->id); ?>">

                                    <div class="row">
                                        <div class="col-lg-12 d-flex mb-4">
                                            <div class="comment-form-avatar d-none d-sm-block">
                                                <img src="<?php echo e(Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="User">
                                            </div>
                                            <div class="comment-input">

                                                <p class="small mb-3">* <?php echo e(trans('here_is_a_list_of_sites_you_can_embed_video_from')); ?> <a href="https://noembed.com/#supported-sites" target="_blank"><?php echo e(trans('list_of_sites')); ?></a> </p>

                                                <div class="form-group">
                                                    <textarea name="bodyReply" id="bodyReply" rows="5" placeholder="Post your reply ..."></textarea>
                                                    <div class="invalid-feedback"></div>
                                                </div>

                                                <div class="comment-btn mt-3">
                                                    <button type="submit" class="btn btn-mint" id="add_reply_btn"><?php echo e(trans('post')); ?> <?php echo e(trans('reply')); ?></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                                <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="post-box card d-flex mx-0 <?php echo e($reply->solution == '1' ? 'solved' : 'border-top'); ?>">

                                        <?php if($reply->solution == '1'): ?>
                                        <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solution')); ?></div>
                                        <?php endif; ?>


                                        <div class="card-header card-header-action">
                                            <div class="media align-items-center">
                                                <div class="media-head me-2">
                                                    <div class="avatar custom-tooltip">
                                                        <a href="<?php echo e(route('user', ['username' => $reply->user->username])); ?>">
                                                            <img src="<?php echo e(my_asset('uploads/users/'.$reply->user->image)); ?>" alt="user" class="avatar-img rounded-circle">
                                                            <?php if(Cache::has('user-is-online-' . $reply->user->id)): ?>
                                                                <span class="user_online"></span>
                                                            <?php endif; ?>
                                                        </a>

                                                        <div class="custom-tooltip-dropdown">
                                                            <div class="author-action d-flex flex-wrap align-items-center mb-3">
                                                                <div class="flex-shrink-0 avatar"><img src="<?php echo e(my_asset('uploads/users/'.$reply->user->image)); ?>" class="rounded-circle" alt="avatar"></div>
                                                                <div class="ms-2">
                                                                    <span class="author-username"><?php echo e($reply->user->total_points()); ?> <?php echo e(trans('points')); ?></span>
                                                                    <span class="author-follow-text"><?php echo e($reply->user->followers->count()); ?> <?php echo e(trans('followers')); ?></span>
                                                                </div>
                                                            </div>
                                                            <h6 class="author-name mb-1"><?php echo e($reply->user->name); ?></h6>
                                                            <p class="author-desc smaller mb-3"><?php echo e(Str::limit($reply->user->bio, 80)); ?></p>
                                                            <div class="follow-wrap mb-3">
                                                                <h6 class="mb-1 smaller text-uppercase"><?php echo e(trans('followed_by')); ?></h6>
                                                                <div class="avatar-group">
                                                                    <?php $__currentLoopData = $reply->user->followers()->with('followers')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a href="<?php echo e(route('user', ['username' => $follower->username])); ?>" class="avatar-group-avatar">
                                                                        <img src="<?php echo e(my_asset('uploads/users/'.$follower->image)); ?>" alt="avatar">
                                                                    </a>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>

                                                            <a href="<?php echo e(route('user', ['username' => $reply->user->username])); ?>" class="btn btn-sm btn-mint rounded-pill"><span><?php echo e(trans('view')); ?> <?php echo e(trans('profile')); ?></span></a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div><a href="<?php echo e(route('user', ['username' => $reply->user->username])); ?>"><?php echo e($reply->user->name); ?></a>
                                                        <?php if($reply->user->verified == 1): ?>
                                                            <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                                                <i class="bi bi-patch-check"></i>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="fs-7"><span><?php echo e('@'.$reply->user->username); ?> </span></div>
                                                </div>
                                            </div>
                                            <?php if(Auth::check()): ?>
                                            <?php if(Auth::user()->id === $reply->user->id): ?>
                                                <div class="card-action-wrap">
                                                    <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="<?php echo e(route('user.replies.edit', ['id' => $reply->id])); ?>"><i class="bi bi-pencil me-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('replyj')); ?></a>
                                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_item('<?php echo e(route('user.replies.destroy')); ?>','<?php echo e($reply->id); ?>','Delete this Reply');"><i class="bi bi-trash3 me-2"></i> <?php echo e(trans('delete')); ?> <?php echo e(trans('reply')); ?></a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="content content-large">
                                                <?php echo $reply->body; ?>

                                            </div>

                                            <div class="comment-meta">
                                                <span class="publish-date ms-3"> <?php echo e($reply->created_at->diffForHumans()); ?></span>
                                                <a  href="javascript:void(0);" id="<?php echo e($reply->id); ?>" class="likeReply">
                                                    <span id="like-reply-icon-<?php echo e($reply->id); ?>" class="bi bi-heart-fill <?php if(Auth::check()): ?> <?php if(Auth::user()->hasLiked($reply)): ?> text-danger <?php else: ?> text-muted <?php endif; ?> <?php else: ?> text-muted <?php endif; ?>"></span>
                                                    <span class="ms-1" id="like-reply-<?php echo e($reply->id); ?>"><?php echo json_encode($reply->likers()->count(), 15, 512) ?></span> <?php echo e(trans('likes')); ?>

                                                </a>
                                                <a href="javascript:void(0)" onclick="report('<?php echo e(route('report.reply')); ?>','<?php echo e($reply->id); ?>','Report this Reply');" class="reply ms-3">
                                                    <i class="bi bi-flag me-1"></i> <?php echo e(trans('report')); ?>

                                                </a>

                                                <?php if(Auth::check()): ?>
                                                <?php if(Auth::user()->id === $reply->comment->post->user->id || Auth::user()->id === $reply->comment->user_id): ?>
                                                    <?php if($reply->solution == '1'): ?>
                                                        <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.replies.unmark')); ?>','<?php echo e($reply->id); ?>','<?php echo e($reply->comment->post->id); ?>');" class="reply ms-3">
                                                            <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('unmark_as_solution')); ?>

                                                        </a>
                                                    <?php elseif($reply->solution == '0'): ?>
                                                        <a href="javascript:void(0)" onclick="mark('<?php echo e(route('user.replies.mark')); ?>','<?php echo e($reply->id); ?>','<?php echo e($reply->comment->post->id); ?>');" class="reply ms-3">
                                                            <i class="bi bi-check2-all me-1"></i> <?php echo e(trans('mark_as_solution')); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div><!--/post-box-->

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div><!--/post-box-->

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>

                    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                        <div class="dashboard-body">
                            <div class="upload-image my-3">
                                <h4 class="mb-3"><?php echo e(trans('comments_and_replies_not_posted_yet')); ?>.</h4>
                            </div>
                        </div>
                    </div><!--/dashboard-card-->

                <?php endif; ?>

            </div>
            </div><!--/scrollspy-->

        <?php elseif($post->comments == '2'): ?>

            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                <div class="dashboard-body">
                    <div class="upload-image my-3">
                        <h4 class="mb-3"><?php echo e(trans('comments_closed_for_this_post')); ?>.</h4>
                    </div>
                </div>
            </div><!--/dashboard-card-->

        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/trumbowyg.min.js')); ?>"></script>
<!-- Import Trumbowyg plugins... -->
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/trumbowyg.colors.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/trumbowyg.emoji.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/trumbowyg.giphy.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/prism/prism.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/trumbowyg.highlight.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/noembed/trumbowyg.noembed.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/indent/trumbowyg.indent.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/cleanpaste/trumbowyg.cleanpaste.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/pasteimage/trumbowyg.pasteimage.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/clipboard/clipboard.min.js')); ?>"></script>

<script>

    $(document).ready(function () {

        $('#bodyComment, #bodyReply').trumbowyg({
            removeformatPasted: true,
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['indent', 'outdent'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['foreColor', 'backColor'],
                ['horizontalRule'],
                ['removeformat'],
                ['link'],
                ['insertImage'],
                ['emoji'],
                ['giphy'],
                ['noembed'],
                ['highlight']
            ],
            plugins: {
                giphy: {
                    apiKey: 'dNhCbN6hrhpBMxXhIswM34wIR2UBpCns'
                },
            }
        });

    });

    $("#formButton").on('click', function(){
        $(".reply-form").toggle();
    });

   $(function() {

        // add comment ajax request
        $(document).on('submit', '#add_comment_form', function(e) {
            e.preventDefault();

            const fd = new FormData(this);
            $("#add_comment_btn").text('<?php echo e(trans('posting')); ?> <?php echo e(trans('comment')); ?>...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '<?php echo e(route('comments.add')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {


                if (response.status == 400) {

                    showError('bodyComment', response.messages.bodyComment);
                    $("#add_comment_btn").text('<?php echo e(trans('post')); ?> <?php echo e(trans('comment')); ?>');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#add_comment_form");
                    $("#add_comment_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#add_comment_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 402){

                    tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                    });

                    $("#add_comment_form")[0].reset();
                    $("#add_comment_btn").text('Post Comment');

                }

                }
            });
        });

        // add reply ajax request
        $(document).on('submit', '#add_reply_form', function(e) {
            e.preventDefault();

            const fd = new FormData(this);
            $("#add_reply_btn").text('<?php echo e(trans('posting')); ?> <?php echo e(trans('reply')); ?>...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '<?php echo e(route('replies.add')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {


                if (response.status == 400) {

                    showError('bodyReply', response.messages.body);
                    $("#add_reply_btn").text('<?php echo e(trans('post')); ?> <?php echo e(trans('reply')); ?>');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#add_reply_form");
                    $("#add_reply_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#add_reply_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 402){

                    tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                    });

                    $("#add_reply_form")[0].reset();
                    $("#add_reply_btn").text('Post Reply');

                }

                }
            });
        });

        $(document).on('click', '.likePost', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
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
            });
        });

        $(document).on('click', '.likeComment', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('like.comment')); ?>',
                method: 'post',
                dataType: "json",
                data: {item: a},
                success: function(e) {
                    var t;
                    1 == e.bool ? ($("#like-comment-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-comment-" + a).text(), $("#like-comment-" + a).text(++t)) : 0 == e.bool && ($("#like-comment-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-comment-" + a).text(), $("#like-comment-" + a).text(--t))

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
            });
        });

        $(document).on('click', '.likeReply', function(e) {
            e.preventDefault();
            let a = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?php echo e(route('like.reply')); ?>',
                method: 'post',
                dataType: "json",
                data: {item: a},
                success: function(e) {
                    var t;
                    1 == e.bool ? ($("#like-reply-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-reply-" + a).text(), $("#like-reply-" + a).text(++t)) : 0 == e.bool && ($("#like-reply-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-reply-" + a).text(), $("#like-reply-" + a).text(--t))

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
            });
        });

    });


    /*============================================
    Copy to Clipboard
    ==============================================*/
    document.querySelectorAll('pre').forEach(function (codeBlock) {
        var button = document.createElement('button');
        button.className = 'copy-code-button';
        button.type = 'button';
        var s = codeBlock.innerText;
        button.setAttribute('data-clipboard-text',s);
        button.innerText = 'Copy';
        // button.setAttribute('title', 'Copiar para a área de transferência');

        // var pre = codeBlock.parentNode;
        codeBlock.classList.add('prettyprint');
        // pre.parentNode.insertBefore(button, pre);
        codeBlock.appendChild(button);
    });

    var clipboard = new ClipboardJS('.copy-code-button');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.trigger.textContent = 'Copied';
        window.setTimeout(function() {
            e.trigger.textContent = 'Copy';
        }, 2000);
        e.clearSelection();

    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
        e.trigger.textContent = 'Error on Copy';
        window.setTimeout(function() {
            e.trigger.textContent = 'Copy';
        }, 2000);
        e.clearSelection();
    });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/post.blade.php ENDPATH**/ ?>