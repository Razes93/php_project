<div class="profile-form">
    <h4>Update Avatar</h4>
    <hr>
    <form method="post" action="" enctype="multipart/form-data">
        <ul class="pro-input-label">
            <li>
                <input type="file" name="image" />
            </li>

        </ul>
        <ul class="pro-input-label">
            <li><label><strong><?php if (isset($message)) {
                                    echo $message;
                                } ?> </strong></label></li>
        </ul>
        <ul class="pro-submit">
            <li>
                <label style="margin-right: 10px;">Enter password to confirm:</label>
                <input type="password" name="password" required placeholder="Current Password">
            </li>
            <li>
                <input class="btn btn-style1" type="submit" name="edit_image" value="Update Avatar" />
                <!-- <a href="profile.php" ></a> -->
            </li>
        </ul>
    </form>
</div>
<?php
if (isset($_POST['edit_image'])) {
    $password = trim($_POST['password']);
    $hash_password = md5($password);

    // Check if file not empty 
    if (!empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $target_file = "upload-files/" . $image;
        $uploadOk = 1;
        $message = '';

        // Check if file already exists
        if (file_exists($target_file)) {
            $message .= " Sorry, file already exists. ";
            $update_image = mysqli_query($con, "update user_info set image='$image' where user_id='$_SESSION[user_id]'");

            echo "<script>alert('Change avatar successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        } elseif ($data_user['password'] != $hash_password) {
            echo "<script>alert('Your Current Password is Wrong!')</script>";
            $uploadOk = 0;
        } else {
            if ($uploadOk == 0) { // Check if uploadOk is set to 0 by an error

                $message .= "Sorry, your file was not uploaded . ";
            } else {
                if (move_uploaded_file($image_tmp, $target_file)) {

                    $update_image = mysqli_query($con, "update user_info set image='$image' where user_id='$_SESSION[user_id]'");

                    echo "<script>alert('The file" . basename($image) . " has been uploaded.')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";

                    // $message .= "The file" . basename($image) . " has been uploaded. ";
                } else {
                    $message .= "Sorry, there was an error uploading your file. ";
                }
            }
        }
    }
}
?>