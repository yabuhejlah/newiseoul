<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(182)); ?></h3>
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
                                    <?php echo e($lang->get(183)); ?>

                                </h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(68)); ?></th>
                                            <th><?php echo e($lang->get(140)); ?></th>
                                            <th><?php echo e($lang->get(136)); ?></th>
                                            <th><?php echo e($lang->get(137)); ?></th>
                                            <th><?php echo e($lang->get(89)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(68)); ?></th>
                                            <th><?php echo e($lang->get(140)); ?></th>
                                            <th><?php echo e($lang->get(136)); ?></th>
                                            <th><?php echo e($lang->get(137)); ?></th>
                                            <th><?php echo e($lang->get(89)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php $__currentLoopData = $idata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->id); ?></td>
                                                <td><?php echo e($data->desc); ?></td>

                                                <td><?php echo e($data->rate); ?></td>

                                                <td>
                                                <?php $__currentLoopData = $iusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($idata->id == $data->user): ?>
                                                        <?php echo e($idata->name); ?>

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

                                                <td><?php echo e($data->updated_at); ?></td>

                                                <td>
                                                    <?php if($userinfo->getUserPermission("RestaurantReview::Edit")): ?>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                            onclick="editItem('<?php echo e($data->id); ?>',
                                                                '<?php echo e($data->user); ?>', '<?php echo e($data->restaurant); ?>',
                                                                '<?php echo e($data->rate); ?>', '<?php echo e($data->desc); ?>',
                                                                )">
                                                        <img src="img/iconedit.png" width="25px">
                                                    </button>
                                                    <?php endif; ?>
                                                    <?php if($userinfo->getUserPermission("RestaurantReview::Delete")): ?>
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

        <form id="formcreate" method="post" action="<?php echo e(url('restorantsreviewadd')); ?>"  >

            <?php echo csrf_field(); ?>

            <input type="hidden" id="image" name="image"/>

            <div class="row clearfix">
                <div class="col-md-2 form-control-label">
                    <label for="name"><h4><?php echo e($lang->get(137)); ?> <span class="col-red">*</span></h4></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-lg form-float">
                        <div class="form-line">
                            <select name="user" id="user" class="form-control bs-searchbox " style="font-size: 26px  !important; ">
                                <?php $__currentLoopData = $iusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datausers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($datausers->id); ?>" style="font-size: 18px  !important;"><?php echo e($datausers->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 form-control-label">
                    <label for="name"><h4><?php echo e($lang->get(89)); ?> <span class="col-red">*</span></h4></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-lg form-float">
                        <div class="form-line">
                            <select name="restaurant" id="restaurant" class="form-control bs-searchbox" style="font-size: 26px  !important; ">
                                <option value="-1" style="font-size: 18px  !important;">No</option>
                                <?php $__currentLoopData = $irestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" style="font-size: 18px  !important;"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-2 form-control-label">
                    <label for="name"><h4><?php echo e($lang->get(136)); ?> <span class="col-red">*</span></h4></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-lg form-float">
                        <div class="form-line">
                            <input type="number" name="rate" id="rate" class="form-control" placeholder="" min="1" max="5">
                            <label class="form-label"><?php echo e($lang->get(139)); ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-2 form-control-label">
                    <label><h4><?php echo e($lang->get(140)); ?> <span class="col-red">*</span></h4></label>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="review" id="review" class="form-control" placeholder="" maxlength="300">
                        </div>
                        <label class="font-12"><?php echo e($lang->get(141)); ?></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12 form-control-label">
                    <div align="center">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(142)); ?></h5></button>
                    </div>
                </div>
            </div>


        </form>


    </div>

    <script>

        var form = document.getElementById("formcreate");
        form.addEventListener("submit", checkForm, true);

        function checkForm(event) {
            var alertText = "";

            var sel = document.getElementById("restaurant");
            if (sel.options[sel.selectedIndex].value == -1){
                alertText = "<h4><?php echo e($lang->get(184)); ?></h4>";
            }
            if (!document.getElementById("rate").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(144)); ?></h4>";
            }
            if (!document.getElementById("review").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(145)); ?></h4>";
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


    </script>


    <!-- Tab Edit -->

        <div role="tabpanel" class="tab-pane fade" id="edit">

            <div id="redalertEdit" class="alert bg-red" style='display:none;' >

            </div>

            <form id="formedit" method="post" action="<?php echo e(url('restaurantsreviewedit')); ?>"  >
                <?php echo csrf_field(); ?>

                <input type="hidden" id="editid" name="id"/>

                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                        <label for="name"><h4><?php echo e($lang->get(137)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-lg">
                            <div class="form-line">
                                <select name="user" id="userEdit" class="form-control bs-searchbox show-tick" style="font-size: 26px  !important; ">
                                    <?php $__currentLoopData = $iusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datausers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($datausers->id); ?>" style="font-size: 18px  !important;"><?php echo e($datausers->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 form-control-label">
                        <label for="name"><h4><?php echo e($lang->get(89)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-line">
                            <select name="restaurant" id="restaurantEdit" class="form-control bs-searchbox show-tick" style="font-size: 26px  !important; ">
                                <option value="-1" style="font-size: 18px  !important;"><?php echo e($lang->get(114)); ?></option>
                                <?php $__currentLoopData = $irestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" style="font-size: 18px  !important;"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                        <label for="name"><h4><?php echo e($lang->get(136)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-lg">
                            <div class="form-line">
                                <input type="number" name="rate" id="rateEdit" class="form-control" placeholder="" min="1" max="5">
                            </div>
                            <label><?php echo e($lang->get(139)); ?></label>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                        <label for="ckeditorEdit"><h4><?php echo e($lang->get(140)); ?> <span class="col-red">*</span></h4></label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="review" id="reviewEdit" class="form-control" placeholder="" maxlength="300">
                            </div>
                            <label class="font-12"><?php echo e($lang->get(141)); ?></label>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 form-control-label">
                        <div align="center">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(142)); ?></h5></button>
                        </div>
                    </div>
                </div>


            </form>

        </div>

    </div>
    </div>

    <script type="text/javascript">

        var form = document.getElementById("formedit");
        form.addEventListener("submit", checkFormEdit, true);

        function checkFormEdit(event) {
            var alertText = "";
            var sel = document.getElementById("restaurantEdit");
            if (sel.options[sel.selectedIndex].value == -1){
                alertText = "<h4><?php echo e($lang->get(184)); ?></h4>";
            }
            if (!document.getElementById("rateEdit").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(144)); ?></h4>";
            }
            if (!document.getElementById("reviewEdit").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(145)); ?></h4>";
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

        $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });

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
                        url: '<?php echo e(url("restaurantsreviewdelete")); ?>',
                        data: {id: id},
                        success: function (data){
                            if (!data.ret)
                                return showNotification("bg-red", data.text, "bottom", "center", "", "");
                            //
                            // remove from ui
                            //
                            var table = $('#data_table').DataTable();
                            var indexes = table
                                .rows()
                                .indexes()
                                .filter( function ( value, index ) {
                                    return id === table.row(value).data()[0];
                                } );
                            var page = moveToPageWithSelectedItem(id);
                            table.rows(indexes).remove().draw();
                            table.page(page).draw(false);
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

        async function editItem(id, user, restaurant, rate, ckeditor) {
            document.getElementById("tabEdit").style.display = "block";
            document.getElementById("editid").value = id;
            $('.nav-tabs a[href="#edit"]').tab('show');
            document.getElementById("rateEdit").value = rate;
            $('select[name=user]').val(user);
            $('select[name=restaurant]').val(restaurant);
            $('.show-tick').selectpicker('refresh')
            document.getElementById("reviewEdit").value = ckeditor;
        }
    </script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/restaurantsreviews.blade.php ENDPATH**/ ?>