<?php
include 'include/config.inc.php';
error_reporting(E_ERROR);
session_start();
include('lock.php');
?>
<div class="my_overlay" id="my_overlay" style="display:block;"><div class="my_overlay_div"></div><img class="my_overlay_img" src="images/myloader.gif"></div>

<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">
    
        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            
        	<a style="text-decoration:none;" href="dashboard.php" class="title">
            	
            	<img style="height:40px;" src="images/logo3.png">
				<span style="padding-left:10px; font-size:20px; font-weight:b-old; vertical-align:central;"><?php echo $_SESSION['header_name']; ?></span>
            </a>
            <!--<img src="images/mws-logo.png" alt="mws admin">-->
        </div>
    </div>
    
    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">
    
        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">
        
            <!-- User Photo -->
            <div id="mws-user-photo">
            <?php
                                    $username = mysqli_real_escape_string($con, $_SESSION['username']);
                                    $sql = "SELECT user_image FROM user_master WHERE username = '{$username}' ";
                                    $result = mysqli_query($con, $sql);
                                    $row=mysqli_fetch_assoc($result);
                                    ?>
                <img src="upload/userimg/logo3.png">
            </div>
            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username">
                    <?php
                    $username = mysqli_real_escape_string($con, $_SESSION['username']);
                    $sql = "SELECT username FROM user_master WHERE username = '{$username}' ";
                    $result = mysqli_query($con, $sql);
                    $row=mysqli_fetch_assoc($result);
                    ?>
                    Hello, <?php echo $row['username'];?>
                </div>
                <ul><!-- 
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Change Password</a></li> -->
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>