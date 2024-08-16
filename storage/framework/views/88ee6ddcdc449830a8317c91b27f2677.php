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
        <h4><i class="bi bi-x-octagon me-2"></i> User Blocks</h4>
    </div>

<?php if(Auth::user()->subscription()->users === 1): ?>
    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0">Users</h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-150px">User</th>
                            <th class="min-w-125px">Date</th>
                            <th class="min-w-125px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($block->block_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                 <?php echo e(App\Models\User::find($block->block_id)->name); ?>

                                </td>
                                <td><?php echo e(date('d M, Y', strtotime($block->created_at))); ?></td>
                                <td><a href="javascript:void(0)" onclick="block('<?php echo e(route('unblock')); ?>','<?php echo e($block->id); ?>','Unblock User?');" class="btn btn-red">Unblock</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php else: ?>

    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body">
            <div class="upload-image my-3">
                <h4 class="mb-3">To view blocked users, you need to purchase a New Pricing Plan.</h4>
            </div>
        </div>
    </div><!--/dashboard-card-->

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.min.js')); ?>"></script>

    <script>

        $('#datatable_cms').DataTable();

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/blocks/index.blade.php ENDPATH**/ ?>