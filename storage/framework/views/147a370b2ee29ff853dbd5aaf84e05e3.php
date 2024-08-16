<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/prism/prism.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-lg-3">

         <div class="card">
            <div class="card-body">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link <?php echo e(Route::is('admin.pages.list') ? 'active' : ''); ?>

                <?php echo e(Route::is('admin.pages.edit') ? 'active' : ''); ?>" href="<?php echo e(route('admin.pages.list')); ?>">
                    <i class="align-middle me-1" data-feather="layers"></i> <?php echo e(trans('pages')); ?> </a>
                </li>
                <li class="nav-item">
                <a class="nav-link
                <?php echo e(Route::is('admin.pages.add') ? 'active' : ''); ?>" href="<?php echo e(route('admin.pages.add')); ?>">
                    <i class="align-middle me-1" data-feather="plus-square"></i> <?php echo e(trans('add_page')); ?></a>
                </li>
            </ul>
            </div>
         </div>

        </div>

      <div class="col-lg-9">
        <?php if(Route::is('admin.pages.list') ): ?>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h4 mb-0"><?php echo e(trans('pages')); ?></h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('title')); ?></th>
                                    <th><?php echo e(trans('description')); ?></th>
                                    <th><?php echo e(trans('status')); ?></th>
                                    <th class="text-right"><?php echo e(trans('options')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($key+1)); ?></td>
                                        <td><?php echo e($page->title); ?></td>
                                        <td>
                                            <a  href="#" id="<?php echo e($page->id); ?>'" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon viewIcon" title="View">
                                            <i class="align-middle" data-feather="eye"></i>
                                            </a>
                                        </td>
                                        <?php if($page->status == 1): ?>
                                        <td> <span class="badge bg-success"><?php echo e(trans('active')); ?></span> </td>
                                        <?php else: ?>
                                        <td> <span class="badge bg-danger"><?php echo e(trans('not_active')); ?></span> </td>
                                        <?php endif; ?>
                                        <td class="text-right">

                                            <a  href="<?php echo e(route('admin.pages.edit', $page->id)); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon editIcon" title="Edit">
                                                <i class="align-middle" data-feather="edit-2"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('<?php echo e(route('admin.pages.destroy')); ?>','<?php echo e($page->id); ?>','<?php echo e(trans('delete_this_page')); ?>');">
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
            </div>

        <?php elseif(Route::is('admin.pages.add') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <h5 class="h4 mb-3"><?php echo e(trans('add_page')); ?></h5>
                <form action="<?php echo e(route('admin.pages.add')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="title"><?php echo e(trans('title')); ?></label>
                            <input type="text" name="title" id="title" placeholder="<?php echo e(trans('title')); ?>" class="form-control my-2 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="symbol"><?php echo e(trans('description')); ?></label>
                            <textarea name="description" id="body" rows="4" class="<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="exchange_rate"><?php echo e(trans('status')); ?></label>
                            <select name="status" id="status" class="form-select form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="1"><?php echo e(trans('active')); ?></option>
                                <option value="0"><?php echo e(trans('not_active')); ?></option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">Meta <?php echo e(trans('title')); ?></label>
                            <input type="text" name="meta_title" id="meta_title" placeholder="Meta <?php echo e(trans('title')); ?>" class="form-control my-2 <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="keywords">Meta <?php echo e(trans('keywords')); ?></label>
                            <input type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta <?php echo e(trans('keywords')); ?>" class="form-control my-2 <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="description">Meta <?php echo e(trans('description')); ?></label>
                            <textarea name="meta_description" rows="3" placeholder="Meta <?php echo e(trans('description')); ?>" class="form-control my-2 <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                </form>
            </div>

        <?php elseif(Route::is('admin.pages.edit') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <h5 class="h4 mb-3"><?php echo e(trans('edit_page')); ?></h5>
                <form action="<?php echo e(route('admin.pages.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                    <div class="row">
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="title"><?php echo e(trans('title')); ?></label>
                            <input type="text" name="title" id="title" value="<?php echo e($page->title); ?>" class="form-control my-2 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="symbol"><?php echo e(trans('description')); ?></label>
                            <textarea name="description" id="body" rows="4" class="<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($page->description); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="exchange_rate"><?php echo e(trans('status')); ?></label>
                            <select name="status" id="status" class="form-select form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="1" <?php echo e($page->status == 1 ? 'selected' : ''); ?>><?php echo e(trans('active')); ?></option>
                                <option value="0" <?php echo e($page->status == 0 ? 'selected' : ''); ?>><?php echo e(trans('not_active')); ?></option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">Meta <?php echo e(trans('title')); ?></label>
                            <input type="text" name="meta_title" value="<?php echo e($page->meta_title); ?>" placeholder="Meta Title" class="form-control my-2 <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="keywords">Meta <?php echo e(trans('keywords')); ?></label>
                            <input type="text" name="meta_keywords" value="<?php echo e($page->meta_keywords); ?>" placeholder="Meta Keywords" class="form-control my-2 <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="description">Meta <?php echo e(trans('description')); ?></label>
                            <textarea name="meta_description" rows="3" placeholder="Meta Description" class="form-control my-2 <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($page->meta_description); ?></textarea>
                            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                </form>
            </div>

        <?php endif; ?>

    </div><!-- col-lg-9 -->

    
    <div class="modal fade" id="viewPageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="model-body p-4">

            <p id="description"></p>

        </div>
        </div>
    </div>
    </div>
    




    </div><!-- row -->
   </div><!-- container -->
  </section>

</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/trumbowyg.min.js')); ?>"></script>
<!-- Import Trumbowyg plugins... -->
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/trumbowyg.colors.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/trumbowyg.emoji.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/trumbowyg.giphy.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/prism/prism.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/trumbowyg.highlight.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/noembed/trumbowyg.noembed.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/indent/trumbowyg.indent.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/cleanpaste/trumbowyg.cleanpaste.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/pasteimage/trumbowyg.pasteimage.min.js')); ?>"></script>

<script>
    $(document).ready(function () {

        $('#body').trumbowyg({
            removeformatPasted: true,
            btns: [
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['indent', 'outdent'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['foreColor', 'backColor'],
                ['horizontalRule'],
                ['removeformat'],
                ['link'],
                ['insertImage'],
                ['emoji'],
                ['giphy'],
                ['noembed'],
                ['highlight']
            ],
            plugins: {
                giphy: {
                    apiKey: 'dNhCbN6hrhpBMxXhIswM34wIR2UBpCns'
                },
            }
        });

    });

    $(function() {

        // edit category ajax request
        $(document).on('click', '.viewIcon', function(e) {
            e.preventDefault();
            start_load();
            let id = $(this).attr('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '<?php echo e(route('admin.pages.view')); ?>',
                method: 'get',
                data: {
                id: id,
                },
                success: function(response) {
                    end_load();

                    $('#viewPageModal').modal('show');

                    $('#viewPageModal #title').html(response.title);
                    $('#viewPageModal #description').html(response.description);

                }
            });
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>