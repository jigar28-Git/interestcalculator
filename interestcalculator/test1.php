<?php
	include("include/config.inc.php");    
    include('lock.php');    
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<?php include('include/head.php'); ?>

<title><?php echo $_SESSION['title']; ?> Dashboard</title>
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

            <div class="mws-panel">
                        <div class="mws-panel-header">
                            <span>Advanced Select Inputs</span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <form class="mws-form" action="" method="post">
                                <div class="mws-form-inline">
                                    <div class="mws-form-row bordered">
                                        <label class="mws-form-label">Select Customer</label>
                                        <div class="mws-form-item">
                                            <select class="mws-select2 small" name="customername[]" multiple size="5">
                                            <?php
                                            $query ="SELECT * FROM customer_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            } 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['customer_id']; ?>"><?php echo $option['customer_name']; ?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="mws-form-row bordered">
                                        <label class="mws-form-label">Select Date</label>
                                            <div class="mws-form-item">
                                            <div class="mws-form-cols">
                                                <div class="mws-form-col-2-8">
                                                    <input type="date" name="fromdate" class="small">
                                                </div>                                
                                                <div class="mws-form-col-0-8">
                                                    <label class="mws-form-label">-- TO --</label>
                                                </div>
                                                <div class="mws-form-col-2-8">
                                                    <input type="date" name="todate" class="small">                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">Transaction Type</label>
                                        <div class="mws-form-item">
                                        <select name="transactiontype" class="mws-select2 small">
                                                <option value="PAID">PAID</option>
                                                <option value="RECD">RECD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mws-button-row">
                                    <input type="submit" value="Filter" name="filter" class="btn btn-danger">
                                    <input type="reset" value="Reset" class="btn ">
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="mws-panel grid_8 mws-collapsible">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Transaction Details</span>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="add_transaction.php?mode2=add" class="btn"><i class="icol-add"></i> &nbsp;Add Transaction</a>
                            </div>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable">
                            <thead>
                                <tr>
                                    <th>Transaction Type</th>
                                    <th>Transaction Date</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($_POST['filter'])){
                                $customer = $_POST['customername'];
                                $date1 = date("Y-m-d", strtotime($_POST['fromdate']));
		                        $date2 = date("Y-m-d", strtotime($_POST['todate']));
                                $transtype = $_POST['transactiontype'];
                                foreach($customer as $customerlist){ $instructor.= $customerlist." ',' "; }
                                $q="SELECT * FROM `trans_details` AS T INNER JOIN customer_master AS C ON T.customer_id=C.customer_id WHERE T.customer_id IN ('$instructor') AND date(`trans_date`) BETWEEN '$date1' AND '$date2' AND trans_type='$transtype'";
                                
                                $result=mysqli_query($con,$q);
                                while($row=mysqli_fetch_array($result))
                                {   
                                    $trans_date = date("d-m-Y", strtotime($row['trans_date']));  
                                    //echo "New date format is: ".$newDate. " (MM-DD-YYYY)";
                                ?>
                                <tr>
                                    <td><?php echo $row['trans_type'];?></td>
                                    <td><?php echo $trans_date;?></td>
                                    <td><?php echo $row['customer_name'];?></td>
                                    <td><?php echo $row['amount'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td>
                                        <span class="btn-group">
                                            <a href="add_transaction.php?id=<?php echo $row['trans_id'] ?>&mode=edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                                            <a href="add_transaction.php?id=<?php echo $row['trans_id'] ?>&mode1=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-small"><i class="icon-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
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