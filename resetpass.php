<?php
include("includes/header.php")
?>

<!-- forgot password start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="forgat-password-area">
                    <h4 class="forgot-title">New Password</h4>

                    <div class="forgot-p">
                        <form method="post" action="">
                            <input type="password" id="password_confirm1" name="password" required placeholder="New Password" />
                            <p></p>
                            <br>
                            <input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm New Password" />
                            <p align="center" id="status_for_confirm_password"></p>
                            <br>
                            <input class="btn-style1" type="submit" name="update_pass" required value="Update new password">
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_POST['update_pass'])) {
                    $new_password = trim($_POST['password']);
                    $hash_new_password = md5($new_password);
                    $confirm_new_password = trim($_POST['confirm_password']);
                
                    $select_password = mysqli_query($con, "select * from user_info where email='$_SESSION[email_for]' ");
                
                    //Check if current password not empty
                    if ($new_password != $confirm_new_password) {
                
                        echo "<script>alert('Password do not match!')</script>";
                    } else {
                        $update = mysqli_query($con, "update user_info set password='$hash_new_password'where email='$_SESSION[email_for]' ");
                
                        if ($update) {
                            echo "<script>alert('Your Password was updated successfully!')</script>";
                
                            echo "<script>window.open('login.php','_self')</script>";
                        } else {
                
                            echo "<script>alert('Your Password was updated failed!')</script>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- forgot password end -->
<!-- footer start -->
<?php
include("includes/footer.php");
?>
