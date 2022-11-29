<?php
	include("include/config.inc.php"); 
    include('lock.php');     
?>
<?php
$tid= $_GET["id"];
$mode= $_GET["mode"];
$mode1= $_GET["mode1"];
$mode2= $_GET["mode2"];

if(isset($mode) && $mode='edit' && $tid>0)
{
    $q='SELECT * FROM trans_details WHERE trans_id ='.$tid;
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($result);

    $trans_type  = $row["trans_type"];
    $trans_date  = $row["trans_date"];
    $customer_id = $row["customer_id"];
    $amount      = $row["amount"];
    $description = $row["description"];
}

if(isset($mode1) && $mode1='delete' && $tid>0){

    $sql = "DELETE FROM trans_details WHERE trans_id = $tid";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert(Data Deleted Successfully')</script>";
        header("location: transaction_detail.php");
    } else {
        //echo "Error deleting record: " . $con->error;
    }
    $con->close();
}

if (isset($_POST['save'])){

        $transactiontype = $_POST['transactiontype'];
        $transactiondate = $_POST['transactiondate'];
        $customername    = $_POST['customername'];
        $amount          = $_POST['amount'];
        $description     = $_POST['description'];
        $b = str_replace( ',', '', $amount );
        if( is_numeric( $b ) ) {
            $amount = $b;
        } 
    $q="UPDATE `trans_details` SET `customer_id`='".$customername."',
                                   `trans_type`='".$transactiontype."',
                                   `trans_date`='".$transactiondate."',
                                   `amount`='".$amount."',
                                   `description`='".$description."' WHERE trans_id = $tid";
       error_reporting(E_ALL); 

    if(mysqli_query($con,$q)){
        //echo "Date updated scussfully!";
        echo "<script>window.location.href='transaction_detail.php';</script>";
        exit();
    }
    else {
        //echo "Error: " . $q . ":-" . mysqli_error($con);
     }
}

if(isset($mode2) && $mode2='add'){
    if (isset($_POST['save']))
    {
        $transactiontype = $_POST['transactiontype'];
        $transactiondate = $_POST['transactiondate'];
        $customername    = $_POST['customername'];
        $amount          = $_POST['amount'];
        $description     = $_POST['description'];
        $b = str_replace( ',', '', $amount );
        if( is_numeric( $b ) ) {
            $amount = $b;
        } 
        $user_id = mysqli_real_escape_string($con, $_SESSION['user_id']);

        $q="INSERT INTO `trans_details`(`customer_id`, `trans_type`, `trans_date`, `amount`, `description`, `ent_user_id`) 
            VALUES ('".$customername."','".$transactiontype."','".$transactiondate."','".$amount."','".$description."','".$user_id."')";
        if(mysqli_query($con,$q))
        {
            echo "<script>window.location.href='transaction_detail.php';</script>";
            //echo "Date Inserted Successfully!";
        }
        else {
            //echo "Error: " . $q . ":-" . mysqli_error($con);
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>
</script>
<title><?php echo $_SESSION['title']; ?> Add Transaction</title>
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
                    echo "<span>Add Transaction</span>";
                    }
                    if (isset($mode) && $mode='edit'){
                    echo "<span>Edit Transaction</span>";   
                    }
                    ?>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="transaction_detail.php" class="btn"><i class="icol-arrow-left"></i> &nbsp;Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" method="post" action="" name="cus_form" onsubmit="return validate()">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">Transaction Type</label>
                    				<div class="mws-form-item">
                                            <b><select name="transactiontype" class="mws-select2 small">
                                                <option value="PAID"<?php
                                                if($trans_type == 'PAID'){
                                                    echo "selected";
                                                } 
                                                ?>>PAID</option>
                                                <option value="RECD"<?php
                                                if($trans_type == 'RECD'){
                                                    echo "selected";
                                                } 
                                                ?>>RECD</option>
                                            </select></b>
                    				</div>
                    			</div>
                                <?php if(isset($mode2) && $mode2='add'){ ?>
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">Transaction Date <span class="required">*</span></label>
                    				<div class="mws-form-item">
                                        <input type="date" name="transactiondate" id="date" value="<?php echo $trans_date ?>" placeholder="dd-mm-yyyy">
                    				</div>
                    			</div><?php } else { ?>
                                    <div class="mws-form-row bordered">
                    				<label class="mws-form-label">Transaction Date <span class="required">*</span></label>
                    				<div class="mws-form-item">
                                        <input type="date" name="transactiondate" value="<?php echo $trans_date ?>" placeholder="dd-mm-yyyy">
                    				</div>
                    			</div>
                                <?php } ?>
                    			<div class="mws-form-row bordered">
                    				<label class="mws-form-label">Customer Name <span class="required">*</span></label>
                    				<div class="mws-form-item">
                                    <select class="mws-select2 small" name="customername" id="customer" value="<?php echo $customer_id ?>">
                                            <option>-- Select Customer --</option>
                                            <?php
                                            $query ="SELECT * FROM customer_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            } 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['customer_id']; ?>"<?php
                                            if ($customer_id == $option['customer_id'])
                                            {
                                                echo "Selected";
                                            }  
                                            ?>><?php echo $option['customer_name']; ?> - <?php echo $option['city']; ?></option>
                                            <?php }?>
                                        </select>
                    				</div>
                    			</div>
                                <div class="mws-form-row bordered" id="form">
                    				<label class="mws-form-label">Amount <span class="required">*</span></label>
                    				<div class="flex">
                                    <div class="mws-form-item">
                                    <input id="amount" name="amount" type="text" value="<?php echo $amount ?>" maxlength="15">
                                        <button type="button" class="btn btn-small" disabled="disabled">₹</button> 
                    				</div>
                                    </div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">Description</label>
                    				<div class="mws-form-item">
                    					<textarea rows="" cols="" name="description" class="large"><?php echo $description ?></textarea>
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
// (function($, undefined) {

// "use strict";

// // When ready.
// $(function() {
  
//   var $form = $( "#form" );
//   var $input = $form.find( "input" );

//   $input.on( "keyup", function( event ) {
    
    
//     // When user select text in the document, also abort.
//     var selection = window.getSelection().toString();
//     if ( selection !== '' ) {
//       return;
//     }
    
//     // When the arrow keys are pressed, abort.
//     if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
//       return;
//     }
    
    
//     var $this = $( this );
    
//     // Get the value.
//     var input = $this.val();
    
//     var input = input.replace(/[\D\s\._\-]+/g, "");
//         input = input ? parseInt( input, 10 ) : 0;

//         $this.val( function() {
//           return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
//         } );
//   } );
  
//   /**
//    * ==================================
//    * When Form Submitted
//    * ==================================
//    */
//   $form.on( "submit", function( event ) {
    
//     var $this = $( this );
//     var arr = $this.serializeArray();
  
//     for (var i = 0; i < arr.length; i++) {
//         arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
//     };
    
//     console.log( arr );
    
//     event.preventDefault();
//   });
  
// });
// })(jQuery);
    </script> 
<script>
const dateInput = document.getElementById('date');

// ✅ Using UTC (universal coordinated time)
dateInput.value = new Date().toISOString().split('T')[0];

console.log(new Date().toISOString().split('T')[0]);

</script>
<script>  
    function validate() {  
        var theDate = document.cus_form.theDate;   
        var customer = document.cus_form.customer;
        var amount = document.cus_form.amount;
        if (theDate.value.length <= 0) {  
            alert("Date field is required");  
            theDate.focus();  
            return false;  
        }
        if (customer.value.length <= 0) {    
            alert("Customer Name is required");    
            customer.focus();    
            return false;    
        } 
        if (amount.value.length <= 0) {    
            alert("Amount is required");    
            amount.focus();    
            return false;    
        }
}

</script>
</body>
</html>