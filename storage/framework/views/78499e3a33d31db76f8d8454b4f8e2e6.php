<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/prism/prism.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/bootstrap-taginput/bootstrap-tagsinput.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-lg-12">
            <?php if(Route::is('admin.reports.posts')): ?>
                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between align-items-center mb-10">
                            <h5 class="h4 mb-0">Posts Reported</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th class="text-right">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($key+1)); ?></td>
                                        <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($report->user_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                         <?php echo e(App\Models\User::find($report->user_id)->name); ?></td>
                                        <td><a href="<?php echo e(route('home.post', ['post_id' => App\Models\Posts::find($report->report_id)->post_id, 'slug' => App\Models\Posts::find($report->report_id)->slug])); ?>" target="_blank">
                                            <?php echo e(App\Models\Posts::find($report->report_id)->title); ?></a></td>

                                        <td><?php echo e(date('d M, Y', strtotime($report->created_at))); ?></td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('<?php echo e(route('admin.posts.destroy')); ?>','<?php echo e($report->report_id); ?>','Delete this Post?');">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            <?php elseif(Route::is('admin.reports.comments')): ?>
                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between align-items-center mb-10">
                            <h5 class="h4 mb-0">Comments Reported</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th class="text-right">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($key+1)); ?></td>
                                        <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($report->user_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                        <?php echo e(App\Models\User::find($report->user_id)->name); ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.comments.edit', ['id' => $report->report_id])); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon" title="Edit">
                                                <i class="align-middle" data-feather="eye"></i>
                                            </a>
                                        </td>

                                        <td><?php echo e(date('d M, Y', strtotime($report->created_at))); ?></td>
                                        <td class="text-right">

                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('<?php echo e(route('admin.comments.destroy')); ?>','<?php echo e($report->report_id); ?>','Delete this Comment?');">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            <?php elseif(Route::is('admin.reports.replies')): ?>
                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between align-items-center mb-10">
                            <h5 class="h4 mb-0">Comments Reported</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Reply</th>
                                    <th>Date</th>
                                    <th class="text-right">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($key+1)); ?></td>
                                        <td><img src="<?php echo e(my_asset('uploads/users/'.App\Models\User::find($report->user_id)->image)); ?>" class="img-fluid avatar avatar-rounded me-2" width="40px" height="40px" alt="Image">
                                        <?php echo e(App\Models\User::find($report->user_id)->name); ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.replies.edit', ['id' => $report->report_id])); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon" title="Edit">
                                                <i class="align-middle" data-feather="eye"></i>
                                            </a>
                                        </td>

                                        <td><?php echo e(date('d M, Y', strtotime($report->created_at))); ?></td>
                                        <td class="text-right">

                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('<?php echo e(route('admin.replies.destroy')); ?>','<?php echo e($report->report_id); ?>','Delete this Comment?');">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            <?php endif; ?>
        </div>


      </div><!-- row -->
     </div><!-- container -->
    </section>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/forum/reports.blade.php ENDPATH**/ ?>