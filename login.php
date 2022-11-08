<?php
include("includes/header.php")
?>


<!-- login start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-area">
                    <div class="login-box">
                        <h1>Login</h1>

                        <?php
                        if (isset($_POST['login'])) {

                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);
                            $password = md5($password);
                            if (!empty($email) && isset($email) && !empty($password) && isset($password)) {
                                $run_login = mysqli_query($con, "select * from user_info where password = BINARY '$password' AND email= BINARY '$email' ") or die("error: " . mysqli_error($con));

                                $check_login = mysqli_num_rows($run_login);

                                $row_login = mysqli_fetch_array($run_login);
                                if ($check_login > 0) {
                                    $_SESSION['user_id'] = $row_login['user_id'];
                                    // $_SESSION['role'] = $row_login['role'];
                                    echo "<script>alert('You have successfully Logged In!')</script>";
                                    echo "<script>window.location.replace('index.php')</script>";
                                    // if ($row_login['role'] == 'admin') {
                                    //     echo "<script>alert('You have successfully Logged In Admin Page!')</script>";
                                    //     echo "<script>window.location.replace('index.php')</script>";
                                    // } elseif ($row_login['role'] == 'guest') {
                                    //     echo "<script>alert('You have successfully Logged In!')</script>";
                                    //     echo "<script>window.location.replace('index.php')</script>";
                                    // }
                                } else {
                                    echo '
                                    <p>Email or password is incorrect!</p>
                                    <p>Please try again!</p>
                                ';
                                }
                            }
                        }


                        ?>

                        <form method="post" action="">

                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email" required>

                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                            <input class="btn-style1" type="submit" name="login" value="Sign in">
                            <a href="forgot-password.php" class="re-password">Forgot your password?</a>
                        </form>
                    </div>
                    <div class="login-account">
                        <h4>Don't have an account?</h4>
                        <a href="register.php" class="ceate-a">Create account</a>
                        <div class="login-info">
                            <a href="terms-conditions.php" class="terms-link"><span>*</span> Terms &
                                conditions.</a>
                            <p>Your privacy and security are important to us. For more information on how we use
                                your data read our <a href="privacy-policy.php">privacy policy</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login end -->

<?php
include("includes/footer.php");
?>