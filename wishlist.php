<?php
include("includes/header.php")
?>
<?php cart();
?>
<!-- wishlist start -->
<section class="wishlist-page section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="wishlist-area">
                    <div class="wishlist-details">

                        <div class="wishlist-item">
                            <span class="wishlist-head">My wishlist:</span>
                            <span class="wishlist-items"><?php echo total_items_wishlist(); ?> item</span>
                        </div>
                    </div>
                </div>

                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo "<script>alert('Must login!')</script>";
                    echo "<script>window.open('login.php','_self')</script>";
                } else {
                    $user_id = $_SESSION['user_id'];
                    $run_wishlist = mysqli_query($con, "select * from wishlist where user_id='$user_id'  ");
                    while ($fetch_wishlist = mysqli_fetch_array($run_wishlist)) {
                        $product_id = $fetch_wishlist['product_id'];
                        $wishlist_id = array($fetch_wishlist['wishlist_id']);

                        $result_product = mysqli_query($con, "select * from product where product_id = '$product_id' ");
                        while ($fetch_product = mysqli_fetch_array($result_product)) {
                            $pro_id = $fetch_product['product_id'];
                            $pro_title = $fetch_product['product_title'];
                            $pro_price = number_format($fetch_product['product_price'], 0, ",", ".");
                            $pro_image = $fetch_product['product_image'];
                            $uri = $_SERVER['REQUEST_URI'];
                ?>
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-all-pro">
                                        <div>
                                            <input type="checkbox" name="del" id="1">
                                        </div>
                                        <div class="wishlist-pro">

                                            <div class="wishlist-pro-image">
                                                <a href="product.php?pro_id=<?php echo $pro_id ?>"><img width="200" height="150" src="admin-area/product_images/<?php echo $pro_image?>" alt="image"></a>
                                            </div>
                                            <div class="pro-details">
                                                <h4><a href="product.php?pro_id=<?php echo $pro_id ?>"><?php echo $pro_title ?></a></h4>
                                                <br>
                                            </div>

                                        </div>
                                        <div class="qty-item" style="text-align: center;">
                                            <h5 class="new-price"><?php echo $pro_price ?> VND</h5>
                                        </div>
                                        <div>
                                            <a href="?add_cart=<?php echo $pro_id ?>&&uri=<?php echo $uri ?>" class="btn btn-style3 ">Add to cart</a>
                                        </div>
                                        <div>
                                            <input class="btn btn-style3" type="submit" name="del" value="Delete">
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                }
                ?>

                <div class="wishlist-area">
                    <div class="wishlist-details">
                        <div class="other-link">
                            <ul class="c-link">
                                <li class="wishlist-other-link"><a href="grid-list.php">Continue shopping</a></li>
                                <li class="wishlist-other-link"><a href="index.php">Clear wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- wishlist end -->
<?php
include("includes/footer.php");
?>