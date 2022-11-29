<div class="mws-stat-container clearfix">
                    
                    <!-- Statistic Item -->
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-user"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Clients Registered</span>
                            <span class="mws-stat-value">
                                <?php
                                $result = mysqli_query($con,"SELECT * FROM clint_master");
                                $rows = mysqli_num_rows($result);
                                echo $rows." clients";
                                ?></span>
                        </span>
                    </a>

                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-travel"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Product Category</span>
                            <span class="mws-stat-value">
                                <?php
                                $result = mysqli_query($con,"SELECT * FROM product_category");
                                $rows = mysqli_num_rows($result);
                                echo $rows." Product";
                                ?>
                            </span>
                        </span>
                    </a>

                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-cart-add"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Products</span>
                            <span class="mws-stat-value"><?php
                                $result = mysqli_query($con,"SELECT * FROM product_master");
                                $rows = mysqli_num_rows($result);
                                echo $rows." product";
                                ?></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-reseller-programm"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Staffs</span>
                            <span class="mws-stat-value">
                                <?php
                                $result = mysqli_query($con,"SELECT * FROM staff_master");
                                $row = mysqli_num_rows($result);
                                echo $row." Staff";
                                ?></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-user-suit"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Users</span>
                            <span class="mws-stat-value">
                                <?php
                                $result = mysqli_query($con,"SELECT * FROM user_master");
                                $row = mysqli_num_rows($result);
                                echo $row ." User"; 
                                ?></span>
                        </span>
                    </a>
                </div>