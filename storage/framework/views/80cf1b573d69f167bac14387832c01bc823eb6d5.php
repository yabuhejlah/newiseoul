<?php $lang = app('App\Lang'); ?>
<?php $docs = app('App\Docs'); ?>
<?php $currency = app('App\Currency'); ?>
<?php $category = app('App\Categories'); ?>
<?php $theme = app('App\Theme'); ?>

<html>
    <?php echo $__env->make('elements.head', array('title' => $food->name), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php echo $__env->make('elements.header', array('1' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('elements.broadcrumb', array('type' => "1"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="shop-page-container mb-50">
    <div class="container">

        <div class="single-product-content-container mb-35" >
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12" >
                    <div class="product-image-slider" >


                        <div class="col-md-12">
                            <div class="tab-content product-large-image-list">
                                <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                                    <div class="single-product-img easyzoom img-full">
                                        <img src="<?php echo e($food->image); ?>" class="img-fluid" alt="">
                                        <a href="<?php echo e($food->image); ?>" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                                <?php if(sizeof($food->images_files) != 0): ?>
                                    <?php
                                        $images_files_index = 2;
                                    ?>
                                    <?php $__currentLoopData = $food->images_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane fade " id="single-slide<?php echo e($images_files_index); ?>" role="tabpanel" aria-labelledby="single-slide-tab-<?php echo e($images_files_index); ?>">
                                            <div class="single-product-img easyzoom img-full">
                                                <img src="<?php echo e($data); ?>" class="img-fluid">
                                                <a href="<?php echo e($data); ?>" class="big-image-popup"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <?php
                                            $images_files_index++;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="product-small-image-list" style="display: block">
                                <div class="nav small-image-slider" role="tablist">
                                    <div class="single-small-image img-full">
                                        <a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1">
                                            <img src="<?php echo e($food->image); ?>" class="img-fluid" alt=""></a>
                                    </div>
                                    <?php if(sizeof($food->images_files) != 0): ?>
                                        <?php
                                            $images_files_index = 2;
                                        ?>
                                        <?php $__currentLoopData = $food->images_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-small-image img-full">
                                                <a data-toggle="tab" id="single-slide-tab-<?php echo e($images_files_index); ?>" href="#single-slide<?php echo e($images_files_index); ?>">
                                                    <img src="<?php echo e($data); ?>" class="img-fluid" alt=""></a>
                                            </div>
                                            <?php
                                                $images_files_index++;
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">

                    <div class="product-feature-details">
                        <h2 class="product-title mb-15"><?php echo e($food->name); ?></h2>

                        <h2 class="product-price mb-15">
                            <?php if(sizeof($food->variants) == 0): ?>
                                <?php if($food->discountprice == 0): ?>
                                    <span class="discounted-price"> <?php echo e($currency->makePrice($food->price)); ?></span>
                                <?php else: ?>
                                    <span class="main-price"><?php echo e($currency->makePrice($food->price)); ?></span>
                                    <span class="discounted-price"> <?php echo e($currency->makePrice($food->discountprice)); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </h2>

                        <p class="product-description mb-20"><?php echo e($food->desc); ?></p>

                        <?php $__currentLoopData = $food->nutritionsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-inline" style="background-color: lightslategrey; color: white; padding: 10px; margin: 10px; border-radius: 10px; line-height: 50px">
                                <?php echo e($data->name); ?>

                                <?php echo e($data->desc); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(count($food->variants) != 0): ?>
                        <hr>
                        <div id="variants" class="cart-buttons mb-20">
                            <?php $__currentLoopData = $food->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="variants<?php echo e($data->id); ?>" style="font-weight: bold; margin-bottom: 10px">
                                    <?php if($data->image == ""): ?>
                                        <canvas style="width: 70px; height: 50px"></canvas>
                                    <?php else: ?>
                                        <img src="<?php echo e($data->image); ?>" style="width:auto; height:50px; vertical-align:sub; margin-right: 20px; ">
                                    <?php endif; ?>
                                    <canvas id="radio2<?php echo e($data->id); ?>" width="30" height="30" onclick="onRadioClick2(<?php echo e($data->id); ?>);"></canvas>
                                    <span style="vertical-align: super; font-size: 20px; margin-left: 10px;"><?php echo e($data->name); ?></span>
                                    
                                    <?php if($data->dprice2 == ""): ?>
                                        <span class="main-price" style="font-size: 25px; float: right; margin-top: 15px"><?php echo e($currency->makePrice($data->price)); ?></span>
                                    <?php else: ?>
                                        <span class="main-price" style="font-size: 20px; float: right; margin-left: 10px; text-decoration: line-through; color: #999; margin-top: 15px"><?php echo e($data->price2); ?></span>
                                        <span class="discounted-price" style="font-size: 25px; float: right; color: #<?php echo e($theme->getMainColor()); ?>; margin-top: 15px"><?php echo e($data->dprice2); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if(count($food->extrasdata) != 0): ?>
                        <hr>
                        <h4 class="mb-20"><?php echo e($lang->get(157)); ?></h4> 
                        <div id="extras" class="cart-buttons mb-20">
                            <?php $__currentLoopData = $food->extrasdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="extras<?php echo e($data->id); ?>" style="font-weight: bold;">
                                    <?php if($data->image == ""): ?>
                                        <canvas style="width: 70px; height: 50px"></canvas>
                                    <?php else: ?>
                                        <img src="<?php echo e($data->image); ?>" style="width:50px; height:50px; vertical-align:sub; margin-right: 20px; ">
                                    <?php endif; ?>
                                    <div class="d-inline" id="radio3<?php echo e($data->id); ?>" width="50px" height="50px" onclick="onRadioClick3(<?php echo e($data->id); ?>);"></div>
                                    <span style="vertical-align: super; font-size: 20px; margin-left: 10px;"><?php echo e($data->name); ?></span>
                                    
                                    <span class="main-price" style="font-size: 25px; float: right; margin-top: 15px"><?php echo e($currency->makePrice($data->price)); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <hr>
                    <?php endif; ?>

                        <div class="cart-buttons mb-20">
                            <div class="pro-qty mr-20 mb-xs-20">
                                <input id="product_details_count" type="text" value="1">
                            </div>
                            <div class="btn btn-primary save-change-btn mt-0" onClick="addToBasketByIdCount(<?php echo e($food->id); ?>, selectedItem2, arrayExtras);">
                                 <?php echo e($lang->get(49)); ?>  
                            </div>
                        </div>
                        <div class="single-product-action-btn mb-20">
                            <a href="#" onClick="addToWishList(<?php echo e($food->id); ?>);" data-tooltip="<?php echo e($lang->get(15)); ?>"> <span class="icon_heart_alt"></span> <?php echo e($lang->get(15)); ?></a>  
                        </div>

                        <div class="single-product-category mb-20">
                            <h3><?php echo e($lang->get(50)); ?>: <span><a href="<?php echo e(route('/category')); ?>?cat=<?php echo e($category->getIdByFoodId($food->id)); ?>"><?php echo e($category->getNameByFoodId($food->id)); ?></a></span></h3> 
                        </div>

                    </div>

                </div>
            </div>
        </div>



    <?php if(sizeof($food->rproducts_foods) != 0): ?>
        <div class="slider related-product-slider mb-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="<?php echo e($theme->getMainColor()); ?>">
                            <h3><?php echo e($lang->get(149)); ?></h3>  
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="related-product-slider-wrapper">
                            <?php echo $__env->make('elements.topfoods', array('products' => $food->rproducts_foods, 'type' => 1), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>



        <?php echo $__env->make('elements.topfoodsslider', array('topfoods' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div>

<script>

    //
    // radio 2
    //
    var selectedItem2 = "";
    var arrayVariants2 = [];
    <?php $__currentLoopData = $food->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    arrayVariants2.push({
        id: <?php echo e($item->id); ?>,
        select: false
    });
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    if (arrayVariants2.length != 0)
        arrayVariants2[0].select = true;

    function onRadioClick2(id){
        selectedItem2 = id;
        console.log("arrayVariants ");
        console.log(arrayVariants2);
        arrayVariants2.forEach(function(item, i, arr) {
            item.select = false;
            if (item.id == id)
                item.select = true;
        });
        drawRadios2();
    }

    function drawRadios2(){
        console.log(arrayVariants2);
        arrayVariants2.forEach(function(item, i, arr) {
            drawRadio2(`radio2${item.id}`, item.select, "#<?php echo e($theme->getMainColor()); ?>");
        });
    }

    function drawRadio2(id, check, color){
        var canvas = document.getElementById(id);
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, 30, 30);

        ctx.beginPath();
        ctx.lineWidth=2;
        ctx.strokeStyle=color;
        ctx.arc(15,15,10,0,12);
        ctx.stroke();
        if (check) {
            ctx.beginPath();
            ctx.arc(15, 15, 5, 0, 12);
            ctx.fillStyle = color;
            ctx.fill();
        }
    }

    //
    // End radio 2
    //

    //
    // radio 3
    //
    var arrayExtras = [];
    <?php $__currentLoopData = $food->extrasdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    arrayExtras.push({
        id: <?php echo e($item->id); ?>,
        name: "<?php echo e($item->name); ?>",
        image: "<?php echo e($item->image); ?>",
        price: <?php echo e($item->price); ?>,
        select: false
    });
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    function onRadioClick3(id){
        console.log("arrayVariants ");
        console.log(arrayExtras);
        arrayExtras.forEach(function(item, i, arr) {
            if (item.id == id)
                item.select = !item.select;
        });
        drawMultipleCheckBoxes();
    }

    function drawMultipleCheckBoxes(){
        arrayExtras.forEach(function(item, i, arr) {
            drawMultipleCheckBox(`radio3${item.id}`, item.select, "#<?php echo e($theme->getMainColor()); ?>");
        });
    }

    function drawMultipleCheckBox(id, check, color){
        var value = "on";
        if (!check)
            value = "off";
        document.getElementById(id).innerHTML = `<img src="img/check_${value}.png" width="25px" style="margin-bottom: 25px">`;
    }

    //
    // End radio 3
    //

    drawRadios2();
    drawMultipleCheckBoxes();

</script>
<!--=====  down of page  ======-->

<?php echo $__env->make('elements.footer', array('docs' => $docs->get($market)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=====  Dialogs, elements, etc  ======-->

<?php echo $__env->make('elements.dialogDetails', array('pages' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.wishlist', array('default_tax' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('elements.bottom', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/details.blade.php ENDPATH**/ ?>