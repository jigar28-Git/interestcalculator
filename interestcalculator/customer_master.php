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

<title><?php echo $_SESSION['title']; ?> Customer Master</title>
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
                
                <div class="mws-panel grid_8 mws-collapsible">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Customer Master</span>
                    </div>
                    <div class="mws-panel-toolbar">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a href="add_customer.php?mode2=add" class="btn"><i class="icol-add"></i> &nbsp;Add Customer</a>
                            </div>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>City</th>
                                    <th>Mobile</th>
                                    <th>Rate of Interest</th>
                                    <th>Interest On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $q="SELECT * FROM customer_master";
                                $result=mysqli_query($con,$q);
                                while($row=mysqli_fetch_assoc($result))
                                {
                                ?>
                                <tr>
                                    <td><?php echo $row['customer_name'];?></td>
                                    <td><?php echo $row['city'];?></td>
                                    <td><?php echo $row['mobile'];?></td>
                                    <td><?php echo $row['rate_of_interest'];?>%</td>
                                    <td><?php if($row['interest_on'] == "M"){echo "Month"; }else { echo "Year"; } ?></td>
                                    <td>
                                        <span class="btn-group">
                                            <a href="add_customer.php?id=<?php echo $row['customer_id'] ?>&mode=edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                                            <a href="add_customer.php?id=<?php echo $row['customer_id'] ?>&mode1=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-small"><i class="icon-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
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
$(document).ready(function() {
    $('#startDatePicker')
        .datepicker({
            format: 'dd/mm/yyyy'
        })

    $('#endDatePicker')
        .datepicker({
            format: 'dd/mm/yyyy'
        })

    });
    </script> 
</body>
</html>