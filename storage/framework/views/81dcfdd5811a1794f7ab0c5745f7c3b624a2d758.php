<?php if($data != null): ?>

<?php if($type == 1): ?>    
    <div class="gf-product shop-grid-view-product">
        <div class="q-slider">
            <a href="<?php echo e(route('/foodDetails')); ?>?id=<?php echo e($data->id); ?>">
                <?php if($data->discountprice != 0): ?>
                    <span class="onsale"><?php echo e($lang->get(1)); ?></span>           
                <?php endif; ?>
                <img src="<?php echo e($data->image); ?>" class="q-img" alt="">
            </a>
            <div class="product-hover-icons">
                <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(14)); ?>" onClick="addToBasketById(<?php echo e($data->id); ?>);"><img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> 
                <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(15)); ?>" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList(<?php echo e($data->id); ?>);"> </a> 
                <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(16)); ?>" onClick="openModal(<?php echo e($data->id); ?>);" data-toggle="modal" data-target="#quick-view-modal-container">  
                    <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
            </div>
        </div>
        <div class="product-content">
            <h3 class="product-title"><a href="<?php echo e(route('/foodDetails')); ?>?id=<?php echo e($data->id); ?>" class="text3rem"><?php echo e($data->name); ?></a></h3>
            <div class="price-box">
                <?php if($data->discountprice != 0): ?>
                    <span class="main-price"><?php echo e($data->price2); ?></span>
                    <span class="discounted-price"><?php echo e($data->discountprice2); ?></span>
                <?php else: ?>
                    <span class="discounted-price"><?php echo e($data->price2); ?></span>
                <?php endif; ?>
            </div>

            <a href="shop?id=<?php echo e($data->restId); ?>"><?php echo e($data->restName); ?></a>
            <div>
                <?php echo $__env->make('elements.rating', array('rating' => $data->rest_drating), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e($data->rest_rating); ?>

            </div>
        </div>
    </div>

<?php endif; ?>

<?php if($type == 2): ?>    
    <div class="top-rated-product-container">
        <div class="single-top-rated-product d-flex align-content-center">
            <div class="row q-mb5">
                <div class="col-md-4 px-0">
                    <a href="<?php echo e(route('/foodDetails')); ?>?id=<?php echo e($data->id); ?>">
                        <img src="<?php echo e($data->image); ?>" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-8">
                    <p><a href="<?php echo e(route('/foodDetails')); ?>?id=<?php echo e($data->id); ?>"><?php echo e($data->name); ?></a></p>
                    <p class="product-price">
                        <?php if($data->discountprice != 0): ?>
                            <span class="discounted-price"><?php echo e($currency->makePrice($data->discountprice)); ?></span>
                            <span class="main-price"><?php echo e($currency->makePrice($data->price)); ?></span>
                        <?php else: ?>
                            <span class="discounted-price"><?php echo e($currency->makePrice($data->price)); ?></span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/oneItem.blade.php ENDPATH**/ ?>