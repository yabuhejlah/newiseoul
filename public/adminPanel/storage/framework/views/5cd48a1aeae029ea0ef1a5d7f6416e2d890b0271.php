<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>



<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(123)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

        <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
            <?php if($userinfo->getUserPermission("Food::NutritionGroup::Create")): ?>
            <li role="presentation"><a href="#create" data-toggle="tab" ><h4><?php echo e($lang->get(124)); ?></h4></a></li>
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
                                    <?php echo e($lang->get(125)); ?>

                                </h3>
                            </div>

                            <div class="body">
                                <div class="panel-group " id="accordion_17" role="tablist" aria-multiselectable="true">
                                <?php $__currentLoopData = $inutritiongroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div id="nutritiongroup<?php echo e($data->id); ?>" class="panel panel-col-orange">
                                        <div class="panel-heading" role="tab" id="headingOne_19">
                                            <h4 class="panel-title">

                                                <a role="button" data-toggle="collapse" href="#collapse<?php echo e($data->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($data->id); ?>">

                                                    :: <?php echo e($data->name); ?>


                                                    <?php if($userinfo->getUserPermission("Food::NutritionGroup::Edit")): ?>
                                                    <img src="img/delete.png" width="70px" onclick="showDeleteMessage('<?php echo e($data->id); ?>')" align="right">
                                                    <?php endif; ?>

                                                    <?php if($userinfo->getUserPermission("Food::NutritionGroup::Delete")): ?>
                                                    <img src="img/edit.png" width="70px" onclick="editItem('<?php echo e($data->id); ?>', '<?php echo e($data->name); ?>')" align="right">
                                                    <?php endif; ?>
                                                </a>

                                            </h4>

                                        </div>
                                        <div id="collapse<?php echo e($data->id); ?>" class="panel-collapse collapse
                                        <?php if($data->id == $open): ?>
                                            in
                                        <?php endif; ?>
                                            " role="tabpanel" aria-labelledby="heading<?php echo e($data->id); ?>">


                                            <div id="parent<?php echo e($data->id); ?>" class="panel-body">

                                                <div  class="row clearfix js-sweetalert">
                                                    <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                        <div id="table<?php echo e($data->id); ?>">
                                                            <div class="header">
                                                                <h4>
                                                                    <?php echo e($lang->get(126)); ?>

                                                                </h4>
                                                            </div>
                                                            <div class="body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                                        <thead>
                                                                        <tr>
                                                                            <th><?php echo e($lang->get(69)); ?></th>
                                                                            <th><?php echo e($lang->get(127)); ?></th>
                                                                            <th><?php echo e($lang->get(74)); ?></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <th><?php echo e($lang->get(69)); ?></th>
                                                                            <th><?php echo e($lang->get(127)); ?></th>
                                                                            <th><?php echo e($lang->get(74)); ?></th>
                                                                        </tr>
                                                                        </tfoot>
                                                                        <tbody id="tbody<?php echo e($data->id); ?>">

                                                                        <?php $__currentLoopData = $inutrition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($idata->nutritiongroup == $data->id): ?>
                                                                            <tr id="tr<?php echo e($idata->id); ?>">
                                                                                <td><?php echo e($idata->name); ?></td>
                                                                                <td><?php echo e($idata->desc); ?></td>
                                                                                <td>

                                                                                <?php if($userinfo->getUserPermission("Food::Nutrition::Edit")): ?>
                                                                                <button type="button" class="btn btn-default waves-effect"
                                                                                    onclick="onEditExtras('<?php echo e($data->id); ?>', '<?php echo e($idata->id); ?>', '<?php echo e($idata->name); ?>',
                                                                                        '<?php echo e($idata->desc); ?>')">
                                                                                    <img src="img/iconedit.png" width="25px">
                                                                                </button>
                                                                                <?php endif; ?>
                                                                                <?php if($userinfo->getUserPermission("Food::Nutrition::Delete")): ?>
                                                                                <button type="button" class="btn btn-default waves-effect" onclick="showDeleteMessage2('<?php echo e($idata->id); ?>')">
                                                                                    <img src="img/icondelete.png" width="25px">
                                                                                </button>
                                                                                <?php endif; ?>

                                                                                </td>
                                                                            </tr>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div align="center">
                                                                    <?php if($userinfo->getUserPermission("Food::Nutrition::Create")): ?>
                                                                    <button class="btn btn-primary m-t-15 waves-effect"
                                                                            onclick="onAddExtras('<?php echo e($data->id); ?>')"><h5><?php echo e($lang->get(120)); ?></h5>
                                                                    </button>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                <form id="formcreate" method="post" action="<?php echo e(url('nutritiongroupadd')); ?>"  >
                    <?php echo csrf_field(); ?>

                    <div class="row clearfix">
                        <div class="col-md-2 form-control-label">
                            <label for="name"><h4><?php echo e($lang->get(69)); ?></h4></label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="" maxlength="100">
                                </div>
                                <label><?php echo e($lang->get(91)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-12 form-control-label">
                            <div align="center">
                                <button type="submit"  class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(128)); ?></h5></button>
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
                    if (!document.getElementById("name").value) {
                        alertText = "<h4><?php echo e($lang->get(85)); ?></h4>";
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

                <div id="redalertedit" class="alert bg-red" style='display:none;' >

                </div>

                <form id="formedit" method="post" action="<?php echo e(url('nutritiongroupedit')); ?>"  >
                    <?php echo csrf_field(); ?>

                    <input type="hidden" id="editid" name="id"/>

                    <div class="row clearfix">
                        <div class="col-md-2 form-control-label">
                            <label for="name"><h4><?php echo e($lang->get(69)); ?></h4></label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" name="name" id="editname" class="form-control" placeholder="" maxlength="100">
                                </div>
                                <label><?php echo e($lang->get(91)); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-12 form-control-label">
                            <div align="center">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(80)); ?></h5></button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>



<div id="formparent" hidden>
    <form id="formcreateextras" hidden>

        <?php echo csrf_field(); ?>

        <input type="hidden" id="onedit" name="onedit"/>
        <input type="hidden" id="eid" name="eid"/>

        <div class="row clearfix">
            <div class="col-md-2 form-control-label">
                <label for="name"><h4><?php echo e($lang->get(69)); ?></h4></label>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-lg form-float">
                    <div class="form-line">
                        <input type="text" name="name" id="ename" class="form-control" placeholder="" maxlength="100">
                    </div>
                    <label class="font-12"><?php echo e($lang->get(91)); ?></label>
                </div>
            </div>
            <div class="col-md-2 form-control-label">
                <label for="desc"><h4><?php echo e($lang->get(127)); ?></h4></label>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-lg form-float">
                    <div class="form-line">
                        <input type="text" name="desc" id="desc" class="form-control" placeholder="" maxlength="300">
                    </div>
                    <label class="font-12"><?php echo e($lang->get(129)); ?></label>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12 form-control-label">
                <div align="center">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(130)); ?></h5></button>
                    <button onclick="onCancelEditExtras()" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(131)); ?></h5></button>
                </div>
            </div>
        </div>

    </form>
</div>

    <script type="text/javascript">

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href")
            console.log(target);
            if (target != "#edit") {
                console.log("close");
                document.getElementById("tabEdit").style.display = "none";
            }

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
                        url: '<?php echo e(url("nutritiongroupdelete")); ?>',
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
                            var source = document.getElementById('formcreateextras');
                            var parentElement = document.getElementById("formparent");
                            parentElement.appendChild(source);
                            source.hidden = false;
                            currentGroupId = "";
                            //
                            var div = document.getElementById('nutritiongroup'+id);
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

        function showDeleteMessage2(id){
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
                        url: '<?php echo e(url("nutritiondelete")); ?>',
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

        async function editItem(id, name, restaurant) {
            document.getElementById("tabEdit").style.display = "block";
            $('.nav-tabs a[href="#edit"]').tab('show');
            document.getElementById("editid").value = id;
            document.getElementById("editname").value = name;
            //restaurant
            $('select[name=restaurant]').val(restaurant);
            $('.show-tick').selectpicker('refresh')
        }

        var currentGroupId = "";

        //
        function onEditExtras(groupid, id, name, desc){
            if (currentGroupId != ""){
                document.getElementById('formcreateextras').hidden = true;              // hide form
                document.getElementById('div2').hidden = true;
                document.getElementById("table"+currentGroupId).style.display='block';    // show table
            }
            currentGroupId = groupid;
            document.getElementById("table"+groupid).style.display='none';;
            var source = document.getElementById('formcreateextras');
            var parentElement = document.getElementById("parent"+groupid);
            parentElement.appendChild(source);
            source.hidden = false;
            //
            document.getElementById('ename').value = name;
            document.getElementById('desc').value = desc;
            document.getElementById('onedit').value = "true";
            document.getElementById('eid').value = id;
        }
        function onAddExtras(groupid){
            clearForm();
            if (currentGroupId != ""){
                document.getElementById('formcreateextras').hidden = true;              // hide form
                document.getElementById("table"+currentGroupId).style.display='block';    // show table
            }
            currentGroupId = groupid;
            document.getElementById("table"+groupid).style.display='none';;
            var source = document.getElementById('formcreateextras');
            var parentElement = document.getElementById("parent"+groupid);
            parentElement.appendChild(source);
            source.hidden = false;
        }

        var form = document.getElementById("formcreateextras");
        form.addEventListener("submit", saveExtras, true);

        function saveExtras(){
            var eid = document.getElementById('eid').value;
            var name = document.getElementById('ename').value;
            var desc = document.getElementById('desc').value;
            if (name === ""){
                swal("<?php echo e($lang->get(85)); ?>");
                event.preventDefault();
                return false;
            }
            if (desc === ""){
                swal("<?php echo e($lang->get(132)); ?>");
                event.preventDefault();
                return false;
            }
            var onedit = document.getElementById('onedit').value;
            console.log("onedit " + onedit);
            if (onedit == "true"){
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '<?php echo e(url("nutritionedit")); ?>',
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            id: eid,
                            name: name,
                            desc: desc,
                            nutritiongroup: currentGroupId,
                        },
                        success: function (data) {
                            console.log("successfully " + data.filename);
                            var old = document.getElementById('tr'+eid);
                            document.getElementById('formcreateextras').hidden = true;              // hide form
                            document.getElementById("table" + currentGroupId).style.display = 'block';    // show table
                            var parentElement = document.getElementById('tbody' + currentGroupId);        // add new element
                            var div = document.createElement("tr");
                            var buttons = addButtonsToExtra(currentGroupId, eid, name, desc);
                            div.innerHTML = '<tr><td>' + name + '</td> <td>' + desc + '</td><td>' + buttons + '</td></tr>';
                            div.setAttribute("id", "tr"+eid);
                            parentElement.replaceChild(div, old);
                            currentGroupId = "";
                            clearForm();
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    }
                );
            }else {
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '<?php echo e(url("nutritionadd")); ?>',
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            name: name,
                            desc: desc,
                            nutritiongroup: currentGroupId,
                        },
                        success: function (data) {
                            console.log("successfully " + data.filename);
                            document.getElementById('formcreateextras').hidden = true;              // hide form
                            document.getElementById("table" + currentGroupId).style.display = 'block';    // show table
                            var parentElement = document.getElementById('tbody' + currentGroupId);        // add new element
                            var div = document.createElement("tr");
                            var buttons = addButtonsToExtra(currentGroupId, data.id, name, desc);
                            div.innerHTML = '<tr><td>' + name + '</td><td>' + desc + '</td><td>' + buttons + '</td></tr>';
                            div.setAttribute("id", "tr"+data.id);
                            parentElement.appendChild(div);
                            currentGroupId = "";
                            clearForm();
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    }
                );
            }

            event.preventDefault();
            return false;
        }

        function clearForm(){
            document.getElementById('ename').value = "";
            document.getElementById('desc').value = "";
            document.getElementById('onedit').value = "";
            document.getElementById('eid').value = "";
        }

        function addButtonsToExtra(groupid, id, name, desc){
            var text = ' <button type="button" class="btn btn-default waves-effect"\
                    onclick="onEditExtras(\''+ groupid +'\', \''+id+'\', \''+name+'\',\''+desc+'\')"> \
                            <img src="img/iconedit.png" width="25px"> </button>\
                        <button type="button" class="btn btn-default waves-effect" onclick="showDeleteMessage2(\''+id+'\')">\
                        <img src="img/icondelete.png" width="25px"> </button> ';
            return text;
        }

        function onCancelEditExtras(){
            console.log("cancel");
            document.getElementById('formcreateextras').hidden = true;              // hide form
            document.getElementById("table"+currentGroupId).style.display='block';    // show table
            currentGroupId = "";
            clearForm();
            event.preventDefault();
            return false;
        }

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/nutrition.blade.php ENDPATH**/ ?>