<?php $userinfo = app('App\UserInfo'); ?>
<?php $lang = app('App\Lang'); ?>


<?php $__env->startSection('content'); ?>



<div class="q-card q-radius q-container">
    <div class="header q-line q-mb20">
        <h3 class=""><?php echo e($lang->get(609)); ?></h3>       
    </div>
    <div class="d-flex flex-column justify-content-between">
        <div class="d-flex q-mb20 ">
            <div class="d-flex q-mr10 flex-width-20percents align-items-end q-label">
                <b><?php echo e($lang->get(382)); ?></b> 
            </div>
            <div class="d-flex " style="width: 200px">
                <input class="q-form" type="color" value="#<?php echo e($web_mainColor); ?>" id="web_mainColor">
            </div>
        </div>

        <div class="d-flex q-mb20">
            <div class="d-flex q-mr10 flex-width-20percents align-items-end q-label">
                <b><?php echo e($lang->get(610)); ?></b> 
            </div>
            <div class="d-flex " style="width: 200px">
                <input class="q-form" type="color" value="#<?php echo e($web_mainColorHover); ?>" id="web_mainColorHover">
            </div>
        </div>

        <div class="d-flex q-mb20">
            <div class="d-flex q-mr10 flex-width-20percents align-items-end q-label">
                <b><?php echo e($lang->get(383)); ?></b> 
            </div>
            <div class="d-flex " style="width: 200px">
                <input type="number" id="web_radius" class="q-form" value="<?php echo e($web_radius); ?>">
            </div>
        </div>

        <div class="d-flex q-mb20">
            <?php echo $__env->make('elements.form.imagev2', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="d-flex q-line q-mt20">
        </div>

        <div class="d-flex q-mt10 justify-content-between" >
            <div class="q-btn-all q-color-second-bkg waves-effect" onClick="onSave()" style="height: 50px"><h4><?php echo e($lang->get(142)); ?></h4></div>
            <div class="q-btn-all q-color-second-bkg waves-effect" onClick="onRestore()" style="height: 50px"><h4><?php echo e($lang->get(605)); ?></h4></div> 
        </div>
    </div>
</div>

<script>

    function onRestore(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("webRestoreSettings")); ?>',
            data: {
            },
            success: function (data){
                console.log(data);
                window.location.reload(true);
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function onSave(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("webSaveSettings")); ?>',
            data: {
                web_mainColor: document.getElementById("web_mainColor").value.substring(1),
                web_mainColorHover: document.getElementById("web_mainColorHover").value.substring(1),
                web_radius: document.getElementById("web_radius").value,
                web_logo: imageid
            },
            success: function (data){
                console.log(data);
                showNotification("bg-teal", "<?php echo e($lang->get(485)); ?>", "bottom", "center", "", ""); // Data saved
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    addEditImage('<?php echo e($web_logo); ?>', "<?php echo e($web_filename); ?>");

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restaurants\resources\views/webSettings.blade.php ENDPATH**/ ?>