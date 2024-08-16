<?php $__env->startSection('content'); ?>


    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li>Leaderboard</li>
                    </ul>
                    <h2 class="mb-2">Leaderboard</h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->



    <div class="filter mx-0 mb-5">

        <form class="form" id="search_form">
            <?php echo csrf_field(); ?>
            <div class="filter-toolbar">
                <div class="filter-item" id="numberSort">
                    <label>Number</label>
                    <a class="filter-item-content dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <input type="hidden" name="number" id="number" value="">
                        <span class="filter-value"></span>
                        <span class="dropdown-btn"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li value="10" class="selected">Show 10 </li>
                        <li value="20">Show 20 </li>
                        <li value="30">Show 30 </li>
                        <li value="40">Show 40 </li>
                        <li value="50">Show 50 </li>
                        <li value="100">Show 100 </li>
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

    <div class="leaderboard">
        <div class="row" id="leaderboard">

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

    //Number Default
    var num_text = $('#numberSort .dropdown-menu li.selected').text();
    var num_value = $('#numberSort .dropdown-menu li.selected').attr('value');
    $('#numberSort input').val(num_value);
    $('#numberSort .filter-value').html(num_text);

    filterPosts();

    $('#numberSort .dropdown-menu li').on('click', function() {
        var value = $(this).attr('value');
        var text = $(this).text();
        var item = $(this);
        item.closest('#numberSort').find('li.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#numberSort').find('input').val(value);
        $('#numberSort').find('.filter-value').html(text);
        filterPosts();
    });

    $(document).on('submit', '#search_form', function(e) {
        e.preventDefault();
        $("#search_posts_btn").text('Searching...');
        filterPosts();
    });

    function filterPosts() {

        let number = $('#number').val();
        let search_term = $('#search_term').val();

        let url = "<?php echo e(route('leaderboard.sort')); ?>";
        $.ajax({
            type: "get",
            url: url,
            data: {
                'number': number,
                'search_term': search_term
            },
            success: function(response) {

                $("#search_posts_btn").text('Search');

                $('#leaderboard').html(response);
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
        let number = $('#number').val();
        let search_term = $('#search_term').val();

        fetchData(page, number, search_term);
    });

    function fetchData(page, number, search_term) {

        var number = number;
        var search_term = search_term;

        $.ajax({
            url: "<?php echo e(url('leaderboard/pagination/?page=')); ?>" + page,
            data: {
                'number': number,
                'search_term': search_term
            },
            success: function(response) {
                $('#leaderboard').html(response);

                window.scroll({
                    top: 0, left: 0,
                    behavior: 'smooth'
                });
            }
        });
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pages/leaderboard.blade.php ENDPATH**/ ?>