<?php $category = app('App\Categories'); ?>


<?php $__currentLoopData = $category->get(false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($data->parent == $parent): ?>
        <?php $sub = 0; ?>
        <?php $__currentLoopData = $category->get(false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($data2->parent == $data->id): ?>
                <?php $sub = 1; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($sub == 1): ?>
            <li class="menu-item-has-children"><a href="category?cat=<?php echo e($data->id); ?>"><?php echo e($data->name); ?> <img src="img/arrowr.png" class="img-fluid" style="float: right; height: 10px; margin-top: 5px;"/></a>
                <ul class="sub-menu">
                    <?php echo $__env->make('elements.menucat', array('parent' => $data->id), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
        <?php else: ?>
            <li class="menu-item-has-children"><a href="category?cat=<?php echo e($data->id); ?>"><?php echo e($data->name); ?></a>
        <?php endif; ?>
        </li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/menucat.blade.php ENDPATH**/ ?>