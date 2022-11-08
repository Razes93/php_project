<?php

session_start();

include("function/function.php");

include("function/db.php");
?>
<!DOCTYPE html>
<html lang="en" class="box-layout">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title>TuanAnh - New Fashion Style</title>
    <meta name="description" content="A best clean, modern, stylish, creative, responsive theme for different eCommerce business or industries." />
    <meta name="keywords" content="organic food theme, vegetables, foof store, eCommerce html template, responsive, electronics store, furniture wood, fashion, furniture, mobile, watches, electronics, computers accessories, toys, jewellery, restaurant accessories" />
    <meta name="author" content="spacingtech_webify">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/favicon" href="image/favicon.ico">
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- simple-line icon -->
    <link rel="stylesheet" type="text/css" href="css/simple-line-icons.css">
    <!-- font-awesome icon -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
    <!-- ion icon -->
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    <!-- owl slider -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <!-- swiper -->
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <!-- animation -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body class="home-1">


    <!-- header start -->
    <header class="header-area">
        <div class="header-main-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header-main">
                            <!-- logo start -->
                            <div class="header-element logo">
                                <a href="index.php">
                                    <img src="image/LogoPHP2.png" alt="logo-image" class="img-fluid">
                                </a>
                            </div>
                            <!-- logo end -->
                            <!-- search start -->
                            <div class="header-element search-wrap">
                                <form method="get" action="search.php" enctype="multipart/form-data">
                                    <input type="text" name="search" placeholder="Search product.">
                                </form>
                            </div>
                            <!-- search end -->
                            <!-- header-icon start -->
                            <div class="header-element right-block-box">
                                <ul class="shop-element">
                                    <li class="side-wrap nav-toggler">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                                            <span class="line"></span>
                                        </button>
                                    </li>
                                    <?php
                                    if (!isset($_SESSION['user_id'])) {
                                        echo '
                                            <li class="side-wrap user-wrap">
                                                <div class="acc-desk">
                                                    <div class="user-icon">
                                                        <a href="" class="user-icon-desk">
                                                            <span><i class="icon-user"></i></span>
                                                        </a>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="acc-title">Account</span>
                                                        <div class="account-login">
                                                            <a href="register.php">Register</a>
                                                            <a href="login.php">Log in</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            ';
                                    } else {
                                        $user_id = $_SESSION['user_id'];
                                        $select_user = mysqli_query($con, "select * from user_info where user_id='$user_id'");
                                        $data_user = mysqli_fetch_array($select_user);
                                    ?>
                                        <li class="side-wrap user-wrap">
                                            <div class="acc-desk">
                                                <div class="user-icon">
                                                    <a href="" class="user-icon-desk">
                                                        <?php if ($data_user['image'] != '') { ?>

                                                            <span><img style="width:30px;height:30px;border-radius: 50%;" src="upload-files/<?php echo $data_user['image']; ?>"></span>

                                                        <?php } else { ?>


                                                            <span><i class="icon-user"></i></span>

                                                        <?php } ?>
                                                    </a>
                                                </div>
                                                <div class="user-info">
                                                    <span class="acc-title"><?php echo $data_user['user_name']; ?></span>
                                                    <div class="account-login">
                                                        <a href="profile.php">Profile</a>
                                                        <a href="logout.php">Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <li class="side-wrap wishlist-wrap">
                                        <a href="wishlist.php" class="header-wishlist">
                                            <span class="wishlist-icon"><i class="icon-heart"></i></span>
                                            <?php
                                            if (!isset($_SESSION['user_id'])) {

                                            ?>
                                                 <span class="wishlist-counter">0</span>
                                            <?php
                                            } else {
                                            ?>
                                                 <span class="wishlist-counter"><?php total_items_wishlist(); ?></span>
                                            <?php
                                            }
                                            ?>
                                           
                                        </a>
                                    </li>
                                    <li class="side-wrap cart-wrap">
                                        <div class="shopping-widget">
                                            <div class="shopping-cart">
                                                <a href="cart.php" class="cart-count">
                                                    <span class="cart-icon-wrap">
                                                        <span class="cart-icon"><i class="icon-handbag"></i></span>
                                                        <?php
                                                        if (!isset($_SESSION['user_id'])) {

                                                        ?>
                                                            <span id="cart-total" class="bigcounter">0</span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span id="cart-total" class="bigcounter"><?php total_items_cart(); ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </span>
                                                </a>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- header-icon end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="main-menu-area">
                                <div class="main-navigation navbar-expand-xl">
                                    <div class="box-header menu-close">
                                        <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                    </div>
                                    <!-- menu start -->
                                    <div class="navbar-collapse" id="navbarContent">
                                        <div class="megamenu-content">
                                            <div class="mainwrap">
                                                <ul class="main-menu">
                                                    <li class="menu-link parent">
                                                        <a href="index.php" class="link-title">
                                                            <span class="sp-link-title">Home</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-link parent">
                                                        <a href="grid-list.php" class="link-title">
                                                            <span class="sp-link-title">Products</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Categories</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Categories</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                            <?php getCats_Menu(); ?>
                                                            <li class="submenu-li">
                                                                <a href="grid-list.php" class="submenu-link">Xem thêm....</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="grid-list.php" class="link-title">
                                                            <span class="sp-link-title">Brands</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-banner-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Brands</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                            <?php getBrands_Menu(); ?>
                                                            <li class="submenu-li">
                                                                <a href="grid-list.php" class="submenu-link">Xem thêm....</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="javascript:void(0)" class="link-title">
                                                            <span class="sp-link-title">Pages</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <a href="#collapse-page-menu" data-bs-toggle="collapse" class="link-title link-title-lg">
                                                            <span class="sp-link-title">Pages</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-submenu sub-menu collapse" id="collapse-page-menu">
                                                            <li class="submenu-li">
                                                                <a href="about-us.php" class="submenu-link">About
                                                                    us</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="billing-info.php" class="submenu-link">Billing
                                                                    info</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="faq%27s.php" class="submenu-link">Faq's</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="contact.php" class="submenu-link">Contact
                                                                    us</a>
                                                            </li>
                                                            <li class="submenu-li">
                                                                <a href="terms-conditions.php" class="submenu-link">Terms & conditions</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="order-history.php" class="link-title">
                                                            <span class="sp-link-title">Order</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- menu end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->