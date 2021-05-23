<?php $userinfo = app('App\UserInfo'); ?>
<?php $currency = app('App\Currency'); ?>
<?php $lang = app('App\Lang'); ?>



<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="row clearfix">
            <div class="col-md-12">
                <h3 class=""><?php echo e($lang->get(305)); ?></h3>
            </div>
        </div>
    </div>
    <div class="body">

        <!-- Tabs -->

        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#home" data-toggle="tab"><h4><?php echo e($lang->get(64)); ?></h4></a></li>
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
                                </h3>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-bordered table-striped table-hover dataTable js-exportable" data-order="[[ 3, &quot;desc&quot; ]]">
                                        <thead>
                                        <tr>
                                            <th><?php echo e($lang->get(68)); ?></th>
                                            <th><?php echo e($lang->get(137)); ?></th>
                                            <th><?php echo e($lang->get(294)); ?></th>
                                            <th><?php echo e($lang->get(295)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e($lang->get(68)); ?></th>
                                            <th><?php echo e($lang->get(137)); ?></th>
                                            <th><?php echo e($lang->get(294)); ?></th>
                                            <th><?php echo e($lang->get(295)); ?></th>
                                            <th><?php echo e($lang->get(74)); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($user->id); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td>
                                                    <div class=\"image-cropper\">
                                                        <img src="<?php echo e($user->image); ?>" width="100" class='rounded'>
                                                    </div>
                                                </td>
                                                <td id="balance<?php echo e($user->id); ?>">
                                                    <?php echo e($currency->makePrice($user->balance)); ?>

                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default waves-effect" onclick="viewItem('<?php echo e($user->id); ?>')">
                                                        <img src="img/iconview.png" width="25px">
                                                    </button>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                            onclick="editItem('<?php echo e($user->id); ?>', '<?php echo e($user->balance); ?>')">
                                                        <img src="img/iconedit.png" width="25px">
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

            <!-- End Tab List -->

            <!-- Tab Edit -->


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

        function viewItem(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '<?php echo e(url("walletDetails")); ?>',
                data: {walletId: id},
                success: function (data){
                    console.log(data);
                    if (data.error == '0')
                        viewItem2(id, data);
                },
                error: function(e) {
                    console.log(e);
                }}
            );
        }

        function viewItem2(id, data){
            var text = `
                <div id="div1" style="height: 400px;position:relative;">
                    <div id="div2" style="max-height:100%;overflow:auto;border:1px solid grey; border-radius: 10px; height: 97%;">
                        <div id="foodslist" class="row" style="position: relative; top: 10px; left: 20px; right: 10px; bottom: 20px;width: 97%; ">
                        <table class="table table-bordered">
                            <thead style="background-color: paleturquoise;">
                                <tr>
                                    <th><?php echo e($lang->get(68)); ?></th>
                                    <th><?php echo e($lang->get(282)); ?></th>
                                    <th><?php echo e($lang->get(296)); ?></th>
                                    <th><?php echo e($lang->get(297)); ?></th>
                                    <th><?php echo e($lang->get(295)); ?></th>
                                    <th><?php echo e($lang->get(218)); ?></th>
                                </tr>
                            </thead>
                            <tbody >
                            `;

            data.walletlog.forEach(function(entry){
                text = text + "<tr><td>" + entry.id + "</td>";
                text = text + "<td>" + entry.created_at + "</td>";
                text = text + "<td>" // arrive
                if (entry.arrival == "1") {
                    <?php if($currency->rightSymbol() == "false"): ?>
                        text = text + "<?php echo e($currency->currency()); ?>" + parseFloat(entry.amount).toFixed(<?php echo e($currency->symbolDigits()); ?>);
                    <?php else: ?>
                        text = text + parseFloat(entry.amount).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
                    <?php endif; ?>
                }
                text = text + "</td>"
                text = text + "<td>"// lose
                if (entry.arrival != "1") {
                    <?php if($currency->rightSymbol() == "false"): ?>
                        text = text + "<?php echo e($currency->currency()); ?>" + parseFloat(entry.amount).toFixed(<?php echo e($currency->symbolDigits()); ?>);
                    <?php else: ?>
                        text = text + parseFloat(entry.amount).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
                    <?php endif; ?>
                }
                text = text + "</td>"
                text = text + "<td>"// balance
                <?php if($currency->rightSymbol() == "false"): ?>
                    text = text + "<?php echo e($currency->currency()); ?>" + parseFloat(entry.total).toFixed(<?php echo e($currency->symbolDigits()); ?>);
                <?php else: ?>
                    text = text + parseFloat(entry.total).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
                <?php endif; ?>
                text = text + "</td>"
                text = text + "<td>" + entry.comment + "</td>";
                text = text + "</tr>";
            });
            text = text + `</tbody>
                        </table>
                     </div>
                     </div>
                </div>`;
            swal({
                title: "<?php echo e($lang->get(298)); ?>",
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

        var balanceForDialog = 0;
        var userId = 0;

        function editItem(id, balance){

            var value = document.getElementById('balance'+id).innerHTML.trim();

            <?php if($currency->rightSymbol() == "false"): ?>
                value = value.substr(1);
            <?php else: ?>
                value = value.substring(0, value.length - 1);
            <?php endif; ?>
            balanceForDialog = parseFloat(value);
            userId = id;
            var text = `
                <div id="div1" style="height: 400px;position:relative;">
                    <div id="div2" style="max-height:100%;overflow:auto;border:1px solid grey; border-radius: 10px; height: 97%;">
                        <div id="foodslist" class="row" style="position: relative; top: 10px; left: 20px; right: 10px; bottom: 20px;width: 97%; ">
                        <table class="table table-bordered">
                            <tbody >
                            <tr>`;
            text = text + "<td><h5><?php echo e($lang->get(299)); ?>:</h5></td>";

            text = text + "<td>";
            <?php if($currency->rightSymbol() == "false"): ?>
                text = text + "<?php echo e($currency->currency()); ?>" + balanceForDialog.toFixed(<?php echo e($currency->symbolDigits()); ?>);
            <?php else: ?>
                text = text + balanceForDialog.toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
            <?php endif; ?>
            text = text + "</td></tr>";

            text = text + "<tr><td><h5><?php echo e($lang->get(300)); ?>:</h5></td>";

            text = text + `<td><div class="input-group" >
                                <div class="form-line">
                                    <input type="number" id="newBalance" class="form-control" value="" min="0" max="10000" oninput="onInput();">
                                </div>
                                <p><?php echo e($lang->get(301)); ?></p>
                            </div>
                            </td></tr>
                            `
            text = text + "<tr><td><h5><?php echo e($lang->get(302)); ?>:</h5></td>";
            text = text + "<td><h5 id=\"diff\"></h5></td></tr>";
            text = text + "<tr><td><h5><?php echo e($lang->get(218)); ?>:</h5></td>";
            text = text + `<td><div class="input-group" >
                                <div class="form-line">
                                    <input type="text" id="comments" class="form-control">
                                </div>
                                <p><?php echo e($lang->get(303)); ?></p>
                            </div>
                            </td>
                            `

            text = text + `</tr></tbody>
                        </table>
                     </div>
                     </div>
                </div>`;
            swal({
                title: "<?php echo e($lang->get(304)); ?>",
                text: text,
                confirmButtonColor: "#DD6B55",
                customClass: 'swal-wide',
                html: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var comments = document.getElementById('comments').value;
                    console.log(comments);
                    var value = parseFloat(document.getElementById('newBalance').value);
                    console.log(value);
                    if (!isNaN(value)){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '<?php echo e(url("walletChangeBalans")); ?>',
                            data: {
                                comments: comments,
                                balance : value,
                                id : userId,
                            },
                            success: function (data){
                                console.log(data);
                                var text = "";
                                <?php if($currency->rightSymbol() == "false"): ?>
                                    text = "<?php echo e($currency->currency()); ?>" + parseFloat(value).toFixed(<?php echo e($currency->symbolDigits()); ?>);
                                <?php else: ?>
                                    text = parseFloat(value).toFixed(<?php echo e($currency->symbolDigits()); ?>) + "<?php echo e($currency->currency()); ?>";
                                <?php endif; ?>
                                document.getElementById('balance'+userId).innerHTML = text;
                            },
                            error: function(e) {
                                console.log(e);
                            }}
                        );

                    }
                } else {

                }
            })
        }

        function onInput(){
            var value = parseFloat(document.getElementById('newBalance').value);
            if (value.isEmpty)
                value = 0;
            if (isNaN(value))
                value = 0;
            if (value > 10000)
                value = 10000;
            if (value < 0)
                value = 0;
            document.getElementById('newBalance').value = value;
            document.getElementById('diff').innerHTML = (value-balanceForDialog).toFixed(2);
        }

    </script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content2'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restaurants\resources\views/wallet.blade.php ENDPATH**/ ?>