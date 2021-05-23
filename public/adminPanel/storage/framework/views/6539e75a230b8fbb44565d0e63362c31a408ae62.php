<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(310)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

    <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
            <?php if($userinfo->getUserPermission("Faq::Create")): ?>
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
                    <div id="redzone" class="alert bg-red" hidden>
                    </div>

                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h3>
                                    <?php echo e($lang->get(311)); ?>

                                </h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(312)); ?></th>
                                            <th><?php echo e($lang->get(313)); ?></th>
                                            <th><?php echo e($lang->get(73)); ?></th>
                                            <th><?php echo e($lang->get(49)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(312)); ?></th>
                                            <th><?php echo e($lang->get(313)); ?></th>
                                            <th><?php echo e($lang->get(73)); ?></th>
                                            <th><?php echo e($lang->get(49)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php $__currentLoopData = $ifaq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->question); ?></td>
                                                <td><?php echo e($data->answer); ?></td>
                                                <td>
                                                <?php if($data->published == "1"): ?>
                                                    <img src="img/iconyes.png" width="60px">
                                                <?php else: ?>
                                                    <img src="img/iconno.png" width="60px">
                                                <?php endif; ?>
                                                </td>

                                                <td><?php echo e($data->updated_at); ?></td>

                                                <td>
                                                    <?php if($userinfo->getUserPermission("Faq::Edit")): ?>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                            onclick="editItem('<?php echo e($data->id); ?>',
                                                                '<?php echo e($data->answer); ?>', '<?php echo e($data->question); ?>',
                                                                '<?php echo e($data->published); ?>',
                                                                )">
                                                        <img src="img/iconedit.png" width="25px">
                                                    </button>
                                                    <?php endif; ?>
                                                    <?php if($userinfo->getUserPermission("Faq::Delete")): ?>
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

        <form id="formcreate" method="post" action="<?php echo e(url('faqadd')); ?>"  >

            <?php echo csrf_field(); ?>

            <div class="row clearfix">
                <div class="col-md-2 form-control-label">
                    <label><h4><?php echo e($lang->get(312)); ?></h4></label>
                </div>
                <div class="col-md-10">
                    <div class="form-group form-group-lg form-float">
                        <div class="form-line">
                            <input type="text" name="question" id="question" class="form-control" placeholder="" maxlength="300">
                        </div>
                        <label class="font-12"><?php echo e($lang->get(314)); ?></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-2 form-control-label">
                    <label><h4><?php echo e($lang->get(313)); ?></h4></label>
                </div>
                <div class="col-md-10">
                    <div class="form-group form-group-lg form-float">
                        <div class="form-line">
                            <input type="text" name="answer" id="answer" class="form-control" placeholder="" maxlength="300">
                        </div>
                        <label class="font-12"><?php echo e($lang->get(315)); ?></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-2 form-control-label">
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-lg ">
                        <input type="checkbox" id="published" name="published" class="filled-in checkmark" checked>
                        <label for="delivered"><h4><?php echo e($lang->get(73)); ?></h4></label>
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

    <script>

        var form = document.getElementById("formcreate");
        form.addEventListener("submit", checkForm, true);

        function checkForm(event) {
            var alertText = "";
            if (!document.getElementById("question").value) {
                alertText = "<h4><?php echo e($lang->get(316)); ?></h4>";
            }
            if (!document.getElementById("answer").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(317)); ?></h4>";
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

            <form id="formedit" method="post" action="<?php echo e(url('faqedit')); ?>"  >
                <?php echo csrf_field(); ?>

                <input type="hidden" id="editid" name="id"/>

                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                        <label><h4><?php echo e($lang->get(312)); ?></h4></label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="question" id="questionEdit" class="form-control" placeholder="" maxlength="300">
                            </div>
                            <label class="font-12"><?php echo e($lang->get(314)); ?></label>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                        <label><h4><?php echo e($lang->get(313)); ?></h4></label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group form-group-lg form-float">
                            <div class="form-line">
                                <input type="text" name="answer" id="answerEdit" class="form-control" placeholder="" maxlength="300">
                            </div>
                            <label class="font-12"><?php echo e($lang->get(315)); ?></label>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-lg ">
                            <input type="checkbox" id="publishedEdit" name="published" class="filled-in checkmark" checked>
                            <label for="delivered"><h4><?php echo e($lang->get(73)); ?></h4></label>
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

        var form = document.getElementById("formedit");
        form.addEventListener("submit", checkFormEdit, true);

        function checkFormEdit(event) {
            var alertText = "";
            if (!document.getElementById("questionEdit").value) {
                alertText = "<h4><?php echo e($lang->get(316)); ?></h4>";
            }
            if (!document.getElementById("answerEdit").value) {
                alertText = alertText+"<h4><?php echo e($lang->get(317)); ?></h4>";
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
                        url: '<?php echo e(url("faqdetete")); ?>',
                        data: {id: id},
                        success: function (data){
                            if (!data.ret){
                                document.getElementById("redzone").innerHTML = data.text;
                                document.getElementById("redzone").style.display = "block";
                                return;
                            }
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

        async function editItem(id, answer, question, published) {
            document.getElementById("tabEdit").style.display = "block";
            document.getElementById("editid").value = id;
            $('.nav-tabs a[href="#edit"]').tab('show');
            //
            document.getElementById("answerEdit").value = answer;
            document.getElementById("questionEdit").value = question;
            document.getElementById("publishedEdit").checked = published === '1';
        }
    </script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/faq.blade.php ENDPATH**/ ?>