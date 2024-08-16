

		<!-- ==============================================
		 Navbar
		=============================================== -->
		<header class="vine-navbar fixed-top">
			<nav class="navbar navbar-expand-lg">
				<div class="container align-items-center">
					<div class="logo">
						<a class="navbar-brand" href="<?php echo e(route('home')); ?>">
							<img class="logo-dark" src="<?php echo e(my_asset('uploads/settings/'.get_setting('logo_dark'))); ?>" alt="Logo">
						</a>
					</div>
					<div class="offcanvas nav-offcanvas offcanvas-start" tabindex="-1" id="offcanvas_Header_01" aria-labelledby="offcanvas_Header_01">
						<div class="offcanvas-header flex-wrap border-bottom border-gray-200">
							<div class="offcanvas-title">

                                <?php if(Auth::check()): ?>
								<div class="d-flex align-items-center">
									<div class="avatar"><img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="User"></div>
									<div class="col ps-3">
										<h6 class="mb-0"><?php echo e(Auth::user()->name); ?></h6><span class="fs-xs fw-400">@ <?php echo e(Auth::user()->username); ?></span></div>
								</div>
                                <?php else: ?>
								<div class="d-flex align-items-center">
									<div class="avatar"><img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/settings/'.get_setting('favicon'))); ?>" alt="User"></div>
									<div class="col ps-3">
										<h6 class="mb-0"><?php echo e(get_setting('site_name')); ?></h6><span class="fs-xs fw-400">Great Forum Platform</span></div>
								</div>
                                <?php endif; ?>
							</div>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvas_Header_01" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body">

                            <!-- Nav Search START -->
                            <div class="col-xl-5">
                                <div class="nav mt-3 mt-lg-0 px-lg-4 flex-nowrap align-items-center">
                                    <div class="search-form nav-item w-100">
                                        <form class="rounded position-relative">
                                            <input class="bg-opacity-10 border-0" type="search" id="searchForm" placeholder="<?php echo e(trans('search_posts')); ?>..." aria-label="Search">
                                        </form>
                                        <ul id="searchFormBox" class="dropdown-menu dropdown-animation dropdown-menu-end min-w-auto mt-2" aria-labelledby="searchDropdown">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Nav Search END -->
							<ul class="navbar-nav">

								<li class="nav-item dropdown mega-dropdown-md">
									<a id="MegaMenu" class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-collection me-2"></i><?php echo e(trans('pages')); ?>

									</a>
									<div class="dropdown-menu p-0">
										<div class="d-lg-flex">
											<div class="mega-dropdown-column pt-lg-3 pb-lg-4 first">
												<div class="mt-4 px-3 justify-content-center">
													<h4 class="py-2 leading-normal font-bold">
														Join <span><?php echo e(\App\Models\User::count().'+'); ?></span> other users as we learn, build, and grow together.
													</h4>
													<hr>
													<p><?php echo e(get_setting('site_description')); ?></p>
												</div>
											</div>
										  <div class="mega-dropdown-column pt-lg-3 pb-lg-4 px-3">
											<h6 class="mega-menu-title"><?php echo e(trans('forum')); ?></h6>
											<ul class="list-unstyled mb-0 ps-2">
											  <li><a href="<?php echo e(route('home')); ?>" class="dropdown-item"><i class="bi bi-house-door me-2"></i> <?php echo e(trans('home')); ?></a></li>
											  <li><a href="<?php echo e(route('home.posts')); ?>" class="dropdown-item"><i class="bi bi-list-task me-2"></i> <?php echo e(trans('discussions')); ?></a></li>
											  <li><a href="<?php echo e(route('users')); ?>" class="dropdown-item"><i class="bi bi-people me-2"></i> <?php echo e(trans('users')); ?></a></li>
											  <li><a href="<?php echo e(route('categories')); ?>" class="dropdown-item"><i class="bi bi-back me-2"></i> <?php echo e(trans('categories')); ?></a></li>
											  <li><a href="<?php echo e(route('tags')); ?>" class="dropdown-item"><i class="bi bi-tags me-2"></i> <?php echo e(trans('tags')); ?></a></li>
											  <li><a href="<?php echo e(route('stats')); ?>" class="dropdown-item text-nowrap"><i class="bi bi-columns-gap me-2"></i> <?php echo e(trans('stats')); ?> & <?php echo e(trans('online_users')); ?></a></li>
											</ul>
										  </div>
										  <div class="mega-dropdown-column pt-lg-3 pb-lg-4 px-3">
											<h6 class="mega-menu-title"><?php echo e(trans('pages')); ?></h6>
											<ul class="list-unstyled mb-0 ps-2">
											  <li><a href="<?php echo e(route('about')); ?>" class="dropdown-item"><i class="bi bi-app me-2"></i><?php echo e(trans('about')); ?></a></li>
											  <li><a href="<?php echo e(route('plans')); ?>" class="dropdown-item"><i class="bi bi-wallet2 me-2"></i><?php echo e(trans('pricing_plans')); ?></a></li>
											  <li><a href="<?php echo e(route('faqs')); ?>" class="dropdown-item"><i class="bi bi-list me-2"></i><?php echo e(trans('faqs')); ?></a></li>
											  <li><a href="<?php echo e(route('rules')); ?>" class="dropdown-item"><i class="bi bi-patch-check me-2"></i> <?php echo e(trans('community_rules')); ?></a></li>
											  <li><a href="<?php echo e(route('privacy')); ?>" class="dropdown-item"><i class="bi bi-bar-chart-steps me-2"></i><?php echo e(trans('privacy_policy')); ?></a></li>
											  <li><a href="<?php echo e(route('terms')); ?>" class="dropdown-item"><i class="bi bi-list-ul me-2"></i><?php echo e(trans('terms')); ?> & <?php echo e(trans('regulations')); ?></a></li>
											  <li><a href="<?php echo e(route('cookie')); ?>" class="dropdown-item"><i class="bi bi-body-text me-2"></i><?php echo e(trans('cookie_policy')); ?></a></li>
											</ul>
										  </div>
										  <div class="mega-dropdown-column pt-lg-3 pb-lg-4 px-3">
											<h6 class="mega-menu-title"><?php echo e(trans('rewards')); ?></h6>
											<ul class="list-unstyled mb-0 ps-2">
												<li><a href="<?php echo e(route('leaderboard')); ?>" class="dropdown-item"><i class="bi bi-list-stars me-2"></i><?php echo e(trans('leaderboard')); ?></a></li>
												<li><a href="<?php echo e(route('points')); ?>" class="dropdown-item"><i class="bi bi-file-ppt me-2"></i><?php echo e(trans('earn')); ?>/<?php echo e(trans('buy_points')); ?></a></li>
												<li><a href="<?php echo e(route('badges')); ?>" class="dropdown-item"><i class="bi bi-award me-2"></i> <?php echo e(trans('badges')); ?></a></li>
											</ul>
										  </div>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div>
					<div class="header-end d-flex justify-content-end">

						<!--  Add Post Start -->
						<div class="h-col h-plus-toggle d-none d-sm-block">
							<a class="btn btn-mint rounded-circle" href="<?php echo e(route('user.posts.add')); ?>">
								<i class="bi bi-plus-lg"></i>
							</a>
						</div>
						<!-- Add Post END -->

						<!-- Translate dropdown START -->
						<div class="nav-item dropdown h-col">
                            <a class="h-translate-icon h-icon" href="#" id="languageDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-translate"> </i>
                            </a>
                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-sm-start min-w-auto mt-2" aria-labelledby="languageDropdown">
                                <?php
                                    $languages = get_all_languages();
                                    $current_locale = App::currentLocale();
                                ?>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($lang == $current_locale): ?>
                                        <li> <span class="dropdown-item me-4"><?php echo e(ucfirst($lang)); ?> <span class="badge bg-danger"><?php echo e(trans('active')); ?></span></span> </li>
                                    <?php else: ?>
                                        <li>
                                            <a class="dropdown-item me-4" href="<?php echo e(route('language.change', ['locale' => $lang])); ?>">
                                                <span><?php echo e(ucfirst($lang)); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
						</div>
						<!-- Translate dropdown END -->

                    <?php if(Auth::user()): ?>

						<!-- Messages dropdown START -->
						<div class="nav-item dropdown h-col d-none d-lg-block">

							<a class="h-message-icon h-icon" href="#header_message_bar"  data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
								<i class="bi bi-chat-left-text"></i> <sup><?php echo e(Auth::user()->messages_count()); ?></sup>
							</a>

							<!-- Notification dropdown menu START -->
							<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
								<div class="card bg-transparent border-0">
									<div class="card-header bg-transparent py-4 d-flex justify-content-between align-items-center">
										<h6 class="m-0"><?php echo e(trans('messages')); ?> <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e(Auth::user()->messages_count()); ?> <?php echo e(trans('new')); ?></span></h6>

									</div>
									<div data-simplebar
                                    <?php if(get_setting('site_direction') == 'rtl'): ?>
                                        data-simplebar-direction='rtl'
                                    <?php endif; ?>  class="card-body p-0 dropdown-body">
										<ul class="list-group list-unstyled list-group-flush">

                                            <?php $__empty_1 = true; $__currentLoopData = Auth::user()->chats_nav(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php if($chat->user_receiver->id != Auth::user()->id): ?>
                                                    <li>
                                                        <a href="<?php echo e(route('user.chats.messages', ['chat_id' => $chat->id])); ?>" class="list-group-item-action border-0 d-flex p-3">
                                                            <div class="me-3">
                                                                <div class="avatar avatar-md">
                                                                    <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$chat->user_receiver->image)); ?>" alt="avatar">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1"><?php echo e($chat->user_receiver->name); ?></h6>
                                                            <?php if($chat->latest_message_nav()): ?>
                                                                <?php if($chat->latest_message_nav()->file_ext === 'Text'): ?>
                                                                    <p class="small m-0"><?php echo e($chat->latest_message_nav()->message); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Gif'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_a_gif_image')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Image'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_an_image')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Video'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_a_video')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Audio'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_an_audio')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Zip'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_a_zip_file')); ?></p>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <p class="small m-0"><?php echo e(trans('not_replied')); ?></p>
                                                            <?php endif; ?>
                                                            <?php if($chat->latest_message_nav()): ?>
                                                                <small class="text-muted fs-xs"><?php echo e($chat->latest_message_nav()->created_at->diffForHumans()); ?></small>
                                                                <?php if($chat->unread_messages() > 0): ?>
                                                                    <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e($chat->unread_messages()); ?> <?php echo e(trans('unread')); ?></span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            </div>
                                                        </a>
                                                    </li><!-- Notif item -->
                                                <?php elseif($chat->user_sender->id != Auth::user()->id): ?>
                                                    <li>
                                                        <a href="<?php echo e(route('user.chats.messages', ['chat_id' => $chat->id])); ?>" class="list-group-item-action border-0 d-flex p-3">
                                                            <div class="me-3">
                                                                <div class="avatar avatar-md">
                                                                    <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.$chat->user_sender->image)); ?>" alt="avatar">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1"><?php echo e($chat->user_sender->name); ?></h6>
                                                            <?php if($chat->latest_message_nav()): ?>
                                                                <?php if($chat->latest_message_nav()->file_ext === 'Text'): ?>
                                                                    <p class="small m-0"><?php echo e($chat->latest_message_nav()->message); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Gif'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_a_gif_image')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Image'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_an_image')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Video'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_a_video')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Audio'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_you_an_audio')); ?></p>
                                                                <?php elseif($chat->latest_message_nav()->file_ext === 'Zip'): ?>
                                                                    <p class="small m-0"><?php echo e(trans('sent_a_zip_file')); ?></p>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <p class="small m-0"><?php echo e(trans('not_replied')); ?></p>
                                                            <?php endif; ?>
                                                            <?php if($chat->latest_message_nav()): ?>
                                                                <small class="text-muted fs-xs"><?php echo e($chat->latest_message_nav()->created_at->diffForHumans()); ?></small>
                                                                <?php if($chat->unread_messages() > 0): ?>
                                                                    <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e($chat->unread_messages()); ?> <?php echo e(trans('unread')); ?></span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            </div>
                                                        </a>
                                                    </li><!-- Notif item -->
                                                <?php endif; ?>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                <li>
                                                    <a href="#" class="list-group-item-action border-0 d-flex p-3">
                                                        <div class="me-3">
                                                            <div class="avatar avatar-md"></div>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1"><?php echo e(trans('no_chats_available')); ?></h6>
                                                        </div>
                                                    </a>
                                                </li><!-- Notif item -->
                                            <?php endif; ?>


										</ul>
									</div>
									<!-- Button -->
									<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
										<a href="<?php echo e(route('user.chats')); ?>" class="stretched-link"><?php echo e(trans('see_all_chats')); ?></a>
									</div>
								</div>
							</div>
							<!-- Notification dropdown menu END -->
						</div>
						<!-- Messages dropdown END -->

						<!-- Notification dropdown START -->
						<div class="nav-item dropdown h-col d-none d-lg-block">

							<a class="h-notification-icon h-icon" href="javascript:void(0);" onclick="markAsRead()" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
								<i class="bi bi-bell"></i> <sup id="notify"><?php echo e(Auth::user()->notification_count()); ?></sup>
							</a>

							<!-- Notification dropdown menu START -->
							<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
								<div class="card bg-transparent border-0">
									<div class="card-header bg-transparent py-4 d-flex justify-content-between align-items-center">
										<h6 class="m-0"><?php echo e(trans('notifications')); ?> <span class="badge bg-danger bg-opacity-10 text-danger ms-2"><?php echo e(Auth::user()->notification_count()); ?></span></h6>

									</div>
									<div data-simplebar
                                    <?php if(get_setting('site_direction') == 'rtl'): ?>
                                        data-simplebar-direction='rtl'
                                    <?php endif; ?> class="card-body p-0 dropdown-body">
										<ul class="list-group list-unstyled list-group-flush">

                                            <?php $__empty_1 = true; $__currentLoopData = Auth::user()->notifications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                                <li>
                                                    <?php if($notification->post_id != null): ?>

                                                        <a href="<?php echo e(url('post/'.App\Models\Posts::find($notification->post_id)->post_id.'/'.App\Models\Posts::find($notification->post_id)->slug)); ?>" class="list-group-item-action border-0 d-flex p-3">

                                                    <?php else: ?>

                                                        <a href="<?php echo e(url('profile/'.App\Models\User::find($notification->sender_id)->username.'/')); ?>" class="list-group-item-action border-0 d-flex p-3">

                                                    <?php endif; ?>
                                                        <div class="me-3">
                                                            <div class="avatar avatar-md">
                                                                <img class="avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($notification->sender_id)->image)); ?>" alt="avatar">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <?php if($notification->notification_type == "Comment"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('commented_your_post')); ?></h6>

                                                            <?php elseif($notification->notification_type == "Reply"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('replied_your_comment')); ?></h6>

                                                            <?php elseif($notification->notification_type == "Like Post"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('liked_your_post')); ?></h6>

                                                            <?php elseif($notification->notification_type == "Like Comment"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('liked_your_comment')); ?></h6>

                                                            <?php elseif($notification->notification_type == "Like Reply"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('liked_your_reply')); ?></h6>

                                                            <?php elseif($notification->notification_type == "React Post"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('reacted_to_your_post')); ?></h6>

                                                            <?php elseif($notification->notification_type == "Following User"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('has_followed_you')); ?></h6>

                                                            <?php elseif($notification->notification_type == "Tip"): ?>

                                                                <h6 class="mb-1"><?php echo e(App\Models\User::find($notification->sender_id)->name); ?> <?php echo e(trans('sent_you_a_tip_of')); ?> <?php echo e(get_setting('currency_symbol')); ?><?php echo e(App\Models\Payment::find($notification->tip_id)->amount); ?>.</h6>

                                                            <?php endif; ?>

                                                            <?php if($notification->post_id != null): ?>
														        <p class="small m-0"><?php echo e(App\Models\Posts::find($notification->post_id)->title); ?></p>
                                                            <?php endif; ?>

                                                            <small class="text-muted fs-xs"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                                        </div>
                                                    </a>
                                                </li><!-- Notif item -->

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                                <li>
                                                    <a href="#" class="list-group-item-action border-0 d-flex p-3">
                                                        <div class="me-3">
                                                            <div class="avatar avatar-md"></div>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1"><?php echo e(trans('no_notifications_available')); ?></h6>
                                                        </div>
                                                    </a>
                                                </li><!-- Notif item -->
                                            <?php endif; ?>

										</ul>
									</div>
									<!-- Button -->
									<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
										<a href="<?php echo e(route('user.notifications')); ?>" class="stretched-link"><?php echo e(trans('view_all_notifications')); ?></a>
									</div>
								</div>
							</div>
							<!-- Notification dropdown menu END -->
						</div>
						<!-- Notification dropdown END -->

						<!-- Account -->
						<div class="nav-item ms-3 dropdown h-col">
							<a href="#" id="navbarShoppingCartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
							<div class="d-flex">
							<img class="avatar-sm avatar-img rounded-circle" src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="Image Description">
							<div class="profile-text d-none d-sm-block">
								<div class="profile-head text-muted"><?php echo e(trans('hello')); ?>,</div>
								<div class="text-nowrap"><?php echo e(Auth::user()->name); ?> </div>
							</div>
							</div>
							</a>

							<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-2 shadow-lg border-0" aria-labelledby="navbarShoppingCartDropdown" style="min-width: 16rem;">
                                <a class="d-flex align-items-center p-2" href="<?php echo e(route('user', ['username' => Auth::user()->username])); ?>">
                                    <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                    <span class="d-block fw-semibold"><?php echo e(Auth::user()->name); ?></span>
                                    <span class="d-block text-muted small"><?php echo e(trans('wallet')); ?> : <?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->wallet); ?></span>
                                    <span class="d-block text-muted small"><?php echo e(trans('earnings')); ?> : <?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->earnings); ?></span>
                                    </div>
                                </a>

                                <div class="dropdown-divider my-3"></div>
                                <a class="dropdown-item" href="<?php echo e(route('user', ['username' => Auth::user()->username])); ?>"><span class="dropdown-item-icon"><i class="bi-person"></i></span><?php echo e(trans('profile')); ?> </a>

                                <?php if(Auth::user()->role === "Admin" || Auth::user()->role === "Moderator"): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>"><span class="dropdown-item-icon"><i class="bi-person"></i></span><?php echo e(trans('admin')); ?> <?php echo e(trans('dashboard')); ?></a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="<?php echo e(route('user.overview')); ?>"><span class="dropdown-item-icon"><i class="bi-house-door"></i></span> <?php echo e(trans('user')); ?> <?php echo e(trans('dashboard')); ?></a>

                                <a class="dropdown-item" href="<?php echo e(route('user.posts.list')); ?>"><span class="dropdown-item-icon"><i class="bi bi-journals"></i></span> <?php echo e(trans('posts')); ?> </a>
                                <a class="dropdown-item d-block d-sm-none" href="<?php echo e(route('user.notifications')); ?>">
                                    <span class="dropdown-item-icon"><i class="bi bi-bell"></i></span> <?php echo e(trans('notifications')); ?>

                                    <span class="badge bg-red ms-auto"><?php echo e(Auth::user()->notification_count()); ?></span>
                                </a>
                                <a class="dropdown-item d-block d-sm-none" href="<?php echo e(route('user.chats')); ?>">
                                    <span class="dropdown-item-icon"><i class="bi bi-chat-left-text"></i></span> <?php echo e(trans('messages')); ?>

                                    <span class="badge bg-red ms-auto"><?php echo e(Auth::user()->messages_count()); ?></span>
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>"><span class="dropdown-item-icon"><i class="bi bi-gear"></i></span> <?php echo e(trans('settings')); ?> </a>
                                <a class="dropdown-item" href="<?php echo e(route('user.wallet')); ?>"><span class="dropdown-item-icon"><i class="bi-wallet2"></i></span> <?php echo e(trans('wallet')); ?></a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="dropdown-item-icon"><i class="bi-box-arrow-right"></i></span> <?php echo e(trans('logout')); ?></a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                </form>
							</div>
						</div><!-- End Account -->

                    <?php else: ?>

                      <div class="nav-item">
                        <a href="<?php echo e(route('auth.login')); ?>" class="btn btn-mint rounded-2 p-2 mx-3"><?php echo e(trans('login')); ?></a>
                        <a href="<?php echo e(route('auth.register')); ?>" class="btn btn-red rounded-2 p-2"><?php echo e(trans('register')); ?></a>
                      </div>

                    <?php endif; ?>

						<!-- Mobile Toggle -->
						<div class="h-col h-toggler d-xl-none">
							<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_Header_01" aria-controls="offcanvas_Header_01">
							 <span class="px-navbar-toggler-icon"></span>
							</button>
						</div>
					</div>
				</div>
			</nav>
		</header>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/frontend-partials/navbar.blade.php ENDPATH**/ ?>