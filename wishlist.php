<?php
include("includes/header.php")
?>
<?php cart();
?>
<!-- wishlist start -->
<section class="wishlist-page section-tb-padding">
    <div class="container">
        <form action="" method="post">
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
                        echo "<script>window.open('login.php','_self')</script>";
                    } else {
                        $user_id = $_SESSION['user_id'];
                        $run_wishlist = mysqli_query($con, "select * from wishlist where user_id='$user_id'  ");
                        $count_items = mysqli_num_rows($run_wishlist);
                        if ($count_items == 0) {
                            echo "<h4 align='center'>Your wishlist is currently empty!</h4>";
                            echo "<h5 align='center'> Click <a href='grid-list.php' style='color: blue;''>here</a> to shopping</h5>";
                        } else {
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
                                                    <input type="checkbox" id="check" name="del[]" value="<?php echo $pro_id; ?>">
                                                </div>
                                                <div class="wishlist-pro">

                                                    <div class="wishlist-pro-image">
                                                        <a href="product.php?pro_id=<?php echo $pro_id ?>"><img width="200" height="150" src="admin-area/product_images/<?php echo $pro_image ?>" alt="image"></a>
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
                                                    <a class="btn btn-style3" onclick="return confirm('Bạn có chắc là muốn xóa ?')" href="?del_wishlist=<?php echo $pro_id; ?>"> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php }
                            }
                        }
                    }
                    ?>

                    <div class="wishlist-area">
                        <div class="wishlist-details">
                            <div class="other-link">
                                <ul class="c-link">
                                    <li><a class="btn btn-style3" href="grid-list.php">Continue shopping</a></li>
                                    <li><input class="btn btn-style3" id="del_button" onclick="return confirm('Bạn có chắc là muốn xóa ?')" type="submit" name="del_all_wishlist" value="Clear Wishlist" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_GET['del_wishlist'])) {
            $id_pro = $_GET['del_wishlist'];
            $check_del_cart = mysqli_query($con, "delete from wishlist where product_id = '$id_pro' AND user_id='$user_id'");
            if ($check_del_cart) {
                echo "<script>alert('Delete successful!')</script>";
                echo "<script>window.open('wishlist.php','_self')</script>";
            } else {
                echo "<script>alert('Delete failed!')</script>";
            }
        }
        if (isset($_POST['del_all_wishlist'])) {
            if (isset($_POST['del'])) {
                foreach ($_POST['del'] as $del_id) {
                    $run_delete = mysqli_query($con, "delete from wishlist where product_id = '$del_id' AND user_id='$user_id' ");
                    if ($run_delete) {
                        echo "<script>alert('Delete successful!')</script>";
                        echo "<script>window.open('wishlist.php','_self')</script>";
                    }
                }
            } else {
                $run_delete = mysqli_query($con, "delete from wishlist where user_id='$user_id' ");
                if ($run_delete) {
                    echo "<script>alert('Delete successful!')</script>";
                    echo "<script>window.open('wishlist.php','_self')</script>";
                }
            }
        }
        ?>
    </div>
</section>
<!-- wishlist end -->
<script>
    document.getElementById('check').onclick = function(e) {
        if (this.checked) {
            document.getElementById('del_button').value = "Delete Selected Wishlists";
        } else {
            document.getElementById('del_button').value = "Clear Wishlists";
        }
    };
</script>
<?php
include("includes/footer.php");
?>