<?php $__env->startSection('content'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong><?php echo e(trans('admin_dashboard')); ?></strong></h1>

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"><?php echo e(trans('users')); ?></h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?php echo e($users); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"><?php echo e(trans('posts')); ?></h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="columns"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?php echo e($posts); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"><?php echo e(trans('comments')); ?></h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="menu"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?php echo e($comments); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"><?php echo e(trans('replies')); ?></h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="copy"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?php echo e($replies); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"><?php echo e(trans('earnings')); ?></h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?php echo e(get_setting('currency_symbol')); ?><?php echo e($transactions); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title"><?php echo e(trans('commissions_on_tips')); ?></h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3"><?php echo e(get_setting('currency_symbol')); ?><?php echo e($commissions); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0"><?php echo e(trans('earnings')); ?></h5>
                    </div>
                    <div class="card-body py-3">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(my_asset('assets/vendors/apexcharts/apexcharts.min.js')); ?>"></script>
<script>
    $(document).ready(function () {

        "use strict";

        /* ==========================================================================
        ApexChart Line Graph
        ========================================================================== */

        var options = {
            series: [{
                name: "<?php echo e(trans("earnings")); ?>",
                data: <?php echo e($earnings); ?>

            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            colors: ['#1BC5BD']
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>