<?php $userinfo = app('App\UserInfo'); ?>

<?php $lang = app('App\Lang'); ?>

<?php $__env->startSection('content'); ?>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <div class="body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div id="orders" class="info-box bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">payment</i>
                    </div>
                    <div class="content">
                        <div class="font-30 font-bold"><?php echo e($currency); ?><?php echo e($earning); ?></div>
                        <div class="font-15"><?php echo e($lang->get(38)); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="orders4" class="info-box bg-teal hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">assessment</i>
                    </div>
                    <div class="content">
                        <div class="font-30 font-bold"><?php echo e($orderscount); ?></div>
                        <div class="font-15"><?php echo e($lang->get(39)); ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="users" class="info-box bg-cyan hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">person_outline</i>
                </div>
                <div class="content">
                    <div class="font-30 font-bold"><?php echo e($userscount); ?></div>
                    <div class="font-15"><?php echo e($lang->get(40)); ?></div>
                </div>
            </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="restaurants" class="info-box bg-teal hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">restaurant</i>
                    </div>
                    <div class="content">
                        <div class="font-30 font-bold"><?php echo e($restaurantsCount); ?></div>
                        <div class="font-15"><?php echo e($lang->get(41)); ?></div>
                    </div>
                </div>
            </div>

        <div id="orders2" class="col-md-12">
            <div class="card">
                <div class="body">
                    <canvas id="line_chart" height="50"></canvas>
                </div>
            </div>
        </div>

        <div id="orders3" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3>
                                <?php echo e($lang->get(42)); ?>

                            </h3>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th><?php echo e($lang->get(43)); ?></th>
                                        <th><?php echo e($lang->get(44)); ?></th>
                                        <th><?php echo e($lang->get(45)); ?></th>
                                        <th><?php echo e($lang->get(46)); ?></th>
                                        <th><?php echo e($lang->get(47)); ?></th>
                                        <th><?php echo e($lang->get(48)); ?></th>
                                        <th><?php echo e($lang->get(49)); ?></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th><?php echo e($lang->get(43)); ?></th>
                                        <th><?php echo e($lang->get(44)); ?></th>
                                        <th><?php echo e($lang->get(45)); ?></th>
                                        <th><?php echo e($lang->get(46)); ?></th>
                                        <th><?php echo e($lang->get(47)); ?></th>
                                        <th><?php echo e($lang->get(48)); ?></th>
                                        <th><?php echo e($lang->get(49)); ?></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $__currentLoopData = $iorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($data->send == 1): ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->id); ?></td>
                                                <td id="total<?php echo e($data->id); ?>"><?php echo e($currency); ?><?php echo e($data->total); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $iusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($idata->id == $data->user): ?>
                                                            <?php echo e($idata->name); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>

                                                <td>
                                                    <?php $__currentLoopData = $iorderstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($idata->id == $data->status): ?>
                                                            <?php echo e($idata->status); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>

                                                <td>
                                                    <?php $__currentLoopData = $irestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($idata->id == $data->restaurant): ?>
                                                            <?php echo e($idata->name); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>
                                                    <?php if($data->curbsidePickup == "true"): ?>
                                                        <span class="badge bg-red">Curbside Pickup</span>
                                                    <?php endif; ?>
                                                    <?php if($data->arrived == "true"): ?>
                                                        <span class="badge bg-red">Customer arrived</span><br>
                                                    <?php else: ?>
                                                        <br>
                                                    <?php endif; ?>
                                                    <span class="badge bg-teal"><?php echo e($data->method); ?></span>
                                                </td>
                                                <td><?php echo e($data->updated_at); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>


    <script>
        new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));

        function getChartJs(type) {
            var config = null;

            if (type === 'line') {
                config = {
                    type: 'line',
                    data: {
                        labels: ["<?php echo e($lang->get(50)); ?>", "<?php echo e($lang->get(51)); ?>", "<?php echo e($lang->get(52)); ?>", "<?php echo e($lang->get(53)); ?>",
                            "<?php echo e($lang->get(54)); ?>", "<?php echo e($lang->get(55)); ?>", "<?php echo e($lang->get(56)); ?>", "<?php echo e($lang->get(57)); ?>",
                            "<?php echo e($lang->get(58)); ?>", "<?php echo e($lang->get(59)); ?>", "<?php echo e($lang->get(60)); ?>", "<?php echo e($lang->get(61)); ?>"],
                        datasets: [{
                            label: "<?php echo e($lang->get(62)); ?>",
                            data: [<?php echo e($e1); ?>, <?php echo e($e2); ?>, <?php echo e($e3); ?>, <?php echo e($e4); ?>, <?php echo e($e5); ?>, <?php echo e($e6); ?>, <?php echo e($e7); ?>, <?php echo e($e8); ?>, <?php echo e($e9); ?>, <?php echo e($e10); ?>, <?php echo e($e11); ?>, <?php echo e($e12); ?>],
                            borderColor: 'rgba(0, 188, 212, 0.75)',
                            backgroundColor: 'rgba(0, 188, 212, 0.3)',
                            pointBorderColor: 'rgba(0, 188, 212, 0)',
                            pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                            pointBorderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
            return config;
        }

        var orders = document.getElementById('orders');
        orders.style.cursor = 'pointer';
        orders.onclick = function() {
            window.location='orders';
        };

        var orders2 = document.getElementById('orders2');
        orders2.style.cursor = 'pointer';
        orders2.onclick = function() {
            window.location='orders';
        };

        var orders3 = document.getElementById('orders3');
        orders3.style.cursor = 'pointer';
        orders3.onclick = function() {
            window.location='orders';
        };

        var orders4 = document.getElementById('orders4');
        orders4.style.cursor = 'pointer';
        orders4.onclick = function() {
            window.location='orders';
        };

        var users = document.getElementById('users');
        users.style.cursor = 'pointer';
        users.onclick = function() {
            window.location='users';
        };

        var restaurants = document.getElementById('restaurants');
        restaurants.style.cursor = 'pointer';
        restaurants.onclick = function() {
            window.location='restaurants';
        };

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/home.blade.php ENDPATH**/ ?>