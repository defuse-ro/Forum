<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-md-flex justify-content-between align-items-center mb-10">
                        <h5 class="h4 mb-0">Banned Users</h5>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Reason</th>
                                <th>Date</th>
                                <th>Expiring</th>
                                <th class="text-right">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                     <?php echo e($user->name); ?>

                                    </td>
                                    <td><?php echo e($user->user_ban($user->id)->comment); ?></td>
                                    <td><?php echo e(date('d M, Y  H:i:s', strtotime($user->user_ban($user->id)->created_at))); ?></td>
                                    <td><?php echo e(date('d M, Y  H:i:s', strtotime($user->user_ban($user->id)->expired_at))); ?></td>
                                    <td class="text-right">
                                        <?php if(App\Models\User::find($user->id)->isBanned()): ?>
                                            <a href="javascript:void(0)" onclick="remove_ban('<?php echo e(route('remove.ban')); ?>','<?php echo e($user->id); ?>','Remove Ban')" class="btn btn-danger">
                                                <i class="align-middle" data-feather="x"></i> Remove Ban
                                            </a>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>

    </div><!-- row -->
   </div><!-- container -->
  </section>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/banned_users.blade.php ENDPATH**/ ?>