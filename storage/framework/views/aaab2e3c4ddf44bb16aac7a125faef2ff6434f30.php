<?php $lang = app('App\Lang'); ?>



<div class="header-advance-search">
    <input id="search" type="text" placeholder="<?php echo e($lang->get(44)); ?>">  
    <button>
        <div class="px-0" >
            <img src="img/search.png" onclick="onSearch();" class="img-fluid" style="padding-bottom: 10px; padding-left: 10px; padding-right: 10px; padding-top: 5px"/>
        </div>
    </button>
</div>

<script>
    var isSearch = false;
    function onSearch(){
        isSearch = true;
        console.log(document.getElementById("search").value);
        search = document.getElementById("search").value;
        if ("<?php echo e(\Request::route()->getName()); ?>" == "/main") {
            foodMinPrice = 0;
            lastFoodMinPrice = 0;
            foodMaxPrice = 1000000;
            lastFoodMaxPrice = 1000000;
            paginationGoPage(1);
        }else
            window.location='<?php echo e(route('/main')); ?>?search='+search;
    }

</script>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/search.blade.php ENDPATH**/ ?>