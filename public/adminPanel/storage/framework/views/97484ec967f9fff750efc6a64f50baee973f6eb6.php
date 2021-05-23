<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(148)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

    <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
            <?php if($userinfo->getUserPermission("Restaurants::Create")): ?>
            <li role="presentation"><a href="#create" data-toggle="tab" ><h4><?php echo e($lang->get(65)); ?></h4></a></li>
            <?php endif; ?>
            <li id="tabEdit" style='display:none;' role="presentation"><a href="#edit" data-toggle="tab"><h4><?php echo e($lang->get(66)); ?></h4></a></li>
        </ul>


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
                                    <?php echo e($lang->get(149)); ?>

                                </h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(71)); ?></th>
                                            <th><?php echo e($lang->get(150)); ?></th>
                                            <th><?php echo e($lang->get(151)); ?></th>
                                            <th><?php echo e($lang->get(152)); ?></th>
                                            <th><?php echo e($lang->get(73)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(71)); ?></th>
                                            <th><?php echo e($lang->get(150)); ?></th>
                                            <th><?php echo e($lang->get(151)); ?></th>
                                            <th><?php echo e($lang->get(152)); ?></th>
                                            <th><?php echo e($lang->get(73)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>


                                        <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->name); ?></td>
                                                <td>
                                                    <img src="images/<?php echo e($data->filename); ?>" height="50" style='min-height: 50px; ' alt="">
                                                </td>

                                                <td><?php echo e($data->desc); ?></td>

                                                <td><?php echo e($data->address); ?></td>

                                                <td><?php echo e($data->phone); ?></td>

                                                <td><?php echo e($data->mobilephone); ?></td>

                                                <td>
                                                    <?php if($data->published == "1"): ?>
                                                        <img src="img/iconyes.png" width="40px">
                                                    <?php else: ?>
                                                        <img src="img/iconno.png" width="40px">
                                                    <?php endif; ?>
                                                </td>

                                                <td><?php echo e($data->updated_at); ?></td>

                                                <td>
                                                    <?php if($userinfo->getUserPermission("Restaurants::Edit")): ?>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                            onclick="editItem('<?php echo e($data->id); ?>','<?php echo e($data->name); ?>', '<?php echo e($data->published); ?>', '<?php echo e($data->imageid); ?>',
                                                                    '<?php echo e($data->filename); ?>', '<?php echo e($data->desc); ?>',
                                                                '<?php echo e($data->delivered); ?>', '<?php echo e($data->address); ?>', '<?php echo e($data->phone); ?>', '<?php echo e($data->mobilephone); ?>',
                                                                '<?php echo e($data->lat); ?>', '<?php echo e($data->lng); ?>', '<?php echo e($data->fee); ?>', '<?php echo e($data->percent); ?>', '<?php echo e($data->minAmount); ?>')">
                                                        <img src="img/iconedit.png" width="25px">
                                                    </button>
                                                    <?php endif; ?>
                                                    <?php if($userinfo->getUserPermission("Restaurants::Delete")): ?>
                                                    <button type="button" class="btn btn-default waves-effect" onclick="showDeleteMessage('<?php echo e($data->id); ?>')">
                                                        <img src="img/icondelete.png" width="25px">
                                                    </button>
                                                    <?php endif; ?>
                                                </td>
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

            <form id="formcreate" method="post" action="<?php echo e(url('restorantsadd')); ?>"  >

            <?php echo csrf_field(); ?>

            <input type="hidden" id="imageid" name="image"/>

            <div class="row clearfix">

                <div class="col-md-6 foodm">

                    <div class="col-md-3 foodm">
                        <label for="name"><h4><?php echo e($lang->get(69)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="name" id="name" class="form-control" placeholder="" maxlength="100">
                                <label class="form-label"><?php echo e($lang->get(91)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 foodm">
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group">
                            <input type="checkbox" id="visible" name="visible" class="filled-in checkmark" checked>
                            <label for="visible" class="foodlabel"><h4><?php echo e($lang->get(75)); ?></h4></label>
                        </div>
                    </div>

                    <div class="col-md-3 foodm" style="margin-top: 10px;">
                        <label for="name"><h4><?php echo e($lang->get(150)); ?></h4></label>
                    </div>
                    <div class="col-md-9 foodm " style="margin-top: 20px !important;">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="address" id="address" class="form-control" placeholder="" maxlength="100">
                                <label class="form-label"><?php echo e($lang->get(153)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(151)); ?></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="" maxlength="20">
                                <label class="form-label"><?php echo e($lang->get(154)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(155)); ?></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="mobilephone" id="mobilephone" class="form-control" placeholder="" maxlength="20">
                                <label class="form-label"><?php echo e($lang->get(156)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(71)); ?></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="desc" id="desc" class="form-control" placeholder="" maxlength="300">
                                <label class="form-label"><?php echo e($lang->get(76)); ?></label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 foodm">
                        <label><h4><?php echo e($lang->get(157)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-5 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="number" name="fee" id="fee" class="form-control" placeholder="" min="0" step="0.01">
                                <label class="form-label"><?php echo e($lang->get(158)); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 foodm">
                        <div class="form-group">
                            <input type="checkbox" id="percent" name="percent" class="filled-in checkmark">
                            <label for="percent" class="foodlabel"><h4><?php echo e($lang->get(159)); ?></h4></label>
                        </div>
                    </div>

                    <div class="col-md-12 info" style="margin-top: 5px; margin-left: 20px;">
                        <h4><?php echo e($lang->get(160)); ?></h4>
                        <p><?php echo e($lang->get(161)); ?></p>
                        <p id="current"><?php echo e($lang->get(162)); ?>: <?php echo e($currency); ?>0</p>
                    </div>


                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(163)); ?></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="number" name="area" id="area" class="form-control" placeholder="" value="30">
                                <label class="form-label"><?php echo e($lang->get(164)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(550)); ?></h4></label>  
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="number" name="minAmount" id="minAmount" class="form-control" placeholder="" value="0" step="0.01">
                                <label class="form-label"><?php echo e($lang->get(551)); ?></label> 
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-6 foodm">

                    <div class="col-md-3 foodm">
                        <label for="lat"><h4><?php echo e($lang->get(165)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="number" name="lat" id="lat" class="form-control" placeholder="" step="0.00000000000000001">
                                <label class="form-label"><?php echo e($lang->get(166)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 foodm">
                        <label for="lng"><h4><?php echo e($lang->get(167)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-9 foodm">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="number" name="lng" id="lng" class="form-control" placeholder="" step="0.00000000000000001">
                                <label class="form-label"><?php echo e($lang->get(168)); ?></label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(70)); ?>:</h4></label>
                        <br>
                        <div align="center">
                            <button type="button" onclick="fromLibrary()" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(77)); ?></h5></button>
                        </div>
                    </div>
                    <div class="col-md-9 foodm">
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


                    <div class="col-md-3 foodm">
                        <label><h4><?php echo e($lang->get(169)); ?>:</h4></label>
                    </div>
                    <div class="col-md-9 foodm" style="margin-top: 20px;">
                        <table border="0">
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5><?php echo e($lang->get(170)); ?></h5>
                                </td>
                                <td></td>
                                <td>
                                    <h5><?php echo e($lang->get(171)); ?></h5>
                                </td>

                            </tr>
                            <tr>
                                <td><h5><?php echo e($lang->get(172)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeMonday" id="openTimeMonday" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeMonday" id="closeTimeMonday" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                            </tr>
                            <tr>
                                <td><h5><?php echo e($lang->get(173)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeTuesday" id="openTimeTuesday" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeTuesday" id="closeTimeTuesday" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                            </tr>
                            <tr style="margin-top: 5px;">
                                <td><h5><?php echo e($lang->get(174)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeWednesday" id="openTimeWednesday" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeWednesday" id="closeTimeWednesday" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                            </tr>
                            <tr style="margin-top: 5px;">
                                <td><h5><?php echo e($lang->get(175)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeThursday" id="openTimeThursday" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeThursday" id="closeTimeThursday" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                            </tr>
                            <tr>
                                <td><h5><?php echo e($lang->get(176)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeFriday" id="openTimeFriday" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg " style="margin-top: 5px;">
                                            <input type="text" name="closeTimeFriday" id="closeTimeFriday" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                            </tr>
                            <tr>
                                <td><h5><?php echo e($lang->get(177)); ?>:<h5></td>
                                <td width="5%"></td>
                                <td>
                                    <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                        <input type="text" name="openTimeSaturday" id="openTimeSaturday" class="form-control time24" placeholder="Ex: 10:00">
                                    </div>
                                </td>
                                <td width="5%"></td>
                                <td>
                                    <div class="demo-masked-input input-group-lg " style="margin-top: 5px;">
                                        <input type="text" name="closeTimeSaturday" id="closeTimeSaturday" class="form-control time24" placeholder="Ex: 23:00">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><h5><?php echo e($lang->get(178)); ?>:<h5></td>
                                <td width="5%"></td>
                                <td>
                                    <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                        <input type="text" name="openTimeSunday" id="openTimeSunday" class="form-control time24" placeholder="Ex: 10:00">
                                    </div>
                                </td>
                                <td width="5%"></td>
                                <td>
                                    <div class="demo-masked-input input-group-lg " style="margin-top: 5px;">
                                        <input type="text" name="closeTimeSunday" id="closeTimeSunday" class="form-control time24" placeholder="Ex: 23:00">
                                    </div>
                                </td>
                            </tr>

                        </table>

                    </div>



                </div>

            </div>

            <div class="row clearfix">
                <div class="col-md-12 form-control-label">
                    <div align="center">
                    <button type="submit"  class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(142)); ?></h5></button>
                    </div>
                </div>
            </div>


        </form>


    </div>

    <!-- Tab Edit -->

        <div role="tabpanel" class="tab-pane fade" id="edit">

            <div id="redalertEdit" class="alert bg-red" style='display:none;' >

            </div>

            <form id="formedit" method="post" action="<?php echo e(url('restaurantsedit')); ?>"  >
                <?php echo csrf_field(); ?>

                <input type="hidden" id="imageidEdit" name="image"/>
                <input type="hidden" id="editid" name="id"/>

                <div class="row clearfix">

                    <div class="col-md-6 foodm">

                        <div class="col-md-3 foodm">
                            <label for="name"><h4><?php echo e($lang->get(69)); ?> <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="text" name="name" id="nameEdit" class="form-control" placeholder="" maxlength="100">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(91)); ?></label>
                            </div>
                        </div>


                        <div class="col-md-3 foodm">
                            <label for="name"><h4><?php echo e($lang->get(150)); ?></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="text" name="address" id="addressEdit" class="form-control" placeholder="" maxlength="100">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(153)); ?></label>
                            </div>
                        </div>

                        <div class="col-md-3 foodm">
                            <label><h4><?php echo e($lang->get(152)); ?></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="text" name="phone" id="phoneEdit" class="form-control" placeholder="" maxlength="20">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(154)); ?></label>
                            </div>
                        </div>

                        <div class="col-md-3 foodm">
                            <label><h4><?php echo e($lang->get(155)); ?></h4></label>
                        </div>

                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="text" name="mobilephone" id="mobilephoneEdit" class="form-control" placeholder="" maxlength="20">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(156)); ?></label>
                            </div>
                        </div>

                        <div class="col-md-3 foodm">
                            <label><h4><?php echo e($lang->get(71)); ?></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="text" name="desc" id="descEdit" class="form-control" placeholder="" maxlength="300">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(76)); ?></label>
                            </div>
                        </div>

                        <div class="col-md-4 foodm">
                            <label><h4><?php echo e($lang->get(157)); ?> <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-5 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="number" name="fee" id="feeEdit" class="form-control" placeholder="" min="0" step="0.01">
                                </div>
                                <label class="font-12"><?php echo e($lang->get(158)); ?></label>
                            </div>
                        </div>
                        <div class="col-md-3 foodm">
                            <div class="form-group">
                                <input type="checkbox" id="percentEdit" name="percent" class="filled-in checkmark">
                                <label for="percentEdit" class="foodlabel"><h4><?php echo e($lang->get(159)); ?></h4></label>
                            </div>
                        </div>

                        <div class="col-md-12 info" style="margin-top: 5px; margin-left: 20px;">
                            <h4><?php echo e($lang->get(160)); ?></h4>
                            <p><?php echo e($lang->get(161)); ?></p>
                            <p id="currentEdit"><?php echo e($lang->get(162)); ?>: <?php echo e($currency); ?>0</p>
                        </div>

                        <div class="col-md-3 foodm">
                            <label><h4><?php echo e($lang->get(163)); ?></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="number" name="area" id="areaEdit" class="form-control" placeholder="" value="30">
                                    <label class="form-label"><?php echo e($lang->get(164)); ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 foodm">
                            <label><h4><?php echo e($lang->get(550)); ?></h4></label>  
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="number" name="minAmount" id="minAmountEdit" class="form-control" placeholder="" value="0" step="0.01">
                                    <label class="form-label"><?php echo e($lang->get(551)); ?></label> 
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 foodm">

                        <div class="col-md-3 foodm">
                            <label for="lat"><h4><?php echo e($lang->get(165)); ?> <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="number" name="lat" id="latEdit" class="form-control" placeholder="" step="0.00000000000000001">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(166)); ?></label>
                            </div>
                        </div>

                        <div class="col-md-3 foodm">
                            <label for="lng"><h4><?php echo e($lang->get(167)); ?> <span class="col-red">*</span></h4></label>
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group form-group-lg form-float">
                                <div class="form-line">
                                    <input type="number" name="lng" id="lngEdit" class="form-control" placeholder="" step="0.00000000000000001">
                                </div>
                                <label class="foodm"><?php echo e($lang->get(168)); ?></label>
                            </div>
                        </div>


                        <div class="row clearfix">
                            <div class="col-md-2 form-control-label">
                                <label><h4><?php echo e($lang->get(70)); ?>:</h4></label>
                                <br>
                                <div align="center">
                                    <button type="button" onclick="fromLibraryEdit()" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(77)); ?></h5></button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div id="dropzoneEdit" class="fallback dropzone">
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

                        <div class="col-md-3 foodm">
                        </div>
                        <div class="col-md-9 foodm">
                            <div class="form-group">
                                <input type="checkbox" id="visibleEdit" name="visible" class="filled-in checkmark" checked>
                                <label for="visible"><h4><?php echo e($lang->get(75)); ?></h4></label>
                            </div>
                        </div>

                        <div class="col-md-3 foodm">
                            <label><h4><?php echo e($lang->get(169)); ?>:</h4></label>
                        </div>
                        <div class="col-md-9 foodm" style="margin-top: 20px;">
                            <table border="0">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5><?php echo e($lang->get(170)); ?></h5>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h5><?php echo e($lang->get(171)); ?></h5>
                                    </td>

                                </tr>
                                <tr>
                                    <td><h5><?php echo e($lang->get(172)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeMonday" id="openTimeMondayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeMonday" id="closeTimeMondayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><?php echo e($lang->get(173)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeTuesday" id="openTimeTuesdayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeTuesday" id="closeTimeTuesdayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>
                                <tr style="margin-top: 5px;">
                                    <td><h5><?php echo e($lang->get(174)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeWednesday" id="openTimeWednesdayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeWednesday" id="closeTimeWednesdayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>
                                <tr style="margin-top: 5px;">
                                    <td><h5><?php echo e($lang->get(175)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeThursday" id="openTimeThursdayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="closeTimeThursday" id="closeTimeThursdayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><?php echo e($lang->get(176)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeFriday" id="openTimeFridayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg " style="margin-top: 5px;">
                                            <input type="text" name="closeTimeFriday" id="closeTimeFridayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><?php echo e($lang->get(177)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeSaturday" id="openTimeSaturdayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg " style="margin-top: 5px;">
                                            <input type="text" name="closeTimeSaturday" id="closeTimeSaturdayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5><?php echo e($lang->get(178)); ?>:<h5></td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg" style="margin-top: 5px;">
                                            <input type="text" name="openTimeSunday" id="openTimeSundayEdit" class="form-control time24" placeholder="Ex: 10:00">
                                        </div>
                                    </td>
                                    <td width="5%"></td>
                                    <td>
                                        <div class="demo-masked-input input-group-lg " style="margin-top: 5px;">
                                            <input type="text" name="closeTimeSunday" id="closeTimeSundayEdit" class="form-control time24" placeholder="Ex: 23:00">
                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </div>


                    </div>

                </div>

                <div class="row clearfix">
                    <div class="col-md-12 form-control-label">
                        <div align="center">
                            <button type="submit"  class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(142)); ?></h5></button>
                        </div>
                    </div>
                </div>


            </form>

        </div>

    </div>
    </div>

    <script type="text/javascript">

        var form = document.getElementById("formcreate");
        form.addEventListener("submit", checkForm, true);

        function checkForm(event) {
            var alertText = "";
            if (!document.getElementById("name").value) {
                alertText = "<h4><?php echo e($lang->get(85)); ?></h4>";
            }
            if (!document.getElementById("lat").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(179)); ?></h4>";
            }
            if (!document.getElementById("lng").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(180)); ?></h4>";
            }
            if (alertText != "") {
                var div = document.getElementById("redalert");
                div.innerHTML = '';
                div.style.display = "block";
                var div2 = document.createElement("div");
                div2.innerHTML = alertText;
                div.appendChild(div2);
                window.scrollTo(0, 0);
                event.preventDefault();
                return false;
            }
        }

        function showDeleteMessage(id) {
            swal({
                title: "<?php echo e($lang->get(81)); ?>",
                text: "<?php echo e($lang->get(82)); ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "<?php echo e($lang->get(83)); ?>",
                cancelButtonText: "<?php echo e($lang->get(84)); ?>",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    console.log(id);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '<?php echo e(url("restaurantsdelete")); ?>',
                        data: {id: id},
                        success: function (data){
                            if (!data.ret)
                                return showNotification("bg-red", data.text, "bottom", "center", "", "");
                            //
                            // remove from ui
                            //
                            var div = document.getElementById('tr'+id);
                            div.remove();
                        },
                        error: function(e) {
                            console.log(e);
                        }}
                    );
                } else {

                }
            });
        }

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href")
            if (target != "#edit")
                document.getElementById("tabEdit").style.display = "none";
            console.log(target);
        });

        async function editItem(id, name, visible, imageid, ifile, desc,
                                delivered, address, phone, mobilephone, lat, lng,
                                fee, percent, minAmount) {
            document.getElementById("tabEdit").style.display = "block";
            $('.nav-tabs a[href="#edit"]').tab('show');

            document.getElementById("nameEdit").value = name;
            document.getElementById("editid").value = id;
            document.getElementById("visibleEdit").checked = visible === '1';
            document.getElementById("addressEdit").value = address;
            document.getElementById("phoneEdit").value = phone;
            document.getElementById("mobilephoneEdit").value = mobilephone;
            document.getElementById("latEdit").value = lat;
            document.getElementById("lngEdit").value = lng;
            document.getElementById("descEdit").value = desc;
            //
            document.getElementById('feeEdit').value = fee;
            document.getElementById("percentEdit").checked = percent === '1';
            if (percent == '1')
                currentEdit.innerHTML = "Current: "+fee+"%";
            else
                currentEdit.innerHTML = "Current: <?php echo e($currency); ?>"+fee;
            //
            <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            if (<?php echo e($data->id); ?> == id){
                document.getElementById("openTimeMondayEdit").value = '<?php echo e($data->openTimeMonday); ?>';
                document.getElementById("closeTimeMondayEdit").value = '<?php echo e($data->closeTimeMonday); ?>';
                document.getElementById("openTimeTuesdayEdit").value = '<?php echo e($data->openTimeTuesday); ?>';
                document.getElementById("closeTimeTuesdayEdit").value = '<?php echo e($data->closeTimeTuesday); ?>';
                document.getElementById("openTimeWednesdayEdit").value = '<?php echo e($data->openTimeWednesday); ?>';
                document.getElementById("closeTimeWednesdayEdit").value = '<?php echo e($data->closeTimeWednesday); ?>';
                document.getElementById("openTimeThursdayEdit").value = '<?php echo e($data->openTimeThursday); ?>';
                document.getElementById("closeTimeThursdayEdit").value = '<?php echo e($data->closeTimeThursday); ?>';
                document.getElementById("openTimeFridayEdit").value = '<?php echo e($data->openTimeFriday); ?>';
                document.getElementById("closeTimeFridayEdit").value = '<?php echo e($data->closeTimeFriday); ?>';
                document.getElementById("openTimeSaturdayEdit").value = '<?php echo e($data->openTimeSaturday); ?>';
                document.getElementById("closeTimeSaturdayEdit").value = '<?php echo e($data->closeTimeSaturday); ?>';
                document.getElementById("openTimeSundayEdit").value = '<?php echo e($data->openTimeSunday); ?>';
                document.getElementById("closeTimeSundayEdit").value = '<?php echo e($data->closeTimeSunday); ?>';
                //
                var area = '<?php echo e($data->area); ?>';
                if (area == "")
                    area = 30;
                document.getElementById("areaEdit").value = area;
                document.getElementById("minAmountEdit").value = minAmount;

            }
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            addEditImage(imageid, ifile);
        }

        var form = document.getElementById("formedit");
        form.addEventListener("submit", checkFormEdit, true);

        function checkFormEdit(event) {
            var alertText = "";
            if (!document.getElementById("nameEdit").value) {
                alertText = "<h4><?php echo e($lang->get(85)); ?></h4>";
            }
            if (!document.getElementById("latEdit").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(179)); ?></h4>";
            }
            if (!document.getElementById("lngEdit").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(180)); ?></h4>";
            }
            if (alertText != "") {
                var div = document.getElementById("redalertEdit");
                div.innerHTML = '';
                div.style.display = "block";
                var div2 = document.createElement("div");
                div2.innerHTML = alertText;
                div.appendChild(div2);
                window.scrollTo(0, 0);
                event.preventDefault();
                return false;
            }
        }


        //
        // create
        //
        percent = document.getElementById('percent');
        current = document.getElementById('current');
        fee = document.getElementById('fee');
        percent.addEventListener('change', (event) => {
            var vl = fee.value;
            if (vl == null) vl = 0;
            if (event.target.checked) {
                if (fee.value > 100){
                    vl = 100;
                    fee.value = 100;
                }
                current.innerHTML = "Current: "+vl+"%";
            } else {
                current.innerHTML = "Current: <?php echo e($currency); ?>"+vl;
            }
        })
        fee.addEventListener('input', (event) => {
            var vl = fee.value;
            if (vl == null) vl = 0;
            if (percent.checked) {
                if (fee.value > 100){
                    vl = 100;
                    fee.value = 100;
                }
                current.innerHTML = "Current: "+vl+"%";
            } else {
                current.innerHTML = "Current: <?php echo e($currency); ?>"+vl;
            }
        })

        //
        // edit
        //
        percentEdit = document.getElementById('percentEdit');
        currentEdit = document.getElementById('currentEdit');
        feeEdit = document.getElementById('feeEdit');
        percentEdit.addEventListener('change', (event) => {
            var vl = feeEdit.value;
            if (vl == null) vl = 0;
            if (event.target.checked) {
                if (feeEdit.value > 100){
                    vl = 100;
                    feeEdit.value = 100;
                }
                currentEdit.innerHTML = "Current: "+vl+"%";
            } else {
                currentEdit.innerHTML = "Current: <?php echo e($currency); ?>"+vl;
            }
        })
        feeEdit.addEventListener('input', (event) => {
            var vl = feeEdit.value;
            if (vl == null) vl = 0;
            if (percentEdit.checked) {
                if (feeEdit.value > 100){
                    vl = 100;
                    feeEdit.value = 100;
                }
                currentEdit.innerHTML = "Current: "+vl+"%";
            } else {
                currentEdit.innerHTML = "Current: <?php echo e($currency); ?>"+vl;
            }
        })

    //Time
    var $demoMaskedInput = $('.demo-masked-input');

    $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:__ _m', alias: 'time12', hourFormat: '12' });
    $demoMaskedInput.find('.time24').inputmask('hh:mm', { placeholder: '__:__ _m', alias: 'time24', hourFormat: '24' });

    </script>

    <?php echo $__env->make('bsb.image', array('petani' => $petani), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/restaurants.blade.php ENDPATH**/ ?>