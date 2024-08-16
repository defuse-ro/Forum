<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.css')); ?>" rel="stylesheet">
<link href="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables_them.css')); ?>" rel="stylesheet">
<style>
    /* Datatable */
    table.dataTable tbody tr {
        background-color: var(--theme-white) !important;
    }
    .form-select{
        background-color: var(--theme-white) !important;
        color: var(--text-color) !important;
    }
    .form-control{
        background-color: var(--theme-white) !important;
        color: var(--text-color) !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-arrow-repeat me-2"></i> Subscriptions</h4>
    </div>

    <div class="dashboard-card  mb-5 mb-xl-10" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body p-0 p-md-4">
            <h4>You’re on <?php echo e(Auth::user()->plan->name); ?></h4>
            <div class="price-price mb-2">
                <span><b><?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->plan->price); ?></b> /<?php echo e(Auth::user()->plan->duration); ?></span>
            </div>
            <a href="<?php echo e(route('user.pricing')); ?>" class="d-block mb-2">Plan details</a>
            <div class="border-top mt-2 mt-md-4 pt-2 pt-md-4">
            <div class="row mt-1 align-items-center">
                <div class="col-md-4 col-xxl-6">
                <span class="text-muted mb-4">Auto renews on: </span>
                <p><?php echo e(date('d M, Y', strtotime(Auth::user()->subscription()->will_expire))); ?></p>
                </div>
                <div class="col-md-8 col-xxl-6 text-md-end">
                <a  href="javascript:void(0)" onclick="cancel_sub('<?php echo e(route('user.subscriptions.cancel')); ?>','<?php echo e(Auth::user()->plan->id); ?>','Cancel Subscription?');" class="btn btn-outline-secondary me-3 mt-2">Cancel subscription</a>
                <a href="<?php echo e(route('user.pricing')); ?>" class="btn btn-mint mt-2">Change plan</a>
                </div>
            </div>
            </div>
        </div>
    </div><!--/dashboard-card-->

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0">Subscription History</h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-150px">Name</th>
                            <th class="min-w-125px">Amount</th>
                            <th class="min-w-125px">Expire Date</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-70px">Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = Auth::user()->subscriptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($subscription->plan->name); ?></td>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($subscription->price); ?></td>
                                <td><?php echo e(date('d M, Y', strtotime($subscription->will_expire))); ?></td>
                                <?php if($subscription->status === 1): ?>
                                    <td><span class="badge bg-green p-2">Active</span></td>
                                <?php else: ?>
                                    <td><span class="badge bg-danger p-2">Expired</span></td>
                                <?php endif; ?>
                                <td class="text-right"><a href="<?php echo e(route('user.subscriptions.invoice', ['id' => $subscription->id])); ?>" class="btn btn-sm btn-light">View Invoice</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.min.js')); ?>"></script>

<script>

    $('#datatable_cms').DataTable();

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/plans/subscriptions.blade.php ENDPATH**/ ?>