<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">

      <div class="row mt-50">

        <div class="card-style settings-card-2 mb-30">
            <h3 class="mb-4"><?php echo e(trans('mail_settings')); ?></h3>
            <form action="<?php echo e(route('admin.settings.mail')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL MAILER</label>
                        <input type="text" name="mail_mailer" value="<?php echo e(env('MAIL_MAILER')); ?>" placeholder="MAIL MAILER" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL HOST</label>
                        <input type="text" name="mail_host" value="<?php echo e(env('MAIL_HOST')); ?>" placeholder="MAIL HOST" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL PORT</label>
                        <input type="text" name="mail_port" value="<?php echo e(env('MAIL_PORT')); ?>" placeholder="MAIL PORT" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL USERNAME</label>
                        <input type="text" name="mail_username" value="<?php echo e(env('MAIL_USERNAME')); ?>" placeholder="MAIL USERNAME" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL PASSWORD</label>
                        <input type="text" name="mail_password" value="<?php echo e(env('MAIL_PASSWORD')); ?>" placeholder="MAIL PASSWORD" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL ENCRYPTION</label>
                        <input type="text" name="mail_encryption" value="<?php echo e(env('MAIL_ENCRYPTION')); ?>" placeholder="MAIL ENCRYPTION e.g SSL/TLS" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL FROM ADDRESS</label>
                        <input type="text" name="mail_from_address" value="<?php echo e(env('MAIL_FROM_ADDRESS')); ?>" placeholder="MAIL FROM ADDRESS" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>MAIL FROM NAME</label>
                        <input type="text" name="mail_from_name" value="<?php echo e(env('MAIL_FROM_NAME')); ?>" placeholder="MAIL FROM NAME" />
                      </div>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                    </div>
                  </div>

            </form>
        </div>

    </div><!-- row -->
    </div><!-- container -->
    </section>

  </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/email/index.blade.php ENDPATH**/ ?>