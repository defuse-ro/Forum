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
        <h4><i class="bi bi-file-ppt me-2"></i> Points</h4>
    </div>


    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0">Points</h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-150px">Score</th>
                            <th class="min-w-125px">Type</th>
                            <th class="min-w-125px">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($point->score); ?></td>
                                <?php if($point->type == 1): ?>
                                    <td><span class="badge bg-green p-2">Login Points</span></td>
                                <?php elseif($point->type == 2): ?>
                                    <td><span class="badge bg-green p-2">Register Points</span></td>
                                <?php elseif($point->type == 3): ?>
                                    <td><span class="badge bg-green p-2">Post Points</span></td>
                                <?php elseif($point->type == 4): ?>
                                    <td><span class="badge bg-green p-2">Comment Points</span></td>
                                <?php elseif($point->type == 5): ?>
                                    <td><span class="badge bg-green p-2">Replies Points</span></td>
                                <?php elseif($point->type == 6): ?>
                                    <td><span class="badge bg-green p-2">Like Points</span></td>
                                <?php elseif($point->type == 7): ?>
                                    <td><span class="badge bg-green p-2">Reaction Points</span></td>
                                <?php elseif($point->type == 8): ?>
                                    <td><span class="badge bg-green p-2">Share Points</span></td>
                                <?php elseif($point->type == 9): ?>
                                    <td><span class="badge bg-green p-2">Subscription Points</span></td>
                                <?php elseif($point->type == 10): ?>
                                    <td><span class="badge bg-green p-2">Buy Points</span></td>
                                <?php endif; ?>

                                <td><?php echo e(date('d M, Y', strtotime($point->created_at))); ?></td>
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

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/points/index.blade.php ENDPATH**/ ?>