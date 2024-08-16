<?php $__env->startSection('content'); ?>

<div class="vine-wrapper">

    <!-- ==============================================
     Main
    =============================================== -->
        <div class="login p-3 p-xxl-5" style="background-image: linear-gradient( rgba(35, 37, 38, 0.50), rgba(35, 37, 38, 0.50) ), url(<?php echo e(my_asset('uploads/settings/'.get_setting('login_bg'))); ?>);">
        <div class="shape">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="140px" viewBox="20 -20 300 100" xml:space="preserve">
              <path d="M30.913 43.944s42.911-34.464 87.51-14.191c77.31 35.14 113.304-1.952 146.638-4.729 48.654-4.056 69.94 16.218 69.94 16.218v54.396H30.913V43.944z" class="vine-svg fill" opacity=".4"></path>
              <path d="M-35.667 44.628s42.91-34.463 87.51-14.191c77.31 35.141 113.304-1.952 146.639-4.729 48.653-4.055 69.939 16.218 69.939 16.218v54.396H-35.667V44.628z" class="vine-svg fill" opacity=".4"></path>
              <path d="M-34.667 62.998s56-45.667 120.316-27.839C167.484 57.842 197 41.332 232.286 30.428c53.07-16.399 104.047 36.903 104.047 36.903l1.333 36.667-372-2.954-.333-38.046z" class="vine-svg fill"></path>
            </svg>
        </div>
    </div>

    <div class="vine-login">
        <div class="container">

            <div class="row gy-5 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xxl-6">
                    <div class="card" data-aos="fade-up" data-aos-easing="linear">
                        <div class="card-body p-4 p-xl-5">
                            <div class="login-header">
                                <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(my_asset('uploads/settings/'.get_setting('logo_dark'))); ?>" alt="Logo"></a>
                                <p class="small mb-4"><?php echo e(trans('join_our_awesome_community')); ?>.</p>
                            </div>
                            <form id="register_form" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="pb-3">
                                    <label class="form-label"><?php echo e(trans('name')); ?></label>
                                    <input type="text" name="name" id="name" placeholder="<?php echo e(trans('name')); ?>">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="pb-3">
                                    <label class="form-label"><?php echo e(trans('username')); ?></label>
                                    <input type="text" name="username" id="username" placeholder="<?php echo e(trans('username')); ?>">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="pb-3">
                                    <label class="form-label"><?php echo e(trans('gender')); ?></label>
                                    <select name="gender" id="gender">
                                       <option value="Male"><?php echo e(trans('male')); ?></option>
                                       <option value="Female"><?php echo e(trans('female')); ?></option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="pb-3">
                                    <label class="form-label"><?php echo e(trans('email')); ?></label>
                                    <input type="text" name="email" id="email" placeholder="name@example.com">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="pb-3">
                                    <label class="form-label"><?php echo e(trans('password')); ?></label>
                                    <div class="password-toggle">
                                        <input type="password" name="password" id="password" placeholder="***********">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="togglePassword" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <label class="form-label"><?php echo e(trans('confirm_password')); ?></label>
                                    <div class="password-toggle">
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="***********">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" id="confirmPassword" type="checkbox">
                                            <span class="password-toggle-indicator"></span>
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-check m-0 pb-3">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms">
                                    <label class="form-check-label" for="terms"><?php echo e(trans('i_agree_to_the')); ?> <a href="<?php echo e(route('terms')); ?>"> <?php echo e(trans('terms_and_conditions')); ?></a></label>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="pb-3"><button type="submit" id="register_btn" class="w-100 btn btn-mint"><?php echo e(trans('create_an_account')); ?></button></div>
                                <div class="text-center"><small><?php echo e(trans('already_have_an_account')); ?>?</small> <a href="<?php echo e(route('auth.login')); ?>" class="small font-weight-bold"><?php echo e(trans('login')); ?></a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div><!--/vine-wrapper-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script>

    // Toggle Passwords
    $('#togglePassword').on('click', function(){
        var passInput=$("#password");
        if(passInput.attr('type')==='password')
        {
            passInput.attr('type','text');
        }else{
        passInput.attr('type','password');
        }
    });

    $('#confirmPassword').on('click', function(){
        var passInput=$("#password_confirmation");
        if(passInput.attr('type')==='password')
        {
            passInput.attr('type','text');
        }else{
            passInput.attr('type','password');
        }
    });


    $(function() {

      // add register ajax request
      $(document).on('submit', '#register_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#register_btn").text('<?php echo e(trans('registering')); ?>...');
        $.ajax({
          url: '<?php echo e(route('auth.register')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {

            end_load();

            if (response.status == 400) {

                showError('name', response.messages.name);
                showError('username', response.messages.username);
                showError('email', response.messages.email);
                showError('password', response.messages.password);
                showError('password_confirmation', response.messages.password_confirmation);
                showError('terms', response.messages.terms);
                $("#register_btn").text('<?php echo e(trans('create_an_account')); ?>');

            }else if (response.status == 200) {

                tata.success("Success", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                removeValidationClasses("#register_form");
                $("#register_form")[0].reset();
                window.location = '<?php echo e(route('home')); ?>'

            }else if(response.status == 401){

                tata.error("Error", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                $("#register_form")[0].reset();
                window.location.reload();

            }

          }
        });
      });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/auth/register.blade.php ENDPATH**/ ?>