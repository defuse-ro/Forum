<?php $__env->startSection('content'); ?>


    <div class="vine-header mb-4" data-aos="fade-down" data-aos-easing="linear">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-6">
                    <ul class="breadcrumbs">
                        <li><a href="<?php echo e(route('home')); ?>"><span class="bi bi-house me-1"></span>Home</a></li>
                        <li>Faqs</li>
                    </ul>
                    <h2 class="mb-2">Faqs</h2>
                </div>
            </div>
        </div>
    </div><!--/vine-header-->

    <div class="faq">
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <div class="accordion-item border-0 rounded-3 shadow-sm mb-3" data-aos="fade-up" data-aos-easing="linear">
            <h2 class="accordion-header" id="q<?php echo e($faq->id); ?>-heading">
              <button class="accordion-button shadow-none rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#q<?php echo e($faq->id); ?>" aria-expanded="true" aria-controls="q<?php echo e($faq->id); ?>">
                <?php echo e($faq->question); ?>

              </button>
            </h2>
            <div id="q<?php echo e($faq->id); ?>" class="accordion-collapse collapse" aria-labelledby="q<?php echo e($faq->id); ?>-heading" data-bs-parent="#faq">
              <div class="accordion-body fs-sm pt-0">
                <p><?php echo e($faq->answer); ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\Tests\ApexForum\resources\views/frontend/pages/faq.blade.php ENDPATH**/ ?>