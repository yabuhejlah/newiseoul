<?php $util = app('App\Util'); ?>

<div class="col-md-12 " style="margin-bottom: 0px">
    <div class="col-md-4 form-control-label" style="margin-bottom: 0px">
        <label for="name"><h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="col-red">*</span>
                <?php endif; ?>
            </h4></label>
    </div>
    <div class="col-md-8" style="margin-bottom: 0px">
        <div class="form-group form-group-lg" style="margin-bottom: 10px">
            <div class="form-line" >
                <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control show-tick" onchange="<?php echo e($onchange); ?>;" >
                    <?php $__currentLoopData = $util->getRoles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataroles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dataroles->id); ?>" style="font-size: 16px  !important;"><?php echo e($dataroles->role); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/elements/form/selectRoles.blade.php ENDPATH**/ ?>