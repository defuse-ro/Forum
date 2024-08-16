

<div class="vine-sidebar position-sticky"

<?php if(get_setting('site_direction') == 'ltr'): ?>
    data-aos="fade-right" data-aos-easing="ease-in-sine"
<?php elseif(get_setting('site_direction') == 'rtl'): ?>
    data-aos="fade-left" data-aos-easing="ease-in-sine"
<?php endif; ?>>

    <div class="ps-3 d-flex align-items-center">

        <!-- Responsive navbar toggler -->
        <button class="navbar-toggler d-block d-xl-none btn btn-mint rounded-3 w-100" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2"
            aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="h5 me-5 text-white"> <i class="bi bi-back me-2"></i> <?php echo e(trans('sidebar')); ?></span>
            <span class="navbar-toggler-animation">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>
    </div>

  <div class="navbar-collapse d-xl-block collapse" id="navbarNav2">
    <ul class="navbar-nav flex-column">


     <li class="nav-item  <?php echo e(Route::is('home') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
        <span class="nav-icon-wrap"><i class="bi bi-house-door"></i></span>
        <span class="nav-link-text"><?php echo e(trans('home')); ?></span>
        </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('home.posts') ? 'active' : ''); ?>

     <?php echo e(Route::is('home.post') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('home.posts')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-list-task"></i></span>
         <span class="nav-link-text"><?php echo e(trans('discussions')); ?></span>
       </a>
     </li>
    <?php if(Auth::check()): ?>
        <li class="nav-item <?php echo e(Route::is('feed') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('feed')); ?>">
            <span class="nav-icon-wrap"><i class="bi bi-rss"></i></span>
            <span class="nav-link-text"><?php echo e(trans('feed')); ?></span>
        </a>
        </li>
    <?php endif; ?>
     <li class="nav-item <?php echo e(Route::is('users') ? 'active' : ''); ?>

     <?php echo e(Route::is('user') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.posts') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.comments') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.replies') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.followers') ? 'active' : ''); ?>

     <?php echo e(Route::is('user.following') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('users')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-people"></i></span>
         <span class="nav-link-text"><?php echo e(trans('users')); ?></span>
       </a>
     </li>
     <li class="nav-info"><?php echo e(trans('discover')); ?> </li>
     <li class="nav-item <?php echo e(Route::is('categories') ? 'active' : ''); ?> <?php echo e(Route::is('category') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('categories')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-back"></i></span>
         <span class="nav-link-text"><?php echo e(trans('categories')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('tags') ? 'active' : ''); ?> <?php echo e(Route::is('tag') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('tags')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-tags"></i></span>
         <span class="nav-link-text"><?php echo e(trans('tags')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('leaderboard') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('leaderboard')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-list-stars"></i></span>
         <span class="nav-link-text"><?php echo e(trans('leaderboard')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('stats') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('stats')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-columns-gap"></i></span>
         <span class="nav-link-text"><?php echo e(trans('stats')); ?> & <?php echo e(trans('online_users')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('plans') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('plans')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-credit-card-2-front"></i></span>
         <span class="nav-link-text"><?php echo e(trans('pricing_plans')); ?></span>
       </a>
     </li>
     <li class="nav-item <?php echo e(Route::is('points') ? 'active' : ''); ?>">
       <a class="nav-link" href="<?php echo e(route('points')); ?>">
         <span class="nav-icon-wrap"><i class="bi bi-file-ppt"></i></span>
         <span class="nav-link-text"><?php echo e(trans('earn')); ?>/<?php echo e(trans('buy_points')); ?></span>
       </a>
     </li>
     <li class="nav-info"><?php echo e(trans('categories')); ?> </li>
    <?php $__currentLoopData = App\Models\Admin\Categories::where('status', 1)->limit(get_setting('categories_widget'))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('category', ['slug' => $category->slug])); ?>">
                <span class="nav-icon-wrap">
                    <img src="<?php echo e(my_asset('uploads/categories/'.$category->image)); ?>" class="img-fluid rounded-2" alt="<?php echo e($category->name); ?>">
                </span>
                <span class="nav-link-text"><?php echo e($category->name); ?></span>
                <?php if($category->pro == 1): ?>
                    <span class="badge bg-red-mint ms-1"><?php echo e(trans('pro')); ?></span>
                <?php endif; ?>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <ul class="navbar-nav flex-column nav-trend mb-3 d-none d-lg-block" data-aos="fade-right" data-aos-easing="linear">
        <li class="nav-info"><?php echo e(trans('trending_posts')); ?> </li>
        <?php $__currentLoopData = App\Models\Posts::where('status', 1)->where('public', 1)->withCount('search_comments')->orderBy('search_comments_count', 'desc')->limit(get_setting('trending_posts_widget'))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <h4 class="nav-content">
                    <a href="<?php echo e(route('home.post', ['post_id' => $post->post_id, 'slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a></h4>
                <div class="view">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                    <div><?php echo e($post->comments()->count()); ?> <?php echo e(trans('comments')); ?> </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </ul>

    <?php if(Auth::check()): ?>
        <?php if(get_setting('ads') == 1): ?>
            <?php if(Auth::user()->subscription()->ads == 0): ?>
                <div class="sidebar-ad">
                    <?php echo get_setting('sidebar_ad'); ?>

                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if(get_setting('ads') == 1): ?>
            <div class="sidebar-ad">
                <?php echo get_setting('sidebar_ad'); ?>

            </div>
        <?php endif; ?>
    <?php endif; ?>


  </div>


</div><!--/social-sidebar-->
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/frontend-partials/sidebar.blade.php ENDPATH**/ ?>