<?php $__env->startSection('title', '404'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header text-center">
                    <i class="fas fa-exclamation-circle text-danger"></i>
                </div>
                <div class="card-body text-center">
                    <h6>
                        <?php echo e($error); ?>

                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\graduation\AAST-TRAINERY-BE\AAST-TRAINERY-BE\resources\views/Email/ResetError.blade.php ENDPATH**/ ?>