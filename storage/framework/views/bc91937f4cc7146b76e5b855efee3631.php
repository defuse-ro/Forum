

<div class="dash-sidebar position-sticky"

<?php if(get_setting('site_direction') == 'ltr'): ?>
    data-aos="fade-right" data-aos-easing="ease-in-sine"
<?php elseif(get_setting('site_direction') == 'rtl'): ?>
    data-aos="fade-left" data-aos-easing="ease-in-sine"
<?php endif; ?>>

    <div class="ps-3 d-flex align-items-center">
      <div class="media align-items-center">
          <div class="media-head me-2">
              <div class="avatar avatar-lg">
                  <img src="<?php echo e(my_asset('uploads/users/'.Auth::user()->image)); ?>" alt="user" class="avatar-img rounded-circle">
              </div>
          </div>
          <div class="media-body">
              <h5><?php echo e(Auth::user()->name); ?>

                <?php if(Auth::user()->verified == 1): ?>
                    <span class="verified-badge" data-bs-toggle="tooltip" aria-label="Verified User" data-bs-original-title="Verified User">
                    <i class="bi bi-patch-check"></i>
                    </span>
                <?php endif; ?>
              </h5>
              <p class="small mb-0"><?php echo e(trans('member_since')); ?> <?php echo e(Auth::user()->created_at->format('Y')); ?></p>
          </div>
      </div>

      <!-- Responsive navbar toggler -->
      <button class="navbar-toggler ms-auto d-block d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2"
          aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-animation user-backend">
              <span></span>
              <span></span>
              <span></span>
          </span>
      </button>
    </div>

  <div class="navbar-collapse d-xl-block collapse" id="navbarNav2">
    <ul class="navbar-nav flex-column">
     <li class="nav-info"><?php echo e(trans('dashboard')); ?> </li>
     <li class="nav-item <?php echo e(Route::is('user.overview') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.overview')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-speedometer"></i></span>
         <span class="nav-link-text"><?php echo e(trans('overview')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.posts.add') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.posts.list') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.posts.edit') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.posts.list')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-journals"></i></span>
         <span class="nav-link-text"><?php echo e(trans('posts')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.comments.list') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.comments.list')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-chat-left-dots"></i></span>
         <span class="nav-link-text"><?php echo e(trans('comments')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.replies.list') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.replies.list')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-chat-dots"></i></span>
         <span class="nav-link-text"><?php echo e(trans('replies')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.bookmarks') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.bookmarks')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-bookmarks"></i></span>
         <span class="nav-link-text"><?php echo e(trans('bookmarks')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.notifications') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.notifications')); ?>">
         <span class="nav-icon-wrap"><i class="b bi-bell"></i></span>
         <span class="nav-link-text"><?php echo e(trans('notifications')); ?></span>
         <span class="badge bg-red ms-auto"><?php echo e(Auth::user()->notification_count()); ?></span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="<?php echo e(route('user.chats')); ?>">
         <span class="nav-icon-wrap"><i class="b bi-chat-left-text"></i></span>
         <span class="nav-link-text"><?php echo e(trans('messages')); ?></span>
         <span class="badge bg-red ms-auto"><?php echo e(Auth::user()->messages_count()); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('followers') ? 'active' : ''); ?>

     <?php echo e(Route::is('following') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('followers')); ?>">
         <span class="nav-icon-wrap"><i class="b bi-people"></i></span>
         <span class="nav-link-text"><?php echo e(trans('followers')); ?> & <?php echo e(trans('following')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.blocks') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.blocks')); ?>">
         <span class="nav-icon-wrap"><i class="b bi-x-octagon"></i></span>
         <span class="nav-link-text"><?php echo e(trans('blocks')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('profile.viewers') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('profile.viewers')); ?>">
         <span class="nav-icon-wrap"><i class="b bi-ui-checks"></i></span>
         <span class="nav-link-text"><?php echo e(trans('profile_viewers')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.points') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.points')); ?>">
         <span class="nav-icon-wrap"><i class="b bi-file-ppt"></i></span>
         <span class="nav-link-text"><?php echo e(trans('points')); ?></span>
       </a>
     </li>
     <li class="nav-info"><?php echo e(trans('account')); ?> </li>
     <li class="nav-item <?php echo e(Route::is('user.profile') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.password') ? 'active' : ''); ?>  <?php echo e(Route::is('user.email-notifications') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.profile')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-gear"></i></span>
         <span class="nav-link-text"><?php echo e(trans('settings')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.wallet') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.wallet.invoice') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.wallet')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-wallet2"></i></span>
         <span class="nav-link-text"><?php echo e(trans('wallet')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.pricing') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.pricing')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-credit-card-2-front"></i></span>
         <span class="nav-link-text"><?php echo e(trans('pricing_plans')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.subscriptions') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.subscriptions.invoice') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.subscriptions')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-arrow-repeat"></i></span>
         <span class="nav-link-text"><?php echo e(trans('subscriptions')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.earnings') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.earnings')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-currency-dollar"></i></span>
         <span class="nav-link-text"><?php echo e(trans('earnings')); ?> & <?php echo e(trans('tips')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('user.withdrawals') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('user.withdrawals')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-piggy-bank"></i></span>
         <span class="nav-link-text"><?php echo e(trans('withdrawals')); ?></span>
       </a>
     </li>
    </ul>
  </div>


</div>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/frontend-partials/sidebar-dashboard.blade.php ENDPATH**/ ?>