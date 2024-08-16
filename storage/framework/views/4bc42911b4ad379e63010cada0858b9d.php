<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="app-url" content="<?php echo e(env('APP_URL')); ?>">

    <title>Admin - <?php echo e(get_setting('site_name')); ?></title>

    <!-- ==============================================
    Favicons
    =============================================== -->
    <link href="<?php echo e(my_asset('uploads/settings/'.get_setting('favicon'))); ?>" rel="icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(my_asset('assets/vendors/bootstrap/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/backend/css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/backend/css/main.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables_them.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/vendors/summernote/summernote.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/vendors/summernote/summernote-lite.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(my_asset('assets/vendors/lineicons/lineicons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/vendors/line-awesome/line-awesome.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">

    <link href="<?php echo e(my_asset('assets/vendors/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(my_asset('assets/backend/css/custom.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>


    <?php if(get_setting('analytics') != ''): ?>
        <?php echo get_setting('analytics'); ?>

    <?php endif; ?>

    <script>
        "use strict";
        var APP_URL = <?php echo json_encode(url('/')); ?>

    </script>

    <!-- ==============================================
    Scripts
    =============================================== -->
    <script src="<?php echo e(my_asset('assets/vendors/jquery/jquery.min.js')); ?>"></script>
</head>
<body>
    <div class="wrapper">
        <?php echo $__env->make('layouts.admin-partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="main">
        <?php echo $__env->make('layouts.admin-partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.admin-partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>

    <!-- ==============================================
    Scripts
    =============================================== -->
    <script src="<?php echo e(my_asset('assets/vendors/sweetalert/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/tata/tata.js')); ?>"></script>

    <script src="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/summernote/summernote-lite.min.js')); ?>"></script>

    <script src="<?php echo e(my_asset('assets/backend/js/app.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/backend/js/functions.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/backend/js/main.js')); ?>"></script>

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


    <?php if(!Route::is('admin.pages.add') && !Route::is('admin.pages.edit')): ?>
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
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/admin.blade.php ENDPATH**/ ?>