<?php $__env->startSection('content'); ?>


    <div class="d-flex justify-content-between mb-5" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-chat-left-dots me-2"></i> Comments</h4>
        <a href="<?php echo e(route('home.posts')); ?>" class="btn btn-sm btn-mint rounded-pill"><i class="bi bi-plus-circle-dotted me-2"></i>Add Comment</a>
    </div>

    <div class="comments" id="comments">
        <?php echo $__env->make('frontend.pagination.user.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!--/comments-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>


    $(document).on('click', '#user_comments .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "<?php echo e(url('user/comments/pagination/?page=')); ?>" + page,
            data: {},
            success: function(response) {
                $('#comments').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });

    });

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/posts/comments.blade.php ENDPATH**/ ?>