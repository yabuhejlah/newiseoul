<?php $lang = app('App\Lang'); ?>
<?php $util = app('App\Util'); ?>

<?php $__env->startSection('content'); ?>

<!-- Ckeditor -->
<script src="plugins/ckeditor/ckeditor.js"></script>

<div class="header">
    <div class="row clearfix">
        <div class="col-md-12">
            <h3 class=""><?php echo e($lang->get(497)); ?></h3> 
        </div>
    </div>
</div>
<div class="body">
    <div class="row clearfix">

        <div class="col-md-12">
            <label><h4><?php echo e($lang->get(530)); ?></h4></label> 
        </div>
        <?php echo $__env->make('elements.form.text', array('label' => $lang->get(531), 'text' => $lang->get(532), 'id' => "copyright", 'request' => "false", 'maxlength' => "100"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

        <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <label><h4><?php echo e($lang->get(499)); ?></h4></label> 
        </div>
        <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "about_name", 'request' => "false", 'maxlength' => "100"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 form-control-label">
                <label for="ckeditor"><h4><?php echo e($lang->get(500)); ?></h4></label> 
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="form-line">
                        <textarea id="ckeditor_about" name="desc">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <label><h4><?php echo e($lang->get(501)); ?></h4></label> 
        </div>
        <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "terms_name", 'request' => "false", 'maxlength' => "100"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 form-control-label">
                <label for="ckeditor"><h4><?php echo e($lang->get(500)); ?></h4></label> 
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="form-line">
                        <textarea id="ckeditor_terms" name="desc">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <label><h4><?php echo e($lang->get(502)); ?></h4></label> 
        </div>
        <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "policy_name", 'request' => "false", 'maxlength' => "100"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 form-control-label">
                <label for="ckeditor"><h4><?php echo e($lang->get(500)); ?></h4></label> 
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="form-line">
                        <textarea id="ckeditor_policy" name="desc">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <label><h4><?php echo e($lang->get(503)); ?></h4></label> 
        </div>
        <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "delivery_name", 'request' => "false", 'maxlength' => "100"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 form-control-label">
                <label for="ckeditor"><h4><?php echo e($lang->get(500)); ?></h4></label> 
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="form-line">
                        <textarea id="ckeditor_delivery" name="desc">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <label><h4><?php echo e($lang->get(504)); ?></h4></label> 
        </div>
        <?php echo $__env->make('elements.form.text', array('label' => $lang->get(69), 'text' => $lang->get(91), 'id' => "refund_name", 'request' => "false", 'maxlength' => "100"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 form-control-label">
                <label for="ckeditor"><h4><?php echo e($lang->get(500)); ?></h4></label> 
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <div class="form-line">
                        <textarea id="ckeditor_refund" name="desc">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <?php echo $__env->make('elements.form.button', array('label' => $lang->get(142), 'onclick' => "onSave();"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
        </div>

    </div>
</div>
<script>
    CKEDITOR.config.height = 100;
    CKEDITOR.replace('ckeditor_about');
    CKEDITOR.replace('ckeditor_terms');
    CKEDITOR.replace('ckeditor_policy');
    CKEDITOR.replace('ckeditor_delivery');
    CKEDITOR.replace('ckeditor_refund');

    CKEDITOR.instances['ckeditor_about'].setData(`<?php echo $util->getDoc("about_text"); ?>`);
    CKEDITOR.instances['ckeditor_terms'].setData(`<?php echo $util->getDoc("terms_text"); ?>`);
    CKEDITOR.instances['ckeditor_policy'].setData(`<?php echo $util->getDoc("privacy_text"); ?>`);
    CKEDITOR.instances['ckeditor_delivery'].setData(`<?php echo $util->getDoc("delivery_text"); ?>`);
    CKEDITOR.instances['ckeditor_refund'].setData(`<?php echo $util->getDoc("refund_text"); ?>`);

    document.getElementById("copyright").value = `<?php echo e($util->getDoc("copyright_text")); ?>`;
    document.getElementById("about_name").value = `<?php echo e($util->getDoc("about_text_name")); ?>`;
    document.getElementById("terms_name").value = `<?php echo e($util->getDoc("terms_text_name")); ?>`;
    document.getElementById("policy_name").value = `<?php echo e($util->getDoc("privacy_text_name")); ?>`;
    document.getElementById("delivery_name").value = `<?php echo e($util->getDoc("delivery_text_name")); ?>`;
    document.getElementById("refund_name").value = `<?php echo e($util->getDoc("refund_text_name")); ?>`;

    function onSave(){
        var data = {
            copyright: document.getElementById("copyright").value,
            about: document.getElementById("about_name").value,
            terms: document.getElementById("terms_name").value,
            policy: document.getElementById("policy_name").value,
            delivery: document.getElementById("delivery_name").value,
            refund: document.getElementById("refund_name").value,
            about_text: CKEDITOR.instances["ckeditor_about"].getData(),
            terms_text: CKEDITOR.instances["ckeditor_terms"].getData(),
            privacy_text: CKEDITOR.instances["ckeditor_policy"].getData(),
            delivery_text: CKEDITOR.instances["ckeditor_delivery"].getData(),
            refund_text: CKEDITOR.instances["ckeditor_refund"].getData(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("docsave")); ?>',
            data: data,
            success: function (data){
                console.log(data);
                if (data.error != "0")
                    return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                showNotification("bg-teal", "<?php echo e($lang->get(485)); ?>", "bottom", "center", "", ""); // Data saved
            },
            error: function(e) {
                showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                console.log(e);
            }}
        );
    }

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restaurants\resources\views/documents.blade.php ENDPATH**/ ?>