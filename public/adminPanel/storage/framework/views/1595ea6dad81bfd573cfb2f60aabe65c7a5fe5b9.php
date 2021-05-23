<!-- Home -->
<li>
<?php if(\Request::is('home')): ?>
    <li class="active">
        <?php endif; ?>
        <a href="home">
            <i class="material-icons">home</i>
            <span><?php echo e($lang->get(0)); ?></span>
        </a>
        <?php if(\Request::is('home')): ?>
    </li>
    <?php endif; ?>
    </li>


    <!-- Foods -->
    <li>
    <?php if(\Request::is('foods') OR \Request::is('foodadd') OR \Request::is('extras') OR \Request::is('extrasgroupadd')
            OR \Request::is('foodsreviews') OR \Request::is('nutrition') OR \Request::is('nutritiongroupadd')
            OR \Request::is('categories') OR \Request::is('categoriesadd') OR \Request::is('categoriesedit')
            OR \Request::is('foodedit') OR \Request::is('extrasgroupedit') OR \Request::is('nutritiongroupedit')
            OR \Request::is('foodreviewsedit') OR \Request::is('foodreviewsadd') ): ?>
        <li class="active">
            <?php endif; ?>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">cake</i>
                <span><?php echo e($lang->get(1)); ?></span>
            </a>
            <ul class="ml-menu">

                <!-- Categories -->
                <?php if($userinfo->getUserPermission("Food::Categories::View") ): ?>
                    <li>
                    <?php if(\Request::is('categories') OR \Request::is('categoriesadd') OR \Request::is('categoriesedit')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="categories"><?php echo e($lang->get(2)); ?></a>
                            </a>
                            <?php if(\Request::is('categories') OR \Request::is('categoriesadd') OR \Request::is('categoriesedit')): ?>
                        </li>
                        <?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($userinfo->getUserPermission("Food::Food::View")): ?>
                        <li>
                        <?php if(\Request::is('foods') OR \Request::is('foodadd') OR \Request::is('foodedit')): ?>
                            <li class="active">
                                <?php endif; ?>
                                <a href="foods"><?php echo e($lang->get(3)); ?></a>
                                <?php if(\Request::is('foods') OR \Request::is('foodadd') OR \Request::is('foodedit')): ?>
                            </li>
                            <?php endif; ?>
                            </li>
                        <?php endif; ?>

                        <?php if($userinfo->getUserPermission("Food::ExtrasGroup::View")): ?>
                            <li>
                            <?php if(\Request::is('extras') OR \Request::is('extrasgroupadd') OR \Request::is('extrasgroupedit')): ?>
                                <li class="active">
                                    <?php endif; ?>
                                    <a href="extras"><?php echo e($lang->get(4)); ?></a>
                                    <?php if(\Request::is('extras') OR \Request::is('extrasgroupadd') OR \Request::is('extrasgroupedit')): ?>
                                </li>
                                <?php endif; ?>
                                </li>
                            <?php endif; ?>

                            <?php if($userinfo->getUserPermission("Food::NutritionGroup::View")): ?>
                                <li>
                                <?php if(\Request::is('nutrition') OR \Request::is('nutritiongroupadd') OR \Request::is('nutritiongroupedit')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="nutrition"><?php echo e($lang->get(5)); ?></a>
                                        <?php if(\Request::is('nutrition') OR \Request::is('nutritiongroupadd') OR \Request::is('nutritiongroupedit')): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>
                                <?php endif; ?>

                                <?php if($userinfo->getUserPermission("Food::Reviews::View")): ?>
                                    <li>
                                    <?php if(\Request::is('foodsreviews') OR \Request::is('foodreviewsadd') OR \Request::is('foodreviewsedit')): ?>
                                        <li class="active">
                                            <?php endif; ?>
                                            <a href="foodsreviews"><?php echo e($lang->get(6)); ?></a>
                                            <?php if(\Request::is('foodsreviews') OR \Request::is('foodreviewsadd') OR \Request::is('foodreviewsedit')): ?>
                                        </li>
                                        <?php endif; ?>
                                        </li>
                                    <?php endif; ?>


            </ul>
        </li>
        <?php if(\Request::is('foods') OR \Request::is('foodadd') OR \Request::is('extras') OR \Request::is('extrasgroupadd')
                OR \Request::is('foodsreviews') OR \Request::is('nutrition') OR \Request::is('nutritiongroupadd')
                OR \Request::is('categories') OR \Request::is('categoriesadd') OR \Request::is('categoriesedit')
                OR \Request::is('foodedit') OR \Request::is('extrasgroupedit') OR \Request::is('nutritiongroupedit')
                OR \Request::is('foodreviewsedit') OR \Request::is('foodreviewsadd')
                ): ?>
        </li>
    <?php endif; ?>


    <!-- Restaurants -->
    <li>
    <?php if(\Request::is('restaurants') OR \Request::is('restaurantreviews') OR \Request::is('restaurantsedit')
                OR \Request::is('restorantsadd') OR \Request::is('restaurantsreviewedit') OR \Request::is('restorantsreviewadd')
               ): ?>
        <li class="active">
            <?php endif; ?>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">restaurant</i>
                <span><?php echo e($lang->get(8)); ?></span>
            </a>
            <ul class="ml-menu">

                <?php if($userinfo->getUserPermission("Restaurants::View")): ?>
                    <li>
                    <?php if(\Request::is('restaurants') OR \Request::is('restaurantsedit') OR \Request::is('restorantsadd')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="restaurants"><?php echo e($lang->get(8)); ?></a>
                            <?php if(\Request::is('restaurants') OR \Request::is('restaurantsedit') OR \Request::is('restorantsadd')): ?>
                        </li>
                        <?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if($userinfo->getUserPermission("RestaurantReview::View")): ?>
                        <li>
                        <?php if(\Request::is('restaurantreviews') OR \Request::is('restaurantsreviewedit') OR \Request::is('restorantsreviewadd')): ?>
                            <li class="active">
                                <?php endif; ?>
                                <a href="restaurantreviews"><?php echo e($lang->get(9)); ?></a>
                                <?php if(\Request::is('restaurantreviews') OR \Request::is('restaurantsreviewedit') OR \Request::is('restorantsreviewadd')): ?>
                            </li>
                            <?php endif; ?>
                            </li>
                        <?php endif; ?>


            </ul>
        </li>
        <?php if(\Request::is('restaurants') OR \Request::is('restaurantreviews') OR \Request::is('restaurantsedit')
                OR \Request::is('restorantsadd') OR \Request::is('restaurantsreviewedit') OR \Request::is('restorantsreviewadd')
               ): ?>
        </li>
    <?php endif; ?>

    <!-- Users -->
    <li>
    <?php if(\Request::is('roles') OR \Request::is('users') OR \Request::is('permissions') OR \Request::is('useradd') OR \Request::is('useredit')): ?>
        <li class="active">
            <?php endif; ?>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">people</i>
                <span><?php echo e($lang->get(11)); ?></span>
            </a>
            <ul class="ml-menu">


                <?php if($userinfo->getUserPermission("Users::View")): ?>
                    <li>
                    <?php if(\Request::is('users') OR \Request::is('useradd') OR \Request::is('useredit')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="users"><?php echo e($lang->get(11)); ?></a>
                            <?php if(\Request::is('users') OR \Request::is('useradd') OR \Request::is('useredit')): ?>
                        </li>
                        <?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <li>
                    <?php if(\Request::is('roles')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="roles"><?php echo e($lang->get(12)); ?></a>
                            <?php if(\Request::is('roles')): ?>
                        </li>
                        <?php endif; ?>
                        </li>

                        <li>
                        <?php if(\Request::is('permissions')): ?>
                            <li class="active">
                                <?php endif; ?>
                                <a href="permissions"><?php echo e($lang->get(13)); ?></a>
                                <?php if(\Request::is('permissions')): ?>
                            </li>
                            <?php endif; ?>
                            </li>


            </ul>
        </li>
        <?php if(\Request::is('foods') OR \Request::is('users') OR \Request::is('permissions') OR \Request::is('useradd') OR \Request::is('useredit')): ?>
        </li>
    <?php endif; ?>



    <!-- Orders -->
    <li>
    <?php if(\Request::is('orders') OR \Request::is('ordersstatuses') OR \Request::is('ordersedit')): ?>
        <li class="active">
            <?php endif; ?>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">folder_open</i>
                <span><?php echo e($lang->get(14)); ?></span>
            </a>
            <ul class="ml-menu">

                <?php if($userinfo->getUserPermission("Orders::View")): ?>
                    <li>
                    <?php if(\Request::is('orders') OR \Request::is('ordersedit')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="orders"><?php echo e($lang->get(14)); ?></a>
                            <?php if(\Request::is('orders') OR \Request::is('ordersedit')): ?>
                        </li>
                        <?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <li>
                    <?php if(\Request::is('ordersstatuses')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="ordersstatuses"><?php echo e($lang->get(15)); ?></a>
                            <?php if(\Request::is('ordersstatuses')): ?>
                        </li>
                        <?php endif; ?>
                        </li>

            </ul>
        </li>
        <?php if(\Request::is('orders') OR \Request::is('ordersstatuses') OR \Request::is('ordersedit') OR \Request::is('toprestaurants')): ?>
        </li>
    <?php endif; ?>

    <!-- Reports -->

    <li>
    <?php if(\Request::is('mostpopular')  OR \Request::is('mostpurchase') OR \Request::is('toprestaurants')): ?>
        <li class="active">
            <?php endif; ?>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">folder_open</i>
                <span><?php echo e($lang->get(16)); ?></span>
            </a>
            <ul class="ml-menu">


                <li>
                <?php if(\Request::is('mostpopular')): ?>
                    <li class="active">
                        <?php endif; ?>
                        <a href="mostpopular"><?php echo e($lang->get(17)); ?></a>
                        <?php if(\Request::is('mostpopular')): ?>
                    </li>
                    <?php endif; ?>
                    </li>

                    <li>
                    <?php if(\Request::is('mostpurchase') ): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="mostpurchase"><?php echo e($lang->get(18)); ?></a>
                            <?php if(\Request::is('mostpurchase')): ?>
                        </li>
                        <?php endif; ?>
                        </li>


                        <li>
                        <?php if(\Request::is('toprestaurants') ): ?>
                            <li class="active">
                                <?php endif; ?>
                                <a href="toprestaurants"><?php echo e($lang->get(19)); ?></a>
                                <?php if(\Request::is('toprestaurants')): ?>
                            </li>
                            <?php endif; ?>
                            </li>

            </ul>
        </li>
        <?php if(\Request::is('mostpopular')  OR \Request::is('mostpurchase') OR \Request::is('toprestaurants')): ?>
        </li>
    <?php endif; ?>

    <!-- Drivers -->

    <li>
    <?php if(\Request::is('drivers')): ?>
        <li class="active">
            <?php endif; ?>
            <a href="drivers">
                <i class="material-icons">directions_car</i>
                <span><?php echo e($lang->get(20)); ?></span>
            </a>
            <?php if(\Request::is('drivers')): ?>
        </li>
        <?php endif; ?>
        </li>

        <!-- Coupons -->

        <li>
        <?php if(\Request::is('coupons')): ?>
            <li class="active">
                <?php endif; ?>
                <a href="coupons">
                    <i class="material-icons">card_giftcard</i>
                    <span><?php echo e($lang->get(21)); ?></span>
                </a>
                <?php if(\Request::is('coupons')): ?>
            </li>
            <?php endif; ?>
            </li>

            <!-- Notifications -->

            <li>
            <?php if(\Request::is('notify') OR \Request::is('sendmsg')): ?>
                <li class="active">
                    <?php endif; ?>
                    <a href="notify">
                        <i class="material-icons">notifications</i>
                        <span><?php echo e($lang->get(22)); ?></span>
                    </a>
                    <?php if(\Request::is('notify') OR \Request::is('sendmsg')): ?>
                </li>
                <?php endif; ?>
                </li>


                <!-- chat -->

                <?php if($userinfo->getUserPermission("Chat::View") ): ?>
                    <li>
                    <?php if(\Request::is('chat')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="chat">
                                <i class="material-icons">chat_bubble_outline</i>
                                <span><?php echo e($lang->get(23)); ?></span>
                            </a>
                            <?php if(\Request::is('chat') ): ?>
                        </li>
                        <?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <!-- wallet -->
                    <?php if($userinfo->getUserPermission("Wallet::View") ): ?>
                        <li>
                        <?php if(\Request::is('wallet')): ?>
                            <li class="active">
                                <?php endif; ?>
                                <a href="wallet">
                                    <i class="material-icons">credit_card</i>
                                    <span><?php echo e($lang->get(24)); ?></span>
                                </a>
                                <?php if(\Request::is('wallet') ): ?>
                            </li>
                            <?php endif; ?>
                            </li>
                        <?php endif; ?>

                        <!-- Documents -->
                        <?php if($userinfo->getUserPermission("Documents::View") ): ?>
                            <li>
                            <?php if(\Request::is('documents')): ?>
                                <li class="active">
                                    <?php endif; ?>
                                    <a href="documents">
                                        <i class="material-icons">folder_open</i>
                                        <span><?php echo e($lang->get(497)); ?></span>
                                    </a>
                                    <?php if(\Request::is('documents') ): ?>
                                </li>
                                <?php endif; ?>
                                </li>
                            <?php endif; ?>

                            <!-- Banner -->
                            <?php if($userinfo->getUserPermission("Banners::View") ): ?>
                                <li>
                                <?php if(\Request::is('banners')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="banners">
                                            <i class="material-icons">folder_open</i>
                                            <span><?php echo e($lang->get(505)); ?></span>  
                                        </a>
                                        <?php if(\Request::is('banners') ): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>
                                <?php endif; ?>


                                <li class="header"><?php echo e($lang->get(27)); ?></li>  

                                <!-- Media Library -->
                                <li>
                                <?php if(\Request::is('media')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="media">
                                            <i class="material-icons">image</i>
                                            <span><?php echo e($lang->get(25)); ?></span>
                                        </a>
                                        <?php if(\Request::is('media')): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>

                                    <!-- FAQ -->
                                    <?php if($userinfo->getUserPermission("Faq::View")): ?>
                                        <li>
                                        <?php if(\Request::is('faq')): ?>
                                            <li class="active">
                                                <?php endif; ?>
                                                <a href="faq">
                                                    <i class="material-icons">question_answer</i>
                                                    <span><?php echo e($lang->get(26)); ?></span>
                                                </a>
                                                <?php if(\Request::is('faq')): ?>
                                            </li>
                                            <?php endif; ?>
                                            </li>
                                        <?php endif; ?>

                                        <!-- Settings -->

                                        <?php if($userinfo->getUserPermission("Settings::ChangeSettings")): ?>
                                            <li>
                                            <?php if(\Request::is('payments') OR \Request::is('settings') OR \Request::is('currencies')): ?>
                                                <li class="active">
                                                    <?php endif; ?>
                                                    <a href="javascript:void(0);" class="menu-toggle">
                                                        <i class="material-icons">settings</i>
                                                        <span><?php echo e($lang->get(27)); ?></span>
                                                    </a>
                                                    <ul class="ml-menu">

                                                        <li>
                                                        <?php if(\Request::is('settings')): ?>
                                                            <li class="active">
                                                                <?php endif; ?>
                                                                <a href="settings"><?php echo e($lang->get(27)); ?></a>
                                                                <?php if(\Request::is('settings')): ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            </li>

                                                            <li>
                                                            <?php if(\Request::is('currencies')): ?>
                                                                <li class="active">
                                                                    <?php endif; ?>
                                                                    <a href="currencies"><?php echo e($lang->get(28)); ?></a>
                                                                    <?php if(\Request::is('currencies')): ?>
                                                                </li>
                                                                <?php endif; ?>
                                                                </li>

                                                                <li>
                                                                <?php if(\Request::is('payments')): ?>
                                                                    <li class="active">
                                                                        <?php endif; ?>
                                                                        <a href="payments"><?php echo e($lang->get(29)); ?></a>
                                                                        <?php if(\Request::is('payments')): ?>
                                                                    </li>
                                                                    <?php endif; ?>
                                                                    </li>

                                                    </ul>
                                                </li>
                                                <?php if(\Request::is('payments') OR \Request::is('settings') OR \Request::is('currencies')): ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>


    <?php if($userinfo->getUserPermission("Settings::ChangeSettings")): ?>
        <li>
        <?php if(\Request::is('caLayout') OR \Request::is('caLayoutColors') OR \Request::is('caTheme') OR \Request::is('caLayoutSizes') OR \Request::is('topfoods')
                OR \Request::is('toprestaurants2')): ?>
            <li class="active">
        <?php endif; ?>
            <a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">settings</i>
                <span><?php echo e($lang->get(30)); ?></span></a>         
            <ul class="ml-menu">

            
            <?php echo $__env->make('elements.menuSubItem', array('text' => $lang->get(31), 'href' => "caTheme"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('elements.menuSubItem', array('text' => $lang->get(32), 'href' => "caLayout"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('elements.menuSubItem', array('text' => $lang->get(33), 'href' => "caLayoutColors"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('elements.menuSubItem', array('text' => $lang->get(34), 'href' => "caLayoutSizes"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('elements.menuSubItem', array('text' => $lang->get(7), 'href' => "topfoods"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('elements.menuSubItem', array('text' => $lang->get(10), 'href' => "toprestaurants2"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </ul>
        </li>

        <!-- Web Site Settings -->
        <?php echo $__env->make('elements.menuItem', array('text' => $lang->get(609), 'href' => "webSettings", 'icon' => 'settings'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Logging -->
    <?php if($userinfo->getUserPermission("Logging::View")): ?>
        <?php echo $__env->make('elements.menuItem', array('text' => $lang->get(35), 'href' => "logging", 'icon' => 'format_align_justify'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php /**PATH C:\xampp\htdocs\restaurants\resources\views/elements/menu.blade.php ENDPATH**/ ?>