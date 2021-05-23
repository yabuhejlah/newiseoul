<?php $util = app('App\Util'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="col-md-4 align-self-right" style="margin-top: 20px; text-align: right; margin-bottom: 0px">
    <?php echo e($text); ?>

</div>
<div class="col-md-8" style="margin-bottom: 0px">
    <div class="form-group form-group-lg form-float" style="margin-bottom: 0px">
        <div class="form-line" >
            <select name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control show-tick" onchange="<?php echo e($onchange); ?>;" >
                <option value="0" selected style="font-size: 16px !important;"><?php echo e($lang->get(114)); ?></option> 
                <?php $__currentLoopData = $util->getRoles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataroles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($dataroles->id); ?>" style="font-size: 16px  !important;"><?php echo e($dataroles->role); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>


<?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/elements/search/selectRoles.blade.php ENDPATH**/ ?>