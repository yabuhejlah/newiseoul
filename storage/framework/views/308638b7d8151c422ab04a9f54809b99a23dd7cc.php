<?php $lang = app('App\Lang'); ?>
<?php $doc = app('App\Docs'); ?>

<footer>

    <div class="footer-navigation-section pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">

                    <div class="single-navigation-section">
                        <?php if($docs["about"] == "true" || $docs["delivery"] == "true" || $docs["privacy"] == "true" || $docs["terms"] == "true" || $docs["refund"] == "true"): ?>
                            <h3 class="nav-section-title"><?php echo e($lang->get(28)); ?></h3>   
                        <?php endif; ?>
                        <ul>
                            <?php if($docs["about"] == "true"): ?>
                                <li> <a href="<?php echo e(route('/about')); ?>"><?php echo e($doc->getName("about_text_name")); ?></a></li>  
                            <?php endif; ?>
                            <?php if($docs["delivery"] == "true"): ?>
                                <li> <a href="<?php echo e(route('/delivery')); ?>"><?php echo e($doc->getName("delivery_text_name")); ?></a></li> 
                            <?php endif; ?>
                            <?php if($docs["privacy"] == "true"): ?>
                                <li> <a href="<?php echo e(route('/privacy')); ?>"><?php echo e($doc->getName("privacy_text_name")); ?></a></li> 
                            <?php endif; ?>
                            <?php if($docs["terms"] == "true"): ?>
                                <li> <a href="<?php echo e(route('/terms')); ?>"><?php echo e($doc->getName("terms_text_name")); ?></a></li> 
                            <?php endif; ?>
                            <?php if($docs["refund"] == "true"): ?>
                                <li> <a href="<?php echo e(route('/refund')); ?>"><?php echo e($doc->getName("refund_text_name")); ?></a></li> 
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">

                    <div class="single-navigation-section">
                        <h3 class="nav-section-title"><?php echo e($lang->get(29)); ?></h3> 
                        <ul>
                            <li> <a href="<?php echo e(route("/account")); ?>"><?php echo e($lang->get(30)); ?></a></li> 
                            <li> <a href="<?php echo e(route("/wishlist")); ?>"><?php echo e($lang->get(31)); ?></a></li> 
                            <li> <a href="<?php echo e(route("/cart")); ?>"><?php echo e($lang->get(32)); ?></a></li> 
                        </ul>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">

                    <div class="contact-summery">
<?php if(isset($market)): ?>
<?php if($market != '0' && $market != '' ): ?>
                        <?php if($docs["address"] != "" || $docs["phone"] != "" || $docs["mobilephone"] != ""): ?>
                        <h2><?php echo e($lang->get(33)); ?></h2> 
                        <?php endif; ?>
                        <div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap">

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_pin_alt"></span>
                                </div>
                                <div class="contact-info">
                                    <?php if($docs["address"] != ""): ?>
                                    <p><?php echo e($lang->get(36)); ?>: <span><?php echo e($docs["address"]); ?></span></p> 
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="single-contact d-flex mb-xs-20">
                                <div class="icon">
                                    <span class="icon_mobile"></span>
                                </div>
                                <div class="contact-info">
                                    <?php if($docs["phone"] != ""): ?>
                                    <p><?php echo e($lang->get(34)); ?>: <span><?php echo e($docs["phone"]); ?></span></p>  
                                    <?php endif; ?>
                                    <?php if($docs["mobilephone"] != ""): ?>
                                    <p><?php echo e($lang->get(35)); ?>: <span><?php echo e($docs["mobilephone"]); ?></span></p>  
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
<?php endif; ?>
<?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright-section pt-35 pb-35">
        <div class="container">
            <div class="row align-items-md-center align-items-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">

                    <div class="copyright-segment">
                        <p>
                            <?php if($docs["privacy"] == "true"): ?>
                                <a href="<?php echo e(route('/privacy')); ?>"><?php echo e($doc->getName("privacy_text_name")); ?></a> 
                            <?php endif; ?>
                            <?php if($docs["terms"] == "true"): ?>
                                <span class="separator">|</span>
                                <a href="<?php echo e(route('/terms')); ?>"><?php echo e($doc->getName("terms_text_name")); ?></a> 
                            <?php endif; ?>
                        </p>

                        <p class="copyright-text">&copy; <?php echo e($docs["copyright_text"]); ?></p>
                    </div>

                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <div class="payment-info text-center text-md-right">
                        <p><?php echo e($lang->get(27)); ?><img src="img/payment-icon.png" class="img-fluid" alt=""></p>  
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/elements/footer.blade.php ENDPATH**/ ?>