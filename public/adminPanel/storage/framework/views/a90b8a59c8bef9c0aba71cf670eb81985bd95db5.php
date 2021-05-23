<?php $lang = app('App\Lang'); ?>

<div class="col-md-12 ">
    <div class="col-md-4 text-right">
        <label for="name"><h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="q-color-alert2">*</span>
                <?php endif; ?>
            </h4></label>
    </div>
    <div class="col-md-8" style="margin-bottom: 0px">
        <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control show-tick" onchange="<?php echo e($onchange); ?>;" >
            <option value="1" style="font-size: 16px  !important;" selected><?php echo e($lang->get(513)); ?></option>  
            <option value="2" style="font-size: 16px  !important;"><?php echo e($lang->get(514)); ?></option>  
        </select>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/selectBannerType.blade.php ENDPATH**/ ?>