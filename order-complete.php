<?php
include("includes/header.php")
?>
    <!-- header end -->    
    <!-- Order complete start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-area">
                        <div class="order-price">
                            <ul class="total-order">
                                <li>
                                    <span class="order-no">Order no. 1724</span>
                                    <span class="order-date">23th jan 2021 3:04 pm</span>
                                </li>
                                <li>
                                    <span class="total-price">Order total</span>
                                    <span class="amount">$1199.00</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-details">
                            <span class="text-success order-i"><i class="fa fa-check-circle"></i></span>
                            <h4>Thank you for order</h4>
                            <span class="order-s">Your order will ship within few hours</span>
                            <a href="tracking.php" class="tracking-link btn btn-style1">Tracking details</a>
                        </div>
                        <div class="order-delivery">
                            <ul class="delivery-payment">
                                <li class="delivery">
                                    <h5>Delivery address</h5>
                                    <p>Lorem ipsum</p>
                                    <span class="order-span">7003 fairway street</span>
                                    <span class="order-span">New york</span>
                                    <span class="order-span">NY 10033</span>
                                    <span class="order-span">USA</span>
                                    <span class="order-span">Mobile No :+11-123456789</span>
                                </li>
                                <li class="pay">
                                    <h5>Payment summary</h5>
                                    <p class="transition">Transaction No : 66282856617</p>
                                    <span class="order-span p-label">
                                        <span class="n-price">Price</span>
                                        <span class="o-price">$876.00</span>
                                    </span>
                                    <span class="order-span p-label">
                                        <span class="n-price">Shipping charge</span>
                                        <span class="o-price">$100.00</span>
                                    </span>
                                    <span class="order-span p-label">
                                        <span class="n-price">Order Total</span>
                                        <span class="o-price">$100.00</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order complete end -->
    <!-- footer start -->
    <?php
include("includes/footer.php");
?>