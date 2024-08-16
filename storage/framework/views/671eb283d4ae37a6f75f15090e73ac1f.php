<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">

      <div class="row mt-50">

       <div class="col-lg-3">

        <div class="card">
        <div class="card-body">
          <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.site') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.site')); ?>">
                <i class="align-middle me-1" data-feather="layers"></i> <?php echo e(trans('site_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.home') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.home')); ?>">
                <i class="align-middle me-1" data-feather="home"></i> <?php echo e(trans('home_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.forum') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.forum')); ?>">
                <i class="align-middle me-1" data-feather="message-square"></i> <?php echo e(trans('forum_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.points') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.points')); ?>">
                <i class="align-middle me-1" data-feather="plus-square"></i> <?php echo e(trans('points_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.currency') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.currency')); ?>">
                <i class="align-middle me-1" data-feather="dollar-sign"></i> <?php echo e(trans('currency_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.payments') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.payments')); ?>">
                <i class="align-middle me-1" data-feather="credit-card"></i> <?php echo e(trans('payments_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.ads') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.ads')); ?>">
                <i class="align-middle me-1" data-feather="layers"></i> <?php echo e(trans('ads_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.analytics') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.analytics')); ?>">
                <i class="align-middle me-1" data-feather="bar-chart-2"></i> <?php echo e(trans('analytics_settings')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo e(Route::is('admin.settings.adsense') ? 'active' : ''); ?>" href="<?php echo e(route('admin.settings.adsense')); ?>">
                <i class="align-middle me-1" data-feather="command"></i> <?php echo e(trans('adsense_settings')); ?> </a>
            </li>
          </ul>
        </div>
        </div>


       </div>

       <div class="col-lg-9">

        <?php if(Route::is('admin.settings.site') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.site')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="select-style-1">
                                <label>LTR or RTL</label>
                                <div class="select-position">
                                    <select name="site_direction" class="light-bg">
                                        <option value="ltr" <?php echo e(get_setting('site_direction') == "ltr" ? ' selected' : ''); ?>>LTR</option>
                                        <option value="rtl" <?php echo e(get_setting('site_direction') == "rtl" ? ' selected' : ''); ?>>RTL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('site_name')); ?></label>
                                <input type="text" name="site_name" value="<?php echo e(get_setting('site_name')); ?>" placeholder="Site Name" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('site_title')); ?></label>
                                <input type="text" name="site_title" value="<?php echo e(get_setting('site_title')); ?>" placeholder="Site Title" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('site_description')); ?></label>
                                <textarea type="text" name="site_description" class="form-control" rows="5"><?php echo e(get_setting('site_description')); ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('site_keywords')); ?></label>
                                <textarea type="text" name="site_keywords" class="form-control" rows="5"><?php echo e(get_setting('site_keywords')); ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('contact_email')); ?></label>
                                <input type="text" name="contact_email" value="<?php echo e(get_setting('contact_email')); ?>" placeholder="Contact Email Address" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('contact_address')); ?></label>
                                <input type="text" name="contact_address" value="<?php echo e(get_setting('contact_address')); ?>" placeholder="Contact Address" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('contact_phone')); ?></label>
                                <input type="text" name="contact_phone" value="<?php echo e(get_setting('contact_phone')); ?>" placeholder="Contact Phone" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('timezone')); ?></label>
                                <div class="select-position">
                                <select name="timezone" class="light-bg">
                                    <option value="Default" <?php echo e(get_setting('timezone') == "" ? ' selected' : ''); ?>><?php echo e(trans('default')); ?></option>
                                    <?php $__currentLoopData = timezone_identifiers_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value); ?>" <?php echo e(get_setting('timezone') == $value ? ' selected' : ''); ?>><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('cookie_consent')); ?></label>
                                <textarea type="text" name="cookie_consent" class="form-control" rows="5"><?php echo e(get_setting('cookie_consent')); ?></textarea>
                            </div>
                        </div>

                        <div class="alert alert-warning d-none" id="validationErrorsBox"></div>

                        <div class="col-12 mb-5 d-flex justify-content-left" io-image-input="true">


                            <div class="photo me-5">
                                <label for="Logo" class="form-label"><?php echo e(trans('logo')); ?></label>
                                <div class="d-block">
                                    <div class="image-picker">
                                        <img id='logo_dark_preview' class="image previewImage" src="<?php echo e(get_setting('logo_dark') != "" ? my_asset('uploads/settings/'.get_setting('logo_dark')) : my_asset('backend/img/default.jpg')); ?>">
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change app logo">
                                            <label>
                                                <svg class="svg-inline--fa fa-pen" id="profileImageIcon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg><!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com -->
                                                <input id="logo_dark" class="image-upload d-none" accept=".png, .jpg, .jpeg" name="logo_dark" type="file">
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="photo me-5">
                                <label for="Favicon" class="form-label"><?php echo e(trans('favicon')); ?></label>
                                <div class="d-block">
                                    <div class="image-picker">
                                        <img id='favicon_preview' class="image previewImage" src="<?php echo e(get_setting('favicon') != "" ? my_asset('uploads/settings/'.get_setting('favicon')) : my_asset('backend/img/default.jpg')); ?>">
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change app logo">
                                            <label>
                                                <svg class="svg-inline--fa fa-pen" id="profileImageIcon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg><!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com -->
                                                <input id="favicon" class="image-upload d-none" accept=".png, .jpg, .jpeg" name="favicon" type="file">
                                            </label>
                                        </span>
                                    </div>
                                </div>
                           </div>

                        </div>

                        <div class="col-12 mb-5">

                            <div class="photo me-5">
                                <label for="Login Bg" class="form-label"><?php echo e(trans('login_image')); ?></label>
                                <div class="d-block">
                                    <div class="image-picker login-bg">
                                        <img id='login_bg_preview' class="image previewImage" src="<?php echo e(my_asset('uploads/settings/'.get_setting('login_bg'))); ?>">
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change app logo">
                                            <label>
                                                <svg class="svg-inline--fa fa-pen" id="profileImageIcon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg><!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com -->
                                                <input id="login_bg" class="image-upload d-none" accept=".png, .jpg, .jpeg" name="login_bg" type="file">
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.home') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.home')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('title')); ?></label>
                                <input type="text" name="home_title" value="<?php echo e(get_setting('home_title')); ?>" placeholder="Title" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('sub_title')); ?></label>
                                <input type="text" name="home_sub_title" value="<?php echo e(get_setting('home_sub_title')); ?>" placeholder="Sub Title" />
                            </div>
                        </div>

                        <div class="alert alert-warning d-none" id="validationErrorsBox"></div>

                        <div class="col-12 mb-5">

                            <div class="photo me-5">
                                <label for="Home Bg" class="form-label"><?php echo e(trans('home_image')); ?></label>
                                <div class="d-block">
                                    <div class="image-picker login-bg">
                                        <img id='home_bg_preview' class="image previewImage" src="<?php echo e(my_asset('uploads/settings/'.get_setting('home_bg'))); ?>">
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change app logo">
                                            <label>
                                                <svg class="svg-inline--fa fa-pen" id="profileImageIcon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg><!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com -->
                                                <input id="home_bg" class="image-upload d-none" accept=".png, .jpg, .jpeg" name="home_bg" type="file">
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.forum') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.forum')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('pause_new_posts')); ?></label>
                                <div class="select-position">
                                    <select name="pause_new_posts" class="light-bg">
                                        <option value="Active" <?php echo e(get_setting('pause_new_posts') == "Active" ? ' selected' : ''); ?>><?php echo e(trans('active')); ?></option>
                                        <option value="Pause" <?php echo e(get_setting('pause_new_posts') == "Pause" ? ' selected' : ''); ?>><?php echo e(trans('pause')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('react_or_like_on_posts')); ?></label>
                                <div class="select-position">
                                    <select name="react_like" class="light-bg">
                                        <option value="React" <?php echo e(get_setting('react_like') == "React" ? ' selected' : ''); ?>><?php echo e(trans('react')); ?></option>
                                        <option value="Like" <?php echo e(get_setting('react_like') == "Like" ? ' selected' : ''); ?>><?php echo e(trans('like')); ?></option>
                                    </select>
                                </div>
                                <p class="small"><?php echo e(trans('choose_whether_users_to_react_with_emojis_or_like_on_posts')); ?>.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('results_per_page')); ?></label>
                                <input type="number" name="results_per_page" value="<?php echo e(get_setting('results_per_page')); ?>" />
                                <p class="small"><?php echo e(trans('how_many_results_per_page_you_want_to_show')); ?>.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('minimum_characters')); ?></label>
                                <input type="number" name="minimum_characters" value="<?php echo e(get_setting('minimum_characters')); ?>" />
                                <p class="small"><?php echo e(trans('how_many_minimum_characters_are_needed_for_each_post')); ?>.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('maximum_characters')); ?></label>
                                <input type="number" name="maximum_characters" value="<?php echo e(get_setting('maximum_characters')); ?>" />
                                <p class="small"><?php echo e(trans('how_many_maximum_characters_are_needed_for_each_post')); ?>.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('maximum_preview_characters')); ?></label>
                                <input type="number" name="maximum_preview_chars" value="<?php echo e(get_setting('maximum_preview_chars')); ?>" />
                                <p class="small"><?php echo e(trans('how_many_characters_to_show_for_preview_of_each_post')); ?>.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('new_posts')); ?></label>
                                <div class="select-position">
                                    <select name="new_posts" class="light-bg">
                                        <option value="Visible" <?php echo e(get_setting('new_posts') == "Visible" ? ' selected' : ''); ?>><?php echo e(trans('immediately_visible')); ?></option>
                                        <option value="Moderation" <?php echo e(get_setting('new_posts') == "Moderation" ? ' selected' : ''); ?>><?php echo e(trans('in_moderation')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('new_comments')); ?></label>
                                <div class="select-position">
                                    <select name="new_comments" class="light-bg">
                                        <option value="Visible" <?php echo e(get_setting('new_comments') == "Visible" ? ' selected' : ''); ?>><?php echo e(trans('immediately_visible')); ?></option>
                                        <option value="Moderation" <?php echo e(get_setting('new_comments') == "Moderation" ? ' selected' : ''); ?>><?php echo e(trans('in_moderation')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('new_replies')); ?></label>
                                <div class="select-position">
                                    <select name="new_replies" class="light-bg">
                                        <option value="Visible" <?php echo e(get_setting('new_replies') == "Visible" ? ' selected' : ''); ?>><?php echo e(trans('immediately_visible')); ?></option>
                                        <option value="Moderation" <?php echo e(get_setting('new_replies') == "Moderation" ? ' selected' : ''); ?>><?php echo e(trans('in_moderation')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('censor_words')); ?></label>
                                <div class="select-position">
                                    <select name="word_censored" class="light-bg">
                                        <option value="1" <?php echo e(get_setting('word_censored') == "Enable" ? ' selected' : ''); ?>>Enable</option>
                                        <option value="0" <?php echo e(get_setting('word_censored') == "Disable" ? ' selected' : ''); ?>>Disable</option>
                                    </select>
                                </div>
                                <p class="small"><?php echo e(trans('add_censored_words_in_the_file')); ?> <span class="text-danger">path: vendor\snipe\banbuilder\src\dict\dictionary.php</span> </p>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mb-3"><?php echo e(trans('widgets')); ?></h4>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('categories_widget')); ?></label>
                                <input type="number" name="categories_widget" value="<?php echo e(get_setting('categories_widget')); ?>" />
                                <p class="small"><?php echo e(trans('how_many_items_to_be_shown')); ?>.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('trending_posts_widget')); ?></label>
                                <input type="number" name="trending_posts_widget" value="<?php echo e(get_setting('trending_posts_widget')); ?>" />
                                <p class="small"><?php echo e(trans('how_many_items_to_be_shown')); ?>.</p>
                            </div>
                        </div>



                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div><!--/row-->

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.points') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.points')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('points_system')); ?></label>
                                <div class="select-position">
                                    <select name="points_system" class="light-bg">
                                        <option value="1" <?php echo e(get_setting('points_system') == "1" ? ' selected' : ''); ?>><?php echo e(trans('active')); ?></option>
                                        <option value="0" <?php echo e(get_setting('points_system') == "0" ? ' selected' : ''); ?>><?php echo e(trans('pause')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="mb-3"><?php echo e(trans('scores')); ?></h4>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('new_posts')); ?></label>
                                <input type="number" name="new_posts_no" value="<?php echo e(get_setting('new_posts_no')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('like')); ?></label>
                                <input type="number" name="like" value="<?php echo e(get_setting('like')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('comment')); ?></label>
                                <input type="number" name="comment" value="<?php echo e(get_setting('comment')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('reply')); ?></label>
                                <input type="number" name="reply" value="<?php echo e(get_setting('reply')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('reaction')); ?></label>
                                <input type="number" name="reaction" value="<?php echo e(get_setting('reaction')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('share')); ?></label>
                                <input type="number" name="share" value="<?php echo e(get_setting('share')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('registration')); ?></label>
                                <input type="number" name="registration" value="<?php echo e(get_setting('registration')); ?>" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label><?php echo e(trans('login')); ?></label>
                                <input type="number" name="login" value="<?php echo e(get_setting('login')); ?>" />
                            </div>
                        </div>



                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div><!--/row-->

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.currency') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.currency')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('currency_code')); ?></label>
                                <input type="text" name="currency_code" value="<?php echo e(get_setting('currency_code')); ?>" placeholder="<?php echo e(trans('currency_code')); ?> e.g USD" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('currency_symbol')); ?></label>
                                <input type="text" name="currency_symbol" value="<?php echo e(get_setting('currency_symbol')); ?>" placeholder="<?php echo e(trans('currency_symbol')); ?> e.g $" />
                            </div>
                        </div>
                        <div class="col-12">
                         <div class="select-style-1">
                            <label><?php echo e(trans('currency_position')); ?></label>
                            <div class="select-position">
                                <select name="currency_position" class="light-bg">
                                    <option <?php if(get_setting('currency_position') == 'left'): ?> selected="selected" <?php endif; ?> value="left"><?php echo e(get_setting('currency_symbol')); ?>99 - <?php echo e(trans('left')); ?></option>
                                    <option <?php if(get_setting('currency_position') == 'left_space'): ?> selected="selected" <?php endif; ?> value="left_space"><?php echo e(get_setting('currency_symbol')); ?> 99 - <?php echo e(trans('left_with_space')); ?></option>
                                    <option <?php if(get_setting('currency_position') == 'right'): ?> selected="selected" <?php endif; ?> value="right">99<?php echo e(get_setting('currency_symbol')); ?> - <?php echo e(trans('right')); ?></option>
                                    <option <?php if(get_setting('currency_position') == 'right_space'): ?> selected="selected" <?php endif; ?> value="right_space">99 <?php echo e(get_setting('currency_symbol')); ?> - <?php echo e(trans('right_with_space')); ?></option>
                                </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.payments') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.payments')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('minimum_deposit')); ?></label>
                                <input value="<?php echo e(get_setting('min_deposit')); ?>" name="min_deposit" type="number" min="1" autocomplete="off" class="form-control onlyNumber">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('minimum_tip')); ?></label>
                                <input value="<?php echo e(get_setting('min_tip')); ?>" name="min_tip" type="number" min="1" autocomplete="off" class="form-control onlyNumber">
                            </div>
                        </div>
                        <div class="col-12">
                          <div class="select-style-1">
                            <label><?php echo e(trans('commissions_on_tips')); ?></label>
                            <div class="select-position">
                                <select name="tips_commission" class="light-bg">
                                    <?php for($i=1; $i <= 95; ++$i): ?>
                                      <option <?php if(get_setting('tips_commission') == $i): ?> selected="selected" <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?>%</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('minimum_withdrawal')); ?></label>
                                <input value="<?php echo e(get_setting('min_withdraw')); ?>" name="min_withdraw" type="number" min="1" autocomplete="off" class="form-control onlyNumber">
                            </div>
                        </div>
                        <div class="col-12">
                          <div class="select-style-1">
                            <label><?php echo e(trans('days_to_process_withdrawals')); ?></label>
                            <div class="select-position">
                                <select name="days_withdraw" class="light-bg">
                                    <?php for($i=1; $i <= 25; ++$i): ?>
                                      <option <?php if(get_setting('days_withdraw') == $i): ?> selected="selected" <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e(trans('days')); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.ads') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.ads')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="select-style-1">
                                <label><?php echo e(trans('ads')); ?></label>
                                <div class="select-position">
                                    <select name="ads" class="light-bg">
                                        <option value="1" <?php echo e(get_setting('ads') == "1" ? ' selected' : ''); ?>><?php echo e(trans('active')); ?></option>
                                        <option value="0" <?php echo e(get_setting('ads') == "0" ? ' selected' : ''); ?>><?php echo e(trans('pause')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('top_ad')); ?></label>
                                <textarea name="top_ad" rows="4"><?php echo e(get_setting('top_ad')); ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('footer_ad')); ?></label>
                                <textarea name="footer_ad" rows="4"><?php echo e(get_setting('footer_ad')); ?></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('sidebar_ad')); ?></label>
                                <textarea name="sidebar_ad" rows="5"><?php echo e(get_setting('sidebar_ad')); ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.analytics') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.analytics')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('analytics')); ?></label>
                                <textarea name="analytics" rows="4"><?php echo e(get_setting('analytics')); ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.settings.adsense') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <form action="<?php echo e(route('admin.settings.adsense')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label><?php echo e(trans('adsense')); ?></label>
                                <textarea name="adsense" rows="4"><?php echo e(get_setting('adsense')); ?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                        </div>
                    </div>

                </form>
            </div>

        <?php endif; ?>

    </div><!-- col-lg-9 -->

</div><!-- row -->
</div><!-- container -->
</section>

</main>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
$(document).on('change', '#logo_light', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#logo_light_preview');
  }
});

$(document).on('change', '#logo_dark', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#logo_dark_preview');
  }
});

$(document).on('change', '#favicon', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#favicon_preview');
  }
});

$(document).on('change', '#login_bg', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#login_bg_preview');
  }
});

$(document).on('change', '#home_bg', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#home_bg_preview');
  }
});

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>