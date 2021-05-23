<?php $lang = app('App\Lang'); ?>

<div class="table-responsive">

    <div class="col-md-12" style="margin-bottom: 10px">
        <div class="col-md-4" style="margin-bottom: 0px">
        </div>
        <div class="col-md-4" style="margin-bottom: 0px">
            <?php echo $__env->make('elements.search.selectRoles', array('text' => $lang->get(481), 'id' => "role_search", 'onchange' => "onRoleSearchSelect(this)"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
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
            <th><?php echo e($lang->get(68)); ?></th> 
            <th><?php echo e($lang->get(69)); ?></th> 
            <th><?php echo e($lang->get(70)); ?></th> 
            <th><?php echo e($lang->get(191)); ?></th> 
            <th><?php echo e($lang->get(192)); ?></th> 
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
</div>


<script>

    var pages = 1;
    var currentPage = 1;
    var sortRole = 0;
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
            role: sortRole,
            search: searchText,
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("usersGoPage")); ?>',
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
    }

    function buildOneItem(item){
        var email = `<td>${item.email}</td>`;
        if (item.typeReg == "facebook")
            email = `<td><img src="img/facebook.png" height="50px"></td>`;
        if (item.typeReg == "google")
            email = `<td><img src="img/google.png" height="50px"></td>`;
        return `
            <tr>
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td>
                     <div style="background-image: url('images/${item.filename}'); width: 100px;
                        height: 100px; background-size: cover; background-position: top center; border-radius: 50%;">
                    </div>
                </td>
                ${email}
                <td>${item.roleName}</td>
                <td><div class="font-bold col-teal">${item.timeago}</div>${item.updated_at}</td>
                <td>
            <?php if($userinfo->getUserPermission("Users::Edit")): ?>
                <button type="button" class="btn btn-default waves-effect" onclick="editItem('${item.id}')">
                    <img src="img/iconedit.png" width="25px">
                </button>
            <?php endif; ?>
            <?php if($userinfo->getUserPermission("Users::Delete")): ?>
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
            <th><?php echo e($lang->get(68)); ?> <img onclick="tableHeaderSort('id');" src="${utilGetImg('id')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(69)); ?> <img onclick="tableHeaderSort('name');" src="${utilGetImg('name')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(70)); ?> </th>                                                                                                   
            <th><?php echo e($lang->get(191)); ?> <img <img onclick="tableHeaderSort('email');" src="${utilGetImg('email')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(192)); ?> <img onclick="tableHeaderSort('role');" src="${utilGetImg('role')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(49)); ?> <img onclick="tableHeaderSort('updated_at');" src="${utilGetImg('updated_at')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
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

    function onRoleSearchSelect(object){
        sortRole = object.value;
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
<?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/elements/usersTable.blade.php ENDPATH**/ ?>