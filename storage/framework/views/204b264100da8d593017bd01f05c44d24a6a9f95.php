<?php $theme = app('App\Theme'); ?>
<?php $currency = app('App\Currency'); ?>

<head>
    <meta charset="utf-8">
    <title><?php echo e($title); ?></title>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon-->
    <link rel="icon" href="<?php echo e($theme->getLogo()); ?>" type="image/png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugin.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/utils.css" rel="stylesheet">
    <link href="css/easyzoom.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="js/modernizr-2.8.3.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/colors.js"></script>
    <script src="js/plugin.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="js/sweetalert/sweetalert.css" rel="stylesheet" />
    <script src="js/sweetalert/sweetalert.min.js"></script>

    <?php echo $__env->make('elements.maincss', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        function makePrice(price){
            <?php if($currency->rightSymbol() == "false"): ?>
                return '<?php echo e($currency->currency()); ?>' + parseFloat(price).toFixed(<?php echo e($currency->symbolDigits()); ?>);
            <?php else: ?>
                return parseFloat(price).toFixed(<?php echo e($currency->symbolDigits()); ?>) + '<?php echo e($currency->currency()); ?>';
            <?php endif; ?>
        }

    </script>

</head>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/head.blade.php ENDPATH**/ ?>