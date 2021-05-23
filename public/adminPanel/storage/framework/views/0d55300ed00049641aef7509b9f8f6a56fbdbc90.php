
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
                    <input type="number" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="form-control" value="0">
                </div>
                <p class="font-12 mdl-color-text--indigo-A700"><?php echo e($text); ?></p>
            </div>
        </div>
    </div>
</div>


<script>

    var amount<?php echo e($id); ?> = document.getElementById('<?php echo e($id); ?>');
    amount<?php echo e($id); ?>.addEventListener('input',  function(e){inputHandler(e, amount<?php echo e($id); ?>, <?php echo e($min); ?>, <?php echo e($max); ?>);});

    function inputHandler(e, parent, min, max) {
        var value = parseInt(e.target.value);
        if (value.isEmpty)
            value = 0;
        if (isNaN(value))
            value = 0;
        if (value > max)
            value = max;
        if (value < min)
            value = min;
        parent.value = value;
    }
</script>
<?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/elements/form/number.blade.php ENDPATH**/ ?>