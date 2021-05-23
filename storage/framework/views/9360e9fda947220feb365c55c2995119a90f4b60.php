<?php $currency = app('App\Currency'); ?>
<?php $lang = app('App\Lang'); ?>



<?php if(isset($data)): ?>
<div class="gf-product shop-list-view-product">
    <div class="image">
        <a href="<?php echo e(route('/foodDetails')); ?>?id=<?php echo e($data->id); ?>">
            <?php if($data->discountprice != 0): ?>
                <span class="onsale"><?php echo e($lang->get(1)); ?></span>            
            <?php endif; ?>
            <img src="<?php echo e($data->image); ?>" class="img-fluid" style="height: 200px; width: auto;">
        </a>
    </div>
    <div class="product-content">
        <h3 class="product-title"><a href="<?php echo e(route('/foodDetails')); ?>?id=<?php echo e($data->id); ?>"><?php echo e($data->name); ?></a></h3>
        <div class="price-box mb-20">
            <?php if($data->discountprice != 0): ?>
                <span class="main-price"><?php echo e($currency->makePrice($data->price)); ?></span>
                <span class="discounted-price"><?php echo e($currency->makePrice($data->discountprice)); ?></span>
            <?php else: ?>
                <span class="discounted-price"><?php echo e($currency->makePrice($data->price)); ?></span>
            <?php endif; ?>
        </div>
        <p class="product-description"><?php echo e($data->desc); ?></p>
        <div class="list-product-icons">
            <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(16)); ?>" onClick="openModal(<?php echo e($data->id); ?>);" data-toggle="modal" data-target="#quick-view-modal-container">  
                <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
            <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(14)); ?>" onClick="addToBasketById(<?php echo e($data->id); ?>);"> <img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> 
            <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(15)); ?>" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList(<?php echo e($data->id); ?>);"> </a> 
        </div>
        <div style="margin-top: 30px">
            <a href="shop?id=<?php echo e($data->restId); ?>"><?php echo e($data->restName); ?></a>
            <div>
                <?php echo $__env->make('elements.rating', array('rating' => $data->rest_drating), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e($data->rest_rating); ?>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/listfood.blade.php ENDPATH**/ ?>