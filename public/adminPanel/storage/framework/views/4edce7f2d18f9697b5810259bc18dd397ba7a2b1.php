<?php $userinfo = app('App\UserInfo'); ?>

<?php $lang = app('App\Lang'); ?>
<?php $util = app('App\Util'); ?>

<?php $__env->startSection('content'); ?>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(507)); ?></h3> 
            </div>
        </div>
    </div>

    <div class="body">

    <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>   
            <?php if($userinfo->getUserPermission("Food::Categories::Create")): ?>
            <li role="presentation"><a href="#create" data-toggle="tab" ><h4><?php echo e($lang->get(65)); ?></h4></a></li> 
            <?php endif; ?>
            <li id="tabEdit" style='display:none;' role="presentation"><a href="#edit" data-toggle="tab"><h4><?php echo e($lang->get(66)); ?></h4></a></li> 
        </ul>

        <!-- Tab List -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h3>
                                    <?php echo e($lang->get(508)); ?> 
                                </h3>
                            </div>
                            <div class="body">
                                <?php echo $__env->make('elements.bannersTable', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Create -->

                <div role="tabpanel" class="tab-pane fade" id="create">

                    <div id="form">
                        <div class="row clearfix">
                            <div class="col-md-6 ">
                                <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "name", 'request' => "true", 'maxlength' => "40"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                <?php echo $__env->make('elements.form.selectBannerPos', array('label' => $lang->get(511), 'onchange' => "", 'id' => "isin", 'request' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                                <?php echo $__env->make('elements.form.selectBannerType', array('label' => $lang->get(512), 'onchange' => "onChangeType();", 'id' => "banner_type", 'request' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                                <?php echo $__env->make('elements.form.selectFoods', array('label' => $lang->get(1), 'onchange' => "", 'id' => "foodForBanner", 'request' => "true", 'noitem' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                                <?php echo $__env->make('elements.form.text', array('label' => $lang->get(515), 'text' => $lang->get(516), 'id' => "url", 'request' => "true", 'maxlength' => "1000"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                <div class="col-md-4 " >
                                </div>
                                <div class="col-md-8 " style="margin-top: 20px">
                                    <?php echo $__env->make('elements.form.check', array('id' => "visible", 'text' => $lang->get(75), 'initvalue' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <?php echo $__env->make('elements.form.image', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php echo $__env->make('elements.form.button', array('label' => $lang->get(142), 'onclick' => "onSave();"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                    </div>

                </div>

                <!-- Tab Edit -->

                <div role="tabpanel" class="tab-pane fade" id="edit">
                </div>

            </div>
        </div>
    </div>

    <?php echo $__env->make('elements.imageselect', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href")
            if (target != "#edit")
                document.getElementById("tabEdit").style.display = "none";
            if (target == "#create") {
                clearForm();
                document.getElementById('create').appendChild(document.getElementById("form"));
            }
            if (target == "#home")
                clearForm();
        });

        function editItem(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("bannerGetInfo")); ?>',
                data: {
                    id: id,
                },
                success: function (data){
                    console.log(data);
                    if (data.error != "0" || data.data == null)
                        return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                    document.getElementById("tabEdit").style.display = "block";
                    $('.nav-tabs a[href="#edit"]').tab('show');
                    //
                    var target = document.getElementById("form");
                    document.getElementById('edit').appendChild(target);
                    //
                    document.getElementById("name").value = data.data.name;
                    editId = data.data.id;
                    onSetCheck_visible(data.data.visible);
                    //
                    addEditImage(data.data.imageid, data.data.filename);
                    //
                    $('#isin').val(data.data.position).change();
                    $('#banner_type').val(data.data.type).change();
                    if (data.data.type == 1) // food
                        $('#foodForBanner').val(data.data.details).change();
                    else
                        document.getElementById('url').value = data.data.details;
                    $('.show-tick').selectpicker('refresh');
                },
                error: function(e) {
                    showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                    console.log(e);
                }}
            );
        }

        var editId = 0;

        function onSave(){
            if (!document.getElementById("name").value)
                return showNotification("bg-red", "<?php echo e($lang->get(85)); ?>", "bottom", "center", "", "");  // The Name field is required.
            if (imageid == 0)
                return showNotification("bg-red", "<?php echo e($lang->get(86)); ?>", "bottom", "center", "", "");  // The Image field is required.

            if ($('select[id=banner_type]').val() == 1) // food
                var details = $('select[id=foodForBanner]').val();
            else
                var details = document.getElementById("url").value;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("bannersAdd")); ?>',
                data: {
                    id: editId,
                    name: document.getElementById("name").value,
                    image: imageid,
                    type: $('select[id=banner_type]').val(),
                    visible: (visible) ? "1" : "0",
                    position: $('select[id=isin]').val(),
                    details: details,
                },
                success: function (data){
                    console.log(data);
                    if (data.error != "0" || data.data == null)
                        return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                    if (editId != 0)
                        paginationGoPage(currentPage);
                    else{
                        var text = buildOneItem(data.data);
                        var text2 = document.getElementById("table_body").innerHTML;
                        document.getElementById("table_body").innerHTML = text+text2;
                    }
                    $('.nav-tabs a[href="#home"]').tab('show');
                    showNotification("bg-teal", "<?php echo e($lang->get(485)); ?>", "bottom", "center", "", ""); // Data saved
                    clearForm();
                },
                error: function(e) {
                    showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                    console.log(e);
                }}
            );
        }

        function clearForm(){
            onChangeType();
            document.getElementById("name").value = "";
            document.getElementById("url").value = "";
            onSetCheck_visible(true);
            $('#isin').val(1).change();
            $('#banner_type').val(1).change();
            $('#foodForBanner').val(1).change();
            editId = 0;
            clearDropZone();
        }

        function onChangeType(){
            if ($('select[id=banner_type]').val() == 1){ // food
                document.getElementById("element_foodForBanner").hidden = false;
                document.getElementById("element_url").hidden = true;

            }else{   // external link
                document.getElementById("element_foodForBanner").hidden = true;
                document.getElementById("element_url").hidden = false;
            }
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/banners.blade.php ENDPATH**/ ?>