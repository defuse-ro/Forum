
<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
      <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?php echo e(trans('languages')); ?></a>
                <div class="dropdown-menu">
                    <?php
                        $languages = get_all_languages();
                        $current_locale = App::currentLocale();
                    ?>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($lang === $current_locale): ?>
                            <span class="dropdown-item ml-2 mr-2 text-gray-700"><?php echo e(ucfirst($lang)); ?> <span class="badge bg-danger">Active</span></span>
                        <?php else: ?>
                            <a class="dropdown-item ml-1 underline ml-2 mr-2" href="<?php echo e(route('language.change', ['locale' => $lang])); ?>">
                                <span><?php echo e(ucfirst($lang)); ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

  <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
    <img src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" class="avatar img-fluid rounded me-1" alt="<?php echo e(Auth::user()->name); ?>" /> <span class="text-dark"><?php echo e(Auth::user()->name); ?></span>
  </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?php echo e(route('admin.settings.site')); ?>"><i class="align-middle me-1" data-feather="settings"></i> <?php echo e(trans('settings')); ?></a>
                    <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="align-middle me-1" data-feather="user"></i> <?php echo e(trans('profile')); ?></a>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(trans('logout')); ?></a>

                                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                      <?php echo csrf_field(); ?>
                                  </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/admin-partials/navbar.blade.php ENDPATH**/ ?>