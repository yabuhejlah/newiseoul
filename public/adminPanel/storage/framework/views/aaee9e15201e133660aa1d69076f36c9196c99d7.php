<?php $util = app('App\Util'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="col-md-12 " style="margin-bottom: 0px">
    <div class="col-md-4 form-control-label" style="margin-bottom: 0px">
        <label for="name"><h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="col-red">*</span>
                <?php endif; ?>
            </h4></label>
    </div>
    <div class="col-md-8" style="margin-bottom: 0px">
        <div class="form-group form-group-lg" style="margin-bottom: 0px">
            <div class="form-line" >
                <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control show-tick" onchange="<?php echo e($onchange); ?>;" >
                    <?php if($noitem == "true"): ?>
                        <option value="0" style="font-size: 16px  !important;"><?php echo e($lang->get(114)); ?></option>  
                    <?php endif; ?>
                    <?php $__currentLoopData = $util->getExtras(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" style="font-size: 16px  !important;"><?php echo e($data->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/elements/form/selectExtras.blade.php ENDPATH**/ ?>