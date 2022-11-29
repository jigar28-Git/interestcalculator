<?php 
  session_start();
  $cp = basename($_SERVER['PHP_SELF']);
?>  <!-- Start Main Wrapper -->
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <?php
                function active($currect_page){
                  $url_array =  explode('/', $_SERVER['PHP_SELF']) ;
                  $url = end($url_array);  
                  if($currect_page == $url){ 
                      echo 'active';
                  } 
                }
                ?>
                <ul>
                   <li class="<?php active('dashboard.php'); ?>"><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
                   
                   <li <?php echo($cp=='customer_master.php' || $cp=='add_customer.php')?'class="active"':''?>><a href="customer_master.php"><i class="icon-users"></i> Customer Master</a></li>
                   
                   <li <?php echo($cp=='transaction_detail.php' || $cp=='add_transaction.php')?'class="active"':''?>><a href="transaction_detail.php"><i class="icon-list-2"></i> Transaction - Details</a></li>

                   <li <?php echo($cp=='customer_statement.php' || $cp=='interest_calculator.php')?'class="active"':''?>><a href="#"><i class="icon-list"></i> Report</a>
                       <ul>
                           <li <?php echo($cp=='customer_statement.php')?'class="active"':''?> ><a href="customer_statement.php">Customer Statement</a></li>
                           <li <?php echo($cp=='interest_calculator.php')?'class="active"':''?> ><a href="interest_calculator.php">Interest Calculator</a></li>
                       </ul>
                   </li>
                   
                   <li <?php echo($cp=='user_master.php' || $cp=='add_user.php')?'class="active"':''?>><a href="user_master.php"><i class="icon-official"></i> User Master</a></li>
                   
                   

               </ul>
            </div>         
        </div>
        