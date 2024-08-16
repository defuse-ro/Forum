<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/ui/trumbowyg.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/colors/ui/trumbowyg.colors.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/emoji/ui/trumbowyg.emoji.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/giphy/ui/trumbowyg.giphy.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/prism/prism.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/trumbowyg/plugins/highlight/ui/trumbowyg.highlight.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(my_asset('assets/vendors/bootstrap-taginput/bootstrap-tagsinput.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h4 class="mb-0" data-aos="fade-down" data-aos-easing="linear"><i class="bi bi-plus-circle-dotted me-2"></i> <?php echo e(trans('edit_post')); ?></h4>

<div class="row g-0">
    <div class="col-12">
        <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
            <div class="dashboard-body">


                <form id="editpost_form" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="old_tags" id="old_tags" value="<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label class="form-label"><?php echo e(trans('title')); ?></label>
                            <input type="text" name="title" id="title" value="<?php echo e($post->title); ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label"><?php echo e(trans('description')); ?></label>
                            <textarea name="description" id="description" rows="4"><?php echo e($post->description); ?></textarea>
                            <div id="count"><?php echo e(trans('characters')); ?>: 400 </div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label"><?php echo e(trans('keywords')); ?></label>
                            <input type="text" name="keywords" id="keywords"  value="<?php echo e($post->keywords); ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label"><?php echo e(trans('categories')); ?></label>
                            <select name="category_id" id="category_id">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e($post->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label"><?php echo e(trans('tags')); ?></label>
                            <input type="text" name="tags" id="tags" data-role="tagsinput" value="<?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label"><?php echo e(trans('body')); ?></label>
                            <p class="small mb-3">* <?php echo e(trans('here_is_a_list_of_sites_you_can_embed_video_from')); ?> <a href="https://noembed.com/#supported-sites" target="_blank"><?php echo e(trans('list_of_sites')); ?></a> </p>
                            <textarea name="body" id="body" rows="4"><?php echo e($post->body); ?></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12">
                            <label><?php echo e(trans('status')); ?></label>
                            <div class="form-group">
                                <div class="form-check mb-2 me-2">
                                    <input type="radio" name="public" value="1" id="public1" <?php echo e($post->public == '1' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="public1">
                                        <?php echo e(trans('public')); ?>

                                    </label>
                                </div>
                            <?php if(Auth::user()->subscription()->followers === 1): ?>
                                <div class="form-check mb-2">
                                    <input type="radio" name="public" value="2" id="public2" <?php echo e($post->public == '2' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="public2">
                                        <?php echo e(trans('show_to_followers')); ?>

                                    </label>
                                </div>
                            <?php else: ?>
                                <span class="small text-danger ms-4"><?php echo e(trans('to_show_posts_only_to_followers')); ?>, <?php echo e(trans('subscribe_to_a_new_pricing_plan')); ?></span>
                            <?php endif; ?>
                                <div class="public-msg"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label><?php echo e(trans('comments')); ?> & <?php echo e(trans('replies')); ?></label>
                            <div class="form-group">
                                <div class="form-check mb-2 me-2">
                                    <input type="radio" name="comments" value="1" id="comments1" <?php echo e($post->comments == '1' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="comments1">
                                        <?php echo e(trans('allow')); ?>

                                    </label>
                                </div>
                            <?php if(Auth::user()->subscription()->comments === 1): ?>
                                <div class="form-check mb-2">
                                    <input type="radio" name="comments" value="2" id="comments2" <?php echo e($post->comments == '2' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="comments2">
                                        <?php echo e(trans('close')); ?>

                                    </label>
                                </div>
                            <?php else: ?>
                                <span class="small text-danger ms-4"><?php echo e(trans('to_close_comments_and_replies_on_posts')); ?>, <?php echo e(trans('subscribe_to_a_new_pricing_plan')); ?></span>
                            <?php endif; ?>

                                <div class="comments-msg"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label><?php echo e(trans('reactions')); ?> or <?php echo e(trans('likes')); ?></label>
                            <div class="form-group">
                                <div class="form-check mb-2 me-2">
                                    <input type="radio" name="likes" value="1" id="likes1" <?php echo e($post->likes == '1' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="likes1">
                                        <?php echo e(trans('show')); ?>

                                    </label>
                                </div>
                            <?php if(Auth::user()->subscription()->reactions === 1): ?>
                                <div class="form-check mb-2">
                                    <input type="radio" name="likes" value="2" id="likes2" <?php echo e($post->likes == '2' ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="likes2"><?php echo e(trans('hide')); ?></label>
                                </div>
                            <?php else: ?>
                                <span class="small text-danger ms-4"><?php echo e(trans('to_hide_reactions_or_likes_on_posts')); ?>, <?php echo e(trans('subscribe_to_a_new_pricing_plan')); ?></span>
                            <?php endif; ?>

                                <div class="likes-msg"></div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex pt-5">
                        <button type="submit" id="editpost_btn" class="btn btn-mint me-3"><?php echo e(trans('submit')); ?></button>
                    </div>
                </form>

            </div>
        </div><!--/dashboard-card-->
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(my_asset('assets/vendors/bootstrap-taginput/bootstrap-tagsinput.js')); ?>"></script>
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

        // update user ajax request
        $(document).on('submit', '#editpost_form', function(e) {
            e.preventDefault();
            start_load();
            const fd = new FormData(this);
            $("#editpost_btn").text('<?php echo e(trans('sending')); ?>...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '<?php echo e(route('user.posts.edit', ['id' => $post->id])); ?>',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    end_load();

                    if (response.status == 400) {

                        showError('title', response.messages.title);
                        showError('category_id', response.messages.category_id);
                        showError('tags', response.messages.tags);
                        showError('body', response.messages.body);

                        if($('#public1').prop('checked') || $('#public2').prop('checked')){
                            $(".public-msg").html("");
                        }else{
                            $(".public-msg").html("<span class='text-danger small'>"+ "<?php echo e(trans("please_choose_atleast_one")); ?></span>");
                        }
                        if($('#comments1').prop('checked') || $('#comments2').prop('checked')){
                            $(".comments-msg").html("");
                        }else{
                            $(".comments-msg").html("<span class='text-danger small'>"+ "<?php echo e(trans("please_choose_atleast_one")); ?></span>");
                        }
                        if($('#likes1').prop('checked') || $('#likes2').prop('checked')){
                            $(".likes-msg").html("");
                        }else{
                            $(".likes-msg").html("<span class='text-danger small'>"+ "<?php echo e(trans("please_choose_atleast_one")); ?></span>");
                        }
                        $("#editpost_btn").text('<?php echo e(trans('submit')); ?>');

                    }else if (response.status == 200) {

                        tata.success("Success", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        removeValidationClasses("#editpost_form");
                        $("#editpost_form")[0].reset();
                        window.location.reload();

                    }else if(response.status == 401){

                        tata.error("Error", response.messages, {
                        position: 'tr',
                        duration: 3000,
                        animate: 'slide'
                        });

                        $("#editpost_form")[0].reset();
                        window.location.reload();

                    }

                }
            });

        });


    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/posts/edit.blade.php ENDPATH**/ ?>