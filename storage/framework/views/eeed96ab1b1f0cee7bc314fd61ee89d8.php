<?php $__env->startSection('content'); ?>

    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li>Feed</li>
                    </ul>
                    <h2 class="mb-2">Feed</h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->


    <div class="filter mx-0">

        <form class="form" id="search_form">
            <?php echo csrf_field(); ?>
            <div class="filter-toolbar">
                <div class="filter-item" id="userSort">
                    <label>User</label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-2x">
                           <li value="all" class="selected">All</li>
                        <?php $__currentLoopData = Auth::user()->followings()->with('followable')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li value="<?php echo e($following->followable->id); ?>">
                                <img src="<?php echo e(my_asset('uploads/users/'.$following->followable->image)); ?>" class="avatar avatar-xs rounded-circle" alt="alt">
                                <?php echo e($following->followable->name); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="filter-item" id="categorySort">
                    <label>Category</label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="category_id" id="category_id" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-2x">
                           <li value="all" class="selected">All</li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="filter-item" id="dateSort">
                    <label>Date</label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="date" id="date" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li value="all" class="selected">All </li>
                        <li value="today">Today</li>
                        <li value="week">Week </li>
                        <li value="month">Month </li>
                        <li value="year">Year </li>
                    </ul>
                </div>
                <div class="filter-item" id="sorting">
                    <label>Sorting</label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="sort" id="sort" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li value="all" class="selected">All </li>
                        <li value="solved">Solved</li>
                        <li value="pinned">Pinned</li>
                        <li value="closed">Closed</li>
                    <?php if(get_setting('react_like') == 'React'): ?>
                        <li value="most_reactions">Most Reactions </li>
                    <?php elseif(get_setting('react_like') == 'Like'): ?>
                        <li value="most_likes">Most Likes </li>
                    <?php endif; ?>
                        <li value="most_comments">Most Comments </li>
                    </ul>
                </div>

                <!-- Nav Search START -->
                <div class="w-100 mt-3 mb-3">
                    <div class="nav px-4 flex-nowrap align-items-center">
                        <div class="search-form nav-item w-100">
                            <input class="border-0" name="search_term" id="search_term" type="search" placeholder="Search" aria-label="Search">
                        </div>
                    </div>
                </div>
                <!-- Nav Search END -->
                <button type="submit" id="search_posts_btn" class="btn btn-md btn-mint">Search</button>
            </div>
        </form>
    </div><!--/filter-->

    <div class="discussions" id="discussions">
        <?php echo $__env->make('frontend.partials.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div><!--/discussions-->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script>

    function likePost(a) {
        $.ajax({
            url: '<?php echo e(route('like')); ?>',
            method: 'post',
            dataType: "json",
            data: {item: a},
            success: function(e) {
                var t;
                1 == e.bool ? ($("#like-icon-" + a).removeClass("text-muted").addClass("text-danger"), t = $("#like-" + a).text(), $("#like-" + a).text(++t)) : 0 == e.bool && ($("#like-icon-" + a).removeClass("text-danger").addClass("text-muted"), t = $("#like-" + a).text(), $("#like-" + a).text(--t))

                if (e.status == 200) {

                    tata.success("Success", e.messages, {
                    position: 'tr',
                    duration: 3000,
                    animate: 'slide'
                    });

                }
            },
            error: function(e) {

                tata.error("Error", 'Please Login to Like', {
                position: 'tr',
                duration: 3000,
                animate: 'slide'
                });
            }
        })
    }

    //User Default
    var user_text = $('#userSort .dropdown-menu li.selected').text();
    var user_value = $('#userSort .dropdown-menu li.selected').attr('value');
    $('#userSort input').val(user_value);
    $('#userSort .filter-value').html(user_text);

    //Category Default
    var cat_text = $('#categorySort .dropdown-menu li.selected').text();
    var cat_value = $('#categorySort .dropdown-menu li.selected').attr('value');
    $('#categorySort input').val(cat_value);
    $('#categorySort .filter-value').html(cat_text);

    //Date Default
    var date_text = $('#dateSort .dropdown-menu li.selected').text();
    var date_value = $('#dateSort .dropdown-menu li.selected').attr('value');
    $('#dateSort input').val(date_value);
    $('#dateSort .filter-value').html(date_text);

    //Sorting Default
    var sort_text = $('#sorting .dropdown-menu li.selected').text();
    var sort_value = $('#sorting .dropdown-menu li.selected').attr('value');
    $('#sorting input').val(sort_value);
    $('#sorting .filter-value').html(sort_text);

    $('#userSort .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#userSort').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#userSort').find('input').val(value);
        $('#userSort').find('.filter-value').html(text);
        filterPosts();
    });

    $('#categorySort .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#categorySort').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#categorySort').find('input').val(value);
        $('#categorySort').find('.filter-value').html(text);
        filterPosts();
    });

    $('#dateSort .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#dateSort').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#dateSort').find('input').val(value);
        $('#dateSort').find('.filter-value').html(text);
        filterPosts();
    });

    $('#sorting .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#sorting').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#sorting').find('input').val(value);
        $('#sorting').find('.filter-value').html(text);
        filterPosts();
    });


    $(document).on('submit', '#search_form', function(e) {
        e.preventDefault();
        $("#search_posts_btn").text('Searching...');
        filterPosts();
    });

    function filterPosts() {

        let user_id = $('#user_id').val();
        let category_id = $('#category_id').val();
        let date = $('#date').val();
        let search_term = $('#search_term').val();
        let sort = $('#sort').val();

        let url = "<?php echo e(route('feed.posts.sort')); ?>";
        $.ajax({
            type: "get",
            url: url,
            data: {
                'user_id': user_id,
                'category_id': category_id,
                'date': date,
                'sort': sort,
                'search_term': search_term
            },
            success: function(response) {

                $("#search_posts_btn").text('Search');

                $('#discussions').html(response);
            }
        }).done(function() {
            setTimeout(() => {
                $("#overlay, #overlay2").fadeOut(300);
            }, 500);
        });
    }

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        let user_id = $('#user_id').val();
        let category_id = $('#category_id').val();
        let date = $('#date').val();
        let search_term = $('#search_term').val();
        let sort = $('#sort').val();

        fetchData(page, user_id, category_id, date, sort, search_term);
    });

    function fetchData(page, user_id, category_id, date, sort, search_term) {

        var category_id = category_id;
        var date = date;
        var sort = sort;
        var search_term = search_term;

        $.ajax({
            url: "<?php echo e(url('feed/posts/pagination/?page=')); ?>" + page,
            data: {
                'user_id': user_id,
                'category_id': category_id,
                'date': date,
                'sort': sort,
                'search_term': search_term
            },
            success: function(response) {
                $('#discussions').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/feed.blade.php ENDPATH**/ ?>