<?php $lang = app('App\Lang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(204)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

    <!-- Tabs -->

        <!-- Tab List -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <?php if($texton == "green"): ?>
                    <div class="alert bg-green" >
                        <?php echo e($text); ?>

                    </div>
                <?php endif; ?>

                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h3>
                                    <?php echo e($lang->get(205)); ?>

                                </h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(127)); ?></th>
                                            <th><?php echo e($lang->get(206)); ?></th>
                                            <th><?php echo e($lang->get(207)); ?></th>
                                            <th><?php echo e($lang->get(208)); ?></th>
                                            <th><?php echo e($lang->get(209)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(127)); ?></th>
                                            <th><?php echo e($lang->get(206)); ?></th>
                                            <th><?php echo e($lang->get(207)); ?></th>
                                            <th><?php echo e($lang->get(208)); ?></th>
                                            <th><?php echo e($lang->get(209)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php $__currentLoopData = $idata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->value); ?></td>

                                                <td>
                                                    <?php if($data->role1 == "1"): ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id1_" . $data->id, 'text' => "", 'initvalue' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id1_" . $data->id, 'text' => "", 'initvalue' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if($data->role2 == "1"): ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id2_" . $data->id, 'text' => "", 'initvalue' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id2_" . $data->id, 'text' => "", 'initvalue' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if($data->role3 == "1"): ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id3_" . $data->id, 'text' => "", 'initvalue' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id3_" . $data->id, 'text' => "", 'initvalue' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if($data->role4 == "1"): ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id4_" . $data->id, 'text' => "", 'initvalue' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('elements.form.check', array('id' => "id4_" . $data->id, 'text' => "", 'initvalue' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>

                                </div>
                                <?php echo $__env->make('elements.form.button', array('label' => $lang->get(142), 'onclick' => "onSave();"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <!-- End Tab List -->

<script>

    function onSave(){
        var data = {
        };
        <?php $__currentLoopData = $idata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            data.id1_<?php echo e($value->id); ?> = (id1_<?php echo e($value->id); ?>) ? "1" : "0";
            data.id2_<?php echo e($value->id); ?> = (id2_<?php echo e($value->id); ?>) ? "1" : "0";
            data.id3_<?php echo e($value->id); ?> = (id3_<?php echo e($value->id); ?>) ? "1" : "0";
            data.id4_<?php echo e($value->id); ?> = (id4_<?php echo e($value->id); ?>) ? "1" : "0";
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("permissionSet")); ?>',
            data: data,
            success: function (data){
                console.log(data);
                if (data.error == "3")
                    return showNotification("bg-red", data.text, "bottom", "center", "", "");  // This is demo app. You can't change this section
                if (data.error == "2")
                    return showNotification("bg-red", "<?php echo e($lang->get(486)); ?>", "bottom", "center", "", "");  // Change Permissions can only Adminnistrator
                if (data.error != "0")
                    return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                else
                    return showNotification("bg-teal", "<?php echo e($lang->get(485)); ?>", "bottom", "center", "", "");  // 'Data saved',
            },
            error: function(e) {
                showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                console.log(e);
            }}
        );
    }

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/permissions.blade.php ENDPATH**/ ?>