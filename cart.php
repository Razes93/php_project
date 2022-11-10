<?php
include("includes/header.php")
?>
<!-- header end -->

<!-- cart start -->
<section class="cart-page section-tb-padding">
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="cart-area">
                    <div class="cart-details">
                        <div class="cart-item">
                            <span class="cart-head">My cart:</span>
                            <span class="c-items"><?php echo total_items_cart(); ?> item</span>
                        </div>
                    </div>
                    <div class="other-link">
                        <ul class="c-link">
                            <li style="float: right;margin-top:10px;"><input class="btn btn-style3" id="del_button" onclick="return confirm('Bạn có chắc là muốn xóa ?')" type="submit" name="del_all_cart" value="Clear Cart" /></li>
                        </ul>
                    </div>
                </div>

                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo "<script>window.open('login.php','_self')</script>";
                } else {
                    $user_id = $_SESSION['user_id'];
                    $run_cart = mysqli_query($con, "select * from cart where user_id='$user_id' ");
                    $count_items = mysqli_num_rows($run_cart);
                    if ($count_items == 0) {
                        echo "<h4 align='center'>Your cart is currently empty!</h4>";
                        echo "<h5 align='center'> Click <a href='grid-list.php' style='color: blue;''>here</a> to shopping</h5>";
                    } else {
                        while ($fetch_cart = mysqli_fetch_array($run_cart)) {
                            $product_id = $fetch_cart['product_id'];
                            $cart_id = array($fetch_cart['cart_id']);

                            $result_product = mysqli_query($con, "select * from product where product_id = '$product_id'");
                            while ($fetch_product = mysqli_fetch_array($result_product)) {
                                $pro_id = $fetch_product['product_id'];
                                $array_id = array($fetch_product['product_id']);
                                $pro_title = $fetch_product['product_title'];
                                $pro_sing_price = $fetch_product['product_price'];
                                $pro_price = number_format($fetch_product['product_price'], 0, ",", ".");
                                $pro_image = $fetch_product['product_image'];

                                $run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id' AND user_id='$user_id'");

                                $row_qty = mysqli_fetch_array($run_qty);

                                $qty = $row_qty['qty'];

                                $total_price = number_format($pro_sing_price * $qty, 0, ",", ".");

                                $uri = $_SERVER['REQUEST_URI'];
                ?>
                                <div class="cart-area">
                                    <div class="cart-details">
                                        <div class="cart-all-pro">
                                            <div>
                                                <input type="checkbox" id="check" name="del[]" value="<?php echo $pro_id; ?>">
                                            </div>
                                            <div class="cart-pro">
                                                <div class="cart-pro-image">
                                                    <a href="product.php?pro_id=<?php echo $pro_id; ?>"><img width="200" height="150" src="admin-area/product_images/<?php echo $pro_image ?>" alt="image"></a>
                                                </div>
                                                <div class="pro-details">
                                                    <h4><a href="product.php?pro_id=<?php echo $pro_id; ?>"><?php echo $pro_title; ?></a></h4>
                                                    <span class="pro-size"><span style="color:red ;">Price:</span> <?php echo $pro_price; ?> VND</span>
                                                </div>
                                            </div>
                                            <div class="qty-item">
                                                <div class="center">
                                                    <input type="hidden" class="proID" value="<?php echo $pro_id; ?>">
                                                    <div class="plus-minus">
                                                        <span>
                                                            <a href="javascript:void(0)" class="minus-btn text-black updateQTY">-</a>
                                                            <input class="qtyPro" type="text" name="qty" value="<?php echo $qty; ?>">
                                                            <a href="javascript:void(0)" class="plus-btn text-black updateQTY">+</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="all-pro-price">
                                                <h4><?php echo $total_price; ?> VND</h4>
                                            </div>
                                            <div>
                                                <a class="btn btn-style3" onclick="return confirm('Bạn có chắc là muốn xóa ?')" href="?del_cart=<?php echo $pro_id; ?>"> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <?php }
                        }
                    }
                }
                ?>
                <div class="cart-area">
                    <div class="cart-details">
                        <div class="other-link">
                            <ul class="c-link">
                                <li><a class="btn btn-style3" href="grid-list.php">Continue Shopping</a></li>
                                <li class="cart-other-link"><input class="btn btn-style3" type="submit" name="checkout" value="Checkout" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_GET['del_cart'])) {
            $id_pro = $_GET['del_cart'];
            $check_del_cart = mysqli_query($con, "select * from cart where product_id = '$id_pro' AND user_id='$user_id'");
            if ($check_del_cart) {
                $del_cart = mysqli_query($con, "delete from cart where product_id = '$id_pro' AND user_id='$user_id'");
                echo "<script>alert('Delete successful!')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
            } else {
                echo "<script>alert('Delete failed!')</script>";
            }
        }
        if (isset($_POST['del_all_cart'])) {
            if (isset($_POST['del'])) {
                foreach ($_POST['del'] as $del_id) {
                    $run_delete = mysqli_query($con, "delete from cart where product_id = '$del_id' AND user_id='$user_id' ");
                    if ($run_delete) {
                        echo "<script>alert('Delete successful!')</script>";
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            } else {
                $run_delete = mysqli_query($con, "delete from cart where user_id='$user_id' ");
                if ($run_delete) {
                    echo "<script>alert('Delete successful!')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
        if(isset($_POST['checkout'])){
            unset($_SESSION['array_id']);
            if (isset($_POST['del'])) {
                foreach ($_POST['del'] as $array_pro_id) {
                    $_SESSION['array_id'][] = $array_pro_id;
                }
            }
            echo "<script>window.open('checkout.php','_self')</script>";
        }

        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            switch ($action) {
                case "update":
                    $prod_id = $_POST['prod_id'];
                    $qty = $_POST['qty'];
                    $user_id = $_SESSION['user_id'];
                    $check_cart = mysqli_query($con, "select * from cart where product_id = '$prod_id' AND user_id='$user_id'");
                    if ($check_cart) {
                        $update_cart = mysqli_query($con, "update cart set qty='$qty' where product_id = '$prod_id' AND user_id='$user_id'");
                    } else {
                        echo 200;
                    }
                    break;

                default:
                    echo 500;
            }
        }

        ?>

    </div>
</section>
<!-- cart end -->
<!-- footer start -->
<script>
    document.getElementById('check').onclick = function(e) {
        if (this.checked) {
            document.getElementById('del_button').value = "Delete Selected Carts";
        }else{
            document.getElementById('del_button').value = "Clear Carts";
        }
    };
</script>
<?php
include("includes/footer.php");
?>