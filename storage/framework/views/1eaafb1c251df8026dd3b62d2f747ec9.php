<?php $__env->startSection('content'); ?>

    <div class="mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-receipt me-2"></i> Invoice</h4>
    </div>

    <div class="dashboard-card invoice mb-5" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body p-0 p-md-4">

                <div class="row">
                <div class="col-lg-6 mb-3">
                    <address>
                        <img src="<?php echo e(my_asset('uploads/settings/'.get_setting('logo_dark'))); ?>" class="img-fluid mb-2" alt="logo">
                        <p><strong><?php echo e(get_setting('site_name')); ?></strong></p>
                        <p><?php echo e(get_setting('contact_address')); ?></p>
                        <p>Email: <?php echo e(get_setting('contact_email')); ?></p>
                        <p>Phone: <?php echo e(get_setting('contact_phone')); ?></p>
                    </address>
                </div>
                <div class="col-lg-6 ml-md-auto text-lg-end">
                    <h4>To:</h4>
                    <address class="mb-5">
                        <p><strong><?php echo e(Auth::user()->name); ?></strong></p>
                        <p>Email: <?php echo e(Auth::user()->email); ?></p>
                    </address>
                    <p><strong>Invoice Date: </strong><?php echo e(date('d M, Y', strtotime($subscription->created_at))); ?></p>
                </div>
                </div>
                <div class="table-responsive my-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pay for Subscription</td>
                            <td class="text-right"><?php echo e(get_setting('currency_symbol')); ?><?php echo e($subscription->price); ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6 text-lg-end">
                    <span class="bt-1 d-inline-block pt-3 mb-4">
                    Sub Total: <?php echo e(get_setting('currency_symbol')); ?><?php echo e($subscription->price); ?>

                    <br>
                    Transaction Fee  : 0.00
                    </span>
                    <p class="text-bold">Total: <span class="tx-20 tx-gray-900"><?php echo e($subscription->price); ?></span></p>
                    <br>
                </div>
                </div>
                <hr>
                <div class="text-lg-end my-3">
                <button type="button" class="btn btn-mint" onclick="javascript:window.print();"><i class="bi bi-printer"></i> Print</button>
                </div>


        </div><!--/dashboard-body-->
    </div><!--/dashboard-card-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/plans/invoice.blade.php ENDPATH**/ ?>