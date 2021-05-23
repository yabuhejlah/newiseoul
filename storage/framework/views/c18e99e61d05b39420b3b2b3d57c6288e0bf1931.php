<?php $currency = app('App\Currency'); ?>
<?php $topfoods = app('App\TopFoods'); ?>


<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('elements.oneItem', array('data' => $data, 'type' => $type), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/topfoods.blade.php ENDPATH**/ ?>