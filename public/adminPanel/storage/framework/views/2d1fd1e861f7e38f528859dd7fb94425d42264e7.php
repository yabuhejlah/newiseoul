<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />
    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(379)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

        <div id="redalert" class="alert bg-red" style='display:none;' >
        </div>

        <div class="card">
            <div class="header">
            </div>
            <body>
            <div class="table-responsive" style="margin-left: 5%; margin-top: 5%; margin-right: 5%;">
                <table style="margin-bottom: 5%;">
                    <tbody id="tbody">


                    <tr>
                        <td width="50%">
                            <b><?php echo e($lang->get(380)); ?>:</b>
                            <div class="input-group">
                                <div class="form-group form-group-lg form-float">
                                    <select name="appLanguage" id="appLanguage" class="form-control show-tick ">
                                        <?php if($appLanguage == '1'): ?>
                                            <option value="1" style="font-size: 16px !important;" selected>English</option>
                                        <?php else: ?>
                                            <option value="1" style="font-size: 16px !important;">English</option>
                                        <?php endif; ?>
                                        <?php if($appLanguage == '2'): ?>
                                            <option value="2" style="font-size: 16px !important;" selected>German</option>
                                        <?php else: ?>
                                            <option value="2" style="font-size: 16px !important;">German</option>
                                        <?php endif; ?>
                                        <?php if($appLanguage == '3'): ?>
                                            <option value="3" style="font-size: 16px !important;" selected>Spanish</option>
                                        <?php else: ?>
                                            <option value="3" style="font-size: 16px !important;">Spanish</option>
                                        <?php endif; ?>
                                        <?php if($appLanguage == '4'): ?>
                                            <option value="4" style="font-size: 16px !important;" selected>French</option>
                                        <?php else: ?>
                                            <option value="4" style="font-size: 16px !important;">French</option>
                                        <?php endif; ?>
                                        <?php if($appLanguage == '5'): ?>
                                            <option value="5" style="font-size: 16px !important;" selected>Korean</option>
                                        <?php else: ?>
                                            <option value="5" style="font-size: 16px !important;">Korean</option>
                                        <?php endif; ?>
                                        <?php if($appLanguage == '6'): ?>
                                            <option value="6" style="font-size: 16px !important;" selected>Arabic</option>
                                        <?php else: ?>
                                            <option value="6" style="font-size: 16px !important;">Arabic</option>
                                        <?php endif; ?>
                                        <?php if($appLanguage == '7'): ?>
                                            <option value="7" style="font-size: 16px !important;" selected>Portuguese</option>
                                        <?php else: ?>
                                            <option value="7" style="font-size: 16px !important;">Portuguese</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="font-12 font-bold"><p><?php echo e($lang->get(381)); ?></p></label>
                                </div>
                            </div>
                        </td>
                        <td width="20%">
                        </td>
                        <td width="30%">
                        <div style="margin-left: 30px">
                            <?php echo $__env->make('elements.form.check', array('id' => "about", 'text' => $lang->get(517), 'initvalue' => $about), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "delivery", 'text' => $lang->get(518), 'initvalue' => $delivery), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "privacy", 'text' => $lang->get(519), 'initvalue' => $privacy), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "terms", 'text' => $lang->get(520), 'initvalue' => $terms), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "refund", 'text' => $lang->get(521), 'initvalue' => $refund), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "faq", 'text' => $lang->get(522), 'initvalue' => $faq), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                        </div>
                        </td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td>
                            <?php echo $__env->make('elements.form.check', array('id' => "google", 'text' => $lang->get(533), 'initvalue' => $google), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "facebook", 'text' => $lang->get(534), 'initvalue' => $facebook), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.check', array('id' => "otp", 'text' => $lang->get(540), 'initvalue' => $otp), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                        </td>
                        <td width="20%"></td>
                        <td>

                        </td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>

                    <tr>
                        <td colspan="2">
                            <h4 style="margin-bottom: 30px;"><?php echo e($lang->get(535)); ?></h4>  
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php echo $__env->make('elements.form.latlang', array('id' => "defaultLat", 'label' => $lang->get(165),
                                    'text' => $lang->get(166), 'initvalue' => $defaultLat, 'request' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                            <?php echo $__env->make('elements.form.latlang', array('id' => "defaultLng", 'label' => $lang->get(167),
                                    'text' => $lang->get(168), 'initvalue' => $defaultLng, 'request' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                        </td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td>
                            <div id="dark" onclick="onCheckClick('dark')" style="font-weight: bold; "></div>
                        </td>
                        <td width="20%"></td>
                        <td>
                            <img src="img/dark.jpg" width="400px">
                        </td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td>
                            <b><?php echo e($lang->get(382)); ?></b>
                            <div class="input-group colorpicker">
                                <div class="form-line">
                                    <input type="text" id="mainColor" class="form-control" value="#000000">
                                </div>
                                <span class="input-group-addon">
                                    <i style="border: solid 2px; border-color: #b1b1b1;"></i>
                                </span>
                            </div>
                        </td>
                        <td width="20%"></td>
                        <td>
                            <img src="img/maincolor.jpg" width="400px">
                        </td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td>
                            <b><?php echo e($lang->get(383)); ?></b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="number" id="radius" class="form-control" value="" min="0" max="50" step="1">
                                </div>
                                <p><?php echo e($lang->get(384)); ?></p>
                            </div>
                        </td>
                        <td width="20%"></td>
                        <td>
                            <img src="img/radius.jpg" width="400px">
                        </td>
                    </tr>

        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td>
                            <b><?php echo e($lang->get(385)); ?></b>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="number" id="shadow" class="form-control" value="" min="0" max="50" step="1">
                                </div>
                                <p><?php echo e($lang->get(386)); ?></p>
                            </div>
                        </td>
                        <td width="20%"></td>
                        <td>
                            <img src="img/shadow.jpg" width="600px">
                        </td>
                    </tr>


        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td>
                            <div id="bottomBarType1" onclick="onCheckClick('bottomBarType1')" style="font-weight: bold; "></div>
                            <br>
                            <div id="bottomBarType2" onclick="onCheckClick('bottomBarType2')" style="font-weight: bold; "></div>
                        </td>
                        <td width="20%"></td>
                        <td>
                            <img src="img/btypes.jpg" width="600px">
                        </td>
                    </tr>


        <tr><td><hr></td><td><hr></td><td><hr></td></tr>


                    <tr>
                        <td></td>
                        <td>
                            <div class="btn btn-primary waves-effect" onClick="onSave()"><h4><?php echo e($lang->get(142)); ?></h4></div>
                        </td>
                        <td>
                            <img src="img/attention.jpg" width="400px">
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
            </body>

        </div>

        <script>

            var radius = document.getElementById('radius');
            radius.addEventListener('input',  function(e){inputHandler(e, radius, 0, 100);});
            var shadow = document.getElementById('shadow');
            shadow.addEventListener('input',  function(e){inputHandler(e, shadow, 0, 250);});

            // set initial parameters
            document.getElementById("mainColor").value = "#<?php echo e($mainColor); ?>" ;
            document.getElementById("radius").value = "<?php echo e($radius); ?>" ;
            document.getElementById("shadow").value = "<?php echo e($shadow); ?>" ;

            function onSave(){
                var mainColor = document.getElementById("mainColor").value;
                mainColor = mainColor.substring(1);
                var radius = document.getElementById("radius").value;
                var shadow = document.getElementById("shadow").value;
                var dark = "false";
                if (idStateDark)
                    dark = "true";
                var bottomBarType = "type1"
                if (idbottomBarType2)
                    bottomBarType = "type2"
                var appLanguage = document.getElementById("appLanguage").value;
                data =  {
                    appLanguage: appLanguage,
                    mainColor: mainColor,
                    radius: radius,
                    shadow: shadow,
                    dark: dark,
                    bottomBarType: bottomBarType,
                    about: about,
                    delivery: delivery,
                    privacy: privacy,
                    terms: terms,
                    refund: refund,
                    faq: faq,
                    google: google,
                    facebook: facebook,
                    otp: otp,
                    defaultLat: document.getElementById("defaultLat").value,
                    defaultLng: document.getElementById("defaultLng").value,
                };
                console.log(data);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '<?php echo e(url("caLayout_changeTheme")); ?>',
                    data: data,
                    success: function (data){
                        console.log(data);
                        showNotification("bg-teal", "<?php echo e($lang->get(387)); ?>", "bottom", "center", "", "");
                    },
                    error: function(e) {
                        console.log(e);
                    }}
                );
            }

            $(function () {
                $('.colorpicker').colorpicker(
                    {format: 'hex'}
                );
            });

            function inputHandler(e, parent, min, max) {
                var value = parseInt(e.target.value);
                if (value.isEmpty)
                    value = 0;
                if (isNaN(value))
                    value = 0;
                if (value > max)
                    value = max;
                if (value < min)
                    value = min;
                parent.value = value;
            }

            var idStateDark = false;
            <?php if($darkMode == 'false'): ?>
                idStateDark = true;
            <?php endif; ?>
            onCheckClick("dark");

            idbottomBarType1 = false;
            document.getElementById("bottomBarType1").innerHTML = "<img src=\"img/check_off.png\" width=\"25px\">&nbsp <?php echo e($lang->get(388)); ?>";
            idbottomBarType2 = false;
            document.getElementById("bottomBarType2").innerHTML = "<img src=\"img/check_off.png\" width=\"25px\">&nbsp <?php echo e($lang->get(389)); ?>";
            <?php if($bottomBarType == 'type1'): ?>
                idbottomBarType1 = true;
                document.getElementById("bottomBarType1").innerHTML = "<img src=\"img/check_on.png\" width=\"25px\">&nbsp <?php echo e($lang->get(388)); ?>";
            <?php endif; ?>
            <?php if($bottomBarType == 'type2'): ?>
                idbottomBarType2 = true;
                document.getElementById("bottomBarType2").innerHTML = "<img src=\"img/check_on.png\" width=\"25px\">&nbsp <?php echo e($lang->get(389)); ?>";
            <?php endif; ?>

            function onCheckClick(id){
                var value = "on";
                if (id == 'dark') {
                    if (idStateDark == true) value = "off"; else value = "on";
                    idStateDark = !idStateDark;
                    document.getElementById(id).innerHTML = "<img src=\"img/check_"+value+".png\" width=\"25px\">&nbsp <?php echo e($lang->get(390)); ?>";
                }
                if (id == 'bottomBarType1') {
                    if (idbottomBarType1 == true) value = "off"; else value = "on";
                    idbottomBarType1 = !idbottomBarType1;
                    document.getElementById(id).innerHTML = "<img src=\"img/check_"+value+".png\" width=\"25px\">&nbsp <?php echo e($lang->get(388)); ?>";
                    if (idbottomBarType1){
                        idbottomBarType2 = false;
                        document.getElementById("bottomBarType2").innerHTML = "<img src=\"img/check_off.png\" width=\"25px\">&nbsp <?php echo e($lang->get(389)); ?>";
                    }else{
                        idbottomBarType2 = true;
                        document.getElementById("bottomBarType2").innerHTML = "<img src=\"img/check_on.png\" width=\"25px\">&nbsp <?php echo e($lang->get(389)); ?>";
                    }
                }
                if (id == 'bottomBarType2') {
                    if (idbottomBarType2 == true) value = "off"; else value = "on";
                    idbottomBarType2 = !idbottomBarType2;
                    document.getElementById(id).innerHTML = "<img src=\"img/check_"+value+".png\" width=\"25px\">&nbsp <?php echo e($lang->get(389)); ?>";
                    if (idbottomBarType2){
                        idbottomBarType1 = false;
                        document.getElementById("bottomBarType1").innerHTML = "<img src=\"img/check_off.png\" width=\"25px\">&nbsp <?php echo e($lang->get(388)); ?>";
                    }else{
                        idbottomBarType1 = true;
                        document.getElementById("bottomBarType1").innerHTML = "<img src=\"img/check_on.png\" width=\"25px\">&nbsp <?php echo e($lang->get(388)); ?>";
                    }
                }
            }


        </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/caTheme.blade.php ENDPATH**/ ?>