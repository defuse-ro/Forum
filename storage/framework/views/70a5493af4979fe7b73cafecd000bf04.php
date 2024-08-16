<?php $__env->startSection('content'); ?>

<main class="content">
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
      <div class="row mt-50">

        <div class="col-12">
            <?php if(Route::is('admin.plans.list')): ?>
                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between mb-10">
                            <h5 class="h4 mb-3">Plans</h5>
                            <div>
                                <a href="<?php echo e(route('admin.plans.add')); ?>" class="btn btn-success mb-0">+ Add Plans</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-4 mb-5">
                            <div class="price">
                                <div class="price-title">
                                    <h4><?php echo e($plan->name); ?></h4>
                                    <h2><span><b><?php echo e(get_setting('currency_symbol')); ?><?php echo e($plan->price); ?></b>/<?php echo e($plan->duration); ?></span></h3>
                                </div>
                                <div class="price-list">
                                    <ul>
                                    <li><i class="bi bi-check2"></i> <?php echo e($plan->points); ?> Points Topup</li>
                                    <li><i class="bi <?php echo e($plan->verified == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Verified Checkmark</li>
                                    <li><i class="bi <?php echo e($plan->categories == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Access to Pro Categories</li>
                                    <li><i class="bi <?php echo e($plan->tips == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Access to Tips/Donations</li>
                                    <li><i class="bi <?php echo e($plan->comments == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Allow/Close Comments on Posts</li>
                                    <li><i class="bi <?php echo e($plan->reactions == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Show/Hide Reactions/Likes on Posts</li>
                                    <li><i class="bi <?php echo e($plan->followers == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Allow user to post discussions to Only Followers</li>
                                    <li><i class="bi <?php echo e($plan->messages == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Mute Chat Messages</li>
                                    <li><i class="bi <?php echo e($plan->users == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> Block Users</li>
                                    <li><i class="bi <?php echo e($plan->viewers == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> View Profile Visitors</li>
                                    <li><i class="bi <?php echo e($plan->ads == '1' ? 'bi-check2' : 'bi-x'); ?> "></i> No Ads</li>
                                    </ul>
                                </div>
                                <div class="mt-3">
                                    <a href="<?php echo e(route('admin.plans.edit', ['id' => $plan->id])); ?>" class="btn btn-success">Edit</a>
                                    <a href="javascript:void(0)" onclick="delete_item('<?php echo e(route('admin.plans.destroy')); ?>','<?php echo e($plan->id); ?>','Delete Plan?');" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-lg-6">
                            <div class="price">
                                <h4>No Plans Available</h4>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            <?php elseif(Route::is('admin.plans.add')): ?>

                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between mb-10">
                            <h5 class="h4 mb-3">Plans</h5>
                            <div>
                                <a href="<?php echo e(route('admin.plans.list')); ?>" class="btn btn-success mb-0">Plans List</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-style settings-card-2 mb-5">
                    <form id="add_plan_form" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="row px-3 py-3">
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="name">Plan Name</label>
                                    <input name="name" id="name" type="text" placeholder="Plan Name" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="price">Plan Price</label>
                                    <input name="price" id="price" type="number" placeholder="Plan Price" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="select-style-1">
                                    <label for="duration">Duration</label>
                                    <div class="select-position">
                                        <select name="duration" id="duration" class="form-select form-control">
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Yearly">Yearly</option>
                                            <option value="Lifetime">Lifetime</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="points">Points Topup</label>
                                    <input name="points" id="points" type="number" placeholder="Points Topup" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="verified" class="custom-control-input" value="1" id="verified">
                                        <label class="custom-control-label" for="verified">Verified Checkmark</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="categories" class="custom-control-input" value="1" id="categories">
                                        <label class="custom-control-label" for="categories">Access to Pro Categories</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="tips" class="custom-control-input" value="1" id="tips">
                                        <label class="custom-control-label" for="tips">Access to Tips/Donations</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="comments" class="custom-control-input" value="1" id="comments">
                                        <label class="custom-control-label" for="comments">Allow/Close Comments</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="reactions" class="custom-control-input" value="1" id="reactions">
                                        <label class="custom-control-label" for="reactions">Show/Hide Reactions</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="followers" class="custom-control-input" value="1" id="followers">
                                        <label class="custom-control-label" for="followers">Allow user to post discussions to Only Followers</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="messages" class="custom-control-input" value="1" id="messages">
                                        <label class="custom-control-label" for="messages">Mute Chat Messages</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="users" class="custom-control-input" value="1" id="users">
                                        <label class="custom-control-label" for="users">Block Users</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="viewers" class="custom-control-input" value="1" id="viewers">
                                        <label class="custom-control-label" for="viewers">View Profile Viewers</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="ads" class="custom-control-input" value="1" id="ads">
                                        <label class="custom-control-label" for="ads"> No Ads</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="order">Order</label>
                                    <input name="order" id="order" type="number" placeholder="Order" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="select-style-1">
                                    <label for="status">Status</label>
                                    <div class="select-position">
                                        <select name="status" id="status" class="form-select form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                            <button type="submit" class="main-btn primary-btn btn-hover" id="add_plan_btn">Submit</button>
                            </div>

                        </div>

                    </form>
                </div>

            <?php elseif(Route::is('admin.plans.edit')): ?>

                <div class="card">
                    <div class="card-header">

                        <div class="d-md-flex justify-content-between mb-10">
                            <h5 class="h4 mb-3">Edit Plan</h5>
                            <div>
                                <a href="<?php echo e(route('admin.plans.list')); ?>" class="btn btn-success mb-0">Plans List</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-style settings-card-2 mb-5">
                    <form id="edit_plan_form" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" id="id" value="<?php echo e($plan->id); ?>">

                        <div class="row px-3 py-3">
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="name">Plan Name</label>
                                    <input name="name" id="name" type="text" value="<?php echo e($plan->name); ?>">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="price">Plan Price</label>
                                    <input name="price" id="price" type="number" value="<?php echo e($plan->price); ?>">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="select-style-1">
                                    <label for="duration">Duration</label>
                                    <div class="select-position">
                                        <select name="duration" id="duration" class="form-select form-control">
                                            <option value="Monthly" <?php echo e($plan->duration == 'Monthly' ? 'selected="selected"' : ''); ?>>Monthly</option>
                                            <option value="Quarterly" <?php echo e($plan->duration == 'Quarterly' ? 'selected="selected"' : ''); ?>>Quarterly</option>
                                            <option value="Yearly" <?php echo e($plan->duration == 'Yearly' ? 'selected="selected"' : ''); ?>>Yearly</option>
                                            <option value="Lifetime" <?php echo e($plan->duration == 'Lifetime' ? 'selected="selected"' : ''); ?>>Lifetime</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="points">Points Topup</label>
                                    <input name="points" id="points" type="number" value="<?php echo e($plan->points); ?>" >
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="verified" class="custom-control-input" value="1" id="verified" <?php echo e($plan->verified == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="verified">Verified Checkmark</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="categories" class="custom-control-input" value="1" id="categories" id="verified" <?php echo e($plan->categories == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="categories">Access to Pro Categories</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="tips" class="custom-control-input" value="1" id="tips" <?php echo e($plan->tips == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="tips">Access to Tips/Donations</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="comments" class="custom-control-input" value="1" id="comments" <?php echo e($plan->comments == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="comments">Allow/Close Comments</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="reactions" class="custom-control-input" value="1" id="reactions" <?php echo e($plan->reactions == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="reactions">Show/Hide Reactions</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="followers" class="custom-control-input" value="1" id="followers" <?php echo e($plan->followers == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="followers">Allow user to post discussions to Only Followers</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="messages" class="custom-control-input" value="1" id="messages" <?php echo e($plan->messages == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="messages">Mute Chat Messages</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="users" class="custom-control-input" value="1" id="users" <?php echo e($plan->users == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="users">Block Users</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="viewers" class="custom-control-input" value="1" id="viewers" <?php echo e($plan->viewers == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="viewers">View Profile Viewers</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                        <input type="checkbox" name="ads" class="custom-control-input" value="1" id="ads" <?php echo e($plan->ads == '1' ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="ads"> No Ads</label>
                                        <p class="text-muted mb-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label for="order">Order</label>
                                    <input name="order" id="order" type="number" value="<?php echo e($plan->order); ?>" />
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="select-style-1">
                                    <label for="status">Status</label>
                                    <div class="select-position">
                                        <select name="status" id="status" class="form-select form-control">
                                            <option value="1" <?php echo e($plan->status == '1' ? 'selected="selected"' : ''); ?>>Active</option>
                                            <option value="0" <?php echo e($plan->status == '0' ? 'selected="selected"' : ''); ?>>Not Active</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                            <button type="submit" class="main-btn primary-btn btn-hover" id="edit_plan_btn">Submit</button>
                            </div>

                        </div>

                    </form>
                </div>
            <?php endif; ?>
        </div>


      </div><!-- row -->
     </div><!-- container -->
    </section>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    //Add Plan
    $(document).on('submit', '#add_plan_form', function(e) {
      e.preventDefault();
      start_load();
      const fd = new FormData(this);
      $("#add_plan_btn").text('Adding...');
      $.ajax({
        url: '<?php echo e(route('admin.plans.add')); ?>',
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
              showError('price', response.messages.price);
              showError('points', response.messages.points);
              showError('order', response.messages.order);
              $("#add_plan_btn").text('Add Plan');

          }else if (response.status == 200) {

              tata.success("Success", response.messages, {
              position: 'tr',
              duration: 3000,
              animate: 'slide'
              });

              window.location.reload();

          }else if(response.status == 401){

              tata.error("Error", response.messages, {
              position: 'tr',
              duration: 3000,
              animate: 'slide'
              });

              window.location.reload();

          }

        }
      });
    });


    //Edit Plan
    $(document).on('submit', '#edit_plan_form', function(e) {
      e.preventDefault();
      start_load();
      const fd = new FormData(this);
      $("#edit_plan_btn").text('Updating...');
      $.ajax({
        url: '<?php echo e(route('admin.plans.update')); ?>',
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
              showError('price', response.messages.price);
              showError('points', response.messages.points);
              showError('order', response.messages.order);
              $("#edit_plan_btn").text('Submit');

          }else if (response.status == 200) {

              tata.success("Success", response.messages, {
              position: 'tr',
              duration: 3000,
              animate: 'slide'
              });

              window.location.reload();

          }else if(response.status == 401){

              tata.error("Error", response.messages, {
              position: 'tr',
              duration: 3000,
              animate: 'slide'
              });

              window.location.reload();

          }

        }
      });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/plans/index.blade.php ENDPATH**/ ?>