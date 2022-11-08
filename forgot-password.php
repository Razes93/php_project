<?php
include("includes/header.php")
?>

<!-- forgot password start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="forgat-password-area">
                        <h4 class="forgot-title">Forgot password?</h4>
                        <br>
                        <p align="center">Enter your registered email in the box below to update your password</p>
                        <div class="forgot-p">
                            <form method="post" action="">
                                <input type="text" name="email_forgot" required placeholder="Enter your email">
                                <p></p>
                                <br>
                                <input class="btn-style1" type="submit" name="forgot" required value="Get new password">
                            </form>
                        </div>
                    </div>
                <?php
                if (isset($_POST['forgot'])) {
                    $email_for = trim($_POST['email_forgot']);
                    $run_email = mysqli_query($con, "select * from user_info where email= BINARY '$email_for' ") or die("error: " . mysqli_error($con));
                    $check_email_for = mysqli_num_rows($run_email);
                    $info_user_forgot=mysqli_fetch_array($run_email);
                    if ($check_email_for > 0) {
                        $_SESSION['email_for'] = $info_user_forgot['email'];
                        echo "<script>window.open('resetpass.php','_self')</script>";
                        
                    }else{
                        echo "<script>alert('Login email does not exist! Please check again!')</script>";
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