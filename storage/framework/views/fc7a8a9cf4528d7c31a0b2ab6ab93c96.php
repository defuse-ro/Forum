<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">


        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-md-flex justify-content-between align-items-center mb-10">
                        <h5 class="h4 mb-0">All Faqs</h5>
                        <div>
                            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addFaqModal">+ Add Faq</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Order</th>
                                <th class="text-right">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><?php echo e($faq->question); ?></td>
                                    <td><?php echo e($faq->answer); ?></td>
                                    <td><?php echo e($faq->order); ?></td>
                                    <td class="text-right">

                                        <a  href="#" id="<?php echo e($faq->id); ?>'" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon editIcon" title="Edit">
                                            <i class="align-middle" data-feather="edit-2"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                        onclick="delete_item('<?php echo e(route('admin.faqs.destroy')); ?>','<?php echo e($faq->id); ?>','<?php echo e(trans('delete_this_faq?')); ?>');">
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




        
        <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Faq</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body">

                <form id="add_faq_form" action="" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row px-3 py-3">

                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" placeholder="Question" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" rows="4" placeholder="Answer" class="form-control my-2"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="order">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="0">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_faq_btn" class="btn btn-success">Add Faq</button>
                    </div>
                </form>

            </div>
            </div>
        </div>
        </div>
        

        
        <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Faq</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body">

                <form id="edit_faq_form" action="" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="faq_id" id="faq_id">

                    <div class="row px-3 py-3">

                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" placeholder="Question" class="form-control my-2">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" rows="4" placeholder="Answer" class="form-control my-2"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="order">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="0">
                            <div class="invalid-feedback"></div>
                        </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="edit_faq_btn" class="btn btn-success">Edit Faq</button>
                    </div>
                </form>

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

<script>
    $(function() {

      // add faq ajax request
      $(document).on('submit', '#add_faq_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#add_faq_btn").text('Adding...');
        $.ajax({
          url: '<?php echo e(route('admin.faqs.add')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            console.log(response);

            end_load();

            if (response.status == 400) {

                showError('question', response.messages.question);
                showError('answer', response.messages.answer);
                showError('order', response.messages.order);
                $("#add_faq_btn").text('Add Faq');

            }else if (response.status == 200) {

                tata.success("Success", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                removeValidationClasses("#add_faq_form");
                $("#add_faq_form")[0].reset();
                $("#addFaqModal").modal('hide');
                window.location.reload();

            }else if(response.status == 401){

                tata.error("Error", response.messages, {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });

                $("#add_faq_form")[0].reset();
                $("#addFaqModal").modal('hide');
                window.location.reload();

            }

          }
        });
      });


        // edit faq ajax request
        $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        start_load();
        let id = $(this).attr('id');
        $.ajax({
            url: '<?php echo e(route('admin.faqs.edit')); ?>',
            method: 'get',
            data: {
            id: id,
            },
            success: function(response) {
                console.log(response);
                end_load();

                $('#editFaqModal').modal('show');

                $('#edit_faq_form #faq_id').val(response.id);
                $('#edit_faq_form #question').val(response.question);
                $('#edit_faq_form #answer').val(response.answer);
                $('#edit_faq_form #order').val(response.order);

            }
        });
        });

        // update faq ajax request
        $(document).on('submit', '#edit_faq_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#edit_faq_btn").text('Updating...');
        $.ajax({
            method: 'POST',
            url: '<?php echo e(route('admin.faqs.update')); ?>',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                end_load();

                if (response.status == 400) {

                    showError('question', response.messages.question);
                    showError('answer', response.messages.answer);
                    showError('order', response.messages.order);
                    $("#edit_faq_btn").text('Edit Faq');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#edit_faq_form");
                    $("#edit_faq_form")[0].reset();
                    $("#editFaqModal").modal('hide');
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#edit_faq_form")[0].reset();
                    $("#editFaqModal").modal('hide');
                    window.location.reload();

                }

            }
        });
        });

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/faqs/index.blade.php ENDPATH**/ ?>