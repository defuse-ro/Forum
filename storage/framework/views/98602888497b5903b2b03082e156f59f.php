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
        <h4><i class="bi bi-piggy-bank me-2"></i> Withdrawals</h4>
    </div>

    <div class="dashboard-card mb-5 mb-xl-10" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <form id="set_form" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row align-items-end pb-3">
                    <div class="col-lg-6 col-sm-7">
                        <label class="form-label fs-base">Your PayPal Email</label>
                        <input type="text" name="paypal_email" id="paypal_email" value="<?php echo e(Auth::user()->paypal_email); ?>">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-mint" id="set_btn">Submit</button>
            </form>
        </div>
    </div><!--/dashboard-card-->

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0">Withdrawal History</h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-125px">Amount</th>
                            <th class="min-w-125px">PayPal</th>
                            <th class="min-w-125px">Date Requested</th>
                            <th class="min-w-125px">Date to Paid</th>
                            <th class="min-w-125px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($withdraw->amount); ?></td>
                                <td><?php echo e($withdraw->paypal_email); ?></td>
                                <td><?php echo e(date('d M, Y', strtotime($withdraw->created_at))); ?></td>
                                <td><?php echo e(date('d M, Y', strtotime($withdraw->process_date))); ?></td>
                                <?php if($withdraw->status === 1): ?>
                                    <td><span class="badge bg-green p-2">Paid</span></td>
                                <?php else: ?>
                                    <td><span class="badge bg-danger p-2">Waiting for Admin to Pay you.</span></td>
                                <?php endif; ?>
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

        $('#datatable_cms, #datatable_cms_2').DataTable();


        // Set
        $(document).on('submit', '#set_form', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#set_btn").text('Sending...');
            $.ajax({
                url: '<?php echo e(route('user.withdrawals.set')); ?>',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                    end_load();

                    if (response.status == 400) {

                        showError('paypal_email', response.messages.paypal_email);
                        $("#set_btn").text('Submit');

                    }else if (response.status == 200) {

                        tata.success("Success", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        window.location.reload();

                    }else if(response.status == 401){

                        tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        window.location.reload();

                    }

                }
            });
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/earnings/withdrawals.blade.php ENDPATH**/ ?>