

<div id="<?php echo e($id); ?>" onclick="onCheckClick<?php echo e($id); ?>()" style="font-weight: bold; "></div>

<script>
        var <?php echo e($id); ?> = <?php echo e($initvalue); ?>;
        if (<?php echo e($id); ?>)
            document.getElementById('<?php echo e($id); ?>').innerHTML = "<img src=\"img/check_on.png\" width=\"25px\">&nbsp<?php echo e($text); ?>";
        else
            document.getElementById('<?php echo e($id); ?>').innerHTML = "<img src=\"img/check_off.png\" width=\"25px\">&nbsp<?php echo e($text); ?>";

        function onCheckClick<?php echo e($id); ?>(){
            var value = "on";
            if (<?php echo e($id); ?>) value = "off"; else value = "on";
            <?php echo e($id); ?> = !<?php echo e($id); ?>;
            document.getElementById('<?php echo e($id); ?>').innerHTML = "<img src=\"img/check_"+value+".png\" width=\"25px\">&nbsp<?php echo e($text); ?>";
            if ("<?php echo e($callback); ?>" != "null")
                <?php echo e($callback); ?>("<?php echo e($id); ?>", <?php echo e($id); ?>);
        }

        function onSetCheck_<?php echo e($id); ?>(value){
            if (value == '1')
                <?php echo e($id); ?> = false;
            else
                <?php echo e($id); ?> = true;
            onCheckClick<?php echo e($id); ?>();
        }

</script>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/check.blade.php ENDPATH**/ ?>