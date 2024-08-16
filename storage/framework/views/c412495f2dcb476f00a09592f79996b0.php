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
                        <h5 class="h4 mb-0">All Categories</h5>
                        <div>
                            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+ Add Category</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_cms" class="table table-bordered table-reload">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Pro</th>
                                <th>Status</th>
                                <th class="text-right">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1)); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><img src="<?php echo e(my_asset('uploads/categories/'.$category->image)); ?>" class="img-fluid" width="70px" height="60px" alt="Image"></td>
                                    <td><?php echo e($category->description); ?></td>
                                    <?php if($category->pro == 1): ?>
                                     <td> <span class="badge bg-success">Available to Pro Users</span> </td>
                                    <?php else: ?>
                                    <td> <span class="badge bg-danger">Available to all Users</span> </td>
                                    <?php endif; ?>
                                    <?php if($category->status == 1): ?>
                                     <td> <span class="badge bg-success">Active</span> </td>
                                    <?php else: ?>
                                    <td> <span class="badge bg-danger">Not Active</span> </td>
                                    <?php endif; ?>
                                    <td class="text-right">

                                        <a  href="#" id="<?php echo e($category->id); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon editIcon" title="Edit">
                                            <i class="align-middle" data-feather="edit-2"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                        onclick="delete_item('<?php echo e(route('admin.categories.destroy')); ?>','<?php echo e($category->id); ?>','<?php echo e(trans('delete_this_category?')); ?>');">
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




        
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="model-body">

                    <form id="add_category_form" action="" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="row px-3 py-3">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Eg. Movies" class="form-control my-2">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="4" placeholder="Description"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="symbol">Image</label>
                                    <input type="file" name="image" id="image">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="pro">Pro</label>
                                    <select name="pro" id="pro" class="form-select form-control">
                                        <option value="1">Available to Pro Users</option>
                                        <option value="0">Available to All Users</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-select form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_category_btn" class="btn btn-success">Add Category</button>
                        </div>
                    </form>

                </div>
                </div>
            </div>
        </div>
        

        
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="model-body">

                    <form id="edit_category_form" action="" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="category_id" id="category_id">
                        <input type="hidden" name="old_image" id="old_image">
                        <div class="row px-3 py-3">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Eg. Music" class="form-control my-2">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="4" placeholder="Description"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12" id="current_image">
                                <div class="input-style-1">
                                    <label for="symbol">Image</label>
                                    <input type="file" name="image" id="image">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="pro">Pro</label>
                                    <select name="pro" id="pro" class="form-select form-control">
                                        <option value="1">Available to Pro Users</option>
                                        <option value="0">Available to All Users</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-select form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_category_btn" class="btn btn-success">Edit Category</button>
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

        // add category ajax request
        $(document).on('submit', '#add_category_form', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#add_category_btn").text('Adding...');
            $.ajax({
            url: '<?php echo e(route('admin.categories.add')); ?>',
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
                    showError('description', response.messages.description);
                    showError('image', response.messages.image);
                    showError('pro', response.messages.pro);
                    showError('status', response.messages.status);
                    $("#add_category_btn").text('Add Category');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#add_category_form");
                    $("#add_category_form")[0].reset();
                    $("#addCategoryModal").modal('hide');
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#add_category_form")[0].reset();
                    $("#addCategoryModal").modal('hide');
                    window.location.reload();

                }

            }
            });
        });

        // edit category ajax request
        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            start_load();
            let id = $(this).attr('id');
            $.ajax({
                url: '<?php echo e(route('admin.categories.edit')); ?>',
                method: 'get',
                data: {
                id: id,
                },
                success: function(response) {
                    end_load();

                    $('#editCategoryModal').modal('show');

                    $('#edit_category_form #name').val(response.name);
                    $('#edit_category_form #description').val(response.description);

                    $('#edit_category_form #current_image').prepend($('<img>',{id:'theImg',src:'../../public/uploads/categories/'+response.image,class:'img-fluid mb-3',width:'100px',height:'100px'}));
                    $('#edit_category_form #old_image').val(response.image);
                    $('#edit_category_form #category_id').val(response.id);
                    if (response.pro == 1) {
                        $("#edit_category_form #pro option[value=1]").attr('selected', 'selected');
                    } else {
                        $("#edit_category_form #pro option[value=0]").attr('selected', 'selected');
                    }
                    if (response.status == 1) {
                        $("#edit_category_form #status option[value=1]").attr('selected', 'selected');
                    } else {
                        $("#edit_category_form #status option[value=0]").attr('selected', 'selected');
                    }

                }
            });
        });

        // update category ajax request
        $(document).on('submit', '#edit_category_form', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#edit_category_btn").text('Updating...');
            $.ajax({
                method: 'POST',
                url: '<?php echo e(route('admin.categories.update')); ?>',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    end_load();

                    if (response.status == 400) {

                        showError('name', response.messages.name);
                        showError('description', response.messages.description);
                        showError('image', response.messages.image);
                        showError('pro', response.messages.pro);
                        showError('status', response.messages.status);
                        $("#edit_category_btn").text('Edit Category');

                    }else if (response.status == 200) {

                        tata.success("Success", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        removeValidationClasses("#edit_category_form");
                        $("#edit_category_form")[0].reset();
                        $("#editCategoryModal").modal('hide');
                        window.location.reload();

                    }else if(response.status == 401){

                        tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        $("#edit_category_form")[0].reset();
                        $("#editCategoryModal").modal('hide');
                        window.location.reload();

                    }

                }
            });
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>