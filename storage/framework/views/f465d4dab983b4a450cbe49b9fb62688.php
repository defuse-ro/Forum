<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-lg-8">

            <div class="card-style settings-card-2 mb-30">
                <h3 class="mb-4">Admin Profile</h3>
                <form id="admin_form" action="" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="old_image" id="old_image" value="<?php echo e(Auth::user()->image); ?>">

                    <div class="row">
                        <div class="col-12">
                          <div class="input-style-1">
                            <label>Name</label>
                            <input type="text" name="name" id="name" value="<?php echo e(Auth::user()->name); ?>">
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-style-1">
                            <label>Email</label>
                            <input type="text" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>">
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-style-1">
                            <label>Username</label>
                            <input type="text" name="username" id="username" value="<?php echo e(Auth::user()->username); ?>">
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-style-1">
                            <label>New Password</label>
                            <input type="password" name="password" id="password">
                            <p class="small">Leave this is Empty if you dont want to change</p>
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="input-style-1">
                            <label>Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password">
                            <div class="invalid-feedback"></div>
                          </div>
                        </div>

                        <div class="col-lg-12 mb-5 d-flex justify-content-left" io-image-input="true">

                           <div class="photo me-5">
                            <label for="Image" class="form-label">Image</label>
                            <div class="d-block">
                                <div class="image-picker">
                                    <img id='image_preview' class="image previewImage" src="<?php echo e(my_asset('uploads/users/'. Auth::user()->image)); ?>">
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="Change Image">
                                        <label>
                                            <svg class="svg-inline--fa fa-pen" id="profileImageIcon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z">
                                                    </path></svg><!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com -->

                                            <input id="image" class="image-upload d-none" accept=".png, .jpg, .jpeg" name="image" type="file">
                                        </label>
                                        <div class="invalid-feedback"></div>
                                    </span>
                                </div>
                            </div>
                         </div>

                        </div>

                        <div class="col-12">
                          <button type="submit" id="admin_btn" class="main-btn primary-btn btn-hover">Submit</button>
                        </div>
                      </div>

                </form>
            </div>

        </div>


      </div><!-- row -->
    </div><!-- container -->
   </section>

 </main>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('scripts'); ?>

 <script>

    $(document).on('change', '#image', function () {
      if (isValidFile($(this), '#validationErrorsBox')) {
        displayPhoto(this, '#image_preview');
      }
    });

     $(function() {

        // update user ajax request
        $(document).on('submit', '#admin_form', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#admin_btn").text('Updating...');
            $.ajax({
                method: 'POST',
                url: '<?php echo e(route('admin.profile')); ?>',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    end_load();
                    console.log(response);

                    if (response.status == 400) {


                        showError('name', response.messages.name);
                        showError('email', response.messages.email);
                        showError('username', response.messages.username);
                        showError('password', response.messages.password);
                        showError('image', response.messages.image);
                        $("#admin_btn").text('Submit');

                    }else if (response.status == 200) {

                        tata.success("Success", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        removeValidationClasses("#edit_user_form");
                        $("#edit_user_form")[0].reset();
                        $("#editUserModal").modal('hide');
                        window.location.reload();

                    }else if(response.status == 401){

                        tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        $("#edit_user_form")[0].reset();
                        $("#editUserModal").modal('hide');
                        window.location.reload();

                    }

                }
            });
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/profile.blade.php ENDPATH**/ ?>