<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-bookmark-check me-2"></i> Bookmarks</h4>
    </div>


    <div class="bookmarks" id="bookmarks">
        <?php echo $__env->make('frontend.pagination.user.bookmarks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!--/replies-->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>
    $(document).on('click', '#user_bookmarks .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "<?php echo e(url('user/bookmarks/pagination/?page=')); ?>" + page,
            data: {},
            success: function(response) {
                $('#bookmarks').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/bookmarks/index.blade.php ENDPATH**/ ?>