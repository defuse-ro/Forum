<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span><?php echo e(trans('home')); ?></a></li>
                        <li><?php echo e(trans('categories')); ?></li>
                    </ul>
                    <h2 class="mb-2"><?php echo e(trans('categories')); ?></h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="categories" id="categories">

        <?php echo $__env->make('frontend.pagination.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div><!--/categories-->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script>

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "<?php echo e(url('categories/pagination/?page=')); ?>" + page,
            data: {},
            success: function(response) {
                $('#categories').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/categories.blade.php ENDPATH**/ ?>