<?php $lang = app('App\Lang'); ?>
<?php $util = app('App\Util'); ?>

<div id="element_<?php echo e($id); ?>" class="col-md-12 " style="margin-bottom: 10px">
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
                    <?php $__currentLoopData = $util->getFoods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>" style="font-size: 16px  !important;" data-content="<span class=''><img src='images/<?php echo e($data->filename); ?>' width='40px' style='margin-right: 20px;'> <?php echo e($data->name); ?></span>"">
                                </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
</div>


<?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/elements/form/selectFoods.blade.php ENDPATH**/ ?>