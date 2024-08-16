<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.css')); ?>" rel="stylesheet">
<link href="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables_them.css')); ?>" rel="stylesheet">
<style>
    /* Datatable */
    table.dataTable tbody tr {
        background-color: var(--theme-white) !important;
    }
    .form-select{
        background-color: var(--theme-white) !important;
        color: var(--text-color) !important;
    }
    .form-control{
        background-color: var(--theme-white) !important;
        color: var(--text-color) !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mb-4" data-aos="fade-down" data-aos-easing="linear">
        <h4><i class="bi bi-wallet2 me-2"></i> <?php echo e(trans('wallet')); ?></h4>
        <p><?php echo e(trans('add_funds_to_your_wallet_to_use_for_subscriptions_tips_and_more')); ?>.</p>
    </div>

    <div class="dashboard-card mb-5 mb-xl-10" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body p-0">
            <h4><?php echo e(trans('available_funds')); ?></h4>
            <div class="price-price mb-2">
                <span><b><?php echo e(get_setting('currency_symbol')); ?><?php echo e(Auth::user()->wallet); ?></b></span>
            </div>
        </div>
    </div><!--/dashboard-card-->

    <div class="dashboard-card mb-5 mb-xl-10" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body p-0">
            <h4 class="mb-3"><?php echo e(trans('add_funds')); ?></h4>
            <form id="deposit_form" action="<?php echo e(route('user.funds.add')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <input id="onlyNumber" name="amount" min="<?php echo e(get_setting('min_deposit')); ?>" autocomplete="off" placeholder="<?php echo e(trans('amount')); ?> (Min - <?php echo e(get_setting('min_deposit')); ?>)" type="number">
                </div>
                <div class="deposit-box mt-3 mb-4">
                    <div class="d-flex justify-content-between">
                        <p><?php echo e(trans('transaction_fee')); ?></p>
                        <p><?php echo e(get_setting('currency_symbol')); ?> <span id="transactionFee">0.00</span></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p><?php echo e(trans('total')); ?></p>
                        <p><?php echo e(get_setting('currency_symbol')); ?> <span id="total">0.00</span></p>
                    </div>
                </div>

                <?php if(get_setting('paypal_active') == 'Yes'): ?>
                    <div class="custom-control custom-radio mb-3">
                        <input name="payment_gateway" value="PayPal" id="PayPal" class="custom-control-input" type="radio">
                        <label class="custom-control-label" for="PayPal">
                            <span><strong>PayPal</strong></span>
                            <small class="w-100 d-block"><?php echo e(get_setting('paypal_fee').'%'); ?> + <?php echo e(get_setting('paypal_fee_cents')); ?></small>
                        </label>
                    </div>
                <?php endif; ?>


                <?php if(get_setting('stripe_active') == 'Yes'): ?>
                    <div class="custom-control custom-radio mb-3">
                        <input name="payment_gateway" value="Stripe" id="Stripe" class="custom-control-input" type="radio">
                        <label class="custom-control-label" for="Stripe">
                            <span><strong>Stripe</strong></span>
                            <small class="w-100 d-block"><?php echo e(get_setting('stripe_fee').'%'); ?> + <?php echo e(get_setting('stripe_fee_cents')); ?></small>
                        </label>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-mint w-100 mt-4" id="deposit_btn"><?php echo e(trans('add_funds')); ?></button>

            </form>
        </div>
    </div><!--/dashboard-card-->
    <div class="dashboard-card mb-5 mb-xl-10" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-body p-0">
            <h4 class="mb-3"><?php echo e(trans('add_funds')); ?></h4>
            <form id="deposit_form" action="<?php echo e(route('user.funds.add')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <?php if(get_setting('paystack_active') == 'Yes'): ?>
                    <div class="custom-control custom-radio mb-3">
                        <input name="payment_gateway" value="Paystack" id="Paystack" class="custom-control-input" type="radio">
                        <label class="custom-control-label" for="Paystack">
                            <span><strong>Paystack</strong></span>
                            <small class="w-100 d-block"><?php echo e(get_setting('paystack_fee').'%'); ?> + <?php echo e(get_setting('paystack_fee_cents')); ?></small>
                        </label>
                        <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>">
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-mint w-100 mt-4" id="deposit_btn"><?php echo e(trans('add_funds')); ?></button>

            </form>
        </div>
    </div><!--/dashboard-card-->


    <div class="dashboard-card" data-aos="fade-up" data-aos-easing="linear">
        <div class="dashboard-header">
            <h4 class="m-0"><?php echo e(trans('deposits_history')); ?></h4>
        </div>
        <div class="dashboard-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="datatable_cms" class="table align-middle table-row-dashed gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 gs-0">
                            <th class="min-w-150px">ID</th>
                            <th class="min-w-125px"><?php echo e(trans('amount')); ?></th>
                            <th class="min-w-125px"><?php echo e(trans('payment_gateway')); ?></th>
                            <th class="min-w-125px"><?php echo e(trans('date')); ?></th>
                            <th class="min-w-125px"><?php echo e(trans('status')); ?></th>
                            <th class="min-w-70px"><?php echo e(trans('invoice')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($key+1)); ?></td>
                                <td><?php echo e(get_setting('currency_symbol')); ?><?php echo e($deposit->amount); ?></td>
                                <td><?php echo e($deposit->gateway); ?></td>
                                <td><?php echo e(date('d M, Y', strtotime($deposit->created_at))); ?></td>
                                <?php if($deposit->status === 1): ?>
                                    <td><span class="badge bg-green p-2"><?php echo e(trans('active')); ?></span></td>
                                <?php else: ?>
                                    <td><span class="badge bg-danger p-2"><?php echo e(trans('pending')); ?></span></td>
                                <?php endif; ?>
                                <td class="text-right"><a href="<?php echo e(route('user.wallet.invoice', ['id' => $deposit->id])); ?>" class="btn btn-sm btn-light"><?php echo e(trans('view')); ?> <?php echo e(trans('invoice')); ?></a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(my_asset('assets/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(my_asset('assets/vendors/datatables/dataTables.bootstrap5.min.js')); ?>"></script>

<script>

    $('#datatable_cms').DataTable();

    $decimal = 2;

    function toFixed(number, decimals) {
        var x = Math.pow(10, Number(decimals) + 1);
        return (Number(number) + (1 / x)).toFixed(decimals);
    }

    $('input[name=payment_gateway]').on('click', function() {

        var valueOriginal = $('#onlyNumber').val();
        var value = parseFloat($('#onlyNumber').val());
        var element = $(this).val();

        if (element != '' && value >= <?php echo e(get_setting('min_deposit')); ?> && valueOriginal != '' ) {
        // Fees

            if (element == 'PayPal') {
                $fee   = <?php echo e(get_setting('paypal_fee')); ?>;
                $cents =  <?php echo e(get_setting('paypal_fee_cents')); ?>;
            }else if(element == 'Stripe'){
                $fee   = <?php echo e(get_setting('stripe_fee')); ?>;
                $cents =  <?php echo e(get_setting('stripe_fee_cents')); ?>;
            }else if(element == 'Paystack'){
                $fee   = <?php echo e(get_setting('paystack_fee')); ?>;
                $cents =  <?php echo e(get_setting('paystack_fee_cents')); ?>;
            }

            var amount = (value * $fee / 100) + $cents;
            var amountFinal = toFixed(amount, $decimal);

            var total = (parseFloat(value) + parseFloat(amountFinal));

            if (valueOriginal.length != 0 || valueOriginal != '' || value >= <?php echo e(get_setting('min_deposit')); ?> ) {
                $('#transactionFee').html(amountFinal);
                $('#total').html(total.toFixed($decimal));
            }else{
                $('#transactionFee, #total').html('0');
                $('#deposit_btn').prop('disabled', true);
            }
        }

    });

    $('#onlyNumber').on('keyup', function() {

        var valueOriginal = $('#onlyNumber').val();
        var value = parseFloat($('#onlyNumber').val());
        var paymentGateway = $('input[name=payment_gateway]:checked').val();

        if (valueOriginal.length == 0) {
            $('#transactionFee').html('0');
            $('#total').html('0');
        }

        if (paymentGateway && value >= <?php echo e(get_setting('min_deposit')); ?> && valueOriginal != '' ) {

            if (paymentGateway == 'PayPal') {
                $fee   = <?php echo e(get_setting('paypal_fee')); ?>;
                $cents =  <?php echo e(get_setting('paypal_fee_cents')); ?>;
            }else if(paymentGateway == 'Stripe'){
                $fee   = <?php echo e(get_setting('stripe_fee')); ?>;
                $cents =  <?php echo e(get_setting('stripe_fee_cents')); ?>;
            }else if(element == 'Paystack'){
                $fee   = <?php echo e(get_setting('paystack_fee')); ?>;
                $cents =  <?php echo e(get_setting('paystack_fee_cents')); ?>;
            }

            var amount = (value * $fee / 100) + $cents;
            var amountFinal = toFixed(amount, $decimal);

            var total = (parseFloat(value) + parseFloat(amountFinal));

            if (valueOriginal.length != 0 || valueOriginal != '' || value >= <?php echo e(get_setting('min_deposit')); ?> ) {
                $('#transactionFee').html(amountFinal);
                $('#total').html(total.toFixed($decimal));
            } else {
                $('#transactionFee, #total').html('0');
                $('#deposit_btn').prop('disabled', true);
            }
        }
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/user/deposits/index.blade.php ENDPATH**/ ?>