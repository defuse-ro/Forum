

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?php echo e(route('home')); ?>">
  <span class="align-middle"><?php echo e(get_setting('site_name')); ?></span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                <?php echo e(trans('overview')); ?>

            </li>

            <li class="sidebar-item <?php echo e(Route::is('admin.dashboard') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle"><?php echo e(trans('dashboard')); ?></span>
                </a>
            </li>

            <li class="sidebar-header">
                <?php echo e(trans('forum')); ?>

            </li>

        <?php if(Auth::user()->role()->categories == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.categories.list') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.categories.list')); ?>">
                <i class="align-middle" data-feather="aperture"></i> <span class="align-middle"><?php echo e(trans('categories')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->badges == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.badges.list') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.badges.list')); ?>">
                <i class="align-middle" data-feather="award"></i> <span class="align-middle"><?php echo e(trans('badges')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->posts == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.posts.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.posts.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.posts.list')); ?>">
                <i class="align-middle" data-feather="columns"></i> <span class="align-middle"><?php echo e(trans('posts')); ?></span>
                </a>
            </li>
            <li class="sidebar-item <?php echo e(Route::is('admin.tags.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.tags.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.tags.list')); ?>">
                <i class="align-middle" data-feather="tag"></i> <span class="align-middle"><?php echo e(trans('tags')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->comments == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.comments.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.comments.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.comments.list')); ?>">
                <i class="align-middle" data-feather="menu"></i> <span class="align-middle"><?php echo e(trans('comments')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->replies == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.replies.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.replies.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.replies.list')); ?>">
                <i class="align-middle" data-feather="copy"></i> <span class="align-middle"><?php echo e(trans('replies')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->chats == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.chats') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.chats.messages') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.chats')); ?>">
                <i class="align-middle" data-feather="message-square"></i> <span class="align-middle"><?php echo e(trans('chats')); ?></span>
                </a>
            </li>
        <?php endif; ?>

            <li class="sidebar-header"><?php echo e(trans('moderation')); ?></li>
         <?php if(Auth::user()->role()->reports == 1): ?>
            <li class="sidebar-item nav-item nav-item-has-children <?php echo e(Route::is('admin.reports.users') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.reports.posts') ? 'active' : ''); ?> <?php echo e(Route::is('admin.reports.comments') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.reports.replies') ? 'active' : ''); ?>">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon"><i class="align-middle" data-feather="flag"></i></span>
                <span class="align-middle ms-1"><?php echo e(trans('reports')); ?></span>
                </a>
                <ul id="ddmenu_1" class="collapse dropdown-nav">
                    <li><a href="<?php echo e(route('admin.reports.users')); ?>"><i class="lni lni-arrow-right"></i> <?php echo e(trans('users')); ?> <?php echo e(trans('reports')); ?></a></li>
                </ul>
                <ul id="ddmenu_1" class="collapse dropdown-nav">
                    <li><a href="<?php echo e(route('admin.reports.posts')); ?>"><i class="lni lni-arrow-right"></i> <?php echo e(trans('posts')); ?> <?php echo e(trans('reports')); ?></a></li>
                </ul>
                <ul id="ddmenu_1" class="collapse dropdown-nav">
                    <li><a href="<?php echo e(route('admin.reports.comments')); ?>"><i class="lni lni-arrow-right"></i> <?php echo e(trans('comments')); ?> <?php echo e(trans('reports')); ?></a></li>
                </ul>
                <ul id="ddmenu_1" class="collapse dropdown-nav">
                    <li><a href="<?php echo e(route('admin.reports.replies')); ?>"><i class="lni lni-arrow-right"></i> <?php echo e(trans('replies')); ?> <?php echo e(trans('reports')); ?></a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->ban_durations == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.bandurations.list') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.bandurations.list')); ?>">
                <i class="align-middle" data-feather="slash"></i> <span class="align-middle"><?php echo e(trans('ban_durations')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->banned_users == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.banned.users') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.banned.users')); ?>">
                <i class="align-middle" data-feather="x"></i> <span class="align-middle"><?php echo e(trans('banned_users')); ?></span>
                </a>
            </li>
        <?php endif; ?>


        <?php if(Auth::user()->role()->plans == 1): ?>
            <li class="sidebar-header"><?php echo e(trans('payments')); ?></li>
            <li class="sidebar-item <?php echo e(Route::is('admin.plans.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.plans.add') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.plans.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.plans.list')); ?>">
                <i class="align-middle" data-feather="wind"></i> <span class="align-middle"><?php echo e(trans('plans')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->buy_points == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.buypoints.list') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.buypoints.list')); ?>">
                <i class="align-middle" data-feather="copy"></i> <span class="align-middle"><?php echo e(trans('buy_points')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->deposits == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.deposits') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.deposits')); ?>">
                <i class="align-middle" data-feather="list"></i> <span class="align-middle"><?php echo e(trans('deposits')); ?></span>
                </a>
            </li>
         <?php endif; ?>
        <?php if(Auth::user()->role()->subscriptions == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.subscriptions') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.subscriptions')); ?>">
                <i class="align-middle" data-feather="shuffle"></i> <span class="align-middle"><?php echo e(trans('subscriptions')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->tips == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.tips') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.tips')); ?>">
                <i class="align-middle" data-feather="send"></i> <span class="align-middle"><?php echo e(trans('tips')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->withdrawals == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.withdrawals') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.withdrawals')); ?>">
                <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle"><?php echo e(trans('withdrawals')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->transactions == 1): ?>
            <li class="sidebar-item  <?php echo e(Route::is('admin.transactions') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.transactions')); ?>">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle"><?php echo e(trans('transactions')); ?></span>
                </a>
            </li>
        <?php endif; ?>

            <li class="sidebar-header">
                <?php echo e(trans('account')); ?>

            </li>

            <li class="sidebar-item <?php echo e(Route::is('admin.profile') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.profile')); ?>">
                 <i class="align-middle" data-feather="user"></i> <span class="align-middle"><?php echo e(trans('profile')); ?></span>
                </a>
            </li>
        <?php if(Auth::user()->role()->users == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.users.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.user') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.users.list')); ?>">
                 <i class="align-middle" data-feather="users"></i> <span class="align-middle"><?php echo e(trans('users')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->roles == 1): ?>
            <li class="sidebar-item
            <?php echo e(Route::is('admin.roles.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.roles.add') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.roles.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.roles.list')); ?>">
                 <i class="align-middle" data-feather="trello"></i> <span class="align-middle"><?php echo e(trans('roles')); ?> & <?php echo e(trans('permissions')); ?></span>
                </a>
            </li>
        <?php endif; ?>


        <?php if(Auth::user()->role()->pages == 1): ?>
            <li class="sidebar-header">CMS</li>
            <li class="sidebar-item
            <?php echo e(Route::is('admin.pages.list') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.pages.add') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.pages.edit') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.pages.list')); ?>">
                <i class="align-middle" data-feather="align-left"></i> <span class="align-middle"><?php echo e(trans('pages')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->faqs == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.faqs.list') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.faqs.list')); ?>">
                <i class="align-middle" data-feather="list"></i> <span class="align-middle"><?php echo e(trans('faqs')); ?></span>
                </a>
            </li>
        <?php endif; ?>

        <?php if(Auth::user()->role()->site_settings == 1): ?>
            <li class="sidebar-header"><?php echo e(trans('settings')); ?></li>
            <li class="sidebar-item <?php echo e(Route::is('admin.settings.site') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.settings.forum') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.settings.points') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.settings.site')); ?>">
                <i class="align-middle" data-feather="check-square"></i> <span class="align-middle"><?php echo e(trans('site')); ?> <?php echo e(trans('settings')); ?></span>
                </a>
            </li>
        <?php endif; ?>
         <?php if(Auth::user()->role()->gateways == 1): ?>
            <li class="sidebar-item
            <?php echo e(Route::is('admin.gateways.paypal') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.gateways.stripe') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.gateways.paypal')); ?>">
                  <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle"><?php echo e(trans('payment_gateways')); ?></span>
                </a>
            </li>
        <?php endif; ?>
         <?php if(Auth::user()->role()->language == 1): ?>
            <li class="sidebar-item
            <?php echo e(Route::is('admin.languages.index') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.languages.edit') ? 'active' : ''); ?>

            <?php echo e(Route::is('admin.languages.default') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.languages.index')); ?>">
                <i class="align-middle" data-feather="globe"></i> <span class="align-middle"><?php echo e(trans('languages')); ?> <?php echo e(trans('settings')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role()->mail == 1): ?>
            <li class="sidebar-item <?php echo e(Route::is('admin.settings.mail') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.settings.mail')); ?>">
                <i class="align-middle" data-feather="mail"></i> <span class="align-middle"><?php echo e(trans('mail')); ?> <?php echo e(trans('settings')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        </ul>

    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/layouts/admin-partials/sidebar.blade.php ENDPATH**/ ?>