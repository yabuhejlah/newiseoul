<?php $lang = app('App\Lang'); ?>
<?php $docs = app('App\Docs'); ?>

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
                        <li class="active"><?php echo e($lang->get(31)); ?></li>  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-page-container mb-50">
    <div class="container">

        <div class="cart-table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="pro-thumbnail"><?php echo e($lang->get(45)); ?></th>  
                    <th class="pro-title"><?php echo e($lang->get(46)); ?></th> 
                    <th class="pro-price"><?php echo e($lang->get(47)); ?></th> 
                    <th class="pro-remove"><?php echo e($lang->get(48)); ?></th> 
                </tr>
                </thead>
                <tbody id="wish_tbody">

                </tbody>
            </table>
        </div>

    </div>
</div>

<!--=====  down of page  ======-->

<?php echo $__env->make('elements.footer', array('docs' => $docs->get('0')), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=====  Dialogs, elements, etc  ======-->

<?php echo $__env->make('elements.dialogDetails', array('pages' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.wishlist', array('default_tax' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    initTableWish();
</script>

<?php echo $__env->make('elements.bottom', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/wish.blade.php ENDPATH**/ ?>