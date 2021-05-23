
<div id="element_<?php echo e($id); ?>">
    <div class="col-md-12">
        <div class="col-md-4 text-right" >
            <label for="<?php echo e($id); ?>"><h4><?php echo e($label); ?>

                    <?php if($request == "true"): ?>
                        <span class="q-color-alert2">*</span>
                    <?php endif; ?>
                </h4></label>
        </div>
        <div class="col-md-8">
            <input type="number" name="<?php echo e($id); ?>" id="<?php echo e($id); ?>" class="q-form" value="0" step="0.01">
            <p class="font-12 mdl-color-text--indigo-A700"><?php echo e($text); ?></p>
        </div>
    </div>
</div>


<script>

    var amount<?php echo e($id); ?> = document.getElementById('<?php echo e($id); ?>');
    amount<?php echo e($id); ?>.addEventListener('input',  function(e){inputHandlerDouble(e, amount<?php echo e($id); ?>, 0, 1000000000);});

    function inputHandlerDouble(e, parent, min, max) {
        var t = e.target.value.indexOf('.');
        var value = parseFloat(e.target.value);
        if (value.isEmpty)
            value = 0;
        if (isNaN(value))
            value = 0;
        if (value > max)
            value = max;
        if (value < min)
            value = min;
        if (t != -1) {
            var m = value.toFixed(2);
            if (m.substring(m.length - 1) == '0')
                parent.value = value.toFixed(1);
            else
                parent.value = value.toFixed(2);
        }else
            parent.value = value;
    }

</script>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/form/price.blade.php ENDPATH**/ ?>