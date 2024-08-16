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
                <a class="nav-link <?php echo e(Route::is('admin.roles.list') ? 'active' : ''); ?>

                <?php echo e(Route::is('admin.roles.edit') ? 'active' : ''); ?>" href="<?php echo e(route('admin.roles.list')); ?>">
                    <i class="align-middle me-1" data-feather="layers"></i> Roles </a>
                </li>
                <li class="nav-item">
                <a class="nav-link
                <?php echo e(Route::is('admin.roles.add') ? 'active' : ''); ?>" href="<?php echo e(route('admin.roles.add')); ?>">
                    <i class="align-middle me-1" data-feather="plus-square"></i> Add Role</a>
                </li>
            </ul>
            </div>
         </div>

        </div>

      <div class="col-lg-9">
        <?php if(Route::is('admin.roles.list') ): ?>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h4 mb-0">Roles</h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable_cms" class="table table-bordered table-reload">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th class="text-right">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($key+1)); ?></td>
                                        <td><?php echo e($role->name); ?></td>
                                        <td>
                                            <?php if($role->categories == 1): ?>
                                                <span class="badge bg-success">Categories</span>
                                            <?php endif; ?>
                                            <?php if($role->badges == 1): ?>
                                                <span class="badge bg-success">Badges</span>
                                            <?php endif; ?>
                                            <?php if($role->posts == 1): ?>
                                                <span class="badge bg-success">Posts</span>
                                            <?php endif; ?>
                                            <?php if($role->comments == 1): ?>
                                                <span class="badge bg-success">Comments</span>
                                            <?php endif; ?>
                                            <?php if($role->replies == 1): ?>
                                                <span class="badge bg-success">Replies</span>
                                            <?php endif; ?>
                                            <?php if($role->chats == 1): ?>
                                                <span class="badge bg-success">Chats</span>
                                            <?php endif; ?>
                                            <?php if($role->reports == 1): ?>
                                                <span class="badge bg-success">Reports</span>
                                            <?php endif; ?>
                                            <?php if($role->ban_durations == 1): ?>
                                                <span class="badge bg-success">Ban Durations</span>
                                            <?php endif; ?>
                                            <?php if($role->banned_users == 1): ?>
                                                <span class="badge bg-success">Banned Users</span>
                                            <?php endif; ?>
                                            <?php if($role->plans == 1): ?>
                                                <span class="badge bg-success">Plans</span>
                                            <?php endif; ?>
                                            <?php if($role->buy_points == 1): ?>
                                                <span class="badge bg-success">Buy Points</span>
                                            <?php endif; ?>
                                            <?php if($role->deposits == 1): ?>
                                                <span class="badge bg-success">Deposits</span>
                                            <?php endif; ?>
                                            <?php if($role->subscriptions == 1): ?>
                                                <span class="badge bg-success">Subscriptions</span>
                                            <?php endif; ?>
                                            <?php if($role->tips == 1): ?>
                                                <span class="badge bg-success">Tips</span>
                                            <?php endif; ?>
                                            <?php if($role->withdrawals == 1): ?>
                                                <span class="badge bg-success">Withdrawals</span>
                                            <?php endif; ?>
                                            <?php if($role->transactions == 1): ?>
                                                <span class="badge bg-success">Transactions</span>
                                            <?php endif; ?>
                                            <?php if($role->users == 1): ?>
                                                <span class="badge bg-success">Users</span>
                                            <?php endif; ?>
                                            <?php if($role->roles == 1): ?>
                                                <span class="badge bg-success">Roles</span>
                                            <?php endif; ?>
                                            <?php if($role->pages == 1): ?>
                                                <span class="badge bg-success">Pages</span>
                                            <?php endif; ?>
                                            <?php if($role->faqs == 1): ?>
                                                <span class="badge bg-success">Faqs</span>
                                            <?php endif; ?>
                                            <?php if($role->site_settings == 1): ?>
                                                <span class="badge bg-success">Site Settings</span>
                                            <?php endif; ?>
                                            <?php if($role->gateways == 1): ?>
                                                <span class="badge bg-success">Gateways</span>
                                            <?php endif; ?>
                                            <?php if($role->language == 1): ?>
                                                <span class="badge bg-success">Language</span>
                                            <?php endif; ?>
                                            <?php if($role->mail == 1): ?>
                                                <span class="badge bg-success">Mail</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-right">

                                            <a  href="<?php echo e(route('admin.roles.edit', $role->id)); ?>" class="btn btn-soft-success btn-icon btn-circle btn-sm btn icon editIcon" title="Edit">
                                                <i class="align-middle" data-feather="edit-2"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" title="Delete"
                                            onclick="delete_item('<?php echo e(route('admin.roles.destroy')); ?>','<?php echo e($role->id); ?>','Delete this Role?');">
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

        <?php elseif(Route::is('admin.roles.add') ): ?>

            <div class="card-style settings-card-2 mb-5">
                <form id="add_role_form" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row px-3 py-3">
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label for="name">Role Name</label>
                                <input name="name" id="name" type="text" placeholder="Role Name">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <h4 class="mb-3">Permissions</h4>
                        <hr>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="categories" class="custom-control-input" value="1" id="categories">
                                    <label class="custom-control-label" for="categories">Categories</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="badges" class="custom-control-input" value="1" id="badges">
                                    <label class="custom-control-label" for="badges">Badges</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="posts" class="custom-control-input" value="1" id="posts">
                                    <label class="custom-control-label" for="posts">Posts</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="comments" class="custom-control-input" value="1" id="comments">
                                    <label class="custom-control-label" for="comments">Comments</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="replies" class="custom-control-input" value="1" id="replies">
                                    <label class="custom-control-label" for="replies">Replies</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="chats" class="custom-control-input" value="1" id="chats">
                                    <label class="custom-control-label" for="chats">Chats</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="reports" class="custom-control-input" value="1" id="reports">
                                    <label class="custom-control-label" for="reports">Reports</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="ban_durations" class="custom-control-input" value="1" id="ban_durations">
                                    <label class="custom-control-label" for="ban_durations">Ban Durations</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="banned_users" class="custom-control-input" value="1" id="banned_users">
                                    <label class="custom-control-label" for="banned_users">Banned Users</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="plans" class="custom-control-input" value="1" id="plans">
                                    <label class="custom-control-label" for="plans">Plans</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="buy_points" class="custom-control-input" value="1" id="buy_points">
                                    <label class="custom-control-label" for="buy_points"> Buy Points</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="deposits" class="custom-control-input" value="1" id="deposits">
                                    <label class="custom-control-label" for="deposits"> Deposits</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="subscriptions" class="custom-control-input" value="1" id="subscriptions">
                                    <label class="custom-control-label" for="subscriptions"> Subscriptions</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="tips" class="custom-control-input" value="1" id="tips">
                                    <label class="custom-control-label" for="tips"> Tips</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="withdrawals" class="custom-control-input" value="1" id="withdrawals">
                                    <label class="custom-control-label" for="withdrawals"> Withdrawals</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="transactions" class="custom-control-input" value="1" id="transactions">
                                    <label class="custom-control-label" for="transactions"> Transactions</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="users" class="custom-control-input" value="1" id="users">
                                    <label class="custom-control-label" for="users"> Users</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="roles" class="custom-control-input" value="1" id="roles">
                                    <label class="custom-control-label" for="roles"> Roles</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="pages" class="custom-control-input" value="1" id="pages">
                                    <label class="custom-control-label" for="pages"> Pages</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="faqs" class="custom-control-input" value="1" id="faqs">
                                    <label class="custom-control-label" for="faqs"> Faqs</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="site_settings" class="custom-control-input" value="1" id="site_settings">
                                    <label class="custom-control-label" for="site_settings"> Site Settings</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="gateways" class="custom-control-input" value="1" id="gateways">
                                    <label class="custom-control-label" for="gateways"> Payment Gateways</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="language" class="custom-control-input" value="1" id="language">
                                    <label class="custom-control-label" for="language"> Languages</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="mail" class="custom-control-input" value="1" id="mail">
                                    <label class="custom-control-label" for="mail"> Mail Settings</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover" id="add_role_btn">Submit</button>
                        </div>

                    </div>

                </form>
            </div>

        <?php elseif(Route::is('admin.roles.edit') ): ?>

            <div class="card-style settings-card-2 mb-5">
                <form id="edit_role_form" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" id="id" value="<?php echo e($role->id); ?>">

                    <div class="row px-3 py-3">
                        <div class="col-lg-6">
                            <div class="input-style-1">
                                <label for="name">Role Name</label>
                                <input name="name" id="name" type="text" value="<?php echo e($role->name); ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <h4 class="mb-3">Permissions</h4>
                        <hr>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="categories" class="custom-control-input" value="1" id="categories"
                                    <?php echo e($role->categories == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="categories">Categories</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="badges" class="custom-control-input" value="1" id="badges"
                                    <?php echo e($role->badges == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="badges">Badges</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="posts" class="custom-control-input" value="1" id="posts"
                                    <?php echo e($role->posts == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="posts">Posts</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="comments" class="custom-control-input" value="1" id="comments"
                                    <?php echo e($role->comments == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="comments">Comments</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="replies" class="custom-control-input" value="1" id="replies"
                                    <?php echo e($role->replies == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="replies">Replies</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="chats" class="custom-control-input" value="1" id="chats"
                                    <?php echo e($role->chats == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="chats">Chats</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="reports" class="custom-control-input" value="1" id="reports"
                                    <?php echo e($role->reports == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="reports">Reports</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="ban_durations" class="custom-control-input" value="1" id="ban_durations"
                                    <?php echo e($role->ban_durations == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="ban_durations">Ban Durations</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="banned_users" class="custom-control-input" value="1" id="banned_users"
                                    <?php echo e($role->banned_users == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="banned_users">Banned Users</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="plans" class="custom-control-input" value="1" id="plans"
                                    <?php echo e($role->plans == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="plans">Plans</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="buy_points" class="custom-control-input" value="1" id="buy_points"
                                    <?php echo e($role->buy_points == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="buy_points"> Buy Points</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="deposits" class="custom-control-input" value="1" id="deposits"
                                    <?php echo e($role->deposits == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="deposits"> Deposits</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="subscriptions" class="custom-control-input" value="1" id="subscriptions"
                                    <?php echo e($role->subscriptions == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="subscriptions"> Subscriptions</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="tips" class="custom-control-input" value="1" id="tips"
                                    <?php echo e($role->tips == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="tips"> Tips</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="withdrawals" class="custom-control-input" value="1" id="withdrawals"
                                    <?php echo e($role->withdrawals == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="withdrawals"> Withdrawals</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="transactions" class="custom-control-input" value="1" id="transactions"
                                    <?php echo e($role->transactions == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="transactions"> Transactions</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="users" class="custom-control-input" value="1" id="users"
                                    <?php echo e($role->users == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="users"> Users</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="roles" class="custom-control-input" value="1" id="roles"
                                    <?php echo e($role->roles == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="roles"> Roles</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="pages" class="custom-control-input" value="1" id="pages"
                                    <?php echo e($role->pages == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="pages"> Pages</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="faqs" class="custom-control-input" value="1" id="faqs"
                                    <?php echo e($role->faqs == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="faqs"> Faqs</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="site_settings" class="custom-control-input" value="1" id="site_settings"
                                    <?php echo e($role->site_settings == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="site_settings"> Site Settings</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="gateways" class="custom-control-input" value="1" id="gateways"
                                    <?php echo e($role->gateways == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="gateways"> Payment Gateways</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="language" class="custom-control-input" value="1" id="language"
                                    <?php echo e($role->language == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="language"> Languages</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch prefrence-item ml-10 mt-25">
                                    <input type="checkbox" name="mail" class="custom-control-input" value="1" id="mail"
                                    <?php echo e($role->mail == '1' ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="mail"> Mail Settings</label>
                                    <p class="text-muted mb-2"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                        <button type="submit" class="main-btn primary-btn btn-hover" id="edit_role_btn">Submit</button>
                        </div>

                    </div>

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
    //Add Role
    $(document).on('submit', '#add_role_form', function(e) {
      e.preventDefault();
      start_load();
      const fd = new FormData(this);
      $("#add_role_btn").text('Adding...');
      $.ajax({
        url: '<?php echo e(route('admin.roles.add')); ?>',
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
              $("#add_role_btn").text('Add Role');

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

    //Edit Role
    $(document).on('submit', '#edit_role_form', function(e) {
      e.preventDefault();
      start_load();
      const fd = new FormData(this);
      $("#edit_role_btn").text('Updating...');
      $.ajax({
        url: '<?php echo e(route('admin.roles.update')); ?>',
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
              $("#edit_role_btn").text('Submit');

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>