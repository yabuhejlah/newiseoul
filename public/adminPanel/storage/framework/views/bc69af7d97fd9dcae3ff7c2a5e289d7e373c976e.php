<?php $userinfo = app('App\UserInfo'); ?>

<?php $lang = app('App\Lang'); ?>

<?php $__env->startSection('content'); ?>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(280)); ?></h3>
            </div>
        </div>
    </div>

    <div class="body">

        <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
            <?php if($userinfo->getUserPermission("RestaurantReview::Create")): ?>
            <li role="presentation"><a href="#create" data-toggle="tab" ><h4><?php echo e($lang->get(65)); ?></h4></a></li>
            <?php endif; ?>
        </ul>

        <!-- Tab List -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <?php

                ?>
                <?php if($texton == "green"): ?>
                    <div class="alert bg-green" >
                        <?php echo e($text); ?>

                    </div>
                <?php endif; ?>
                <div id="redzone" class="alert bg-red" hidden>
                </div>

                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h3>
                                    <?php echo e($lang->get(281)); ?>

                                </h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(282)); ?></th>
                                            <th><?php echo e($lang->get(283)); ?></th>
                                            <th><?php echo e($lang->get(284)); ?></th>
                                            <th><?php echo e($lang->get(137)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(285)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(282)); ?></th>
                                            <th><?php echo e($lang->get(283)); ?></th>
                                            <th><?php echo e($lang->get(284)); ?></th>
                                            <th><?php echo e($lang->get(137)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(285)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php $__currentLoopData = $idata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->updated_at); ?></td>

                                                <td><?php echo e($data->title); ?></td>

                                                <td><?php echo e($data->text); ?></td>

                                                <td>
                                                    <?php if($data->show == 2): ?>
                                                        Send to All Users
                                                    <?php endif; ?>
                                                    <?php if($data->show != 2): ?>
                                                        <?php $__currentLoopData = $iusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($value->id == $data->user): ?>
                                                                <?php echo e($value->name); ?>

                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php $__currentLoopData = $petani; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($dataimage->id == $data->image): ?>
                                                            <img src="images/<?php echo e($dataimage->filename); ?>" height="50" style='min-height: 50px; ' alt="">
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>Read <?php echo e($data->countRead); ?> from <?php echo e($data->countAll); ?> users</td>
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

            <!-- Tab Create -->


            <div role="tabpanel" class="tab-pane fade" id="create">

                <div id="redalert" class="alert bg-red" style='display:none;' >

                </div>

                <form id="formcreate" method="post" action="<?php echo e(url('sendmsg')); ?>"  >

                    <?php echo csrf_field(); ?>

                    <input type="hidden" id="imageid" name="imageid"/>

                    <div class="row clearfix">
                        <div class="col-md-2 form-control-label">
                            <label for="name"><h4>User <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <select name="user" id="user" class="form-control" data-live-search="true">
                                        <option value="-1" style="font-size: 18px !important;"><?php echo e($lang->get(286)); ?></option>     
                                        <?php $__currentLoopData = $iusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datausers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($datausers->id); ?>" style="font-size: 18px !important;"><?php echo e($datausers->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 form-control-label">
                            <label for="name"><h4><?php echo e($lang->get(283)); ?> <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="" maxlength="200">
                                    <label class="form-label"><?php echo e($lang->get(287)); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-2 form-control-label">
                            <label><h4><?php echo e($lang->get(288)); ?> <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="text" id="text" class="form-control" placeholder="" maxlength="1000">
                                </div>
                                <label class="font-12"><?php echo e($lang->get(289)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-2 form-control-label">
                            <label><h4><?php echo e($lang->get(290)); ?>:</h4></label>
                            <br>
                            <div align="center">
                                <button type="button" onclick="fromLibrary()" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(77)); ?></h5></button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div id="dropzone2" class="fallback dropzone">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3><?php echo e($lang->get(78)); ?></h3>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-12 form-control-label">
                            <div align="center">
                                <button type="submit"  class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(291)); ?></h5></button>
                            </div>
                        </div>
                    </div>


                </form>


            </div>


            <?php echo $__env->make('bsb.image', array('petani' => $petani), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <script>

                addDefault();

                function addDefault() {
                    document.getElementById("imageid").value = "<?php echo e($defaultImageId); ?>";
                    mockFile = {
                        name: "images/<?php echo e($defaultImage); ?>",
                        size: <?php echo e($filesize); ?>,
                        dataURL: "images/<?php echo e($defaultImage); ?>"
                    };
                    myDropzone.createThumbnailFromUrl(mockFile, myDropzone.options.thumbnailWidth, myDropzone.options.thumbnailHeight, myDropzone.options.thumbnailMethod, true, function (dataUrl) {
                        myDropzone.emit("thumbnail", mockFile, dataUrl);
                    });
                    myDropzone.emit("addedfile", mockFile);
                    myDropzone.emit("complete", mockFile);
                    myDropzone.files.push(mockFile);
                    editFileNameNotify = "<?php echo e($defaultImage); ?>";
                }

            </script>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/notify.blade.php ENDPATH**/ ?>