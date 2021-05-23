<?php if($type == 1): ?>
    <div class="breadcrumb-area q-mb20 q-mt20">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <?php if($market != '0' && $market != '' ): ?>
                                <li><a href="shop?id=<?php echo e($market); ?>"><i class="fa fa-home q-mr10"></i><?php echo e($marketName); ?></a></li>      
                                <?php $__currentLoopData = $catNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="category?cat=<?php echo e($data->id); ?>&market=<?php echo e($market); ?>"><?php echo e($data->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('/')); ?>"><i class="fa fa-home q-mr10"></i><?php echo e($lang->get(12)); ?></a></li>      
                                <?php $__currentLoopData = $catNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="category?cat=<?php echo e($data->id); ?>"><?php echo e($data->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/broadcrumb.blade.php ENDPATH**/ ?>