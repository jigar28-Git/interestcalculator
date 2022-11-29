<?php
	include("include/config.inc.php");        
	include('lock.php');
    if(isset($_POST['show'])){
        $customer = $_POST['customername'];
        $q="SELECT * FROM trans_details AS T INNER JOIN customer_master AS C ON T.customer_id=C.customer_id WHERE T.customer_id = $customer ORDER BY trans_date";
        $result=mysqli_query($con,$q);
        $show=mysqli_fetch_assoc($result);
        $customer_id = $show["customer_name"];
        $customer_interest = $show ['rate_of_interest'];   
        } 
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<?php include('include/head.php'); ?>

<title><?php echo $_SESSION['title']; ?> Interest calculator</title>
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
                    	<span>Calculate Interest</span>
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
                                <div class="mws-form-row">
                    				<label class="mws-form-label"> Upto Date</label>
                    				<div class="mws-form-item">
                                        <input type="date" class="small" id="date" name="uptodate">
                    				</div>
                    			</div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">Rate of Interest</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" value="<?php if(isset($_POST['show'])){
                                            $customer = $_POST['customername'];
                                            $q="SELECT * FROM trans_details AS T INNER JOIN customer_master AS C ON T.customer_id=C.customer_id WHERE T.customer_id = $customer ORDER BY trans_date";
                                            $result=mysqli_query($con,$q);
                                            $show=mysqli_fetch_assoc($result);
                                            $customer_interest = $show ['rate_of_interest'];
                                            $interest_on = $show['interest_on'];
                                            if($interest_on == "M"){
                                                $interest_on = "Monthly";
                                            }else{
                                                $interest_on = "Yearly";
                                            }  ?>
                                                        <?php echo $customer_interest."% - ".$interest_on; ?>  
                                                <?php  } ?>" readonly="readonly">
                                    </div>
                                </div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="Calculate" name="show" class="btn btn-danger">
                    			<input type="reset" value="Reset" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>

                <div class="mws-panel grid_8 mws-collapsible">
                	<div class="mws-panel-header">
                    <span><i class="icon-table"></i> Interest <?php if(isset($_POST['show'])){
                           $customer = $_POST['customername'];
                           $q="SELECT * FROM trans_details AS T INNER JOIN customer_master AS C ON T.customer_id=C.customer_id WHERE T.customer_id = $customer ORDER BY trans_date";
                           $result=mysqli_query($con,$q);
                           $show=mysqli_fetch_assoc($result);
                           $customer_id = $show["customer_name"];
                           $customer_interest = $show ['rate_of_interest'];  ?>
                                     of Customer <b><?php echo $customer_id; ?></b> 
                               <?php } ?></span>
                    </div>
                    <div class="mws-panel-toolbar">
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable">
                            <thead>
                                <tr>
                                    <th>Date(DD/MM/YYYY)</th>
                                    <th>Description</th>
                                    <th>RECD</th>
                                    <th>PAID</th>
                                    <th>Balance</th>
                                    <th>Days</th>
                                    <th>Interest</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php 
                                if (isset($_POST['show'])){
                                
                                $customer = $_POST['customername'];
                                $uptodate = $_POST['uptodate'];
                                $lastdate = date_create(date("Y-m-d", strtotime($uptodate)));
                                $q="SELECT * FROM trans_details AS T INNER JOIN customer_master AS C ON T.customer_id=C.customer_id WHERE T.customer_id = $customer AND trans_date <= '$uptodate' ORDER BY trans_date";
                                $result=mysqli_query($con,$q);
                                $balance = 0;
                                $totalrecd = 0;
                                $totalpaid = 0;
                                $totalinterest = 0;
                                $SimpleInterest = 0;
                                $totalamount = 0;    
                                $days = 0;
                                $principal_amount = 0;

                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $interest = $row['rate_of_interest'];
                                    $trans_date = date_create(date("Y-m-d", strtotime($row['trans_date'])));
                                    //$trans_date = date_create('2022-09-22');
                                    if($predate == '')
                                     {
                                        $predate  = date_create(date("Y-m-d", strtotime($row['trans_date'])));
                                     }
                                     $days = date_diff($predate,$trans_date);
                                     $days = $days->format("%a")+1;
                  
                                     $uptodays = date_diff($predate,$lastdate);
                                     $uptodays = $uptodays->format("%a")-10;
                                     
                                     $predate  = date_create(date("Y-m-d", strtotime($row['trans_date'])));
                                ?>

                                <tr>
                                    <td><?php echo date("d-m-Y", strtotime($row['trans_date'])); ?></td>
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
                                    <td><?php echo $balance; ?></td>
                                    <td><?php if($days == 1){
                                        echo $days = " - ";
                                        echo $days;
                                    } 
                                    echo $days; ?></td>
                                    <td><?php 
                                        $simpleInterest=($principal_amount*$interest*12)/100/365*$days;
                                        $principal_amount = $balance;                                
                                        //echo $balance."<br>";
                                        //echo $principal_amount."<br>";
                                        echo number_format($simpleInterest, 2, '.', '');
                                        $totalinterest += $simpleInterest;

                                        $sifortotal = ($principal_amount*$interest*12)/100/365*$uptodays;
                                        $fortotalinterest += $sifortotal; 
                                        ?></td>
                                </tr>
                                <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <td><?php
                                    //TO formate the Upto Date  
                                        $newDate = date("d-m-Y", strtotime($uptodate));
                                        echo $newDate;
                                    ?></td>  
                                    <td>TOTAL</td>
                                    <td><?php echo $totalrecd; ?></td>
                                    <td><?php echo $totalpaid; ?></td>
                                    <td><?php echo $balance; ?></td>
                                    <td> <?php echo $uptodays; ?> </td>
                                    <td><?php echo number_format($fortotalinterest, 2, '.', ''); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <?php if(isset($_POST['show'])) { 
                    ?>                 
                <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>Total Interest Calculation</span>
                    </div>
                    <div class="mws-panel-body" align="center" style="font-size: 28px;">
                        <p style="color:RED;">Total Outstanding With Interest :  <b>₹<u><?php $totalamount = $totalinterest + $balance; echo number_format($totalamount, 2, '.', ''); ?></u></b> </p>
                    </div>
                </div>
                <?php } ?>
                
           </div>
            <?php include('include/footer.php'); ?>
            
        </div>
        
    </div>  
	<?php include('include/jlinks.php'); ?>

    <script>
const dateInput = document.getElementById('date');

// Using UTC (universal coordinated time)
dateInput.value = new Date().toISOString().split('T')[0];

console.log(new Date().toISOString().split('T')[0]);

</script>
</body>
</html>