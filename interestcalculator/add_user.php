<?php
	include("include/config.inc.php");        
	include('lock.php');
?>
<?php
$uid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2= $_GET["mode2"];

if(isset($mode) && $mode='edit' && $uid>0)
{
    $q="SELECT * FROM user_master WHERE `user_id` =.$uid";
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($result);

    $username   = $row['username'];
    $password   = $row['password'];
    $user_level = $row['user_level'];
}

if(isset($mode1) && $mode1='delete' && $uid>0){

    $sql = "DELETE FROM user_master WHERE user_id = $uid";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert(Data Deleted Successfully')</script>";
        header("location: user_master.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }
    $con->close();
}

if (isset($_POST['save'])){

        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $user_level = $_POST['user_level'];

        $q="UPDATE `user_master` SET `username`='".$username."',
        `password`='".$password."',
        `user_level`='".$user_level."' WHERE user_id =".$uid;
        error_reporting(E_ALL); 

    if(mysqli_query($con,$q)){
        //echo "Date updated scussfully!";
        echo "<script>window.location.href='user_master.php';</script>";
        exit();
    }
    else {
        echo "Error: " . $q . ":-" . mysqli_error($con);
     }
}

if(isset($mode2) && $mode2='add'){
    if (isset($_POST['save']))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $user_level = $_POST['user_level'];

        $q="INSERT INTO `user_master` (`username`, `password`, `user_level`) 
            VALUES ('".$username."','".$password."','".$user_level."')";
        if(mysqli_query($con,$q))
        {
            echo "<script>window.location.href='user_master.php';</script>";
            //echo "Date Inserted Successfully!";
        }
        else {
            echo "Error: " . $q . ":-" . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<?php include('include/head.php'); ?>

<title><?php echo $_SESSION['title']; ?> Add User</title>
</head>

<body>
	<!-- Header -->
	<?php include('include/header.php'); ?>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    	
        <?php include("include/sidebar.php"); ?>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">

            <div class="mws-panel grid_8">
            <a href="user_master.php"><button type="button" class="btn btn-small"><i class="icon-arrow-left-2"></i> Back To List</button></a>
                	<div class="mws-panel-header">
                    <?php 
                    if (isset($mode2) && $mode2='add')
                        {   
                    echo "<span>Add User</span>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<span>Edit User</span>";   
                    }
                    ?>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" method="post" action="">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">User Name</label>
                    				<div class="mws-form-item">
                                        <input type="text" name="username" value="<?php echo $rwo['username'] ?>" >
                    				</div>
                    			</div>
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">Password</label>
                    				<div class="mws-form-item">
                                        <input type="text" name="password" value="<?php echo $rwo['password'] ?>" >
                    				</div>
                    			</div>
                                <div class="mws-form-row bordered">
                    				<label class="mws-form-label">User Level</label>
                    				<div class="mws-form-item">
                                    <b><select name="user_level" class="mws-select2 small">
                                        <option value="A"<?php
                                        if($user_level == 'A'){
                                            echo "selected";
                                        } 
                                        ?>>Admin</option>
                                        </select></b>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="SAVE" name="save" class="btn btn-danger">
                    			<input type="reset" value="Reset" class="btn">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                
           </div>
            <?php include('include/footer.php'); ?>
            
        </div>
        
    </div>
	<?php include('include/jlinks.php'); ?>
    <script>

 
 	</script> 
</body>
</html>