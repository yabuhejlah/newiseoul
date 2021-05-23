<?php $userinfo = app('App\UserInfo'); ?>

<?php $lang = app('App\Lang'); ?>

<?php $__env->startSection('content'); ?>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(327)); ?></h3>
            </div>
        </div>
    </div>

    <div class="body">

        <form id="cur" method="post" action="<?php echo e(url('currencyChange')); ?>"  >

            <?php echo csrf_field(); ?>

        <div class="card">
            <div class="body">
                <div class="row clearfix">

                    <div class="col-md-12 foodm">

                        <div class="col-md-12 foodm">
                            <div class="col-md-3 foodm">
                                <h4><?php echo e($lang->get(328)); ?></h4>
                            </div>
                            <div class="col-md-6 foodm">
                                <div class="form-group form-group-lg form-float">
                                    <div class="form-line">
                                        <select name="currency" id="currency" class="form-control bs-searchbox " style="font-size: 26px  !important; ">
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($default_currencyCode == $data->code): ?>
                                                    <option value="<?php echo e($data->id); ?>" selected style="font-size: 18px  !important;"><?php echo e($data->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($data->id); ?>" style="font-size: 18px  !important;"><?php echo e($data->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 form-control-label">
                                <div align="center">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(329)); ?></h5></button>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4 form-control-label">

                                <input type="checkbox" id="rightSymbol" name="rightSymbol" class="filled-in " style="height: 20px; width: 20px;">
                            <label for="rightSymbol"><h4><?php echo e($lang->get(330)); ?></h4></label>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>

    <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
            <li role="presentation"><a href="#create" data-toggle="tab" ><h4><?php echo e($lang->get(65)); ?></h4></a></li>
            <li id="tabEdit" style='display:none;' role="presentation"><a href="#edit" data-toggle="tab"><h4><?php echo e($lang->get(66)); ?></h4></a></li>
        </ul>


        <!-- Tab List -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">

                <div class="alert bg-green" hidden>
                </div>

                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h3><?php echo e($lang->get(331)); ?></h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(68)); ?></th>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(332)); ?></th>
                                            <th><?php echo e($lang->get(333)); ?></th>
                                            <th><?php echo e($lang->get(334)); ?></th>
                                            <th><?php echo e($lang->get(49)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(68)); ?></th>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(332)); ?></th>
                                            <th><?php echo e($lang->get(333)); ?></th>
                                            <th><?php echo e($lang->get(334)); ?></th>
                                            <th><?php echo e($lang->get(49)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>


                                        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->id); ?></td>
                                                <td><?php echo e($data->name); ?></td>
                                                <td><?php echo e($data->symbol); ?></td>
                                                <td><?php echo e($data->code); ?></td>
                                                <td><?php echo e($data->digits); ?></td>
                                                <td><?php echo e($data->updated_at); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                            onclick="editItem('<?php echo e($data->id); ?>','<?php echo e($data->name); ?>','<?php echo e($data->code); ?>','<?php echo e($data->symbol); ?>','<?php echo e($data->digits); ?>')">
                                                        <img src="img/iconedit.png" width="25px">
                                                    </button>

                                                    <button type="button" class="btn btn-default waves-effect" onclick="showDeleteMessage('<?php echo e($data->id); ?>')">
                                                        <img src="img/icondelete.png" width="25px">
                                                    </button>
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

            <!-- Tab Create -->

            <div role="tabpanel" class="tab-pane fade" id="create">

                <div id="redalert" class="alert bg-red" style='display:none;' >

                </div>

                <div class="card">
                    <div class="body">

                        <form id="formcreate" method="post" action="<?php echo e(url('currencyadd')); ?>"  >

                            <?php echo csrf_field(); ?>

                            <div class="row clearfix">

                                <div class="col-md-6 foodm">

                                    <div class="col-md-12 foodm">
                                        <div class="col-md-2 foodm">
                                            <h4>Name</h4>
                                        </div>
                                        <div class="col-md-10 foodm">
                                            <div class="form-group form-group-lg form-float">
                                                <div class="form-line">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="" maxlength="100">
                                                    <label class="form-label"><?php echo e($lang->get(335)); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 foodm">
                                        <div class="col-md-2 foodm">
                                            <h4><?php echo e($lang->get(333)); ?></h4>
                                        </div>
                                        <div class="col-md-10 foodm">
                                            <div class="form-group form-group-lg form-float">
                                                <div class="form-line">
                                                    <input type="text" name="code" id="code" class="form-control" placeholder="" maxlength="3" minlength="3">
                                                    <label class="form-label"><?php echo e($lang->get(336)); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 foodm">

                                    <div class="col-md-12 foodm">
                                        <div class="col-md-2 foodm">
                                            <h4><?php echo e($lang->get(332)); ?></h4>
                                        </div>
                                        <div class="col-md-10 foodm">
                                            <div class="form-group form-group-lg form-float">
                                                <div class="form-line">
                                                    <input type="text" name="symbol" id="symbol" class="form-control" placeholder="" maxlength="1" minlength="1">
                                                    <label class="form-label"><?php echo e($lang->get(337)); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 foodm">
                                        <div class="col-md-2 foodm">
                                            <h4><?php echo e($lang->get(334)); ?></h4>
                                        </div>
                                        <div class="col-md-10 foodm">
                                            <div class="form-group form-group-lg form-float">
                                                <div class="form-line">
                                                    <input type="number" name="digits" id="digits" class="form-control" placeholder="" step="1" min="0" max="4">
                                                    <label class="form-label"><?php echo e($lang->get(338)); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12 form-control-label">
                                        <div align="center">
                                            <button type="submit"  class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(339)); ?></h5></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Tab Edit -->

            <div role="tabpanel" class="tab-pane fade" id="edit">

                <div id="redalertEdit" class="alert bg-red" style='display:none;' >

                </div>

                <div class="card">
                    <div class="body">

                <form id="formedit" method="post" action="<?php echo e(url('currencyedit')); ?>"  >
                    <?php echo csrf_field(); ?>

                    <input type="hidden" id="editid" name="editid"/>

                    <div class="row clearfix">

                        <div class="col-md-6 foodm">

                            <div class="col-md-12 foodm">
                                <div class="col-md-2 foodm">
                                    <h4><?php echo e($lang->get(69)); ?></h4>
                                </div>
                                <div class="col-md-10 foodm">
                                    <div class="form-group form-group-lg form-float">
                                        <div class="form-line">
                                            <input type="text" name="name" id="nameEdit" class="form-control" placeholder="" maxlength="100">
                                        </div>
                                        <label class="font-12"><?php echo e($lang->get(335)); ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 foodm">
                                <div class="col-md-2 foodm">
                                    <h4><?php echo e($lang->get(333)); ?></h4>
                                </div>
                                <div class="col-md-10 foodm">
                                    <div class="form-group form-group-lg form-float">
                                        <div class="form-line">
                                            <input type="text" name="code" id="codeEdit" class="form-control" placeholder="" maxlength="3" minlength="3">
                                        </div>
                                        <label class="font-12"><?php echo e($lang->get(336)); ?></label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 foodm">

                            <div class="col-md-12 foodm">
                                <div class="col-md-2 foodm">
                                    <h4><?php echo e($lang->get(332)); ?></h4>
                                </div>
                                <div class="col-md-10 foodm">
                                    <div class="form-group form-group-lg form-float">
                                        <div class="form-line">
                                            <input type="text" name="symbol" id="symbolEdit" class="form-control" placeholder="" maxlength="1" minlength="1">
                                        </div>
                                        <label class="font-12"><?php echo e($lang->get(337)); ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 foodm">
                                <div class="col-md-2 foodm">
                                    <h4><?php echo e($lang->get(334)); ?></h4>
                                </div>
                                <div class="col-md-10 foodm">
                                    <div class="form-group form-group-lg form-float">
                                        <div class="form-line">
                                            <input type="number" name="digits" id="digitsEdit" class="form-control" placeholder="" step="1" min="0" max="4">
                                        </div>
                                        <label class="font-12"><?php echo e($lang->get(338)); ?></label>
                                    </div>
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

        </div>

    </div>



    <script type="text/javascript">

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
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '<?php echo e(url("currencydelete")); ?>',
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

        var form = document.getElementById("formcreate");
        form.addEventListener("submit", checkForm, true);

        function checkForm(event) {
            var alertText = "";
            if (!document.getElementById("name").value)
                alertText = "<h4><?php echo e($lang->get(85)); ?></h4>";
            if (!document.getElementById("code").value)
                alertText = "<h4><?php echo e($lang->get(340)); ?></h4>";
            if (!document.getElementById("symbol").value)
                alertText = "<h4><?php echo e($lang->get(341)); ?></h4>";
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

        var form = document.getElementById("formedit");
        form.addEventListener("submit", checkFormEdit, true);

        function checkFormEdit(event) {
            var alertText = "";
            if (!document.getElementById("nameEdit").value)
                alertText = "<h4><?php echo e($lang->get(85)); ?></h4>";
            if (!document.getElementById("codeEdit").value)
                alertText = "<h4><?php echo e($lang->get(340)); ?></h4>";
            if (!document.getElementById("symbolEdit").value)
                alertText = "<h4><?php echo e($lang->get(341)); ?></h4>";
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

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href")
            if (target != "#edit")
                document.getElementById("tabEdit").style.display = "none";
        });

        async function editItem(id, name, code, symbol, digits) {
            document.getElementById("tabEdit").style.display = "block";
            $('.nav-tabs a[href="#edit"]').tab('show');
            document.getElementById("editid").value = id;
            //
            document.getElementById("nameEdit").value = name;
            document.getElementById("codeEdit").value = code;
            document.getElementById("symbolEdit").value = symbol;
            document.getElementById("digitsEdit").value = digits;
        }


        const rightSymbol = document.getElementById('rightSymbol');
        rightSymbol.addEventListener('change', (event) => {
            if (event.target.checked) {
                setRightSymbol("true");
            } else {
                setRightSymbol("false");
            }
        })
        <?php if($rightSymbol == 'true'): ?>
            rightSymbol.checked = true;
        <?php else: ?>
            rightSymbol.checked = false;
        <?php endif; ?>
        function setRightSymbol(value){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("setRightSymbol")); ?>',
                data: {value: value},
                success: function (data){
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

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/currencies.blade.php ENDPATH**/ ?>