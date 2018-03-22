<?php if($errors->any() || session()): ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('warning')): ?>
                <div class="alert alert-warning">
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('danger')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('danger')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger">
                        <?php echo e($error); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>