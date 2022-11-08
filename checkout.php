<?php
include("includes/header.php")
?>

<!-- checkout page start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="checkout-area">
                    <div class="billing-area">
                        <form>
                            <h2>Billing details</h2>
                            <div class="billing-form">
                                <ul class="billing-ul input-2">
                                    <li class="billing-li">
                                        <label>First name</label>
                                        <input type="text" name="f-name" placeholder="First name">
                                    </li>
                                    <li class="billing-li">
                                        <label>Last name</label>
                                        <input type="text" name="l-name" placeholder="Last name">
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>Company name (Optional)</label>
                                        <input type="text" name="company details" placeholder="Company name">
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>Country</label>
                                        <select>
                                            <option>Select a country</option>
                                            <option>United country</option>
                                            <option>Russia</option>
                                            <option>italy</option>
                                            <option>France</option>
                                            <option>Ukraine</option>
                                            <option>Germany</option>
                                            <option>Australia</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>Street address</label>
                                        <input type="text" name="address" placeholder="Street address">
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>Apartment,suite,unit etc. (Optional)</label>
                                        <input type="text" name="--" placeholder="">
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>Town / City</label>
                                        <input type="text" name="city" placeholder="">
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>State / Country</label>
                                        <input type="text" name="--" placeholder="">
                                    </li>
                                </ul>
                                <ul class="billing-ul">
                                    <li class="billing-li">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" name="--" placeholder="">
                                    </li>
                                </ul>
                                <ul class="billing-ul input-2">
                                    <li class="billing-li">
                                        <label>Email address</label>
                                        <input type="text" name="mail" placeholder="Email address">
                                    </li>
                                    <li class="billing-li">
                                        <label>Phone</label>
                                        <input type="text" name="phone" placeholder="Phone">
                                    </li>
                                </ul>
                            </div>
                        </form>
                        <div class="billing-details">
                            <form>
                                <h2>Shipping details</h2>
                                <ul class="shipping-form">
                                    <li class="check-box">
                                        <input type="checkbox" name="--">
                                        <label>Ship to a different address?</label>
                                    </li>
                                    <li class="comment-area">
                                        <label>Order notes(Optional)</label>
                                        <textarea name="comments" rows="4" cols="80"></textarea>
                                    </li>
                                </ul>

                            </form>
                        </div>
                    </div>
                    <div class="order-area">
                        <div class="check-pro">
                            <h2>In your cart (2)</h2>
                            <ul class="check-ul">
                                <li>
                                    <div class="check-pro-img">
                                        <a href="product.php"><img src="image/pro-page-image/check-image-1.jpg" class="img-fluid" alt="image"></a>
                                    </div>
                                    <div class="check-content">
                                        <a href="product.php">Fresh healthy food</a>
                                        <span class="check-code-blod">Product code: <span>CA70051541B</span></span>
                                        <span class="check-price">$93.00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-pro-img">
                                        <a href="product.php"><img src="image/pro-page-image/check-image-2.jpg" class="img-fluid" alt="image"></a>
                                    </div>
                                    <div class="check-content">
                                        <a href="product.php">Fresh healthy food</a>
                                        <span class="check-code-blod">Product code: <span>CA70051541B</span></span>
                                        <span class="check-price">$230.00</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h2>Your order</h2>
                        <ul class="order-history">
                            <li class="order-details">
                                <span>Product:</span>
                                <span>Total</span>
                            </li>
                            <li class="order-details">
                                <span>Orange juice:</span>
                                <span>$93.00</span>
                            </li>
                            <li class="order-details">
                                <span>Shrimp jumbo:</span>
                                <span>$230.00</span>
                            </li>
                            <li class="order-details">
                                <span>Subtotal:</span>
                                <span>$323.00</span>
                            </li>
                            <li class="order-details">
                                <span>Shipping Charge:</span>
                                <span>Free shipping</span>
                            </li>
                            <li class="order-details">
                                <span>Total:</span>
                                <span>$323.00</span>
                            </li>
                        </ul>
                        <form>
                            <ul class="order-form">
                                <li>
                                    <input type="checkbox" name="--">
                                    <label>Direct bank transfer</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="--">
                                    <label>Cheque payment</label>
                                </li>
                                <li>
                                    <input type="checkbox" name="--">
                                    <label>Paypal</label>
                                </li>
                                <li class="pay-icon">
                                    <a href="javascript:void(0)"><i class="fa fa-credit-card"></i></a>
                                    <a href="javascript:void(0)"><i class="fa fa-cc-visa"></i></a>
                                    <a href="javascript:void(0)"><i class="fa fa-cc-paypal"></i></a>
                                    <a href="javascript:void(0)"><i class="fa fa-cc-mastercard"></i></a>
                                </li>
                            </ul>
                        </form>
                        <div class="checkout-btn">
                            <a href="javascript:void(0)" class="btn-style1">Place order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout page end -->
<!-- footer start -->
<?php
include("includes/footer.php");
?>