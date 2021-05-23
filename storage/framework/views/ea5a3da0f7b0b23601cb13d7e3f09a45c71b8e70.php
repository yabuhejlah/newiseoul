<?php $topfoods = app('App\TopFoods'); ?>


<div class="slider related-product-slider mb-35">
    <div class="container q-card">
        <div class="row">
            <div class="col-lg-12" >

                <div class="q-section-title">
                    <h3><?php echo e($lang->get(10)); ?></h3>  
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 q-pb10">

                <div class="related-product-slider-wrapper">

                    <?php echo $__env->make('elements.topfoods', array('products' => $topfoods->getList(), 'type' => 1), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/topfoodsslider.blade.php ENDPATH**/ ?>