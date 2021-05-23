
<div id="element_<?php echo e($id); ?>">
    <div class="col-md-12 " style="margin-bottom: 0px">
        <div class="col-md-4 form-control-label" style="margin-bottom: 0px">
            <label for="<?php echo e($id); ?>"><h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="col-red">*</span>
                <?php endif; ?>
            </h4></label>
        </div>
        <div class="col-md-8" style="margin-bottom: 0px">
            <div class="form-group form-group-lg form-float " style="margin-bottom: 0px">
                <div class="form-line">
                    <input type="text" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control" placeholder="" maxlength="<?php echo e($maxlength); ?>">
                </div>
                <p class="font-12 mdl-color-text--indigo-A700"><?php echo e($text); ?></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/elements/form/text.blade.php ENDPATH**/ ?>