<?php
include("includes/header.php")
?>


<!--home page slider start-->
<section class="slider">
    <div class="home-slider owl-carousel owl-theme">
        <div class="items">
            <div class="img-back" style="background-image:url(image/banner1.png);">
                <div class="h-s-content slide-c-l">
                    <span>Selected Items</span>
                    <h1>Make your like with <br>new fashion style</h1>
                    <a href="grid-list.php" class="btn btn-style1">Shop now</a>
                </div>
            </div>
        </div>
        <div class="items">
            <div class="img-back" style="background-image:url(image/banner3.png);background-size: contain;">
                <div class="h-s-content slide-c-r">
                    <!-- <span>Organic indian masala</span>
                        <h1>Prod of indian<br>100% pacaging</h1> -->
                    <a style="margin-top: 220px;margin-right: 30px;" href="grid-list.php" class="btn btn-style1">Shop now</a>
                </div>
            </div>
            <!-- </div>
            <div class="items">
                <div class="img-back" style="background-image:url(image/slider3.jpg);">
                    <div class="h-s-content slide-c-c">
                        <span>Top selling!</span>
                        <h1>Fresh for your health</h1>
                        <a href="grid-list.php" class="btn btn-style1">Shop now</a>
                    </div>
                </div>
            </div> -->
        </div>
</section>
<!--home page slider start-->

<!-- Trending Products Start -->
<section class="h-t-products1 section-t-padding section-b-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>New products</h2>
                </div>
                
                <div class="trending-products owl-carousel owl-theme">
                    <?php cart(); wishlist();?>
                    <?php
                    if (!isset($_GET['cat'])) {
                        if (!isset($_GET['brand'])) {

                            global $con;

                            $get_pro = " select * from product order by date_created desc LIMIT 8";

                            $run_pro = mysqli_query($con, $get_pro);

                            while ($row_pro = mysqli_fetch_array($run_pro)) {
                                $pro_id = $row_pro['product_id'];
                                $pro_cat = $row_pro['cat_id'];
                                $pro_brand = $row_pro['brand_id'];
                                $pro_title = $row_pro['product_title'];
                                $pro_price = number_format($row_pro['product_price'], 0, ",", ".");
                                $pro_image = $row_pro['product_image'];
                                $uri = $_SERVER['REQUEST_URI'];

                                echo "
                                    <div class='items'>
                                    <div class='tred-pro'>
                                        <div class='tr-pro-img'>
                                            <a href='product.php?pro_id=$pro_id'>
                                                <img height='330' src='admin-area/product_images/$pro_image' alt='pro-img1'>
                                            </a>
                                        </div>
                                        <div class='pro-icn'>
                                            <a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
                                            <a href='?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
                                        </div>
                                    </div>
                                    <div class='caption'>
                                        <h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
                                        <div class='pro-price'>
                                            <span class='new-price'>$pro_price VND</span>
                                        </div>
                                    </div>
                                </div>
                              ";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trending Products end -->

<!-- Our Products Tab start -->
<section class="our-products-tab section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>Our products</h2>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home">CLOTHES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile">ACCESSORIES</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content pro-tab-slider">
                    <div class="tab-pane fade show active" id="home">
                        <div class="home-pro-tab swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                if (!isset($_GET['cat'])) {
                                    if (!isset($_GET['brand'])) {

                                        global $con;

                                        $get_pro = " select * from product where cat_id=1 or cat_id=2 or cat_id=4 LIMIT 10 ";

                                        $run_pro = mysqli_query($con, $get_pro);

                                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                                            $pro_id = $row_pro['product_id'];
                                            $pro_cat = $row_pro['cat_id'];
                                            $pro_brand = $row_pro['brand_id'];
                                            $pro_title = $row_pro['product_title'];
                                            $pro_price = number_format($row_pro['product_price'], 0, ",", ".");
                                            $pro_image = $row_pro['product_image'];
                                            $uri = $_SERVER['REQUEST_URI'];

                                            echo "
                                                <div class='swiper-slide'>
                                                    <div class='h-t-pro'>
                                                        <div class='tred-pro'>
                                                            <div class='tr-pro-img'>
                                                                <a href='product.php?pro_id=$pro_id'>
                                                                    <img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='pro-img1'>
                                                                </a>
                                                            </div>
                                                            <div class='pro-icn'>
                                                                <a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
                                                                <a href='?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
                                                            </div>
                                                        </div>
                                                        <div class='caption'>
                                                            <h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
                                                            <div class='pro-price'>
                                                                <span class='new-price'>$pro_price VND</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                          ";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="content-buttons">
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="home-pro-tab swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                if (!isset($_GET['cat'])) {
                                    if (!isset($_GET['brand'])) {

                                        global $con;

                                        $get_pro = " select * from product where cat_id=3 LIMIT 8 ";

                                        $run_pro = mysqli_query($con, $get_pro);

                                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                                            $pro_id = $row_pro['product_id'];
                                            $pro_cat = $row_pro['cat_id'];
                                            $pro_brand = $row_pro['brand_id'];
                                            $pro_title = $row_pro['product_title'];
                                            $pro_price = number_format($row_pro['product_price'], 0, ",", ".");
                                            $pro_image = $row_pro['product_image'];
                                            $uri = $_SERVER['REQUEST_URI'];

                                            echo "
                                                <div class='swiper-slide'>
                                                    <div class='h-t-pro'>
                                                        <div class='tred-pro'>
                                                            <div class='tr-pro-img'>
                                                                <a href='product.php?pro_id=$pro_id'>
                                                                    <img width='100%' height='330' src='admin-area/product_images/$pro_image' alt='pro-img1'>
                                                                </a>
                                                            </div>
                                                            <div class='pro-icn'>
                                                                <a href='?add_wishlist=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-heart'></i></a>
                                                                <a href='?add_cart=$pro_id&&uri=$uri' class='w-c-q-icn'><i class='fa fa-shopping-bag'></i></a>
                                                            </div>
                                                        </div>
                                                        <div class='caption'>
                                                            <h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
                                                            <div class='pro-price'>
                                                                <span class='new-price'>$pro_price VND</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                          ";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="swiper-buttons">
                            <div class="content-buttons">
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Products Tab end -->




<?php
include("includes/footer.php");
?>