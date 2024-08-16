<!DOCTYPE html>
<html lang="en" data-theme="light"
<?php if(get_setting('site_direction') == 'ltr'): ?>
    dir="ltr"
<?php elseif(get_setting('site_direction') == 'rtl'): ?>
    dir="rtl"
<?php endif; ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(Route::is('auth.login')): ?>
    <title><?php echo e(trans('login')); ?> - <?php echo e(get_setting('site_name')); ?></title>
    <?php elseif(Route::is('auth.register')): ?>
    <title><?php echo e(trans('register')); ?> - <?php echo e(get_setting('site_name')); ?></title>
    <?php elseif(Route::is('auth.forgot')): ?>
    <title><?php echo e(trans('forgot_password')); ?> - <?php echo e(get_setting('site_name')); ?></title>
    <?php endif; ?>
    <meta name="description" content="Forum & Community Discussions HTML Template">
    <meta name="keywords" content="bootstrap 5, forum, community, support, social, q&a, mobile, html">
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

    <?php echo $__env->yieldContent('content'); ?>



	<!-- ==============================================
	Scripts
	=============================================== -->
	<script src="<?php echo e(my_asset('assets/vendors/jquery/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/vendors/bootstrap/bootstrap.bundle.js')); ?>"></script>
	<script src="<?php echo e(my_asset('assets/vendors/popper/popper.min.js')); ?>"></script>
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

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/login.blade.php ENDPATH**/ ?>