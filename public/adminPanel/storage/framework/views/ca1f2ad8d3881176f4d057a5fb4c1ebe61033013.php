<div class="col-md-12 " style="margin-bottom: 0px">
    <div class="col-md-3 foodm">
        <label for="lat"><h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="col-red">*</span>
                <?php endif; ?>
                </h4></label>
    </div>
    <div class="col-md-9 foodm">
        <div class="form-group form-group-lg form-float">
            <div class="form-line">
                <input type="number" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control" placeholder="" step="0.00000000000000001" value="<?php echo e($initvalue); ?>">
                <label class="form-label"><?php echo e($text); ?></label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/latlang.blade.php ENDPATH**/ ?>