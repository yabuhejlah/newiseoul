<?php $util = app('App\Util'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="col-md-12">
    <div class="col-md-4 align-self-right q-form-label">
        <?php echo e($text); ?>

    </div>
    <div class="col-md-8" style="margin-bottom: 0px">
        <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form-s show-tick" onchange="<?php echo e($onchange); ?>;" >
            <option value="0"><?php echo e($lang->get(114)); ?></option> 
            <?php $__currentLoopData = $util->getRoles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataroles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dataroles->id); ?>"><?php echo e($dataroles->role); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/search/selectRoles.blade.php ENDPATH**/ ?>