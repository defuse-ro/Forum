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
              <a class="nav-link <?php echo e(Route::is('admin.currencies.list') ? 'active' : ''); ?> <?php echo e(Route::is('admin.currencies.edit') ? 'active' : ''); ?>" href="<?php echo e(route('admin.currencies.list')); ?>">
                <i class="align-middle me-1" data-feather="layers"></i> Currencies </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#addCurrencyModal">
                <i class="align-middle me-1" data-feather="plus-square"></i> Add Currency</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  <?php echo e(Route::is('admin.currencies.default') ? 'active' : ''); ?>" href="<?php echo e(route('admin.currencies.default')); ?>">
                <i class="align-middle me-1" data-feather="maximize"></i> Default Currency</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  <?php echo e(Route::is('admin.currencies.format') ? 'active' : ''); ?>" href="<?php echo e(route('admin.currencies.format')); ?>">
                <i class="align-middle me-1" data-feather="disc"></i> Currency Format</a>
            </li>
          </ul>
        </div>
        </div>

        
        <div class="modal fade" id="addCurrencyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Currency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body">

                <form id="add_currency_form" action="" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row px-3 py-3">
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">Currency Name</label>
                            <input type="text" name="name" id="name" placeholder="Eg. US Dollar" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="symbol">Currency Symbol</label>
                            <input type="text" name="symbol" id="symbol" placeholder="Eg. $" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="code">Currency Code</label>
                            <input type="text" name="code" id="code" placeholder="Eg. USD" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="exchange_rate">Exchange rate (1 USD = ?)</label>
                            <input type="number" min="0" step="0.01" placeholder="Eg. 5" name="exchange_rate" id="exchange_rate" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_currency_btn" class="btn btn-success">Add Currency</button>
                    </div>
                </form>

            </div>
            </div>
        </div>
        </div>
        

        
        <div class="modal fade" id="editCurrencyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Currency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body">

                <form id="edit_currency_form" action="" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="currency_id" id="currency_id">
                    <div class="row px-3 py-3">
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">Currency Name</label>
                            <input type="text" name="name" id="name" placeholder="Eg. US Dollar" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="symbol">Currency Symbol</label>
                            <input type="text" name="symbol" id="symbol" placeholder="Eg. $" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="code">Currency Code</label>
                            <input type="text" name="code" id="code" placeholder="Eg. USD" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="exchange_rate">Exchange rate (1 USD = ?)</label>
                            <input type="number" min="0" step="0.01" placeholder="Eg. 5" name="exchange_rate" id="exchange_rate" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="edit_currency_btn" class="btn btn-success">Edit Currency</button>
                    </div>
                </form>

            </div>
            </div>
        </div>
        </div>
        


       </div>

       <div class="col-lg-9">


            <?php if(Route::is('admin.currencies.list') ): ?>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="h4 mb-0">All Currencies</h5>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable_cms" class="table table-bordered table-reload">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Currency name</th>
                                            <th>Currency symbol</th>
                                            <th>Currency code</th>
                                            <th>Exchange rate (1 USD = ?)</th>
                                            <th class="text-right">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(($key+1)); ?></td>
                                                <td><?php echo e($currency->name); ?></td>
                                                <td><?php echo e($currency->symbol); ?></td>
                                                <td><?php echo e($currency->code); ?></td>
                                                <td><?php echo e($currency->exchange_rate); ?></td>
                                                <td class="text-right">

                                                        <a  href="#" id="<?php echo e($currency->id); ?>'" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon editIcon" title="Edit">
                                                            <i class="align-middle" data-feather="edit-2"></i>
                                                        </a>
                                                        <?php if(get_setting('default_currency') != $currency->id): ?>
                                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                                            onclick="delete_item('<?php echo e(route('admin.currencies.destroy')); ?>','<?php echo e($currency->id); ?>','<?php echo e(add_phrase('delete_this_currency?')); ?>');">
                                                                <i class="align-middle" data-feather="trash"></i>
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

            <?php elseif(Route::is('admin.currencies.default') ): ?>

                        <div class="card-style settings-card-2 mb-30">
                            <h5 class="h4 mb-3">Default Currency</h5>
                            <form class="form-horizontal" action="<?php echo e(route('admin.currencies.settings')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="input-style-1 mb-3">
                                    <select class="form-select" name="default_currency">
                                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($currency->id); ?>" <?php if(get_setting('default_currency') == $currency->id): ?> selected <?php endif; ?>><?php echo e($currency->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <button type="submit" class="main-btn primary-btn btn-hover">Submit</button>
                            </form>
                        </div>

            <?php elseif(Route::is('admin.currencies.format') ): ?>

            <div class="card-style settings-card-2 mb-30">
                <h5 class="h4 mb-3">Currency Format</h5>
                <form action="<?php echo e(route('admin.currencies.settings')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 input-style-1">
                            <select class="form-select" name="symbol_format" data-placeholder="Choose ..." required>
                                <option value="1" <?php if(get_setting('symbol_format') == 1): ?> selected <?php endif; ?>>[Symbol] [Amount]</option>
                                <option value="2" <?php if(get_setting('symbol_format') == 2): ?> selected <?php endif; ?>>[Amount] [Symbol]</option>
                            </select>
                        </div>
                        <div class="col-md-6 input-style-1">
                            <select class="form-select" name="no_of_decimals" data-placeholder="Choose ..." required>
                                <option value="0" <?php if(get_setting('no_of_decimals') == 0): ?> selected <?php endif; ?>>12345</option>
                                <option value="1" <?php if(get_setting('no_of_decimals') == 1): ?> selected <?php endif; ?>>1234.5</option>
                                <option value="2" <?php if(get_setting('no_of_decimals') == 2): ?> selected <?php endif; ?>>123.45</option>
                                <option value="3" <?php if(get_setting('no_of_decimals') == 3): ?> selected <?php endif; ?>>12.345</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="main-btn primary-btn btn-hover">Submit</button>
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

      // add currency ajax request
      $(document).on('submit', '#add_currency_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#add_currency_btn").text('Adding...');
        $.ajax({
          url: '<?php echo e(route('admin.currencies.add')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {

            end_load();

            if (response.status == 400) {

                showError('name', response.messages.name);
                showError('symbol', response.messages.symbol);
                showError('code', response.messages.code);
                $("#add_currency_btn").text('Add Currency');

            }else if (response.status == 200) {

                tata.success("Success", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                removeValidationClasses("#add_currency_form");
                $("#add_currency_form")[0].reset();
                $("#addCurrencyModal").modal('hide');
                window.location.reload();

            }else if(response.status == 401){

                tata.error("Error", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                $("#add_currency_form")[0].reset();
                $("#addCurrencyModal").modal('hide');
                window.location.reload();

            }

          }
        });
      });



      // edit currency ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        start_load();
        let id = $(this).attr('id');
        $.ajax({
          url: '<?php echo e(route('admin.currencies.edit')); ?>',
          method: 'get',
          data: {
            id: id,
          },
          success: function(response) {
            end_load();

            $("#editCurrencyModal").modal('show');

            $("#edit_currency_form #name").val(response.name);
            $("#edit_currency_form #symbol").val(response.symbol);
            $("#edit_currency_form #code").val(response.code);
            $("#edit_currency_form #exchange_rate").val(response.exchange_rate);
            $("#edit_currency_form #currency_id").val(response.id);
          }
        });
      });

        // update currency ajax request
        $(document).on('submit', '#edit_currency_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#edit_currency_btn").text('Updating...');
        $.ajax({
            method: 'POST',
            url: '<?php echo e(route('admin.currencies.update')); ?>',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                end_load();

                if (response.status == 400) {

                    showError('name', response.messages.name);
                    showError('symbol', response.messages.symbol);
                    showError('code', response.messages.code);
                    $("#edit_currency_btn").text('Edit Currency');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#edit_currency_form");
                    $("#edit_currency_form")[0].reset();
                    $("#editCurrencyModal").modal('hide');
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#edit_currency_form")[0].reset();
                    $("#editCurrencyModal").modal('hide');
                    window.location.reload();

                }

            }
        });
        });


    });
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/currencies/index.blade.php ENDPATH**/ ?>