<?php $currency = app('App\Currency'); ?>
<?php $lang = app('App\Lang'); ?>

<div class="sidebar mb-35">
    <h3 class="sidebar-title"><?php echo e($lang->get(11)); ?></h3>   
    <div class="sidebar-price">
        <div id="price-range"></div>
        <input type="text" id="price-amount" readonly>

    </div>
</div>

<script>

    var sliderS;
    console.log("max: <?php echo e($max); ?>");
    $('#price-range').slider({
        range: true,
        min: <?php echo e($min); ?>,
        max: <?php echo e($max); ?>,
        values: [ <?php echo e($min); ?>, <?php echo e($max); ?> ],
        slide: slider_slide
    });

    function slider_slide( event, ui ) {
        sliderS = this;
        $('#price-amount').val( '<?php echo e($lang->get(9)); ?>' + makePrice(ui.values[0]) + ' - ' + makePrice(ui.values[1]));  // Price

        console.log("foodMinPrice " + ui.values[0]);
        console.log("foodMaxPrice " + ui.values[1]);
        if (!dataLoading) {
            foodMinPrice = ui.values[0];
            foodMaxPrice = ui.values[1];
            lastFoodMinPrice = foodMinPrice;
            lastFoodMaxPrice = foodMaxPrice;
            paginationGoPage(1);
        } else {
            lastFoodMinPrice = ui.values[0];
            lastFoodMaxPrice = ui.values[1];
        }
    }

    $('#price-amount').val( '<?php echo e($lang->get(9)); ?>' + makePrice(<?php echo e($min); ?>) + ' - ' + makePrice(<?php echo e($max); ?>));  // Price

    function slider_newRange(min, max){
        $("#price-range").slider('destroy');
        $('#price-range').slider({
            range: true,
            min: min,
            max: max,
            values: [ min, max ],
            slide: slider_slide
        });
        $('#price-amount').val( '<?php echo e($lang->get(9)); ?>' + makePrice(min) + ' - ' + makePrice(max));  // Price
    }

</script>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/filterprice.blade.php ENDPATH**/ ?>