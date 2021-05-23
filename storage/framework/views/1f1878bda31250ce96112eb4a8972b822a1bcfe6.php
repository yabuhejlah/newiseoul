<?php $topfoods = app('App\TopFoods'); ?>


<div class="shop-page-container mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">

                <div class="sidebar-area">

                    <?php if($subcatCount != 0): ?>
                        <div class="sidebar mb-35">
                            <h3 class="sidebar-title"><?php echo e($lang->get(143)); ?></h3>  
                            <ul class="product-categories">
                                <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <canvas class="q-canvas-circle" width="15" height="15"></canvas>
                                        <a href="category?cat=<?php echo e($data->id); ?>&market=<?php echo e($market); ?>"><?php echo e($data->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->make('elements.filterprice', array('min' => $min, 'max' => $max), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!--=======  top foods  =======-->
                    <div class="sidebar mb-35">
                        <h3 class="sidebar-title"><?php echo e($lang->get(10)); ?></h3>       
                        <?php echo $__env->make('elements.topfoods', array('products' => $topfoods->getList(), 'type' => 2), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2 mb-sm-35 mb-xs-35">

                <div class="shop-header mb-35">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">

                            <!--=======  grid or list   =======-->

                            <div class="view-mode-icons mb-xs-10 px-0">
                                <a class="active" href="#" data-target="grid"><img src="img/grid.png" class="img-fluid" style="height: 25px; padding-top: 3px;"/></a>
                                <a href="#" data-target="list"><img src="img/list.png" class="img-fluid" style="height: 25px; padding-top: 3px;"/></a>
                            </div>

                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
                            <?php echo $__env->make('elements.sortfood', array('data' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <p id="resultPages" class="result-show-message">
                                <?php echo e($lang->get(2)); ?><?php echo e($page*12-11); ?>–<?php echo e($count_current+($page-1)*12); ?><?php echo e($lang->get(3)); ?><?php echo e($count); ?><?php echo e($lang->get(4)); ?></p>  
                        </div>
                    </div>
                </div>

                <!--=======  Foods list view  =======-->

                <div id="products" class="shop-product-wrap grid row no-gutters mb-35">

                    <?php echo $__env->make('elements.gridfood', array('data' => null), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('elements.listfood', array('data' => null), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                        <!--=======  Grid view product  =======-->
                        <?php echo $__env->make('elements.gridfood', array('data' => $data), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--=======  Shop list view product  =======-->
                        <?php echo $__env->make('elements.listfood', array('data' => $data), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(count($foods) == 0): ?>
                    <div class="d-flex justify-content-around" style="align-self: center!important; width: 100%">
                        <img src="img/nf.jpg">
                    </div>
                    <?php endif; ?>

                </div>

                <!--=======  Pagination container  =======-->

                <?php echo $__env->make('elements.pagination', array('pages' => $pages, 'page' => $page, 'min' => $min, 'max' => $max), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/products.blade.php ENDPATH**/ ?>