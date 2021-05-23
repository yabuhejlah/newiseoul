<?php $lang = app('App\Lang'); ?>
<?php $theme = app('App\Theme'); ?>
<?php $currency = app('App\Currency'); ?>

<?php echo $__env->make('elements.cartlist', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<header>
    <div class="header-top pt-10 pb-10 pt-lg-10 pb-lg-10 pt-md-10 pb-md-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center text-sm-left">
                    <div class="lang-currency-dropdown">
                        <ul>
                            <li> <a href="#"><?php echo e($lang->defLangName()); ?> <i class="fa fa-chevron-down"></i></a>
                                <ul>
                                    <?php $__currentLoopData = $lang->langs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($lang->defLang() != $data["file"]): ?>
                                            <li><a href="<?php echo e(route('/setLang')); ?>?lang=<?php echo e($data['file']); ?>"><?php echo e($data["name"]); ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  text-center text-sm-right">
                    <div class="header-top-menu">
                        <ul>
                            <?php if(Auth::check()): ?>
                                <li>
                                    <a href="<?php echo e(route('/chat')); ?>" style="display: inline-block;"><?php echo e($lang->get(146)); ?></a>  
                                    <div id="chat-count" style="background-color: red; height: 20px; width: 20px; border-radius: 50%; display: inline-block" hidden>
                                        <div id="chat-messages-count" style="display: table; margin: 0 auto; color: white; vertical-align: middle; text-align: center;">0</div>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('/account')); ?>"><?php echo e($lang->get(41)); ?></a></li> 
                            <li><a href="<?php echo e(route('/wishlist')); ?>"><?php echo e($lang->get(42)); ?></a></li> 
                            <?php if(Auth::check()): ?>
                                <li><a href="<?php echo e(route('/cart')); ?>"><?php echo e($lang->get(113)); ?></a></li> 
                                <li><a onclick="logoutFromAccount();" href="#" ><?php echo e($lang->get(56)); ?></a></li> 
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container">
            <div class="row">
                <div class="row col-md-12 q-mt10">
                    <div class="col-md-8 px-0">
                        <div class="d-flex" style="margin-left: 20px">
                            <a href="<?php echo e(route('/')); ?>">
                                <img src="<?php echo e($theme->getLogo()); ?>" class="img-fluid d-inline" style="max-height: 80px;">
                            </a>
                            <div class="container">
                                <?php echo $__env->make('elements.search', array('default_tax' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6  align-self-center">
                        <?php echo $__env->make('elements.basket', array('1' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <!-- Menu  -->
                <?php echo $__env->make('elements.menu', array('parent' => '-1'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="col-12">
                    <!-- Mobile Menu -->
                    <div class="mobile-menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function logoutFromAccount(){
        clearBasket();
        window.location='<?php echo e(route('/logout')); ?>';
    }

    setInterval(getChatNewMessages, 10000); // one time in 10 sec
    getChatNewMessages();

    function getChatNewMessages() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("getChatMessagesNewCount")); ?>',
            data: {
            },
            success: function (data){
                console.log(data);
                if (data.error != "0")
                    return;
                if (document.getElementById("chat-count") != null)
                    document.getElementById("chat-count").hidden = true;
                if (data.count == 0)
                    return;
                document.getElementById("chat-count").hidden = false;
                document.getElementById("chat-messages-count").innerHTML = data.count;
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }


    function gridFood(id, image, name, price2, priceDiscount, rest_drating, restName, rest_rating, restId){

        if (<?php echo e($currency->rightSymbol()); ?> == "false"){
            var price = parseFloat(price2).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
            var discPrice = parseFloat(priceDiscount).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
        }else{
            var price = "<?php echo e($currency->currency()); ?>" + parseFloat(price2).toFixed(<?php echo e($currency->symbolDigits()); ?>);
            var discPrice = "<?php echo e($currency->currency()); ?>" + parseFloat(priceDiscount).toFixed(<?php echo e($currency->symbolDigits()); ?>);
        }

        if (priceDiscount != 0)
            var textPrice = `<span class="main-price">${price}</span><span class="discounted-price">${discPrice}</span>`;
        else
            var textPrice = `<span class="discounted-price">${price}</span>`;

        var sale = "";
        if (priceDiscount != 0)
            sale = `<span class="onsale"><?php echo e($lang->get(1)); ?></span>`;  // Sale

        var ratings = createRatings(rest_drating);

        text = `
<div class="gf-product shop-grid-view-product">
    <div class="image">
        <a href="<?php echo e(route('/foodDetails')); ?>?id=${id}">
            ${sale}
            <img src="${image}" class="img-fluid" style="height: 200px; width: auto;">
        </a>
        <div class="product-hover-icons">
            <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(14)); ?>" onClick="addToBasketById(${id});"> <img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> 
        <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(15)); ?>" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList(${id});"> </a> 
        <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(16)); ?>" onClick="openModal(${id});" data-toggle="modal" data-target="#quick-view-modal-container">  
        <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
    </div>
    </div>
    <div class="product-content">
    <h3 class="product-title" style="height: 3em;"><a href="javascript:void(0);" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
        ${name}
        </a></h3>
            <div class="price-box">
                ${textPrice}
            </div>
            <a href="shop?id=${restId}">${restName}</a>
            <div>
                ${ratings}
                ${rest_rating}
            </div>
        </div>
    </div>
        `;
        return text;
    }

    function listFood(item){

        if (<?php echo e($currency->rightSymbol()); ?> == "false"){
            var price = parseFloat(item.price).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
            var discPrice = parseFloat(item.discountprice).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
        }else{
            var price = "<?php echo e($currency->currency()); ?>" + parseFloat(item.price).toFixed(<?php echo e($currency->symbolDigits()); ?>);
            var discPrice = "<?php echo e($currency->currency()); ?>" + parseFloat(item.discountprice).toFixed(<?php echo e($currency->symbolDigits()); ?>);
        }

        if (item.discountprice != 0)
            var textPrice = `<span class="main-price">${price}</span><span class="discounted-price">${discPrice}</span>`;
        else
            var textPrice = `<span class="discounted-price">${price}</span>`;

        var sale = "";
        if (item.discountprice != 0)
            sale = `<span class="onsale"><?php echo e($lang->get(1)); ?></span>`;  // sale

        var ratings = createRatings(item.rest_drating);
        console.log(item.restName);
        text = `
            <div class="gf-product shop-list-view-product">
                <div class="image">
                    <a href="<?php echo e(route('/foodDetails')); ?>?id=${item.id}">
                        ${sale}
                        <img src="${item.image}" class="img-fluid" style="height: 200px; width: auto;">
                    </a>
                    </div>
                    <div class="product-content">
                    <h3 class="product-title"><a href="<?php echo e(route('/foodDetails')); ?>?id=${item.id}">${item.name}</a></h3>
                    <div class="price-box mb-20">
                    ${textPrice}
                    </div>
                    <p class="product-description">${item.desc}</p>
                    <div class="list-product-icons">
                        <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(16)); ?>" onClick="openModal(${item.id});" data-toggle="modal" data-target="#quick-view-modal-container">  
                        <img src="img/view.png" class="img-fluid" style="padding: 10px"> </a>
                        <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(14)); ?>" onClick="addToBasketById(${item.id});"> <img src="img/cartw.png" class="img-fluid" style="padding: 10px"></a> 
                        <a href="javascript:void(0);" data-tooltip="<?php echo e($lang->get(15)); ?>" > <img src="img/addwash.png" class="img-fluid" style="padding: 10px" onClick="addToWishList(${item.id});"> </a> 
                        </div>
                        <div style="margin-top: 30px">

                        <a href="shop?id=${item.restId}">${item.restName}</a>

                </div>
                <div>
                    ${ratings}
                    ${item.rest_rating}
                </div>
            </div>
        </div>`;
        return text;
    }

</script>

<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/header.blade.php ENDPATH**/ ?>