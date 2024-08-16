<!DOCTYPE html>
<html lang="en" data-theme="light"
 <?php if(get_setting('site_direction') == 'ltr'): ?>
     dir="ltr"
 <?php elseif(get_setting('site_direction') == 'rtl'): ?>
     dir="rtl"
 <?php endif; ?>
>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(Route::is('home.posts')): ?>
        <title><?php echo e(trans('discussions')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('home.post')): ?>
        <title><?php echo e($post->title); ?> by <?php echo e($post->user->name); ?></title>
        <meta name="description" content="<?php echo e($post->description); ?>">
        <meta name="keywords" content="<?php echo e($post->keywords); ?>">
    <?php elseif(Route::is('feed')): ?>
        <title><?php echo e(trans('feed')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('users')): ?>
        <title><?php echo e(trans('users')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('categories')): ?>
        <title><?php echo e(trans('categories')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('category')): ?>
        <title><?php echo e($category->name); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('tags')): ?>
        <title><?php echo e(trans('tags')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('tag')): ?>
        <title><?php echo e($tag->name); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('stats')): ?>
        <title><?php echo e(trans('stats')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('plans')): ?>
        <title><?php echo e(trans('pricing_plans')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('points')): ?>
        <title><?php echo e(trans('points')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('badges')): ?>
        <title><?php echo e(trans('badges')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('about') || Route::is('rules') || Route::is('privacy') || Route::is('terms') || Route::is('cookie')): ?>
        <title><?php echo e($page->meta_title); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e($page->meta_description); ?>">
        <meta name="keywords" content="<?php echo e($page->meta_keywords); ?>">
    <?php elseif(Route::is('faqs')): ?>
        <title><?php echo e(trans('faqs')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('leaderboard')): ?>
        <title><?php echo e(trans('leaderboard')); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php elseif(Route::is('user') || Route::is('user.posts') || Route::is('user.comments') || Route::is('user.replies') || Route::is('user.followers') || Route::is('user.following')): ?>
        <title><?php echo e($user->name); ?> - <?php echo e(get_setting('site_name')); ?></title>
        <meta name="description" content="<?php echo e($user->bio); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php else: ?>
        <title><?php echo e(get_setting('site_name')); ?> - <?php echo e(get_setting('site_title')); ?></title>
        <meta name="description" content="<?php echo e(get_setting('site_description')); ?>">
        <meta name="keywords" content="<?php echo e(get_setting('site_keywords')); ?>">
    <?php endif; ?>
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="app-url" content="<?php echo e(env('APP_URL')); ?>">

    <script>
        //Check local storage
        let localS = localStorage.getItem('theme')
            themeToSet = localS

        // If local storage is not set, we check the OS preference
        if(!localS){
            themeToSet = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        //Set the correct theme
        document.documentElement.setAttribute('data-theme', themeToSet)
    </script>

    <?php if(get_setting('analytics') != ''): ?>
        <?php echo get_setting('analytics'); ?>

    <?php endif; ?>

    <?php if(get_setting('adsense') != ''): ?>
        <?php echo get_setting('adsense'); ?>

    <?php endif; ?>

    <!-- ==============================================
    Favicons
    =============================================== -->
    <link href="<?php echo e(my_asset('uploads/settings/'.get_setting('favicon'))); ?>" rel="icon">

    <!-- ==============================================
     CSS Styles
    =============================================== -->

<?php if(get_setting('site_direction') == 'ltr'): ?>
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/bootstrap/bootstrap.min.css')); ?>">
<?php elseif(get_setting('site_direction') == 'rtl'): ?>
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/bootstrap/bootstrap.rtl.min.css')); ?>">
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/simplebar/simplebar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/aos/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/sweetalert/sweetalert2.min.css')); ?>">
    <?php if(get_setting('site_direction') == 'ltr'): ?>
        <link rel="stylesheet" href="<?php echo e(my_asset('assets/frontend/css/style.css')); ?>">
    <?php elseif(get_setting('site_direction') == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(my_asset('assets/frontend/css/style-rtl.css')); ?>">
    <?php endif; ?>


	<script src="<?php echo e(my_asset('assets/vendors/jquery/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/vendors/bootstrap/bootstrap.bundle.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/vendors/popper/popper.min.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/frontend/js/cookie.js')); ?>"></script>


    <script>
    "use strict";
    var APP_URL = <?php echo json_encode(url('/')); ?>

    </script>

    <?php echo $__env->yieldContent('styles'); ?>

    <!-- ==============================================
     Fonts
    =============================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

</head>
<body>

    <!-- Switcher Icon -->
    <div class="switcher switcher-show" id="theme-switcher">
        <i id="switcher-icon" class="bi bi-moon"></i>
    </div>

    <!-- Back to Top -->
	<a href="#" id="back-to-top"></a>


	<div class="vine-wrapper">

        <?php echo $__env->make('layouts.frontend-partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<!-- ==============================================
		 Main
		=============================================== -->
		<section class="vine-main">
			<div class="container">
				<div class="row">
                    <?php if(Auth::check()): ?>
                      <?php if(Auth::user()->isBanned()): ?>

                        <div class="col-12">
                            <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
                                <div class="dashboard-body">
                                    <div class="upload-image my-3">
                                        <h4 class="mb-3">You have been Banned till</h4>
                                        <h2 class="mb-3"><?php echo e(date('d M, Y  H:i:s', strtotime(Auth::user()->ban_details()->expired_at))); ?></h2>
                                        <h4>Reason</h4>
                                        <p><?php echo e(Auth::user()->ban_details()->comment); ?></p>
                                    </div>

                                </div>
                            </div><!--/dashboard-card-->
                        </div>

                      <?php else: ?>
                        <div class="col-sm-12 col-lg-3 mb-5 border-end">
                            <?php echo $__env->make('layouts.frontend-partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-lg-9 ps-lg-5">
                            <?php echo $__env->yieldContent('content'); ?>

                            <?php if(get_setting('ads') == 1): ?>
                                <?php if(Auth::user()->subscription()->ads == 0): ?>
                                    <div class="ad-spot text-center" data-aos="fade-up" data-aos-easing="linear">
                                        <div class="ad-box">
                                            <?php echo get_setting('footer_ad'); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                      <?php endif; ?>

                    <?php else: ?>
                        <div class="col-sm-12 col-lg-3 mb-5 border-end">
                            <?php echo $__env->make('layouts.frontend-partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-lg-9 ps-lg-5">

                            <?php echo $__env->yieldContent('content'); ?>

                            <?php if(get_setting('ads') == 1): ?>
                                <div class="ad-spot text-center" data-aos="fade-up" data-aos-easing="linear">
                                    <div class="ad-box">
                                        <?php echo get_setting('footer_ad'); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                </div><!--/row-->
            </div><!--/container-->
        </section>

        <?php echo $__env->make('layouts.frontend-partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <div class="cookie-form hiden" id="cookiePopup">
        <div class="cookie-body">
            <h5><img src="<?php echo e(my_asset('uploads/settings/cookie.svg')); ?>" class="cookie-img me-2" alt="Cookie">Cookie Notice</h5>
            <p class="my-3"><?php echo e(get_setting('cookie_consent')); ?> <a href="">Cookie Policy</a></p>
            <button id="acceptCookie" class="btn btn-sm btn-mint">Accept Cookies</button>
        </div>
    </div>


	<!-- ==============================================
	Scripts
	=============================================== -->
	<script src="<?php echo e(my_asset('assets/vendors/simplebar/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/vendors/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/sweetalert/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/tata/tata.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/backend/js/functions.js')); ?>"></script>

    <?php if(Session::has('success')): ?>
      <script>
        tata.success("Success", "<?php echo e(Session::get('success')); ?>", {
          position: 'tr',
          duration: 3000,
          animate: 'slide'
        });
      </script>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
      <script>
        tata.error("Error", "<?php echo e(Session::get('error')); ?>", {
          position: 'tr',
          duration: 6000,
          animate: 'slide'
        });
      </script>
    <?php endif; ?>


    <?php if(!Route::is('home.post') && !Route::is('user.comments.edit') && !Route::is('user.replies.edit')): ?>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    <?php endif; ?>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/front.blade.php ENDPATH**/ ?>