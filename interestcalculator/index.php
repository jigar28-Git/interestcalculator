<?php 
include("include/config.inc.php"); 
error_reporting(E_ERROR);
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">

<title>MWS Admin - Login Page</title>

</head>
<style>
    .danger{
        color:white;
    }
</style>
<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>Login</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="index.php" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="username" class="mws-login-username required" placeholder="username">
                        </div>
                    </div>
                    <div class="mws-form-row bordered">
                        <div class="mws-form-item">
                            <input type="password" name="password" class="mws-login-password required" placeholder="password">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="Login" name="login" class="btn btn-success mws-login-button">
                    </div>
                </form>
                <?php
                if(isset($_POST['login']))
                {
                   if(empty($_POST['username']) || empty($_POST['password']))
                    {
                      echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                      die();
                    }
                    else{
                        $username = mysqli_real_escape_string($con, $_POST['username']);
                        $password = mysqli_real_escape_string($con, $_POST['password']);
                        $sql = "SELECT * FROM user_master WHERE username = '{$username}' AND password= '{$password}'";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)> 0)
                        {
                          while($row = mysqli_fetch_assoc($result)){
                              session_start();
                              $_SESSION["username"]   = $row['username'];
                              $_SESSION["user_id"]    = $row['user_id'];  
                              $_SESSION["login_user"] = $row['username'];
                              echo "<script>window.location.href='dashboard.php';</script>"; 
                          }
                        }else{        
                              echo '<div class="danger">Invalid username password combination !</div>';
                        }
                      }
                    }
                  ?>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="js/core/login.js"></script>
</body>
</html>
