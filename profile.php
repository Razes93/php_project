<?php
include("includes/header.php")
?>
<!-- width:30px;height:30px -->
<!-- order history start -->
<section class="order-histry-area section-tb-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="order-history">
                    <div class="profile">
                        <div class="order-pro">
                            <div class="pro-img">
                                <a><img style=" width:100px;height:100px;border-radius: 50%;" src="upload-files/<?php echo $data_user['image']; ?>"></a>
                                
                            </div>
                            <div class="order-name">
                                <h4><?php echo $data_user['user_name']; ?></h4>
                                <br>
                                <a class="btn btn-style2" href="profile.php?action=avatar">Change Avatar</a>
                            </div>
                        </div>
                        <div class="order-his-page">
                        <?php
                        if(isset($_GET['action'])){
                            $action = $_GET['action'];
                          }else{
                            $action = '';
                          }
                          
                          switch($action){
                          
                          case "edit_pass";
                          echo '
                          <ul class="profile-ul">
                              <li class="profile-li"><a href="profile.php?action=general">General</a></li>
                              <li class="profile-li"><a class="active" href="profile.php?action=edit_pass">Change Password</a></li>
                              <li class="profile-li"><a href="logout.php">Logout</a></li>
                          </ul>
                          ';
                          break;
                          
                          default;
                          echo '
                            <ul class="profile-ul">
                                <li class="profile-li"><a class="active" href="profile.php?action=general">General</a></li>
                                <li class="profile-li"><a href="profile.php?action=edit_pass">Change Password</a></li>
                                <li class="profile-li"><a href="logout.php">Logout</a></li>
                            </ul>
                          ';
                          break;
                          }
                    ?>
                            
                        </div>
                    </div>
                    <?php
                        if(isset($_GET['action'])){
                            $action = $_GET['action'];
                          }else{
                            $action = '';
                          }
                          
                          switch($action){

                          case "edit_profile";
                          include('users/edit_profile.php');
                          break;
                          
                          case "user_profile_picture";
                          include('users/edit_image.phpp');
                          break;
                          
                          case "edit_pass";
                          include('users/edit_pass.php');
                          break;
                          
                          case "avatar";
                          include('users/edit_image.php');
                          break;

                          default;
                          include('users/general.php');
                          break;
                          }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order history end -->
<?php
include("includes/footer.php");
?>