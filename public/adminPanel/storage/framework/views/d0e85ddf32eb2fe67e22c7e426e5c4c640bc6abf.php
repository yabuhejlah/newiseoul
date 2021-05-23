<?php $lang = app('App\Lang'); ?>

<div class="table-responsive">

    <div class="col-md-12" style="margin-bottom: 10px">
        <div class="col-md-4" style="margin-bottom: 0px">
            <div class="col-md-3 ">
                <?php echo e($lang->get(481)); ?> 
            </div>
            <div class="col-md-9 ">
                <?php echo $__env->make('elements.search.check', array('id' => "visible_search", 'text' => $lang->get(75), 'initvalue' => "true", 'callback' => "onVisibleSearchSelect()"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                <?php echo $__env->make('elements.search.check', array('id' => "unvisible_search", 'text' => $lang->get(490), 'initvalue' => "true", 'callback' => "onVisibleSearchSelect()"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
            </div>
        </div>
        <div class="col-md-5" style="margin-bottom: 0px">
            <?php echo $__env->make('elements.search.selectCat', array('text' => $lang->get(478), 'id' => "cat_search", 'onchange' => "onCatSearchSelect(this)"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        </div>
        <div class="col-md-3" style="margin-bottom: 0px">
            <?php echo $__env->make('elements.search.textMax40', array('text' => $lang->get(480), 'id' => "element_search"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
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
            <th><?php echo e($lang->get(478)); ?></th> 
            <th><?php echo e($lang->get(539)); ?></th> 
            <th><?php echo e($lang->get(72)); ?></th> 
            <th><?php echo e($lang->get(73)); ?></th> 
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
    var sortCat = 0;
    var sortPublished = '1';
    var sortUnPublished = '1';
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
            cat: sortCat,
            search: searchText,
            sortPublished: sortPublished,
            sortUnPublished: sortUnPublished,
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("categoryGoPage")); ?>',
            data: data,
            success: function (data){
                console.log(data);
                currentPage = data.page;
                pages = data.pages;
                if (data.error != "0" || data.idata == null)
                    return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                initDataTable(data.idata);
                initPaginationLine(pages, data.page);
                initTableHeader();
            },
            error: function(e) {
                dataLoading = false;
                console.log(e);
            }}
        );
    }

    function initDataTable(data){
        html = "";
        data.forEach(function (item, i, arr) {
            html += buildOneItem(item);
        });
        document.getElementById("table_body").innerHTML = html;
    }

    function buildOneItem(item){
        if (item.visible)
            var visible = `<img src="img/iconyes.png" height="20px">`;
        else
            var visible = `<img src="img/iconno.png" height="20px">`;

        return `
            <tr>
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td>
                     <img src="images/${item.filename}" height="100px" >
                </td>
                <td>${item.parentName}</td>
                <td>${item.itemsCount}</td>
                <td><div class="font-bold col-teal">${item.timeago}</div>${item.updated_at}</td>
                <td>${visible}</td>
                <td>
            <?php if($userinfo->getUserPermission("Food::Categories::Edit")): ?>
                <button type="button" class="btn btn-default waves-effect" onclick="editItem('${item.id}')">
                    <img src="img/iconedit.png" width="25px">
                </button>
            <?php endif; ?>
            <?php if($userinfo->getUserPermission("Food::Categories::Delete")): ?>
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
            <th><?php echo e($lang->get(478)); ?> <img <img onclick="tableHeaderSort('parent');" src="${utilGetImg('parent')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(539)); ?> </th>                                                                                                   
            <th><?php echo e($lang->get(72)); ?> <img onclick="tableHeaderSort('updated_at');" src="${utilGetImg('updated_at')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
            <th><?php echo e($lang->get(73)); ?> <img onclick="tableHeaderSort('visible');" src="${utilGetImg('visible')}" class="img-fluid" style="margin-left: 10px; width: 20px; float: right;"></th> 
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
                    url: '<?php echo e(url("categorydelete")); ?>',
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

    function onCatSearchSelect(object){
        sortCat = object.value;
        currentPage = 1;
        paginationGoPage(currentPage);
    }

    $(document).on('input', '#element_search', function(){
        searchText = document.getElementById("element_search").value;
        currentPage = 1;
        paginationGoPage(1);
    });

    function onVisibleSearchSelect(){
        if (visible_search) sortPublished = "1"; else sortPublished = "0";
        if (unvisible_search) sortUnPublished = "1"; else sortUnPublished = "0";
        currentPage = 1;
        paginationGoPage(1);
    }

</script>
<?php /**PATH /home/virtwww/w_valeraletun-ru_1598f6f2/http/adminbsb/resources/views/elements/categoryTable.blade.php ENDPATH**/ ?>