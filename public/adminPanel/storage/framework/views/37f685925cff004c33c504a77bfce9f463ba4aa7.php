<?php $userinfo = app('App\UserInfo'); ?>
<?php $settings = app('App\Settings'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>

    <div class="header">
        <div class="row clearfix">
            <div class="col-md-6 ">
                <h4 class=""><?php echo e($lang->get(25)); ?></h4>  
            </div>
            <div class="col-md-push-6 pull-right" >
                <div style="margin-right: 30px">
                    <a href="mediaSetType?medialib_type=small">
                        <?php if($medialib_type == 'small'): ?>
                            <button type="button" class="btn bg-amber waves-effect">
                        <?php else: ?>
                            <button type="button" class="btn btn-default waves-effect">
                        <?php endif; ?>
                            <img src="img/tile0.png" width="25px">
                            </button>
                    </a>
                    <a href="mediaSetType?medialib_type=medium">
                        <?php if($medialib_type == 'medium'): ?>
                            <button type="button" class="btn bg-amber waves-effect">
                        <?php else: ?>
                            <button type="button" class="btn btn-default waves-effect">
                        <?php endif; ?>
                            <img src="img/tile1.png" width="25px">
                            </button>
                    </a>
                    <a href="mediaSetType?medialib_type=big">
                        <?php if($medialib_type == 'big'): ?>
                            <button type="button" class="btn bg-amber waves-effect">
                        <?php else: ?>
                            <button type="button" class="btn btn-default waves-effect">
                        <?php endif; ?>
                            <img src="img/tile2.png" width="25px" >
                            </button>
                    </a>
                </div>
            </div>
        </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                    <div class="row clearfix">
                      <div class="col-md-12">

                        <?php $__currentLoopData = $petani; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($medialib_type == 'small'): ?>
                                <div id="tbl<?php echo e($data->id); ?>" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <?php endif; ?>
                            <?php if($medialib_type == 'medium'): ?>
                                <div id="tbl<?php echo e($data->id); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <?php endif; ?>
                            <?php if($medialib_type == 'big'): ?>
                                <div id="tbl<?php echo e($data->id); ?>" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php endif; ?>
                                <div class="thumbnail">
                                    <div style="background-image: url('images/<?php echo e($data->filename); ?>'); width: auto;
                                        height: 200px; background-size: cover; background-position: center; ">
                                    </div>
                                    <div class="caption">
                                        <p style="overflow: hidden; white-space: nowrap;" ><?php echo e($data->shortName); ?></p>
                                        <p><?php echo e($data->updated_at); ?></p>
                                        <p>
                                            <?php if($userinfo->getUserPermission("MediaLibrary::Delete")): ?>
                                                <button type="button" onclick="deleteFile('<?php echo e($data->filename); ?>', '<?php echo e($data->id); ?>')" class="btn bg-red waves-effect"><?php echo e($lang->get(308)); ?></button>
                                            <?php endif; ?>
                                                <?php if($data->count == 0): ?>
                                                    <button type="button" onclick="fileInfo('<?php echo e($data->id); ?>')" class="btn bg-red waves-effect"><?php echo e($lang->get(496)); ?></button> 
                                                <?php else: ?>
                                                    <button type="button" onclick="fileInfo('<?php echo e($data->id); ?>')" class="btn bg-teal waves-effect"><?php echo e($lang->get(495)); ?></button> 
                                                <?php endif; ?>

                                        </p>
                                    </div>
                                </div>

                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    function deleteFile(fileName, id) {
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


                console.log("delete file:", fileName);
                console.log("id:", id);

                <?php if($settings->isDemoMode()): ?>
                    return showNotification("bg-red", "<?php echo e($lang->get(307)); ?>", "bottom", "center", "", "");
                <?php else: ?>
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '<?php echo e(url("image/delete")); ?>',
                    data: {filename: fileName},
                    success: function (data){
                        document.getElementById("tbl" + id).remove();
                    },
                    error: function(e) {
                        console.log(e);
                    }}
                );
                <?php endif; ?>


            } else {

            }
        });
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function fileInfo(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("imageInfo")); ?>',
            data: {
                id: id
            },
            success: function (data){
                console.log(data);
                fileInfoDialog(data);
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function fileInfoDialog(data){
        // foods
        var foods = "";
        data.foods.forEach(function(item, i, arr) {
            foods += `<tr><td>id: ${item.id}</td><td>${item.name}</td></tr>`;
        });
        if (foods == "")
            foods = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  
        // categories
        var categories = "";
        data.categories.forEach(function(item, i, arr) {
            categories += `<tr><td>id: ${item.id}</td><td>${item.name}</td></tr>`;
        });
        if (categories == "")
            categories = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  
        // extras
        var extras = "";
        data.extras.forEach(function(item, i, arr) {
            extras += `<tr><td>id: ${item.id}</td><td>${item.name}</td></tr>`;
        });
        if (extras == "")
            extras = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  
        // restaurants
        var restaurants = "";
        data.extras.forEach(function(item, i, arr) {
            restaurants += `<tr><td>id: ${item.id}</td><td>${item.name}</td></tr>`;
        });
        if (restaurants == "")
            restaurants = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  
        // banners
        var banners = "";
        data.banners.forEach(function(item, i, arr) {
            banners += `<tr><td>id: ${item.id}</td><td>${item.name}</td></tr>`;
        });
        if (banners == "")
            banners = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  
        // users
        var users = "";
        data.users.forEach(function(item, i, arr) {
            users += `<tr><td>id: ${item.id}</td><td>${item.name}</td></tr>`;
        });
        if (users == "")
            users = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  
        // orders
        var orders = "";
        data.orders.forEach(function(item, i, arr) {
            orders += `<tr><td>id: ${item.id}</td><td>${item.updated_at}</td></tr>`;
        });
        if (orders == "")
            orders = `<tr><td><?php echo e($lang->get(493)); ?></td><td></td></tr>`;  

        var text = `<div id="div1" style="height: 400px;position:relative;">
            <div id="div2" style="max-height:100%;overflow:auto;border:1px solid grey; border-radius: 10px; height: 97%;">
            <div id="foodslist" class="row" style="position: relative; top: 10px; left: 20px; right: 10px; bottom: 20px;width: 97%; ">
                <table class="table table-bordered">
                    <tbody>

                        <tr style="background-color: paleturquoise; width=50%" >
                            <td>
                                <?php echo e($lang->get(11)); ?>        
                            </td>
                                <td></td>
                        </tr>
                        ${users}

                        <tr style="background-color: paleturquoise; width=50%" >
                            <td>
                                <?php echo e($lang->get(3)); ?>        
                            </td>
                            <td></td>
                        </tr>
                        ${foods}

                        <tr style="background-color: paleturquoise; width=50%">
                            <td>
                                <?php echo e($lang->get(2)); ?>        
                            </td>
                            <td></td>
                        </tr>
                        ${categories}

                        <tr style="background-color: paleturquoise;">
                            <td>
                                <?php echo e($lang->get(4)); ?>        
                            </td>
                            <td></td>
                        </tr>
                        ${extras}

                        <tr style="background-color: paleturquoise;">
                            <td>
                                <?php echo e($lang->get(8)); ?>        
                            </td>
                            <td></td>
                        </tr>
                        ${restaurants}

                        <tr style="background-color: paleturquoise;">
                            <td>
                                <?php echo e($lang->get(505)); ?>        
                            </td>
                            <td></td>
                        </tr>
                        ${banners}

                        <tr style="background-color: paleturquoise;">
                            <td>
                                <?php echo e($lang->get(14)); ?>        
                            </td>
                            <td></td>
                        </tr>
                        ${orders}

                    </tbody>
                </table>
            </div></div></div>`;

        swal({
            title: "<?php echo e($lang->get(494)); ?>",  // Using the picture
            text: text,
            confirmButtonColor: "#DD6B55",
            customClass: 'swal-wide',
            html: true
        }, function (isConfirm) {
            if (isConfirm) {

            } else {

            }
        })
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/imageupload.blade.php ENDPATH**/ ?>