<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(27)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

        <div class="card">
            <div class="header">
                <h4>
                </h4>
            </div>
            <body>
            <div class="table-responsive" style="margin-left: 5%; margin-top: 5%; margin-right: 5%" >
                <table style="margin-bottom: 5%;" width="90%">
                    <tbody id="tbody">


                    <tr>
                        <td width="50%">
                            <b><?php echo e($lang->get(318)); ?>:</b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="number" id="tax" class="form-control" value="" min="0" max="100" step="1">
                                </div>
                                <p><?php echo e($lang->get(319)); ?></p>
                            </div>
                        </td>
                        <td width="50%"><div></div></td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>



                    <tr>
                        <td width="50%">
                            <b><?php echo e($lang->get(320)); ?>:</b>
                                <div class="form-group form-group-lg form-float">
                                    <select name="distanceUnit" id="distanceUnit" class="form-control show-tick ">
                                        <?php if($distanceUnit == 'km'): ?>
                                            <option value="km" style="font-size: 16px  !important;" selected>Km</option>
                                            <option value="mi" style="font-size: 16px  !important;">Miles</option>
                                        <?php else: ?>
                                            <option value="mi" style="font-size: 16px  !important;" selected>Miles</option>
                                            <option value="km" style="font-size: 16px  !important;">Km</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="font-12 font-bold"><p><?php echo e($lang->get(321)); ?></p></label>
                            </div>
                        </td>
                        <td width="50%"><div></div></td>
                    </tr>
        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td width="50%">
                            <b><?php echo e($lang->get(468)); ?>:</b>   
                            <div class="form-group form-group-lg form-float">
                                <select name="timezone" id="timezone" class="form-control show-tick" data-size="5">
                                    <?php $__currentLoopData = $timezonesArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($data == $timezone): ?>
                                            <option value="<?php echo e($data); ?>" style="font-size: 16px  !important;" selected><?php echo e($data); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($data); ?>" style="font-size: 16px  !important;"><?php echo e($data); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label class="font-12 font-bold"><p><?php echo e($lang->get(469)); ?></p></label>    
                            </div>
                        </td>
                        <td width="50%"><div></div></td>
                    </tr>
        <tr><td><hr></td><td><hr></td><td><hr></td></tr>




                    <th colspan="3">
                        <b><?php echo e($lang->get(322)); ?>:</b>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="firebase" class="form-control">
                            </div>
                            <p style="font-weight: 400;"><?php echo e($lang->get(323)); ?></p>
                        </div>
                    </th>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>



                    <tr>
                        <td width="50%">
                        <b>Google Maps Api Key:</b>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="mapapikey" class="form-control">
                            </div>
                            <p style="font-weight: 400;"><?php echo e($lang->get(324)); ?></p>
                        </div>
                        </td>
                        <td width="5%">
                        </td>
                        <td width="45%">
                            <?php echo e($lang->get(325)); ?>

                            <a href="https://developers.google.com/maps/gmp-get-started">https://developers.google.com/maps/gmp-get-started.</a>
                            <br>
                            <?php echo e($lang->get(326)); ?>

                            <a href="https://www.valeraletun.ru/codecanyon/delivery/documentation/index.html#/?id=create-your-own-google-maps-api-key">documentation</a>
                        </td>
                    </tr>

                    <tr>
                        <td width="70%">
                            <div align="right">
                                <div class="btn btn-primary waves-effect" onClick="onSave()"><h4><?php echo e($lang->get(142)); ?></h4></div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        <hr>

            <div align="center">
            <form id="form" method="post" action="<?php echo e(url('settingsSetLang')); ?>"  >
                <?php echo csrf_field(); ?>
                <div class="row clearfix">
                    <div class="col-md-4 form-control-label">

                        <label for="name"><h4><?php echo e($lang->get(436)); ?></h4></label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <select name="newLang" id="newLang" class="form-control bs-searchbox " style="font-size: 26px  !important; ">
                                    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($defLang == $data["file"]): ?>
                                            <option value="<?php echo e($data['file']); ?>" selected style="font-size: 18px  !important;" ><?php echo e($data["name"]); ?> - <?php echo e($data["name2"]); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($data['file']); ?>" style="font-size: 18px  !important;"><?php echo e($data["name"]); ?> - <?php echo e($data["name2"]); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(437)); ?></h5></button>
                    </div>
                </div>

            </form>
            </div>

            </body>
        </div>
    <script>

        var tax = document.getElementById('tax');
        tax.addEventListener('input',  function(e){inputHandler(e, tax, 0, 100);});

        // init parameters

        document.getElementById("tax").value = "<?php echo e($tax); ?>" ;
        document.getElementById("firebase").value = "<?php echo e($firebase); ?>" ;
        document.getElementById("mapapikey").value = "<?php echo e($mapapikey); ?>" ;

        function onSave(){
            var firebase = document.getElementById("firebase").value;
            var mapapikey = document.getElementById("mapapikey").value;
            var distanceUnit = document.getElementById("distanceUnit").value;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("settingschange")); ?>',
                data: {
                    tax: document.getElementById("tax").value,
                    distanceUnit: distanceUnit,
                    firebase: firebase,
                    mapapikey : mapapikey,
                    timezone: document.getElementById("timezone").value,
                },
                success: function (data){
                    console.log(data);
                    showNotification("bg-teal", "Settings Saved", "bottom", "center", "", "");
                },
                error: function(e) {
                    console.log(e);
                }}
            );
        }

    </script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/settings.blade.php ENDPATH**/ ?>