<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/prism/prism.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="[{ route('home') }]"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li><a href="<?php echo e(route('home.post', ['post_id' => $comment->post->post_id, 'slug' => $comment->post->slug])); ?>">Back to Post</a></li>
                        <li>Edit Comment</li>
                    </ul>
                    <h2 class="mb-2">Edit Comment</h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="comment-form" data-aos="fade-up" data-aos-easing="linear">
        <h3 class="comment-form-title">Edit Comment</h3>
        <form id="edit_comment_form" method="POST">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo e($comment->id); ?>">

           <div class="row">
              <div class="col-lg-12 d-flex mb-4">
                <div class="comment-form-avatar d-none d-sm-block">
                    <img src="<?php echo e(Auth::check() == null ? my_asset('uploads/users/avatar.jpg') : my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="User">
                </div>
                 <div class="comment-input">

                    <p class="small mb-3">* Here is a List of Sites you can embed video from <a href="https://noembed.com/#supported-sites" target="_blank">List of Sites</a> </p>

                    <div class="form-group">
                        <textarea name="bodyComment" id="bodyComment" rows="5" placeholder="Edit your comment ..."><?php echo e($comment->body); ?></textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="comment-btn mt-3">
                        <button type="submit" class="btn btn-mint" id="edit_comment_btn">Edit comment</button>
                    </div>

                 </div>
              </div>
           </div>
        </form>
    </div>


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

        $('#bodyComment').trumbowyg({
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


     // add comment ajax request
     $(document).on('submit', '#edit_comment_form', function(e) {
       e.preventDefault();

       const fd = new FormData(this);
       $("#edit_comment_btn").text('Posting Comment...');
       $.ajax({
         url: '<?php echo e(route('user.comments.edit', ['id' => $comment->id])); ?>',
         method: 'post',
         data: fd,
         cache: false,
         contentType: false,
         processData: false,
         dataType: 'json',
         success: function(response) {

           if (response.status == 400) {

               showError('bodyComment', response.messages.bodyComment);
               $("#edit_comment_btn").text('Post Comment');

           }else if (response.status == 200) {

               tata.success("Success", response.messages, {
               position: 'tr',
               duration: 3000,
               animate: 'slide'
               });

               removeValidationClasses("#edit_comment_form");
               $("#edit_comment_form")[0].reset();
               window.location.reload();

           }else if(response.status == 401){

               tata.error("Error", response.messages, {
               position: 'tr',
               duration: 3000,
               animate: 'slide'
               });

               $("#edit_comment_form")[0].reset();
               window.location.reload();

           }else if(response.status == 402){

                tata.error("Error", response.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                });

                $("#edit_comment_form")[0].reset();

            }

         }
       });
     });


    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/comments/edit.blade.php ENDPATH**/ ?>