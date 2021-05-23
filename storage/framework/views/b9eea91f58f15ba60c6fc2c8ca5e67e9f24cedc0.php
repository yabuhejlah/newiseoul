<?php $lang = app('App\Lang'); ?>

<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
    <p class="mr-10">Sort By: </p>
    <select name="sort-by" id="sort-by" class="nice-select" onchange="changeSort();">
        <option value="0"><?php echo e($lang->get(5)); ?></option>        
        <option value="1"><?php echo e($lang->get(6)); ?></option>        
        <option value="2"><?php echo e($lang->get(7)); ?></option>        
        <option value="3"><?php echo e($lang->get(8)); ?></option>        
    </select>
</div>

<script>

    function changeSort(){
        var selectBox = document.getElementById("sort-by");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        sortFood = selectedValue;
        paginationGoPage(1);
    }

</script>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/sortfood.blade.php ENDPATH**/ ?>