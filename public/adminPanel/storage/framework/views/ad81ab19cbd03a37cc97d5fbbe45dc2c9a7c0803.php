

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
            <?php echo e($callback); ?>;
        }

</script>
<?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/elements/search/check.blade.php ENDPATH**/ ?>