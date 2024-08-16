
		<!-- ==============================================
		 Footer
		=============================================== -->
        <footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-5 col-md-6"

                                <?php if(get_setting('site_direction') == 'ltr'): ?>
                                    data-aos="fade-right" data-aos-easing="ease-in-sine"
                                <?php elseif(get_setting('site_direction') == 'rtl'): ?>
                                    data-aos="fade-left" data-aos-easing="ease-in-sine"
                                <?php endif; ?>
                            >
								<div class="footer-item footer-about">
									<div class="logo">
										<a href="index.html">
											<img src="<?php echo e(my_asset('uploads/settings/'.get_setting('logo_dark'))); ?>" alt="Logo">
										</a>
									</div>
									<p><?php echo e(get_setting('site_description')); ?></p>
									<div class="social">
										<ul>
											<li class="facebook">
												<a href="#"><i class="bi bi-facebook"></i></a>
											</li>
											<li class="twitter">
												<a href="#"><i class="bi bi-twitter"></i></a>
											</li>
											<li class="youtube">
												<a href="#"><i class="bi bi-youtube"></i></a>
											</li>
											<li class="instagram">
												<a href="#"><i class="bi bi-instagram"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2"

                            <?php if(get_setting('site_direction') == 'ltr'): ?>
                                data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-delay="100"
                            <?php elseif(get_setting('site_direction') == 'rtl'): ?>
                                data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="100"
                            <?php endif; ?>
                             >
								<div class="footer-item footer-menu">
									<h6>Forum</h6>
									<ul>
										<li><a href="<?php echo e(route('home.posts')); ?>"><?php echo e(trans('discussions')); ?></a></li>
										<li><a href="<?php echo e(route('users')); ?>"><?php echo e(trans('users')); ?></a></li>
										<li><a href="<?php echo e(route('categories')); ?>"><?php echo e(trans('categories')); ?></a></li>
										<li><a href="<?php echo e(route('tags')); ?>"><?php echo e(trans('tags')); ?></a></li>
										<li><a href="<?php echo e(route('stats')); ?>"><?php echo e(trans('stats')); ?> & <?php echo e(trans('online_users')); ?></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2"

                            <?php if(get_setting('site_direction') == 'ltr'): ?>
                                data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-delay="200"
                            <?php elseif(get_setting('site_direction') == 'rtl'): ?>
                                data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="200"
                            <?php endif; ?>>
								<div class="footer-item footer-menu">
									<h6>Pages</h6>
									<ul>
										<li><a href="<?php echo e(route('about')); ?>"><?php echo e(trans('about')); ?></a></li>
										<li><a href="<?php echo e(route('faqs')); ?>"><?php echo e(trans('faqs')); ?></a></li>
										<li><a href="<?php echo e(route('leaderboard')); ?>"><?php echo e(trans('leaderboard')); ?></a></li>
										<li><a href="<?php echo e(route('badges')); ?>"><?php echo e(trans('badges')); ?></a></li>
										<li><a href="<?php echo e(route('rules')); ?>"><?php echo e(trans('community_rules')); ?></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3"

                            <?php if(get_setting('site_direction') == 'ltr'): ?>
                                data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-delay="300"
                            <?php elseif(get_setting('site_direction') == 'rtl'): ?>
                                data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-delay="300"
                            <?php endif; ?>>
								<div class="footer-item footer-menu">
									<h6><?php echo e(trans('contact_us')); ?></h6>
									<div class="address">
										<ul>
											<li>
												<p><?php echo e(trans('address')); ?></p>
												<strong><?php echo e(get_setting('contact_address')); ?></strong>
											</li>
											<li>
												<p><?php echo e(trans('email')); ?></p>
												<strong><?php echo e(get_setting('contact_email')); ?></strong>
											</li>
											<li>
												<p><?php echo e(trans('contact')); ?></p>
												<strong><?php echo e(get_setting('contact_phone')); ?></strong>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom"

            <?php if(get_setting('site_direction') == 'ltr'): ?>
                data-aos="fade-right" data-aos-easing="linear"
            <?php elseif(get_setting('site_direction') == 'rtl'): ?>
                data-aos="fade-left" data-aos-easing="linear"
            <?php endif; ?>
            >
				<div class="container">
					<div class="inner">
						<div class="copyright">© <?php echo e(date('Y')); ?> <?php echo e(get_setting('site_name')); ?>. <?php echo e(trans('all_rights_reserved')); ?></div>
						<div class="menu">
							<ul>
								<li><a href="<?php echo e(route('terms')); ?>"><?php echo e(trans('terms')); ?></a></li>
								<li><a href="<?php echo e(route('privacy')); ?>"><?php echo e(trans('privacy_policy')); ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/frontend-partials/footer.blade.php ENDPATH**/ ?>