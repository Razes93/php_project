<div class="profile-form">
    <h4>Profile Information</h4>
    <hr>
    <form>
        <ul class="pro-input-label">
            <li>
                <label>Full name</label>
                <input style="width:100%;" type="text" name="name" value="<?php echo $data_user['user_name']; ?>" disabled placeholder="Full name">
            </li>

        </ul>
        <ul class="pro-input-label">
            <li>
                <label>E-mail address</label>
                <input type="text" name="email" value="<?php echo $data_user['email']; ?>" disabled placeholder="E-mail address">
            </li>
            <li>
                <label>Phone number</label>
                <input type="text" name="contact" value="<?php echo $data_user['phonenumber']; ?>" disabled placeholder="Phone number">
            </li>
        </ul>
        <ul class="pro-input-label">
            <li>
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $data_user['address']; ?>" disabled placeholder="Phone number">
            </li>
            <li>
                <label>Country</label>
                <input type="text" name="country" value="<?php echo $data_user['country']; ?>" disabled placeholder="Country">
            </li>
        </ul>
        <ul class="pro-submit">
            <li>
                <a class="btn btn-style1" href="profile.php?action=edit_profile">Edit profile</a>
            </li>
        </ul>
    </form>
</div>