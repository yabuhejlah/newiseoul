<?php $utils = app('App\Util'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="col-md-4 text-right q-form-label">
    <?php echo e($text); ?>

</div>
<div class="col-md-8" >
    <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="focused show-tick q-radius" onchange="<?php echo e($onchange); ?>;">
        <option value="0" selected ><?php echo e($lang->get(114)); ?></option> 
        <?php $__currentLoopData = $utils->getOrdersStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($data->id); ?>"><?php echo e($data->status); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>


<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/search/selectStatus.blade.php ENDPATH**/ ?>