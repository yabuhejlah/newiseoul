<?php $lang = app('App\Lang'); ?>

<div class="q-card pagination-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div id="paginationList" class="pagination-content text-center">
                    <ul>
                        <?php for($i = 1; $i <= $pages; $i++): ?>
                            <?php if($page == $i): ?>
                                <li><a class="active" href="javascript:void(0);"><?php echo e($i); ?></a></li>
                            <?php else: ?>
                                <li><a href="javascript:void(0);" onClick="paginationGoPage(<?php echo e($i); ?>)"><?php echo e($i); ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>


<script>

    var search = "";
    var sortFood = 0;
    var foodMinPrice = <?php echo e($min); ?>;
    var foodMaxPrice = <?php echo e($max); ?>;
    var dataLoading = false;
    var lastFoodMinPrice = <?php echo e($min); ?>;
    var lastFoodMaxPrice = <?php echo e($max); ?>;
    var category = <?php echo e($cat); ?>;

    function paginationGoPage(page){
        dataLoading = true;
        var data = {
            page: page,
            sort: sortFood,
            foodMinPrice: foodMinPrice,
            foodMaxPrice: foodMaxPrice,
            cat: category,
            search: search,
            market: <?php echo e($market); ?>

        };
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("foodsGoPage")); ?>',
            data: data,
            success: function (data){
                console.log(data);
                if (data.path == null)
                    return;
                category = data.cat;
                //
                var t = data.page*12 - 11;
                var t2 = data.count_current + (data.page-1) * 12;
                var text = "<?php echo e($lang->get(2)); ?>" + t + "–" + t2 + "<?php echo e($lang->get(3)); ?>" + data.count + "<?php echo e($lang->get(4)); ?>"; // "Showing ", " of " " results"
                document.getElementById("resultPages").innerHTML = text;
                //
                var html = "<ul>";
                for (var i = 1; i <= data.pages; i++) {
                    if (i == page)
                        html += "<li style=\"margin-right: 5px;\"><a href='javascript:void(0);' class=\"active\" onClick=\"paginationGoPage("+i+")\">"+i+"</a></li>";
                    else
                        html += "<li style=\"margin-right: 5px;\"><a href='javascript:void(0);' onClick=\"paginationGoPage("+i+")\">"+i+"</a></li>";
                };
                html += "</ul>";
                document.getElementById("paginationList").innerHTML = html;
                //
                html = "";
                if (data.foods != null) {
                    if (data.foods == "Set URL_DASHBOARD variable in .env file")
                        return paginationGoPage(data.page);
                    data.foods.forEach(function (item, i, arr) {
                        html += "<div class=\"col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12\">";
                        html += gridFood(item.id, item.image, item.name, item.price, item.discountprice, item.rest_drating, item.restName, item.rest_rating, item.restId);
                        html += listFood(item);
                        html += "</div>";
                    });
                }
                if (data.foods == null || data.foods.length == 0){
                    html = `<div class="d-flex justify-content-around" style="align-self: center!important; width: 100%">
                                    <img src="img/nf.jpg">
                                </div>`;
                }
                slider_newRange(parseFloat(data.min), parseFloat(data.max));
                document.getElementById("products").innerHTML = html;
                if (foodMinPrice != lastFoodMinPrice ||
                    foodMaxPrice != lastFoodMaxPrice) {
                    foodMinPrice = lastFoodMinPrice;
                    foodMaxPrice = lastFoodMaxPrice;
                    paginationGoPage(1);
                }
                dataLoading = false;
            },
            error: function(e) {
                dataLoading = false;
                console.log(e);
            }}
        );

    }

</script>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/pagination.blade.php ENDPATH**/ ?>