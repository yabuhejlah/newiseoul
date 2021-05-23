<?php $util = app('App\Util'); ?>

<div class="col-md-12 q-mb10">
    <div class="col-md-4 text-right">
        <h4><?php echo e($label); ?>

            <?php if($request == "true"): ?>
                <span class="col-red">*</span>
            <?php endif; ?>
        </h4>
    </div>
    <div class="col-md-8">
        <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form-s show-tick q-radius" onchange="<?php echo e($onchange); ?>;" >
            <?php $__currentLoopData = $util->getRoles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataroles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dataroles->id); ?>"><?php echo e($dataroles->role); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/selectRoles.blade.php ENDPATH**/ ?>