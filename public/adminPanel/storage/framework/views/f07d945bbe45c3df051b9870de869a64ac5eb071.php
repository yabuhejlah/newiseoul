<?php if(\Request::is($href)): ?>
    <li class="active">
<?php else: ?>
    <li>
<?php endif; ?>
    <a href="<?php echo e($href); ?>" >
        <?php echo e($text); ?>

    </a>
</li>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/menuSubItem.blade.php ENDPATH**/ ?>