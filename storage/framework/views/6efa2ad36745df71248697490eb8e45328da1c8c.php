<?php $lang = app('App\Lang'); ?>
<?php $docs = app('App\Docs'); ?>
<?php $theme = app('App\Theme'); ?>
<?php $utils = app('App\Utils'); ?>
<?php $currency = app('App\Currency'); ?>

<html>
    <?php echo $__env->make('elements.head', array('title' => $breadcrumb), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php echo $__env->make('elements.header', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- breadcrumb -->
<div class="breadcrumb-area q-mb20 q-mt10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="<?php echo e(route('/')); ?>"><i class="fa fa-home q-mr10"></i><?php echo e($lang->get(12)); ?></a></li>      
                        <li class="active"><?php echo e($breadcrumb); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shop page container -->

<div class="shop-page-container mb-50 ">
    <div class="container ">


                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered" style="background-color: #FFFFFF">
                        <thead class="thead-light">
                        <tr>
                            <th><?php echo e($lang->get(95)); ?></th> 
                            <th><?php echo e($lang->get(46)); ?></th> 
                            <th><?php echo e($lang->get(96)); ?></th> 
                            <th><?php echo e($lang->get(97)); ?></th> 
                            <th><?php echo e($lang->get(20)); ?></th> 
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><?php echo e($order->id); ?></td>
                                <td><?php echo e($order->food); ?></td>
                                <td>
                                    <div style="color: #<?php echo e($theme->getMainColor()); ?>">
                                        <?php echo e($utils->timeago($order->updated_at)); ?>

                                    </div>
                                    <br>
                                    <?php echo e($order->updated_at); ?>

                                </td>
                                <td><?php echo e($order->status); ?></td>
                                <td><?php echo e($currency->makePrice($order->total)); ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

        <table class="table table-bordered" style="background-color: #FFFFFF">
            <tbody>
            <?php $__currentLoopData = $ordersdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center"><img src="<?php echo e($data->image); ?>" class="img-fluid" style="max-height: 100px;"></td>
                    <td class="align-middle" align="right">
                        <?php if($data->count != 0): ?>
                        <?php echo e($data->count); ?> x <?php echo e($currency->makePrice($data->foodprice)); ?> = <?php echo e($currency->makePrice($data->count * $data->foodprice)); ?>

                        <?php else: ?>
                            <?php echo e($data->extrascount); ?> x <?php echo e($currency->makePrice($data->extrasprice)); ?> = <?php echo e($currency->makePrice($data->extrascount * $data->extrasprice)); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td></td>
                    <td class="align-middle" align="right">
                        <?php if($couponCode != null): ?>
                            <span class="text-info"><?php echo e($lang->get(100)); ?>:</span> <?php echo e($couponCode); ?> <br> 
                            <span class="text-info"><?php echo e($lang->get(19)); ?>:</span> <del><?php echo e($currency->makePrice($subtotalAll)); ?></del> <?php echo e($currency->makePrice($subtotal)); ?>  
                        <?php else: ?>
                            <span class="text-info"><?php echo e($lang->get(19)); ?>:</span> <?php echo e($currency->makePrice($subtotal)); ?>   
                        <?php endif; ?>
                        <br>
                        <span class="text-info"><?php echo e($lang->get(101)); ?>:</span> <?php echo e($currency->makePrice($fee)); ?>   
                        <br>
                        <span class="text-info"><?php echo e($lang->get(102)); ?>:</span> <?php echo e($currency->makePrice($tax)); ?>   
                        <br>
                        <span class="text-info"><?php echo e($lang->get(103)); ?>:</span> <?php echo e($currency->makePrice($total)); ?>   

                    </td>
                </tr>
            </tbody>
        </table>


    </div>
</div>

<!--=====  down of page  ======-->

<?php echo $__env->make('elements.footer', array('docs' => $docs->get('0')), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=====  Dialogs, elements, etc  ======-->

<?php echo $__env->make('elements.dialogDetails', array('pages' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.wishlist', array('default_tax' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('elements.bottom', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/orderinfo.blade.php ENDPATH**/ ?>