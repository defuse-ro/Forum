

<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="post-box card d-flex mx-0 <?php echo e($post->solved == '1' ? 'solved' : ''); ?>" data-aos="fade-up" data-aos-easing="linear">

        <?php if($post->solved == '1' && $post->closed == '1'): ?>
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solved')); ?> & <i class="bi bi-lock"></i> <?php echo e(trans('closed')); ?></div>
        <?php elseif($post->solved == '1' && $post->closed == '0'): ?>
        <div class="post-badge"> <i class="bi bi-check2-circle"></i> <?php echo e(trans('solved')); ?> </div>
        <?php elseif($post->solved == '0' && $post->closed == '1'): ?>
        <div class="post-badge"> <i class="bi bi-lock"></i> <?php echo e(trans('closed')); ?> </div>
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
                        <a href="<?php echo e(route('user', ['username' => $post->user->username])); ?>"><?php echo e($post->user->name); ?>

                            <?php if($post->user->verified == 1): ?>
                                <span class="verified-badge" data-bs-toggle="tooltip" aria-label="<?php echo e(trans('verified_user')); ?>" data-bs-original-title="<?php echo e(trans('verified_user')); ?>">
                                    <i class="bi bi-patch-check"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="fs-7"><span> <?php echo e($post->created_at->diffForHumans()); ?> <?php echo e(trans('in')); ?> </span> <a href="<?php echo e(route('category', ['slug' => $post->category->slug])); ?>" class="cat"><?php echo e($post->category->name); ?></a></div>
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
                <h3><a href="<?php echo e(route('home.post', ['post_id' => $post->post_id, 'slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a></h3>
                <?php echo strip_tags(substr($post->body, 0, get_setting('maximum_preview_chars'))); ?>


                <div class="tags my-4">
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('tag', ['slug' => $tag->slug])); ?>" class="tag-link"><?php echo e($tag->name); ?></a>
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
                    <div class="qa-item">
                        <a href="<?php echo e(route('home.post', ['post_id' => $post->post_id, 'slug' => $post->slug])); ?>#comments" class="qa-link">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3"><?php echo e(trans('no_posts_available')); ?>.</h4>
            </div>

        </div>
    </div><!--/dashboard-card-->

<?php endif; ?>

<?php if($posts->hasPages()): ?>
<div class="d-flex justify-content-center" id="user_posts" data-aos="fade-up" data-aos-easing="linear">
    <?php echo $posts->appends(request()->all())->links('layouts.pagination.custom'); ?>

</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pagination/user/posts.blade.php ENDPATH**/ ?>