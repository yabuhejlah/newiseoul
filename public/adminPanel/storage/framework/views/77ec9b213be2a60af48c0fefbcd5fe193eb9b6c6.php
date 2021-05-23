<?php if(\Request::is($href)): ?>
    <li class="active">
<?php else: ?>
    <li class="item">
<?php endif; ?>
    <a href="<?php echo e($href); ?>" >
        <i class="material-icons"><?php echo e($icon); ?></i>
        <span class="menu-icon"><?php echo e($text); ?></span>
    </a>
</li>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/menuItem.blade.php ENDPATH**/ ?>