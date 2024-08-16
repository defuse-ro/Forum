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
                        <h5 class="h4 mb-0">Subscriptions</h5>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Pricing Plan</th>
                                <th>Price</th>
                                <th>Date Subscribed</th>
                                <th>Date to Expire</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($subscription->user_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                     <?php echo e(App\Models\User::find($subscription->user_id)->name); ?>

                                    </td>
                                    <td><?php echo e(App\Models\Plans::find($subscription->plan_id)->name); ?></td>
                                    <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($subscription->price); ?></td>
                                    <td><?php echo e(date('d M, Y', strtotime($subscription->created_at))); ?></td>
                                    <td><?php echo e(date('d M, Y', strtotime($subscription->will_expire))); ?></td>
                                    <?php if($subscription->status === 1): ?>
                                        <td><span class="badge bg-success p-2">Active</span></td>
                                    <?php else: ?>
                                        <td><span class="badge bg-danger p-2">Expired</span></td>
                                    <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/subscriptions.blade.php ENDPATH**/ ?>