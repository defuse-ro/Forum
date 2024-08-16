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
              <a class="nav-link <?php echo e(Route::is('admin.languages.index') ? 'active' : ''); ?> <?php echo e(Route::is('admin.languages.edit') ? 'active' : ''); ?>" href="<?php echo e(route('admin.languages.index')); ?>">
                <i class="align-middle me-1" data-feather="layers"></i> <?php echo e(trans('languages')); ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#addLanguageModal">
                <i class="align-middle me-1" data-feather="plus-square"></i> <?php echo e(trans('add_language')); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link  <?php echo e(Route::is('admin.languages.default') ? 'active' : ''); ?>" href="<?php echo e(route('admin.languages.default')); ?>">
                <i class="align-middle me-1" data-feather="maximize"></i> <?php echo e(trans('default_language')); ?></a>
            </li>
          </ul>
        </div>
        </div>


          
          <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          data-bs-backdrop="static" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo e(trans('add_language')); ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="model-body">

                  <form id="add_language_form" action="" method="POST">
                      <?php echo csrf_field(); ?>

                      <div class="row px-3 py-3">
                          <div class="col-12">
                          <div class="input-style-1">
                              <label for="language"><?php echo e(trans('language_name')); ?></label>
                              <input type="text" name="language" id="language" placeholder="Eg. English" class="form-control my-2">
                              <div class="invalid-feedback"></div>
                          </div>
                          </div>

                      </div>

                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(trans('close')); ?></button>
                      <button type="submit" id="add_language_btn" class="btn btn-success"><?php echo e(trans('submit')); ?></button>
                      </div>
                  </form>

              </div>
              </div>
          </div>
          </div>
          


       </div>

       <div class="col-lg-9">


            <?php if(Route::is('admin.languages.index') ): ?>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted"><?php echo e(trans('languages')); ?></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table id="datatable_cms" class="table table-bordered table-reload">
                        <thead>
                            <tr>
                                <th style="width:40%;"><?php echo e(trans('language')); ?></th>
                                <th><?php echo e(trans('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="ms-3"><?php echo e(ucwords($language)); ?>

                                    <?php if($language === App::currentLocale()): ?>
                                       <span class="badge bg-danger"><?php echo e(trans('default_language')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="table-action">
                                    <a href="<?php echo e(route('admin.languages.edit', ['language' => $language])); ?>" class="btn btn-info">
                                        <i class="align-middle" data-feather="edit-2"></i> <?php echo e(trans('edit')); ?> <?php echo e(trans('phrases')); ?>

                                    </a>
                                    <?php if($language != App::currentLocale()): ?>
                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="delete_item('<?php echo e(route('admin.languages.delete')); ?>','<?php echo e($language); ?>','<?php echo e(trans('delete_this_language')); ?>');">
                                        <i class="align-middle" data-feather="trash"></i> <?php echo e(trans('delete_language')); ?></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>

                </div>
            </div>

            <?php elseif(Route::is('admin.languages.edit') ): ?>

                <div class="card mb-30">
                  <div class="card-header">
                    <h4 class="text-muted"><?php echo e(trans('edit')); ?> <?php echo e(ucfirst($language)); ?> <?php echo e(trans('phrases')); ?></h4>
                  </div>
                </div>

                <div class="row" style="height: 700px; overflow-y:scroll;">

                    <?php $__currentLoopData = openJSONFile($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-6">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                        $string = strip_tags($key);
                                        if (strlen($string) > 40) {

                                            echo substr($string,0,40).'. . . . . . . .';
                                        }else{
                                            echo $key;
                                        }
                                ?>
                                </h5>
                                <div class="input-style-1 d-flex justify-content-center">
                                    <input type="text" class="form-control" name="updated_phrase" value="<?php echo e($value); ?>" id="phrase-<?php echo e($key); ?>">
                                    <button type="button" class="btn btn-sm btn-success ms-1" id="btn-<?php echo e($key); ?>"
                                      onclick="updatePhrase('<?php echo e($key); ?>', '<?php echo e($language); ?>','<?php echo e(route('admin.languages.update')); ?>','<?php echo e(trans('translation_saved')); ?>')">
                                        <i class="lni lni-checkmark"></i> </button>
                                </div>
                        </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            <?php elseif(Route::is('admin.languages.default') ): ?>

                <div class="card-style settings-card-2 mb-30">
                    <form action="<?php echo e(route('admin.languages.default')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="language"><?php echo e(trans('set_default_language')); ?></label>
                                <select name="lang" class="form-select">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang); ?>" <?php echo e(App::currentLocale() === $lang ? 'selected' : ''); ?>><?php echo e(ucfirst($lang)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="main-btn primary-btn btn-hover"><?php echo e(trans('submit')); ?></button>
                    </form>
                </div>

            <?php endif; ?>
       </div><!-- col-lg-9 -->

    </div><!-- row -->
   </div><!-- container -->
  </section>

</main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<script>
    $(function() {

      // add language ajax request
      $(document).on('submit', '#add_language_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#add_language_btn").text('<?php echo e(trans('adding')); ?>...');
        $.ajax({
          url: '<?php echo e(route('admin.languages.add')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            end_load();

            if (response.status == 400) {

                showError('language', response.messages.language);
                $("#add_language_btn").text('<?php echo e(trans('submit')); ?>');

            }else if (response.status == 200) {

                tata.success("Success", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                removeValidationClasses("#add_language_form");
                $("#add_language_form")[0].reset();
                $("#addLanguageModal").modal('hide');
                window.location.reload();

            }else if(response.status == 401){

                tata.error("Error", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                $("#add_language_form")[0].reset();
                $("#addLanguageModal").modal('hide');
                window.location.reload();

            }

          }
        });
      });

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/languages/index.blade.php ENDPATH**/ ?>