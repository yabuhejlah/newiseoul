
<div id="element_<?php echo e($id); ?>">
    <div class="col-md-12">
        <div class="col-md-4 text-right">
            <h4><?php echo e($label); ?>

                <?php if($request == "true"): ?>
                    <span class="col-red">*</span>
                <?php endif; ?>
            </h4>
        </div>
        <div class="col-md-8">
            <div class="form-line">
                <input type="text" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form" placeholder="" maxlength="<?php echo e($maxlength); ?>">
            </div>
            <p class="font-12 mdl-color-text--indigo-A700"><?php echo e($text); ?></p>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/text.blade.php ENDPATH**/ ?>