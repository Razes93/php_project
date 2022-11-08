<div class="profile-form">
    <h4>Change Password</h4>
    <hr>
    <form method="post" action="" enctype="multipart/form-data">
        <ul class="pro-input-label">
            <li>
                <label>Current Password</label>
                <input type="password" name="current_password" required placeholder="Current Password" /></td>
            </li>
        </ul>
        <ul class="pro-input-label">
            <li>
                <label>New Password</label>
                <td colspan="3"><input type="password" id="password_confirm1" name="new_password" required placeholder="New Password" /></td>
            </li>
        </ul>
        <ul class="pro-input-label">
            <li>
                <label>Re-Type New Password</label>
                <input type="password" id="password_confirm2" name="confirm_new_password" required placeholder="Re-Type New Password" />
                <p id="status_for_confirm_password"></p>
            </li>
        </ul>
        <ul class="pro-submit">
            <li>
                <input class="btn btn-style1" type="submit" name="change_password" value="Update Password" />
                <!-- <a href="profile.php" ></a> -->
            </li>
        </ul>
    </form>
</div>
<?php
if (isset($_POST['change_password'])) {

    $current_password = trim($_POST['current_password']);
    $hash_current_password = md5($current_password);

    $new_password = trim($_POST['new_password']);
    $hash_new_password = md5($new_password);
    $confirm_new_password = trim($_POST['confirm_new_password']);

    $select_password = mysqli_query($con, "select * from user_info where password='$hash_current_password' and user_id='$_SESSION[user_id]' ");

    //Check if current password not empty
    if (mysqli_num_rows($select_password) == 0) {

        echo "<script>alert('Your Current Password is Wrong!')</script>";
    } elseif ($new_password != $confirm_new_password) {

        echo "<script>alert('Password do not match!')</script>";
    } else {
        $update = mysqli_query($con, "update user_info set password='$hash_new_password' where user_id='$_SESSION[user_id]' ");

        if ($update) {
            echo "<script>alert('Your Password was updated successfully!')</script>";

            echo "<script>window.open(window.location.href,'_self')</script>";
        } else {

            echo "<script>alert('Database query failed: mysqli_error($con) !')</script>";
        }
    }
}

?>