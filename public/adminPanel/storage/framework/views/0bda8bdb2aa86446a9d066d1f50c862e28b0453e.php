<?php $userinfo = app('App\UserInfo'); ?>
<?php $settings = app('App\Settings'); ?>
<?php $lang = app('App\Lang'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | <?php echo e(config('app.name')); ?></title>

<meta name="_token" content="<?php echo e(csrf_token()); ?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <!-- Favicon-->
    <link rel="icon" href="img/logo.png" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="js/companion.js"></script>

    <style>
    .swal-wide{
        position: fixed !important;
        width:70% !important;
        border-radius: 20px !important;

        left: 30% !important;


        }

body{
font-family: 'Poppins', sans-serif !important;
}


.checkbox{
    border-radius: 10px !important;
}

.dropzone {
    border-radius: 10px !important;
}
.card{
    border-radius: 10px;
}

.info{
    border-left: 2px solid red;
    padding-left: 10px;
}
.dropdown-toggle {
	font-size: 16px  !important;
	top: 10px;
}

.checkmark {
    position: absolute;
    top: 5px;
    left: 0;
    height: 20px;
    width: 20px;
    border-radius:5px;
}

.checkmark2 {
    margin: 10px 0px 10px 30px !important;
    top: 5px;
    left: 0;
    height: 20px;
    width: 20px;
    border-radius:5px;
}

    .foodm{
        margin-bottom: 0px !important;
        border: none;
    }

    .foodlabel{
      font-weight: normal;
      color: #aaa;
      position: absolute;
      /* top: 10px; */
      left: 0;
      cursor: text;
      -moz-transition: 0.2s;
      -o-transition: 0.2s;
      -webkit-transition: 0.2s;
      transition: 0.2s;

    }


    </style>


</head>

<body class="theme-teal" dir="<?php echo e($lang->direction()); ?>">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="home"><?php echo e(config('app.name')); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="<?php echo e(route('orders')); ?>"  role="button">
                            <i class="material-icons">folder_open</i>
                            <span id="countNewOrders" class="label-count">0</span>
                        </a>
                    </li>

            <?php if($userinfo->getUserPermission("Chat::View") ): ?>
                    <li class="dropdown">
                        <a href="<?php echo e(route('chat')); ?>"  role="button">
                            <i class="material-icons">chat_bubble_outline</i>
                            <span id="countChatNewMessages" class="label-count">0</span>
                        </a>
                    </li>
            <?php endif; ?>

                    <li class="dropdown">
                        <a href="javascript:void(0);" role="button">
                            <span class=""><?php echo e($userinfo->getUserRole()); ?></span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo e(route('logout')); ?>"  role="button">
                            <i class="material-icons">input</i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo e($userinfo->getUserAvatar()); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
                    <div class="email"><?php echo e(Auth::user()->email); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="users?user_id=<?php echo e(Auth::user()->id); ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(route('logout')); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->


            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"><?php echo e($lang->get(37)); ?></li>

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
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">settings</i>
                                <span><?php echo e($lang->get(30)); ?></span>
                            </a>
                            <ul class="ml-menu">

                                <li>
                                <?php if(\Request::is('caTheme')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="caTheme"><?php echo e($lang->get(31)); ?></a>
                                        <?php if(\Request::is('caTheme')): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>


                                    <li>
                                <?php if(\Request::is('caLayout')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="caLayout"><?php echo e($lang->get(32)); ?></a>
                                        <?php if(\Request::is('caLayout')): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>

                                <li>
                                <?php if(\Request::is('caLayoutColors')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="caLayoutColors"><?php echo e($lang->get(33)); ?></a>
                                        <?php if(\Request::is('caLayoutColors')): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>

                                <li>
                                <?php if(\Request::is('caLayoutSizes')): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="caLayoutSizes"><?php echo e($lang->get(34)); ?></a>
                                        <?php if(\Request::is('caLayoutSizes')): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>

                                <li>
                                <?php if(\Request::is('topfoods') ): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="topfoods"><?php echo e($lang->get(7)); ?></a>
                                        <?php if(\Request::is('topfoods') ): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>


                                <li>
                                <?php if(\Request::is('toprestaurants2') ): ?>
                                    <li class="active">
                                        <?php endif; ?>
                                        <a href="toprestaurants2"><?php echo e($lang->get(10)); ?></a>
                                        <?php if(\Request::is('toprestaurants2') ): ?>
                                    </li>
                                    <?php endif; ?>
                                    </li>

                            </ul>
                        </li>
                        <?php if(\Request::is('caLayout') OR \Request::is('caLayoutColors') OR \Request::is('caTheme') OR \Request::is('caLayoutSizes') OR \Request::is('topfoods')
                                    OR \Request::is('toprestaurants2')): ?>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

            <!-- Logging -->
                <?php if($userinfo->getUserPermission("Logging::View")): ?>
                    <li>
                    <?php if(\Request::is('logging')): ?>
                        <li class="active">
                            <?php endif; ?>
                            <a href="logging">
                                <i class="material-icons">format_align_justify</i>
                                <span><?php echo e($lang->get(35)); ?></span>
                            </a>
                            <?php if(\Request::is('logging')): ?>
                        </li>
                        <?php endif; ?>
                        </li>
                    <?php endif; ?>


                </ul>
            </div>


            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo e($settings->getCopyright()); ?>

                </div>
                <div class="version">
                    <b><?php echo e($lang->get(36)); ?>: </b> <?php echo e($settings->getVersion()); ?>

                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>


            <?php echo $__env->yieldContent('content2'); ?>


        </div>
    </section>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

<script>

    function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
        if (colorName === null || colorName === '') { colorName = 'bg-black'; }
        if (text === null || text === '') { text = 'alert'; }
        if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
        if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
        var allowDismiss = true;

        $.notify({
                message: text
            },
            {
                type: colorName,
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                animate: {
                    enter: animateEnter,
                    exit: animateExit
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
            });
    }

    function inputHandler(e, parent, min, max) {
        var value = parseInt(e.target.value);
        if (value.isEmpty)
            value = 0;
        if (isNaN(value))
            value = 0;
        if (value > max)
            value = max;
        if (value < min)
            value = min;
        parent.value = value;
    }

    var lastOrders = 0;


    function getChatNewMessages() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("getChatMessagesNewCount")); ?>',
            data: {
            },
            success: function (data){
                console.log(data);
                if (document.getElementById("countChatNewMessages") != null)
                    document.getElementById("countChatNewMessages").innerHTML = data.count;
                document.getElementById("countNewOrders").innerHTML = data.orders;
                if (data.orders != lastOrders){
                    lastOrders = data.orders;
                    const audio = new Audio("img/sound.mp3");
                    audio.play();
                }
                if (document.getElementById("messagesWindow") != null)
                    buildChatUsers();
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    setInterval(getChatNewMessages, 10000); // one time in 10 sec
    getChatNewMessages();

    function moveToPageWithSelectedItem(id) {
        var itemsTable = $('#data_table').DataTable();
        var indexes = itemsTable
            .rows()
            .indexes()
            .filter( function ( value, index ) {
                return id === itemsTable.row(value).data()[0];
            } );
        var numberOfRows = itemsTable.data().length;
        var rowsOnOnePage = itemsTable.page.len();
        if (rowsOnOnePage < numberOfRows) {
            var selectedNode = itemsTable.row(indexes).node();
            var nodePosition = itemsTable.rows({order: 'current'}).nodes().indexOf(selectedNode);
            var pageNumber = Math.floor(nodePosition / rowsOnOnePage);
            itemsTable.page(pageNumber).draw(false); //move to page with the element
            return pageNumber;
        }
        return 0;
    }

</script>


</body>


</html>
<?php /**PATH /home/u958292380/domains/abg-studio.com/public_html/restaurants/resources/views/bsb/app.blade.php ENDPATH**/ ?>