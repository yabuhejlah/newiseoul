<?php $lang = app('App\Lang'); ?>
<?php $util = app('App\Util'); ?>

<div id="element_<?php echo e($id); ?>" class="col-md-12">
    <div class="col-md-4 text-right">
        <label for="name"><h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="q-color-alert2">*</span>
                <?php endif; ?>
            </h4></label>
    </div>
    <div class="col-md-8">
        <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form-s show-tick" onchange="<?php echo e($onchange); ?>;" style="border: none!important;">
            <?php if($noitem == "true"): ?>
                <option value="0"><?php echo e($lang->get(114)); ?></option>  
            <?php endif; ?>
            <?php $__currentLoopData = $util->getFoods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>" data-content="<span><img src='images/<?php echo e($data->filename); ?>' width='40px' style='margin-right: 20px;'> <?php echo e($data->name); ?></span>">
                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/selectFoods.blade.php ENDPATH**/ ?>