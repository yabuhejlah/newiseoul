<?php $userinfo = app('App\UserInfo'); ?>
<?php $currency = app('App\Currency'); ?>
<?php $lang = app('App\Lang'); ?>

<?php $settings = app('App\Settings'); ?>

<?php $__env->startSection('content'); ?>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(115)); ?></h3>  
            </div>
        </div>
    </div>

    <div class="body">

        <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
            <?php if($userinfo->getUserPermission("Food::Food::Create")): ?>
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
                                    <?php echo e($lang->get(87)); ?>

                                </h3>
                            </div>
                            <div class="body">
                                <?php echo $__env->make('elements.foodsTable', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- End Tab List -->

            <!-- Tab Create -->


            <div role="tabpanel" class="tab-pane fade" id="create">

                <div id="redalert" class="alert bg-red" style='display:none;' >

                </div>

                <div id="form">
                    <div class="row clearfix">
                        <div class="col-md-6 ">
                            <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "name", 'request' => "true", 'maxlength' => "40"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php echo $__env->make('elements.form.price', array('label' => $lang->get(88), 'text' => $lang->get(92), 'id' => "price", 'request' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php echo $__env->make('elements.form.selectMarket', array('label' => $lang->get(93), 'onchange' => "",  'id' => "market", 'request' => "true", 'noitem' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                            <?php echo $__env->make('elements.form.selectCat', array('label' => $lang->get(94), 'onchange' => "", 'id' => "category", 'request' => "true", 'noitem' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                            <?php echo $__env->make('elements.form.price', array('label' => $lang->get(96), 'text' => $lang->get(97), 'id' => "discountprice", 'request' => "false"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php echo $__env->make('elements.form.text', array('label' => $lang->get(104), 'text' => $lang->get(105), 'id' => "ingredients", 'request' => "false", 'maxlength' => "500"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php echo $__env->make('elements.form.text', array('label' => $lang->get(71), 'text' => $lang->get(76), 'id' => "desc", 'request' => "false", 'maxlength' => "500"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <div class="col-md-4 ">
                            </div>
                            <div class="col-md-8 ">
                                <?php echo $__env->make('elements.form.check', array('id' => "visible", 'text' => $lang->get(75), 'initvalue' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <?php echo $__env->make('elements.form.image', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('elements.form.text', array('label' => $lang->get(98), 'text' => $lang->get(99), 'id' => "unit", 'request' => "false", 'maxlength' => "10"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php echo $__env->make('elements.form.number', array('label' => $lang->get(100), 'text' => $lang->get(101), 'id' => "package", 'request' => "false", 'min' => "0", 'max' => "1000000"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php echo $__env->make('elements.form.text', array('label' => $lang->get(102), 'text' => $lang->get(103), 'id' => "weight", 'request' => "false", 'maxlength' => "20"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                            <?php if(!$settings->isMarket()): ?>                            
                                <?php echo $__env->make('elements.form.selectNutrition', array('label' => $lang->get(109), 'onchange' => "",  'id' => "nutrition", 'request' => "false", 'noitem' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                                <?php echo $__env->make('elements.form.selectExtras', array('label' => $lang->get(107), 'onchange' => "",  'id' => "extras", 'request' => "false", 'noitem' => "true"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
                            <?php endif; ?>
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
                url: '<?php echo e(url("foodGetInfo")); ?>',
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
                    onSetCheck_visible(data.data.published);

                    document.getElementById("price").value = data.data.price;
                    // market
                    console.log("data.data.restaurant " + data.data.restaurant);
                    $('#market').val(data.data.restaurant).change();
                    $('#category').val(data.data.category).change();
                    // category
                    // nutrition
                    $('#nutrition').val(data.data.nutritions).change();
                    $('#extras').val(data.data.extras).change();
                    $('.show-tick').selectpicker('refresh');
                    //
                    document.getElementById("discountprice").value = data.data.discountprice;
                    document.getElementById("ingredients").value = data.data.ingredients;
                    document.getElementById("desc").value = data.data.desc;
                    document.getElementById("unit").value = data.data.unit;
                    document.getElementById("package").value = data.data.packageCount;
                    document.getElementById("weight").value = data.data.weight;
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

        function clearForm(){
            document.getElementById("name").value = "";
            onSetCheck_visible(true);
            document.getElementById("price").value = "";
            document.getElementById("discountprice").value = "";
            document.getElementById("ingredients").value = "";
            document.getElementById("desc").value = "";
            document.getElementById("unit").value = "";
            document.getElementById("package").value = "";
            document.getElementById("weight").value = "";
            //
            $('#market').val(0).change();
            $('#category').val(0).change();
            $('#nutrition').val(0).change();
            $('#extras').val(0).change();
            editId = 0;
            clearDropZone();
        }

        var editId = 0;

        function onSave(){
            var data = {
                id: editId,
                name: document.getElementById("name").value,
                image: imageid,
                published: (visible) ? "1" : "0",
                price: document.getElementById("price").value,
                discPrice: document.getElementById("discountprice").value,
                unit: document.getElementById("unit").value,
                package: document.getElementById("package").value,
                weight: document.getElementById("weight").value,
                desc: document.getElementById("desc").value,
                ingredients: document.getElementById("ingredients").value,
                extras: $('select[id=extras]').val(),
                nutritions: $('select[id=nutrition]').val(),
                restaurant: $('select[id=market]').val(),
                category: $('select[id=category]').val(),
            };
            console.log(data);
            if (!document.getElementById("name").value)
                return showNotification("bg-red", "<?php echo e($lang->get(85)); ?>", "bottom", "center", "", "");  // The Name field is required.
            if (!document.getElementById("price").value)
                return showNotification("bg-red", "<?php echo e($lang->get(111)); ?>", "bottom", "center", "", "");  // The Price field is required.
            if ($('select[id=market]').val() == "0")
                return showNotification("bg-red", "<?php echo e($lang->get(113)); ?>", "bottom", "center", "", "");  // The Market field is required.
            if ($('select[id=category]').val() == "0")
                return showNotification("bg-red", "<?php echo e($lang->get(112)); ?>", "bottom", "center", "", "");  // The Category field is required.
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("foodadd")); ?>',
                data: data,
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

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/foods.blade.php ENDPATH**/ ?>