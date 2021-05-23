
<div class="slider q-mb20 q-pt20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-logo-wrapper pt-20 pb-20">
                    <div class="single-banners2-logo">
                        <?php $__currentLoopData = $banners2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($data->link); ?>">
                                <img src="<?php echo e($data->filename); ?>" class="img-fluid q-banner">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // https://kenwheeler.github.io/slick/

    $('.single-banners2-logo').slick({
        autoplay: true,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><img src="img/arrowl.png" style="width: 20px"></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="img/arrowr.png" style="width: 20px"></i></button>',
    });

</script>

<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/banner2.blade.php ENDPATH**/ ?>