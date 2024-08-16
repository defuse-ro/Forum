<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-lg-12">

            <div class="card-style settings-card-2 mb-30">
                <h5 class="h4 mb-3"><?php echo e(trans('edit')); ?> <?php echo e(trans('user')); ?> <?php echo e(trans('wallet')); ?></h5>
                <form action="<?php echo e(route('admin.users.update_funds')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <p><?php echo e($user->name); ?></p>
                            <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" width="70" height="70" alt="User">
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="title"><?php echo e(trans('wallet')); ?></label>
                                <input type="number" name="wallet" id="wallet" value="<?php echo e($user->wallet); ?>" class="form-control my-2">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                </form>
            </div>
        </div><!-- col-lg-12 -->

    </div><!-- row -->
    </div><!-- container -->
 </section>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/users/funds.blade.php ENDPATH**/ ?>