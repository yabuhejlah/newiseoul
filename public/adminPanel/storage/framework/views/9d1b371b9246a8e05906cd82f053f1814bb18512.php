<?php $lang = app('App\Lang'); ?>

<div class="table-responsive">

    <div class="col-md-12" style="margin-bottom: 10px">
        <div class="col-md-4" style="margin-bottom: 0px">
            <?php echo $__env->make('elements.search.selectStatus', array('text' => $lang->get(481), 'id' => "rest_search", 'onchange' => "onStatusSearchSelect(this)"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        </div>
        <div class="col-md-4" style="margin-bottom: 0px">
            <?php echo $__env->make('elements.search.selectRest', array('text' => $lang->get(8), 'id' => "rest_search", 'onchange' => "onRestSearchSelect(this)"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        </div>
        <div class="col-md-4" style="margin-bottom: 0px">
            <?php echo $__env->make('elements.search.textMax40', array('text' => $lang->get(480), 'id' => "users_search"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        </div>
    </div>

    <table id="data_table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr id="table_header">
            
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th><?php echo e($lang->get(43)); ?></th> 
            <th><?php echo e($lang->get(44)); ?></th> 
            <th><?php echo e($lang->get(45)); ?></th> 
            <th><?php echo e($lang->get(46)); ?></th> 
            <th><?php echo e($lang->get(47)); ?></th> 
            <th><?php echo e($lang->get(48)); ?></th> 
            <th><?php echo e($lang->get(49)); ?></th> 
            <th><?php echo e($lang->get(74)); ?></th> 

        </tr>
        </tfoot>
        <tbody id="table_body">
            
        </tbody>
    </table>

    <div align="center">
        <nav>
            <div id="paginationList" >
                
            </div>
        </nav>
    </div>

</div>



























































































































<script>

    var pages = 1;
    var currentPage = 1;
    var sortRest = 0;
    var sortCat = 0;
    var searchText = "";
    var sort = "updated_at";
    var sortBy = "desc";

    paginationGoPage(1);
    initPaginationLine(pages, currentPage);
    initTableHeader();

    function paginationGoPage(page){
        var data = {
            page: page,
            sortAscDesc: sortBy,
            sortBy : sort,
            rest: sortRest,
            cat: sortCat,
            search: searchText,
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("ordersGoPage")); ?>',
            data: data,
            success: function (data){
                console.log(data);
                currentPage = data.page;
                pages = data.pages;
                if (data.error != "0" || data.idata == null)
                    return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                initUsersDataTable(data.idata);
                initPaginationLine(pages, data.page);
                initTableHeader();
            },
            error: function(e) {
                dataLoading = false;
                console.log(e);
            }}
        );
    }

    function initUsersDataTable(data){
        html = "";
        data.forEach(function (item, i, arr) {
            html += buildOneItem(item);
        });
        document.getElementById("table_body").innerHTML = html;
        $('.show-tick').selectpicker('refresh');
    }

    function buildOneItem(item){

        var text = ``;
        if (item.curbsidePickup == "true") {
            text = `<span class="badge bg-red"><?php echo e($lang->get(213)); ?></span>`;
            if (item.arrived == "true")
                text += `<span class="badge bg-red"><?php echo e($lang->get(214)); ?></span>`;
            text += "<br>";
        }
        text += `<span class="badge bg-teal">${item.method}</span>`;
        //
        var text2 = "";
        <?php $__currentLoopData = $iorderstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            if (<?php echo e($idata->id); ?> == item.status)
                text2 = item.status;
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        //
        var text3 = "";
        if (item.curbsidePickup == "true"){
            <?php $__currentLoopData = $iorderstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if (<?php echo e($idata->id); ?> != 4){
                    if (<?php echo e($idata->id); ?> == item.status)
                        text3 += `<option id="role${item.id}_<?php echo e($idata->id); ?>" value="<?php echo e($idata->id); ?>" selected style="font-size: 16px  !important;"><?php echo e($idata->status); ?></option>`;
                    else
                        text3 += `<option id="role${item.id}_<?php echo e($idata->id); ?>" value="<?php echo e($idata->id); ?>" style="font-size: 16px  !important;"><?php echo e($idata->status); ?></option>`;
                }
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        } else {
            <?php $__currentLoopData = $iorderstatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $idata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if (<?php echo e($idata->id); ?> == item.status)
                    text3 += `<option id="role${item.id}_<?php echo e($idata->id); ?>" value="<?php echo e($idata->id); ?>" selected style="font-size: 16px  !important;"><?php echo e($idata->status); ?></option>`;
                else
                    text3 += `<option id="role${item.id}_<?php echo e($idata->id); ?>" value="<?php echo e($idata->id); ?>" style="font-size: 16px  !important;"><?php echo e($idata->status); ?></option>`;
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }

        return `
            <tr>
                <td>${item.id}</td>
                <td>${item.totalFull}</td>
                <td>${item.name}</td>
                <td>

                <?php if($userinfo->getUserPermission("Orders::Edit")): ?>
                    <select name="role" id="role" class="form-control show-tick" onchange="checkStatus(event, ${item.id})" >
                        ${text3}
                    </select>
                <?php else: ?>
                        ${text2}
                <?php endif; ?>

                </td>
                <td>${item.restaurantName}</td>
                <td>${text}</td>
                <td><div class="font-bold col-teal">${item.timeago}</div>${item.updated_at}</td>
                <td>
            <?php if($userinfo->getUserPermission("Orders::Edit")): ?>
                <button type="button" class="btn btn-default waves-effect" onclick="viewItem('${item.id}')">
                    <img src="img/iconview.png" width="25px">
                </button>
            <?php endif; ?>
            <?php if($userinfo->getUserPermission("Orders::Delete")): ?>
                <button type="button" class="btn btn-default waves-effect" onclick="showDeleteMessage('${item.id}')">
                    <img src="img/icondelete.png" width="25px">
                </button>
            <?php endif; ?>
        </td>
    </tr>
    `;
    }

    function initPaginationLine(pages, page){
        var html = "<ul class=\"pagination\">";
        for (var i = 1; i <= pages; i++) {
            if (i == page)
                html += `<li class="active"><a href="javascript:void(0);">${i}</a></li>`;
            else
                html += `<li><a href="javascript:void(0);" onClick="paginationGoPage(${i})" class="waves-effect">${i}</a></li>`;
        };
        html += "</ul>";
        document.getElementById("paginationList").innerHTML = html;
    }

    function tableHeaderSort(newsort){
        if (newsort == sort) {
            if (sortBy == "asc")
                sortBy = "desc";
            else
                sortBy = "asc";
        }
        else{
            sort = newsort
            sortBy = "asc";
        }
        paginationGoPage(currentPage);
    }


    function initTableHeader(){
        var html = `
            <th><?php echo e($lang->get(43)); ?> <img onclick="tableHeaderSort('orders.id');" src="${utilGetImg('orders.id')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(44)); ?> <img onclick="tableHeaderSort('orders.total');" src="${utilGetImg('orders.total')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(45)); ?> <img onclick="tableHeaderSort('users.name');" src="${utilGetImg('users.name')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(46)); ?> </th> 
            <th><?php echo e($lang->get(47)); ?> <img onclick="tableHeaderSort('orders.restaurant');" src="${utilGetImg('orders.restaurant')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(48)); ?> </th> 
            <th><?php echo e($lang->get(49)); ?> <img onclick="tableHeaderSort('orders.updated_at');" src="${utilGetImg('orders.updated_at')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(74)); ?> </th>                                                                                                
        `;
        document.getElementById("table_header").innerHTML = html;
    }

    function utilGetImg(value){
        var img = "img/arrow_noactive.png";
        if (sort == value && sortBy == "asc") img = "img/asc_arrow.png";
        if (sort == value && sortBy == "desc") img = "img/desc_arrow.png";
        return img;
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
                    url: '<?php echo e(url("userdelete")); ?>',
                    data: {id: id},
                    success: function (data){
                        if (!data.ret)
                            return showNotification("bg-red", data.text, "bottom", "center", "", "");
                        //
                        // remove from ui
                        //
                        paginationGoPage(currentPage);
                    },
                    error: function(e) {
                        console.log(e);
                    }}
                );
            } else {

            }
        });
    }

    function onRestSearchSelect(object){
        sortRest = object.value;
        currentPage = 1;
        paginationGoPage(currentPage);
    }

    function onStatusSearchSelect(object){
        sortCat = object.value;
        currentPage = 1;
        paginationGoPage(currentPage);
    }

    $(document).on('input', '#users_search', function(){
        searchText = document.getElementById("users_search").value;
        console.log(searchText);
        currentPage = 1;
        paginationGoPage(1);
    });

</script>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/ordersTable.blade.php ENDPATH**/ ?>