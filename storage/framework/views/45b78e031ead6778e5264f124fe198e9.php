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
                        <h5 class="h4 mb-0">Withdrawals</h5>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>PayPal Email</th>
                                <th>Date Requested</th>
                                <th>Date to be Paid</th>
                                <th>Status</th>
                                <th class="text-right">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($withdraw->user_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                     <?php echo e(App\Models\User::find($withdraw->user_id)->name); ?>

                                    </td>
                                    <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($withdraw->amount); ?></td>
                                    <td><?php echo e($withdraw->paypal_email); ?></td>
                                    <td><?php echo e(date('d M, Y', strtotime($withdraw->created_at))); ?></td>
                                    <td><?php echo e(date('d M, Y', strtotime($withdraw->process_date))); ?></td>
                                    <?php if($withdraw->status === 1): ?>
                                        <td><span class="badge bg-success p-2">Paid</span></td>
                                    <?php else: ?>
                                        <td><span class="badge bg-danger p-2">Not Paid.</span></td>
                                    <?php endif; ?>
                                    <td class="text-right">

                                        <?php if($withdraw->status === 1): ?>
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Paid"
                                            onclick="paid('<?php echo e(route('admin.withdrawals.unpaid')); ?>','<?php echo e($withdraw->id); ?>','Cancel User Payment')">
                                                <i class="align-middle" data-feather="x-circle"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" class="btn btn-soft-success btn-icon btn-circle btn-sm confirm-delete" title="Paid"
                                            onclick="paid('<?php echo e(route('admin.withdrawals.paid')); ?>','<?php echo e($withdraw->id); ?>','Pay User')">
                                                <i class="align-middle" data-feather="check-circle"></i>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/withdrawals.blade.php ENDPATH**/ ?>