<?php $lang = app('App\Lang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(247)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

        <!-- Tabs -->

        <!-- Tab List -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(47)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(248)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(47)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(248)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php $__currentLoopData = $idata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr >
                                                <td><?php echo e($data->name); ?></td>
                                                <td><?php echo e($data->restaurantname); ?></td>
                                                <td><img src="images/<?php echo e($data->image); ?>" height="50"></td>
                                                <td><?php echo e($data->result); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <!-- End Tab List -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restaurants\resources\views/mostpurchase.blade.php ENDPATH**/ ?>