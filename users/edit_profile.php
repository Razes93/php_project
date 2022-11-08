<div class="profile-form">
    <h4>Update Profile</h4>
    <hr>
    <form method="post" action="" enctype="multipart/form-data">
        <ul class="pro-input-label">
            <li>
                <label>Full name</label>
                <input style="width:100%;" type="text" name="name" value="<?php echo $data_user['user_name']; ?>" required placeholder="Full name">
            </li>

        </ul>
        <ul class="pro-input-label">
            <li>
                <label>E-mail address</label>
                <input type="text" name="email" value="<?php echo $data_user['email']; ?>" required placeholder="E-mail address" required>
            </li>
            <li>
                <label>Phone number</label>
                <input type="text" name="contact" value="<?php echo $data_user['phonenumber']; ?>" required placeholder="Phone number">
            </li>
        </ul>
        <ul class="pro-input-label">
            <li>
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $data_user['address']; ?>" required placeholder="Phone number">
            </li>
            <li>
                <label>Country</label>
                <?php include('users/edit_country_list.php'); ?>
            </li>
        </ul>
        <ul class="pro-submit">
            <li>
                <label style="margin-right: 10px;">Enter password to confirm:</label>
                <input type="password" name="password" required placeholder="Current Password">
            </li>
            <li>
                <input class="btn btn-style1" type="submit" name="edit_account" value="Update profile" />
                <!-- <a href="profile.php" ></a> -->
            </li>
        </ul>
    </form>
</div>
<?php
if (isset($_POST['edit_account'])) {
    $name = $_POST['name'];
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hash_password = md5($password);
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $country = $_POST['edit_country'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($contact) && !empty($address) && !empty($country)) {
        $check_exist = mysqli_query($con, "select * from user_info where email = '$email'");
        $email_count = mysqli_num_rows($check_exist);
        if ($email_count > 0) {
            if($data_user['email'] == $email){
                if ($data_user['password'] != $hash_password) {
                    echo "<script>alert('Your Current Password is Wrong!')</script>";
                } else {
                    $update_profile = mysqli_query($con, "update user_info set user_name='$name',email='$email', country='$country', phonenumber='$contact', address='$address' where id='$_SESSION[user_id]'");
        
                    if ($update_profile) {
                        echo "<script>alert('Your updated was successfully!')</script>";
        
                        echo "<script>window.open('profile.php','_self')</script>";
                    }
                }
            }else{
                echo "<script>alert('Sorry, your email address " . $email . " already exist in our database !')</script>";
            }
        }
    } else {
        echo "<script>alert('Please enter all information!')</script>";
    }
}

?>