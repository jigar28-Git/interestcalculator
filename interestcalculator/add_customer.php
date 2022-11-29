<?php
	include("include/config.inc.php");      
    include('lock.php');
?>
<?php
$cid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2= $_GET["mode2"];

if(isset($mode) && $mode='edit' && $cid>0)
{
    $q='SELECT * FROM customer_master WHERE customer_id ='.$cid;
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($result);   

    $customer_name    = $row["customer_name"];
    $city             = $row["city"];
    $mobile           = $row["mobile"];
    $rate_of_interest = $row["rate_of_interest"];
    $interest_on      = $row["interest_on"];
    $remark           = $row["remark"];
}

if(isset($mode1) && $mode1='delete' && $cid>0){
    $q="SELECT customer_id FROM trans_details WHERE customer_id = $cid";
    $res=mysqli_query($con,$q);
    $count=mysqli_num_rows($res);
        if ($count > 0){
            echo "<script>alert('You Can Not Delete This Data!')</script>";
            header("location: customer_master.php");
        }else{
    
    $sql = "DELETE FROM customer_master WHERE customer_id = $cid";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert(Data Deleted Successfully')</script>";
        header("location: customer_master.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }
    $con->close();
    }
}

if (isset($_POST['save'])){

    $customername   = $_POST['customername'];
    $city           = $_POST['city'];
    $mobile         = $_POST['mobile'];
    $rateofinterest = $_POST['rateofinterest'];
    $intereston     = $_POST['intereston'];
    $remark         = $_POST['remark'];

    $q="UPDATE `customer_master` SET `customer_name`='".$customername."',
                                     `city`='".$city."',
                                     `mobile`='".$mobile."',
                                     `rate_of_interest`='".$rateofinterest."',
                                     `interest_on`='".$intereston."',
                                     `remark`='".$remark."' WHERE customer_id =".$cid;
    if(mysqli_query($con,$q)){
        echo "<script>window.location.href='customer_master.php';</script>";
        exit();
    }
    else {
       // echo "Error: " . $q . ":-" . mysqli_error($con);
     }
}

if(isset($mode2) && $mode2='add'){
    if (isset($_POST['save']))
    {
        $customername   = $_POST['customername'];
        $city           = $_POST['city'];
        $mobile         = $_POST['mobile'];
        $rateofinterest = $_POST['rateofinterest'];
        $intereston     = $_POST['intereston'];
        $remark         = $_POST['remark'];
        $user_id = mysqli_real_escape_string($con, $_SESSION['user_id']);
        
        $sql=mysqli_query($con,"SELECT * FROM customer_master WHERE customer_name = $customername");
        error_reporting(0);
        if(mysqli_num_rows($sql)>=1)
        {
            echo"<script> alert('name already exists')</script>";
        }else {
        $q="INSERT INTO `customer_master`(`customer_name`, `city`, `mobile`, `rate_of_interest`, `interest_on`, `remark`, `ent_user_id`) 
            VALUES ('".$customername."','".$city."','".$mobile."','".$rateofinterest."','".$intereston."','".$remark."','".$user_id."')";
        if(mysqli_query($con,$q))
        {
            echo "<script>window.location.href='customer_master.php';</script>";
            //echo "Date Inserted scussfully!";
        }
        else {
          //  echo "Error: " . $q . ":-" . mysqli_error($con);
        }
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

<title><?php echo $_SESSION['title']; ?> Add Customer</title>
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
                <div class="mws-panel-header">
                    <?php 
                    if (isset($mode2) && $mode2='add')
                    {   
                        echo "<span>Add Customer</span>";
                    }
                    if (isset($mode) && $mode='edit'){
                        echo "<span>Edit Customer</span>";   
                    }
                    ?>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="customer_master.php" class="btn"><i class="icol-arrow-left"></i> &nbsp;Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" method="post" action="" name="cus_form" onsubmit="return validate()">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">Customer Name <span class="required">*</span></label>
                    				<div class="mws-form-item">
                    					<input type="text" name="customername" id="customername" value="<?php echo $customer_name ?>" class=" required small">
                    				</div>
                    			</div>
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">City</label>
                    				<div class="mws-form-item">
                    					<input type="text" name="city" value="<?php echo $city ?>" class="small">
                    				</div>
                    			</div>
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">Mobile <span class="required">*</span></label>
                    				<div class="mws-form-item">
                    					<input type="text" name="mobile" id="mobile" value="<?php echo $mobile ?>" class="small">
                    				</div>
                    			</div>
                                <div class="mws-form-row bordered">
                    				<label class="mws-form-label">Rate of Interest <span class="required">*</span></label>
                    				<div class="mws-form-item">
                                    <input type="number" step="0.01" value="<?php echo $rate_of_interest ?>" id="rateofinterest" name="rateofinterest">
                                        <button type="button" class="btn btn-small" disabled="disabled">%</button> &nbsp;
                                            <b><select name="intereston" class="mws-select2 small">
                                                <option value="M"<?php
                                                if($interest_on == 'M'){
                                                    echo "selected";
                                                } 
                                                ?>>Month</option>
                                                <option value="Y"<?php
                                                if($interest_on == 'Y'){
                                                    echo "selected";
                                                } 
                                                ?>>Year</option>
                                            </select></b>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">Remark</label>
                    				<div class="mws-form-item">
                    					<textarea rows="" cols="" name="remark" class="large"><?php echo $remark ?></textarea>
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
    function validate() {  
        var customername = document.cus_form.customername;   
        var mobile = document.cus_form.mobile;
        var rateofinterest = document.cus_form.rateofinterest;
        if (customername.value.length <= 0) {  
            alert("Customer name is required");  
            customername.focus();  
            return false;  
        }
        if (mobile.value.length <= 0) {    
            alert("Mobile number is required");    
            mobile.focus();    
            return false;    
        } 
        if (rateofinterest.value.length <= 0) {    
            alert("Rate of Interest number is required");    
            mobile.focus();    
            return false;    
        }
}
</script>
</body>
</html>