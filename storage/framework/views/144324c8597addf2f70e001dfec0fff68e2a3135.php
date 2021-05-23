<?php $lang = app('App\Lang'); ?>

<div class="col-md-1 ">
</div>
<div class="col-md-10 align-self-center">
    <div class="main-menu align-self-center container">
        <nav>
            <ul>
                <li><a href="<?php echo e(route('/')); ?>"><?php echo e($lang->get(12)); ?></a></li>      

                <li class="menu-item-has-children"><a href="#"><?php echo e($lang->get(13)); ?><img src="img/arrow.png" class="img-fluid" style="height: 15px; padding-left: 5px; padding-bottom: 5px"/></a>  
                    <ul class="sub-menu">
                        <?php echo $__env->make('elements.menucat', array('parent' => '-1'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/menu.blade.php ENDPATH**/ ?>