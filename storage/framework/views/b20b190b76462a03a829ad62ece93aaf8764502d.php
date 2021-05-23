<?php $currency = app('App\Currency'); ?>
<?php $lang = app('App\Lang'); ?>


<?php if(isset($data)): ?>
    <?php echo $__env->make('elements.oneItem', array('data' => $data, 'type' => 1), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/gridfood.blade.php ENDPATH**/ ?>