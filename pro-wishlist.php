<?php
include("includes/header.php")
?>

    <!-- order history start -->
    <section class="order-histry-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-history">
                        <div class="profile">
                            <div class="order-pro">
                                <div class="pro-img">
                                    <a href="javascript:void(0)"><img src="image/user-ava.jpg" alt="img"
                                            class="img-fluid"></a>
                                </div>
                                <div class="order-name">
                                    <h4>Andrew louise</h4>
                                    <span>Joined April 06, 2021</span>
                                </div>
                            </div>
                            <div class="order-his-page">
                                <ul class="profile-ul">
                                    <li class="profile-li"><a href="order-history.php"><span>Orders</span> <span
                                                class="pro-count">5</span></a></li>
                                    <li class="profile-li"><a href="profile.php">Profile</a></li>
                                    <li class="profile-li"><a href="pro-wishlist.php"
                                            class="active"><span>Wishlist</span> <span class="pro-count">3</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-wishlist">
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-item">
                                        <span class="wishlist-head">My wishlist:</span>
                                        <span class="wishlist-items">3 item</span>
                                    </div>
                                    <div class="wishlist-all-pro">
                                        <div class="wishlist-pro">
                                            <div class="wishlist-pro-image">
                                                <a href="product.php"><img src="image/cart-page/cart-1/image1.jpg"
                                                        class="img-fluid" alt="image"></a>
                                            </div>
                                            <div class="pro-details">
                                                <h4><a href="product.php">Vegetable tomato fresh</a></h4>
                                                <span class="all-size">Size: <span class="pro-size">5kg</span></span>
                                                <span class="wishlist-text">Petro-demo</span>
                                            </div>
                                        </div>
                                        <div class="qty-item">
                                            <a href="cart.php" class="add-wishlist">Add to cart</a>
                                            <a href="checkout.php" class="add-wishlist">Buy now</a>
                                        </div>
                                        <div class="all-pro-price">
                                            <span class="new-price">$384.51 USD</span>
                                            <span class="old-price"><del>$405.00 USD</del></span>
                                            <span><i class="ion-android-close"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-all-pro">
                                        <div class="wishlist-pro">
                                            <div class="wishlist-pro-image">
                                                <a href="product.php"><img src="image/cart-page/cart-1/image3.jpg"
                                                        class="img-fluid" alt="image"></a>
                                            </div>
                                            <div class="pro-details">
                                                <h4><a href="product.php">Fresh healthy food</a></h4>
                                                <span class="all-size">Size: <span class="pro-size">6kg</span></span>
                                                <span class="wishlist-text">Multiwebinfo</span>
                                            </div>
                                        </div>
                                        <div class="qty-item">
                                            <a href="cart.php" class="add-wishlist">Add to cart</a>
                                            <a href="checkout.php" class="add-wishlist">Buy now</a>
                                        </div>
                                        <div class="all-pro-price">
                                            <span class="new-price">$460.00 USD</span>
                                            <span class="old-price"><del>$400.00 USD</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-all-pro">
                                        <div class="wishlist-pro">
                                            <div class="wishlist-pro-image">
                                                <a href="product.php"><img src="image/cart-page/cart-1/image2.jpg"
                                                        class="img-fluid" alt="image"></a>
                                            </div>
                                            <div class="pro-details">
                                                <h4><a href="product.php">Fresh green orange</a></h4>
                                                <span class="all-size">Size: <span class="pro-size">3kg</span></span>
                                                <span class="wishlist-text">Vegina-store</span>
                                            </div>
                                        </div>
                                        <div class="qty-item">
                                            <a href="cart.php" class="add-wishlist">Add to cart</a>
                                            <a href="checkout.php" class="add-wishlist">Buy now</a>
                                        </div>
                                        <div class="all-pro-price">
                                            <span class="new-price">$109.20 USD</span>
                                            <span class="old-price"><del>$99.99 USD</del></span>
                                        </div>
                                    </div>
                                    <div class="other-link">
                                        <ul class="c-link">
                                            <li class="wishlist-other-link"><a href="grid-list.php">Continue
                                                    shopping</a></li>
                                            <li class="wishlist-other-link"><a href="index.php">Clear wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order history end -->
    <?php
include("includes/footer.php");
?>