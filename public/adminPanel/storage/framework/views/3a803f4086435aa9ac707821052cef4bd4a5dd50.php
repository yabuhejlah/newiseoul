<?php $utils = app('App\Util'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="col-md-12">
    <div class="col-md-4 align-self-right q-form-label">
        <?php echo e($text); ?>

    </div>
    <div class="col-md-8" style="margin-bottom: 0px">
        <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form-s show-tick" onchange="<?php echo e($onchange); ?>;" >
            <option value="0"><?php echo e($lang->get(114)); ?></option> 
            <?php $__currentLoopData = $utils->getCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/search/selectCat.blade.php ENDPATH**/ ?>