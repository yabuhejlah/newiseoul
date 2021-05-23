<?php $lang = app('App\Lang'); ?>

<div class="col-md-12 " style="margin-bottom: 10px">
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
                    <option value="1" style="font-size: 16px  !important;" selected><?php echo e($lang->get(509)); ?></option>  
                    <option value="2" style="font-size: 16px  !important;"><?php echo e($lang->get(510)); ?></option>  
                </select>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/elements/form/selectBannerPos.blade.php ENDPATH**/ ?>