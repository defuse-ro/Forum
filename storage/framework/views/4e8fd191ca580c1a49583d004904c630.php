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
                        <h5 class="h4 mb-0">Tips</h5>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Sender</th>
                                <th>User Receiver</th>
                                <th>Amount</th>
                                <th>Commission Fee</th>
                                <th>Admin Received</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($tip->sender_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                     <?php echo e(App\Models\User::find($tip->sender_id)->name); ?>

                                    </td>
                                    <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($tip->receiver_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                     <?php echo e(App\Models\User::find($tip->receiver_id)->name); ?>

                                    </td>
                                    <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($tip->amount + $tip->admin_amount); ?></td>
                                    <td><?php echo e($tip->commission_fee.'%'); ?></td>
                                    <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($tip->admin_amount); ?></td>
                                    <td><?php echo e(date('d M, Y', strtotime($tip->created_at))); ?></td>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/tips.blade.php ENDPATH**/ ?>