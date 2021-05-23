<?php $__currentLoopData = $categoriesAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="slider q-mb20">
    <div class="container q-card">

        <div class="row">
            <div class="col-lg-12">
                <!--=======  blog slider section title  =======-->

                <div class="q-section-title">
                    <h3><?php echo e($data->name); ?></h3>
                </div>

                <!--=======  End of blog slider section title  =======-->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3" style="min-height: 200px">
                        <div class="q-img-cat">
                            <a href="category?cat=<?php echo e($data->id); ?>">
                                <img src="<?php echo e($data->filename); ?>" class="q-img-cat2">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9" >
                        <div class="banner-slider-container">
                            <?php if(isset($data->foods)): ?>
                                <?php echo $__env->make('elements.topfoods', array('products' => $data->foods, 'type' => 1), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    // https://kenwheeler.github.io/slick/

    $('.banner-slider-container').slick({
        arrows: true,
        autoplay: false,
        dots: false,
        infinite: true,
        slidesToShow: 4,
        prevArrow: '<button type="button" class="slick-prev"><img src="img/arrowl.png" style="width: 20px"></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="img/arrowr.png" style="width: 20px"></i></button>',
        responsive: [{
            breakpoint: 1499,
            settings: {
                slidesToShow: 4,
            }
        },
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

</script>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/categories.blade.php ENDPATH**/ ?>