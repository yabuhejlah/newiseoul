<?php $lang = app('App\Lang'); ?>
<?php $docs = app('App\Docs'); ?>
<?php $basket = app('App\Basket'); ?>
<?php $settings = app('App\Settings'); ?>

<html>
    <?php echo $__env->make('elements.head', array('title' => $title), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<body>

<?php echo $__env->make('elements.header', array('1' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- breadcrumb -->
<div class="breadcrumb-area q-mb20 q-mt10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="<?php echo e(route('/')); ?>"><i class="fa fa-home q-mr10"></i><?php echo e($lang->get(12)); ?></a></li>      
                        <li class="active"><?php echo e($title); ?></li>  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-page-container mb-50">



    <div id="view-deliveryMethod" class="container">
        <div class="row" >
            <div class="col-12">
                <div class="cart-table">
                    <div class="account-details-form">
                        <div class="p-5">
                            <div class="myaccount-content">
                                <div class="col-12 mb-20">
                                    <p id="text_title" class="h5"><?php echo e($lang->get(135)); ?></p> 
                                </div>
                                <div class="col-12 mb-20">
                                    <p id="order-id" class="h6"></p>
                                </div>
                                <div class="col-12 mb-10">
                                    <p id="text-1" hidden><?php echo e($lang->get(132)); ?></p> 
                                </div>
                                <div class="col-12 mb-20">
                                    <p id="text-2" hidden><?php echo e($lang->get(133)); ?></p> 
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-30">
                                        <button onclick="onBackToHome();" class="save-btn"><?php echo e($lang->get(134)); ?></button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div >

</div>

<!--=====  down of page  ======-->

<?php echo $__env->make('elements.footer', array('docs' => $docs->get('0')), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=====  Dialogs, elements, etc  ======-->

<?php echo $__env->make('elements.dialogDetails', array('pages' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.cartlist', array('default_tax' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('elements.paypal', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

    <?php if($method == "paypal"): ?>
        initPayPalComplete();
    <?php endif; ?>

    <?php if($method == "Stripe"): ?>
        CreateOrder('<?php echo e($PayerID); ?>');
    <?php endif; ?>

    <?php if($method == "cash"): ?>
        CreateOrder("CashOnDeivery");
    <?php endif; ?>

    function CreateOrder(id){
        let order_info = JSON.parse(localStorage.getItem("order_info")) || [];
        if (order_info.total == null)
            return;

        console.log("CreateOrder");
        var data = {
            send: "1",
            tax: "<?php echo e($basket->default_tax()); ?>",
            fee: order_info.fee,
            method: id,
            hint: "",
            address: order_info.address,
            phone: order_info.phone,
            total: order_info.total,
            lat: order_info.lat,
            lng: order_info.lng,
            couponName: order_info.couponName,
            curbsidePickup: order_info.curbsidePickup,
            data: basketItems
        };
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("addToBasket")); ?>',
            data: data,
            success: function (data){
                console.log("CreateOrder");
                console.log(data);
                if (data.error === "0"){
                    document.getElementById("text_title").innerHTML = `<?php echo e($lang->get(130)); ?>`;    
                    document.getElementById("order-id").innerHTML = `<?php echo e($lang->get(131)); ?> ${data.orderid}`;  
                    document.getElementById("text-1").hidden = false;
                    document.getElementById("text-2").hidden = false;
                    localStorage.setItem('order_info', JSON.stringify({}));
                    basketItems = [];
                    localStorage.setItem('items', JSON.stringify(basketItems));
                    initBasket()
                } else
                    showNotification("pastel-danger", "<?php echo e($lang->get(89)); ?>", "bottom", "center", "", "");  // Something went wrong
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "<?php echo e($lang->get(89)); ?>", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

    function onBackToHome(){
        window.location="<?php echo e(route("/")); ?>";
    }

    function initPayPalComplete(){
        var username = '<?php echo e($settings->payPalClientId()); ?>';
        var password = '<?php echo e($settings->payPalSecret()); ?>';
        var name = window.btoa(`${username}:${password}`);
        console.log('initPayPalComplete');
        $.ajax({
            headers: {
                'Content-type': 'application/json',
                'Authorization': `Basic ${name}`
            },
            type: 'POST',
            url: `<?php echo e($settings->payPalUrl()); ?>/v1/payments/payment/<?php echo e($paymentId); ?>/execute`,
            data: `{
                "payer_id": "<?php echo e($PayerID); ?>"
            }`,
            success: function (data){
                console.log(data);
                if (data.transactions != null){
                    var res = data.transactions[0].related_resources;
                    if (res != null){
                        var id = res[0].sale.id;
                        console.log(id);
                        CreateOrder("PayPal_"+id);
                    }
                }
            },
            error: function(e) {
                console.log(e);
                showNotification("pastel-danger", "<?php echo e($lang->get(89)); ?>", "bottom", "center", "", "");  // Something went wrong
            }}
        );
    }

</script>

<?php echo $__env->make('elements.bottom', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/complete.blade.php ENDPATH**/ ?>