<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.css')); ?>">
<script src="<?php echo e(my_asset('assets/vendors/magnific-popup/magnific-popup.js')); ?>"></script>
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
        <h4><i class="bi bi-currency-dollar me-2"></i> Earnings & Tips</h4>
    </div>

    <div class="dashboard-card mb-5 mb-xl-10" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body p-0">
            <h4>Your Earnings</h4>
            <div class="price-price mb-2">
                <span><b><?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->earnings); ?></b></span>
            </div>
            <a href="#withdraw-dialog" class="btn btn-red btn-sm ms-2 has-popup"><i class="bi bi-send me-2"></i>Withdraw</a>
        </div>
    </div><!--/dashboard-card-->

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0">Earnings History</h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-150px">User Sender</th>
                            <th class="min-w-125px">Tip Amount</th>
                            <th class="min-w-125px">Admin Commission</th>
                            <th class="min-w-125px">Amount Received</th>
                            <th class="min-w-125px">Date</th>
                            <th class="min-w-125px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $earnings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($earning->sender_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                 <?php echo e(App\Models\User::find($earning->sender_id)->name); ?>

                                </td>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($earning->amount + $earning->admin_amount); ?></td>
                                <td><?php echo e($earning->commission_fee.'%'); ?></td>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($earning->amount); ?></td>
                                <td><?php echo e(date('d M, Y', strtotime($earning->created_at))); ?></td>
                                <?php if($earning->status === 1): ?>
                                    <td><span class="badge bg-green p-2">Active</span></td>
                                <?php else: ?>
                                    <td><span class="badge bg-danger p-2">Pending</span></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0">Tips History</h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms_2" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-150px">User Receiver</th>
                            <th class="min-w-125px">Tip Amount</th>
                            <th class="min-w-125px">Admin Commission</th>
                            <th class="min-w-125px">Amount Received</th>
                            <th class="min-w-125px">Date</th>
                            <th class="min-w-125px">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($tip->receiver_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                 <?php echo e(App\Models\User::find($tip->receiver_id)->name); ?>

                                </td>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($tip->amount + $tip->admin_amount); ?></td>
                                <td><?php echo e($tip->commission_fee.'%'); ?></td>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($tip->amount); ?></td>
                                <td><?php echo e(date('d M, Y', strtotime($tip->created_at))); ?></td>
                                <?php if($tip->status === 1): ?>
                                    <td><span class="badge bg-green p-2">Active</span></td>
                                <?php else: ?>
                                    <td><span class="badge bg-danger p-2">Pending</span></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <div id="withdraw-dialog" class="white-popup zoom-anim-dialog mfp-hide">
        <div class="mfp-modal-header">
            <span class="mb-2">
                <img src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" class="rounded-circle" alt="User">
            </span>
            <h4>Your Earnings - <?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->earnings); ?></h4>
        </div>
        <div class="mfp-modal-body py-4">

            <div class="w-100 pt-3 pb-3 px-4">

                <form id="withdraw_form" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-style-1">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="my-2" placeholder="Minimum Withdraw <?php echo e(get_setting('currency_symbol')); ?><?php echo e(get_setting('min_withdraw')); ?>">
                    </div>

                    <button type="submit" class="btn btn-mint w-100 mt-4" id="withdraw_btn"><i class="bi bi-send fs-xl me-2"></i>Withdraw</button>
                </form>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.min.js')); ?>"></script>

<script>
    $('.has-popup').magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: false,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

    $('#datatable_cms, #datatable_cms_2').DataTable();


    // Withdraw
    $(document).on('submit', '#withdraw_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#withdraw_btn").text('Sending...');
        $.ajax({
            url: '<?php echo e(route('user.withdraw')); ?>',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {

            end_load();

            if (response.status == 200) {

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

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/earnings/index.blade.php ENDPATH**/ ?>