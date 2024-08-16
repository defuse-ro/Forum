<?php $__env->startSection('content'); ?>

<main class="content">
    <a href="<?php echo e(route('admin.users.list')); ?>" class="btn btn-success"><i class="align-middle" data-feather="arrow-left"></i> <?php echo e(trans('users')); ?></a>
    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
        <div class="row mt-50">


            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="author-wrap-ngh">
                    <?php if(Cache::has('user-is-online-' . $user->id)): ?>
                    <div class="online"><?php echo e(trans('online')); ?></div>
                    <?php endif; ?>
                    <div class="author-wrap-head-ngh">
                        <div class="author-wrap-ngh-thumb">
                            <img src="<?php echo e(my_asset('uploads/users/'.$user->image)); ?>" class="img-fluid circle" alt="avatar">
                        </div>
                        <div class="author-wrap-ngh-info">
                            <h5><?php echo e($user->name); ?></h5>
                            <div class="Goodup-location"><i class="align-middle" data-feather="map-pin"></i><?php echo e($user->location); ?>, <?php echo e($user->country); ?></div>
                        </div>
                    </div>

                    <div class="author-wrap-caption-ngh">
                        <div class="author-wrap-yuio-ngh">
                            <a href="<?php echo e(route('user', ['username' => $user->username])); ?>" class="btn btn-success full-width" target="_blank"><?php echo e(trans('view_profile')); ?></a>
                        </div>
                    </div>

                    <div class="author-wrap-footer-ngh">
                        <ul>
                            <li>
                                <div class="jhk-list-inf">
                                    <div class="jhk-list-inf-ico"><i class="align-middle" data-feather="eye"></i></div>
                                    <div class="jhk-list-inf-caption"><h5><?php echo e(trans('last_seen')); ?></h5><p><?php echo e(\Carbon\Carbon::parse($user->last_seen)->diffForHumans()); ?></p></div>
                                </div>
                            </li>
                            <li>
                                <div class="jhk-list-inf">
                                    <div class="jhk-list-inf-ico"><i class="align-middle" data-feather="log-in"></i></div>
                                    <div class="jhk-list-inf-caption"><h5><?php echo e(trans('joined')); ?></h5><p><?php echo e($user->created_at->format('F jS Y')); ?></p></div>
                                </div>
                            </li>
                            <li>
                                <div class="jhk-list-inf">
                                    <div class="jhk-list-inf-ico"><i class="align-middle" data-feather="droplet"></i></div>
                                    <div class="jhk-list-inf-caption"><h5><?php echo e(trans('profession')); ?></h5><p><?php echo e($user->profession); ?></p></div>
                                </div>
                            </li>
                            <li>
                                <div class="jhk-list-inf">
                                    <div class="jhk-list-inf-ico"><i class="align-middle" data-feather="layout"></i></div>
                                    <div class="jhk-list-inf-caption"><h5><?php echo e(trans('website')); ?></h5><p><?php echo e($user->website); ?></p></div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-12">
              <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e(get_setting('currency_symbol')); ?><?php echo e($earnings); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('earnings')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e(get_setting('currency_symbol')); ?><?php echo e($user->wallet); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('wallet')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3">
                                    <i class="bi bi-journals"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e($posts); ?></span> </h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('posts')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3 flex-shrink-0">
                                 <i class="bi bi-chat-left-dots"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e($comments); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('comments')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3">
                                    <i class="bi bi-chat-dots"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e($replies); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('replies')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3">
                                    <i class="bi bi-eye"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e($viewers); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('views')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3 flex-shrink-0">
                                 <i class="bi bi-person-plus"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e($user->followings->count()); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('following')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm icon-with-bg rounded-2 me-3 flex-shrink-0">
                                 <i class="bi bi-people"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h3 class="mt-0 mb-0"><span class="counter"><?php echo e($user->followers->count()); ?></span></h3>
                                    <p class="text-muted mb-0"><?php echo e(trans('followers')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>

        </div><!-- row -->
      </div><!-- container -->
  </section>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/users/user.blade.php ENDPATH**/ ?>