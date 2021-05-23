<?php $userinfo = app('App\UserInfo'); ?>

<?php $currency = app('App\Currency'); ?>
<?php $lang = app('App\Lang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(185)); ?></h3>
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
                                <img src="img/topr.jpg">
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(69)); ?></th>
                                            <th><?php echo e($lang->get(70)); ?></th>
                                            <th><?php echo e($lang->get(72)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody id="tbodyView">

                                        <?php $__currentLoopData = $toprestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tr<?php echo e($data->id); ?>">
                                                <td><?php echo e($data->name); ?></td>
                                                <td><img src="images/<?php echo e($data->image); ?>" height="50" style='min-height: 50px; ' alt=""></td>
                                                <td><?php echo e($data->updated_at); ?></td>
                                                <td>
                                                    <?php if($userinfo->getUserPermission("Restaurants::TopRestaurants::Delete")): ?>
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
                            <?php if($userinfo->getUserPermission("Restaurants::TopRestaurants::Add")): ?>
                            <button type="button" onclick="selectFood()" class="btn btn-primary m-t-15 waves-effect "><h5><?php echo e($lang->get(186)); ?></h5></button>
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
                        "<th style=\"text-align: center;\"><?php echo e($lang->get(69)); ?></th>" +
                        "<th style=\"text-align: center;\"><?php echo e($lang->get(70)); ?></th>" +
                        "<th style=\"text-align: center;\"><?php echo e($lang->get(74)); ?></th>" +
                        "</tr>" +
                        "                </thead>\n" +
                        "                <tbody id=\"foods\">";
                    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        text = text + "<tr><td><?php echo e($data->name); ?></td>";
                        text = text + "<td><img src=\"images/<?php echo e($data->image); ?>\" width=\"70px\"></td>";
                        text = text + "<td><div onclick=\"addToList(<?php echo e($data->id); ?>)\" class=\"btn btn-primary waves-effect \"><h5><?php echo e($lang->get(181)); ?></h5></div></td></tr>";
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        text = text + "                </tbody>\n" +
                        "                </tbody>\n" +
                        "                </table>\n</div></div></div>"
                    swal({
                        title: "<?php echo e($lang->get(187)); ?>",
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
                                url: '<?php echo e(url("topRestaurantsDelete")); ?>',
                                data: {id: id},
                                success: function (data){
                                    console.log(data);
                                    console.log(data.error);
                                    if (data.error == "1")
                                        return showNotification("bg-red", data.text, "bottom", "center", "", "");  // Something went wrong
                                    if (data.error == "0") {
                                        showNotification("bg-teal", "<?php echo e($lang->get(525)); ?>", "bottom", "center", "", ""); // Restaurant deleted
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

                function addToList(id){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '<?php echo e(url("topRestaurantsAdd")); ?>',
                        data: {
                            id: id,
                        },
                        success: function (data){
                            console.log(data);
                            if (data.ret) {
                                showNotification("bg-teal", "<?php echo e($lang->get(188)); ?>", "bottom", "center", "", "");
                                addTableWithRestaurants(data);
                            }else{
                                showNotification("bg-purple", data.text, "bottom", "center", "", "");
                            }
                        },
                        error: function(e) {
                            console.log(e);
                        }}
                    );
                }

                function addTableWithRestaurants(data){
                    document.getElementById("tbodyView").innerHTML = "";
                    data.toprestaurants.forEach(function(entry){
                        var div = document.createElement("tr");
                        div.id = "tr"+entry.id;
                        var price = parseFloat(entry.price).toFixed(data.symbolDigits) + data.currency;
                        if (data.rightSymbol)
                            price = data.currency + parseFloat(entry.price).toFixed(data.symbolDigits);
                        div.innerHTML = "<td>"+entry.name+"</td>\n" +
                            "<td><img src=\"images/"+entry.image+"\" height=\"50\" style='min-height: 50px; ' alt=\"\"></td>\n" +
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

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/toprestaurants2.blade.php ENDPATH**/ ?>