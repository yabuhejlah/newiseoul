<?php $userinfo = app('App\UserInfo'); ?>

<?php $lang = app('App\Lang'); ?>
<?php $util = app('App\Util'); ?>

<?php $__env->startSection('content'); ?>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(63)); ?></h3> 
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
                                    <?php echo e($lang->get(67)); ?> 
                                </h3>
                            </div>
                            <div class="body">
                                <?php echo $__env->make('elements.categoryTable', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                <?php echo $__env->make('elements.form.selectCat', array('label' => $lang->get(478), 'onchange' => "", 'id' => "parent", 'request' => "false", 'noitem' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                                <?php echo $__env->make('elements.form.text', array('label' => $lang->get(71), 'text' => $lang->get(76), 'id' => "desc", 'request' => "false", 'maxlength' => "600"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                <div class="col-md-4 ">
                                </div>
                                <div class="col-md-8 ">
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
                url: '<?php echo e(url("categoryGetInfo")); ?>',
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
                    document.getElementById("desc").value = data.data.desc;
                    //
                    addEditImage(data.data.imageid, data.data.filename);
                    //
                    $('#parent').val(data.data.parent).change();
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
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("categoriesadd")); ?>',
                data: {
                    id: editId,
                    name: document.getElementById("name").value,
                    desc: document.getElementById("desc").value,
                    visible: (visible) ? "1" : "0",
                    parent: $('select[id=parent]').val(),
                    image: imageid,
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
            document.getElementById("name").value = "";
            document.getElementById("desc").value = "";
            visible = true;
            $('#parent').val(0).change();
            editId = 0;
            clearDropZone();
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restaurants\resources\views/categories.blade.php ENDPATH**/ ?>