<?php
include("includes/header.php")
?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    $("#register-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "Bạn chưa nhập email",
                email: "email chưa đúng định dạng"
            }
        }
    });
</script>
<!-- login start -->
<section class="section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="register-area">
                    <div class="register-box">
                        <h1>Create account</h1>
                        <?php
                        if (isset($_POST['register'])) {

                            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])) {
                                
                                $name = $_POST['name'];
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                                $hash_password = md5($password);
                                $confirm_password = trim($_POST['confirm_password']);

                                $image = $_FILES['image']['name'];
                                $image_tmp = $_FILES['image']['tmp_name'];
                                $country = $_POST['country'];
                                $contact = $_POST['contact'];
                                $address = $_POST['address'];

                                $check_exist = mysqli_query($con, "select * from user_info where email = '$email'");

                                $email_count = mysqli_num_rows($check_exist);
                                if ($email_count > 0) {
                                    echo "<script>alert('Sorry, your email address ".$email." already exist in our database !')</script>";
                                } elseif ($password == $confirm_password) {

                                    move_uploaded_file($image_tmp, "upload-files/$image");

                                    $run_insert = mysqli_query($con, "insert into user_info (user_name,email,password,phonenumber,address,image,country) values ('$name','$email','$hash_password','$contact','$address','$image','$country') ");

                                    if ($run_insert) {
                                        $sel_user = mysqli_query($con, "select * from user_info where email='$email' ");
                                        $row_user = mysqli_fetch_array($sel_user);

                                        $_SESSION['user_id'] = $row_user['user_id'] . "<br>";
                                        $_SESSION['role'] = $row_user['role'];

                                        $_SESSION['email'] = $email;

                                        echo "<script>alert('Account has been created successfully!')</script>";

                                        echo "<script>window.open('index.php','_self')</script>";
                                    }
                                }
                            }else{
                                echo "<script>alert('Please enter all information!')</script>";
                            }
                        }

                        ?>
                        <form id="register-form" method="post" action="" enctype="multipart/form-data" data-toggle="validator">
                            <input type="text" name="name" placeholder="Full Name">
                            <input type="text" id="email_check" name="email" required placeholder="Email">
                            <p id="status_email"></p>
                            <input type="password" id="password_confirm1" name="password" required placeholder="Password" />
                            <input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password" />
                            <p id="status_for_confirm_password"></p>
                            <a><strong>Avatar</strong></a>
                            <input type="file" name="image" />
                            <?php include('includes/countrylist.php'); ?>
                            <input type="text" name="contact" required placeholder="Contact">
                            <input type="text" name="address" required placeholder="Address">
                            <input class="btn-style1" type="submit" name="register" value="Create Account" />
                        </form>
                    </div>
                    <div class="register-account">
                        <h4>Already have account??</h4>
                        <a href="login.php" class="ceate-a">Log in</a>
                        <div class="register-info">
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