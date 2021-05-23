<?php $util = app('App\Util'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="col-md-12 ">
    <div class="col-md-4 text-right">
        <h4><?php echo e($label); ?>

            <?php if($request == "true"): ?>
                <span class="col-red">*</span>
            <?php endif; ?>
        </h4>
    </div>
    <div class="col-md-8">
        <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form-s show-tick" onchange="<?php echo e($onchange); ?>;" >
            <?php if($noitem == "true"): ?>
                <option value="0"><?php echo e($lang->get(114)); ?></option>  
            <?php endif; ?>
            <?php $__currentLoopData = $util->getRestaurants(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>" style="font-size: 16px  !important;"><?php echo e($data->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>



<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/selectMarket.blade.php ENDPATH**/ ?>