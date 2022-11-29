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

<title><?php echo $_SESSION['title']; ?> Customer Statement</title>
</head>
<style>
      
                tfoot td {
                    background: #808080;
                    color: white;
                }
            </style>
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
                    	<span>Customer Statement</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="" method="post">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">Select Customer</label>
                    				<div class="mws-form-item">
                                    <select class="mws-select2 small" name="customername">
                                    <option>-- Select Customer --</option>
                                    <?php
                                            $query ="SELECT * FROM customer_master";
                                            $result = $con->query($query);
                                            if($result->num_rows> 0){
                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            } 
                                            foreach ($options as $option) {
                                            ?>
                                            <option value="<?php echo $option['customer_id']; ?>"><?php echo $option['customer_name']; ?> - <?php echo $option['city']; ?></option>
                                            <?php }?>
                                            </select>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="Show" name="show" class="btn btn-danger">
                    			<input type="reset" value="Reset" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>


                <div class="mws-panel grid_8 mws-collapsible">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Statement <?php if(isset($_POST['show'])){
                           $customer = $_POST['customername'];
                           $q="SELECT * FROM trans_details AS T INNER JOIN customer_master AS C ON T.customer_id=C.customer_id WHERE T.customer_id = $customer ORDER BY trans_date";
                           $result=mysqli_query($con,$q);
                           $show=mysqli_fetch_assoc($result);
                           $customer_id = $show["customer_name"];  ?>
                                     of Customer <b><?php echo $customer_id; ?></b> 
                               <?php  } ?></span>
                    </div>
                    <div class="mws-panel-toolbar">
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>RECD</th>
                                    <th>PAID</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (isset($_POST['show'])){
                                $i=0;    
                                $customer = $_POST['customername'];
                                $q="SELECT * FROM trans_details WHERE customer_id = $customer ORDER BY trans_date";
                                $result=mysqli_query($con,$q);
                                $balance = 0;
                                $totalrecd = 0;
                                $totalpaid = 0;
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $i++;
                                    $trans_date = date("d-m-Y", strtotime($row['trans_date']));
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $trans_date;?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php 
                                            if($row['trans_type'] != "RECD")
                                            { 
                                                echo "<center>-</center>"; 
                                            }
                                            else
                                            { 
                                                $totalrecd = $totalrecd + $row['amount'];
                                                $balance = $balance - $row['amount'];
                                                echo "<center>".$row['amount']."</center>"; 
                                            } 
                                        ?>
                                    </td>
                                    <td><?php 
                                            if($row['trans_type'] != "PAID")
                                            {
                                                 echo "<center>-</center>"; 
                                            }else {
                                                 $totalpaid = $totalpaid + $row['amount'];
                                                 $balance = $balance + $row['amount']; 
                                                 echo "<center>".$row['amount']."</center>"; 
                                            } 
                                        ?>
                                    </td>
                                    <td><?php echo $balance;?></td>
                                </tr>
                                <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <td>-</td>
                                    <td>TOTAL</td>
                                    <td> -- </td>
                                    <td><?php echo $totalrecd; ?></td>
                                    <td><?php echo $totalpaid; ?></td>
                                    <td><?php echo $balance; ?></td>
                                </tr>
                            </tfoot>
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