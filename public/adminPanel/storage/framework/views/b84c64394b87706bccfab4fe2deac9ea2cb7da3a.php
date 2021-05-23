<?php $userinfo = app('App\UserInfo'); ?>

<?php $lang = app('App\Lang'); ?>
<?php $currency = app('App\Currency'); ?>

<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(146)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

        <!-- Tabs -->

        <!-- Tab List -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <img src="img/top.jpg">
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(88)); ?></th>
                                            <th><?php echo e($lang->get(89)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(88)); ?></th>
                                            <th><?php echo e($lang->get(89)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody id="tbodyView">

                                        <?php $__currentLoopData = $topfoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->name); ?></td>
                                                <td><img src="images/<?php echo e($data->image); ?>" height="50" style='min-height: 50px; ' alt=""></td>
                                                <td><?php echo e($currency->makePrice($data->price)); ?>

                                                </td>
                                                <td><?php echo e($data->restaurantName); ?></td>
                                                <td><?php echo e($data->updated_at); ?></td>
                                                <td>
                                                    <?php if($userinfo->getUserPermission("Food::TopFoods:Delete")): ?>
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
                    <div class="col-md-12">
                        <div align="right">
                            <?php if($userinfo->getUserPermission("Food::TopFoods:Add")): ?>
                            <button type="button" onclick="selectFood()" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(120)); ?></h5></button>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- End Tab List -->

<script>

    function selectFood(){
        var text = "<div id=\"div1\" style=\"height: 400px;position:relative;\">" +
            "<div id=\"div2\" style=\"max-height:100%;overflow:auto;border:1px solid grey; border-radius: 10px; height: 97%;\">" +
            "<div id=\"foodslist\" class=\"row\" style=\"position: relative; top: 10px; left: 20px; right: 10px; bottom: 20px;width: 97%; \">" +
            "<table class=\"table table-bordered\">\n" +
            "                <tbody> <thead style=\"background-color: paleturquoise;\">\n" +
            "<tr>" +
            "<th><?php echo e($lang->get(69)); ?></th>" + // Name
            "<th><?php echo e($lang->get(70)); ?></th>" + // Image
            "<th><?php echo e($lang->get(88)); ?></th>" + // Price
            "<th><?php echo e($lang->get(89)); ?></th>" + // Market
            "<th><?php echo e($lang->get(74)); ?></th>" + // Action
            "</tr>" +
            "                </thead>\n" +
            "                <tbody id=\"foods\">";
        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            text = text + "<tr><td><?php echo e($data->name); ?></td>";
            text = text + "<td><img src=\"images/<?php echo e($data->image); ?>\" width=\"70px\"></td><td>";

            <?php if($rightSymbol == "false"): ?>
                text = text + "<?php echo e($icurrency); ?>" + parseFloat(<?php echo e($data->price); ?>).toFixed(<?php echo e($symbolDigits); ?>);
            <?php else: ?>
                text = text +  parseFloat(<?php echo e($data->price); ?>).toFixed(<?php echo e($symbolDigits); ?>) + "<?php echo e($icurrency); ?>";
            <?php endif; ?>

            text = text +"</td><td><?php echo e($data->restaurantName); ?></td>" +
                "<td><div onclick=\"addFood(<?php echo e($data->id); ?>)\" class=\"btn btn-primary waves-effect \"><h5><?php echo e($lang->get(181)); ?></h5></div></td></tr>";
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        text = text + "                </tbody>\n" +
            "                </tbody>\n" +
            "                </table>\n</div></div></div>"
        swal({
            title: "<?php echo e($lang->get(147)); ?>",
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
                    url: '<?php echo e(url("topfooddelete")); ?>',
                    data: {id: id},
                    success: function (data){
                        console.log(data);
                        if (data.error == "1")
                            return showNotification("bg-red", data.text, "bottom", "center", "", "");  
                        if (data.error == "0") {
                            showNotification("bg-teal", "<?php echo e($lang->get(527)); ?>", "bottom", "center", "", ""); // Food deleted
                            var div = document.getElementById('tr'+id);
                            div.remove();
                        }else
                            showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                    },
                    error: function(e) {
                        console.log(e);
                    }}
                );
            } else {

            }
        });
    }

    function addFood(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("topFoodsAdd")); ?>',
            data: {
                id: id,
            },
            success: function (data){
                console.log(data);
                if (data.ret) {
                    showNotification("bg-teal", "Food added", "bottom", "center", "", "");
                    addTableWithDishes(data);
                }else{
                    showNotification("bg-purple", data.text, "bottom", "center", "", "");
                }
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function addTableWithDishes(data){
        document.getElementById("tbodyView").innerHTML = "";
        data.topfoods.forEach(function(entry){
            var div = document.createElement("tr");
            div.id = "tr"+entry.id;
            var price = parseFloat(entry.price).toFixed(data.symbolDigits) + data.currency;
            if (data.rightSymbol)
                price = data.currency + parseFloat(entry.price).toFixed(data.symbolDigits);
            div.innerHTML = "<td>"+entry.name+"</td>\n" +
                "<td><img src=\"images/"+entry.image+"\" height=\"50\" style='min-height: 50px; ' alt=\"\"></td>\n" +
                "<td>"+price+"</td>\n" +
                "<td>"+entry.restaurantName+"</td>\n" +
                "<td>"+entry.updated_at+"</td>\n" +
                "<td>\n" +
                "<button type=\"button\" class=\"btn btn-default waves-effect\" onclick=\"showDeleteMessage('"+entry.id+"')\">\n" +
                "<img src=\"img/icondelete.png\" width=\"25px\">\n" +
                "</button>\n" +
                "</td>";
            document.getElementById("tbodyView").appendChild(div);
        });
    }


</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/topfoods.blade.php ENDPATH**/ ?>