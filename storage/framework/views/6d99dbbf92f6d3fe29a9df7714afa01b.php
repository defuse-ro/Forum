<?php $__env->startSection('content'); ?>



<h4 class="mb-0" data-aos="fade-down" data-aos-easing="linear"><i class="bi bi-plus-circle-dotted me-2"></i> Add Post</h4>

<div class="row g-0">
    <div class="col-12">
        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
            <div class="dashboard-body">


                <form id="addpost_form" method="POST">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Categories</label>
                            <select name="category_id" id="category_id">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags" id="tags" placeholder="Tags e.g Design">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Body</label>
                            <textarea name="body" id="body" rows="4"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>
                    <div class="d-flex pt-5">
                        <button type="submit" id="addpost_btn" class="btn btn-mint me-3">Submit</button>
                    </div>
                </form>

            </div>
        </div><!--/dashboard-card-->
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>

$(function() {

    // update user ajax request
    $(document).on('submit', '#addpost_form', function(e) {
        e.preventDefault();
        start_load();
        const fd = new FormData(this);
        $("#addpost_btn").text('Updating...');
        $.ajax({
            method: 'POST',
            url: '<?php echo e(route('user.addpost')); ?>',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                end_load();
                console.log(response);

                if (response.status == 400) {

                    showError('title', response.messages.title);
                    showError('category_id', response.messages.category_id);
                    showError('tags', response.messages.tags);
                    showError('body', response.messages.body);
                    $("#addpost_btn").text('Submit');

                }else if (response.status == 200) {

                    tata.success("Success", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    removeValidationClasses("#addpost_form");
                    $("#addpost_form")[0].reset();
                    window.location.reload();

                }else if(response.status == 401){

                    tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                    $("#addpost_form")[0].reset();
                    window.location.reload();

                }

            }
        });
    });


});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/posts/addpost.blade.php ENDPATH**/ ?>