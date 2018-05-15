<?php include('header_dashboard.php'); ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
    position: relative;
    text-align: center;
    color: white;
}

.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
</head>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                
								<div class="block-content collapse in">
										<div class="span12">
							<!-- block -->
										<div class="navbar navbar-inner block-header">
											<div class="muted pull-left"><strong>HOMEPAGE:Summary</strong></div>
										</div>
										<div id='calendar'></div>		
							<!-- block -->
									</div>

											


							
							<img src="admin/images/grey.jpg" width="1400" height="550">

							<div class="centered">
								<br><br><br>
								<table style="font-size: 1.5em; font-weight: 800;" class="table">
								<tr>
									<?php
										
 $items = mysql_query("SELECT SUM(qty) AS `items` FROM `products`");
											$row = mysql_fetch_assoc($items);
											$count = $row['items'];
                                    
                                    ?>
									<td>Total Items:</td>
									<td><?php echo $count ?></td>
								</tr>
								<tr>
									<?php 
									 $query= mysql_query("SELECT SUM(qty_sold) AS total FROM products ")or die(mysql_error());
                                    $row = mysql_fetch_array($query);
											
											?>
									<td>Total Sell:</td>
									<td><?php echo $row['total'] ?></td>
								</tr>
								<tr>
									<?php
										
											 $query= mysql_query("SELECT SUM((orders.qty)*(products.price)) AS value FROM orders,products WHERE orders.product_id=products.product_id ")or die(mysql_error());
                                    $row = mysql_fetch_array($query);
                                    
                                    ?>
									<td>Sell Value:</td>
									<td><?php echo $row['value'] ?></td>
								</tr>
								<tr>
									<?php 
											$supplier = mysql_query("SELECT COUNT(products.user_id),company_name, firstname FROM products,suppliers WHERE products.user_id=suppliers.user_id GROUP BY company_name")or die(mysql_error());
											$row = mysql_fetch_assoc($supplier);
											 
											?>
									<td>Top Supplier:</td>
									<td><?php echo $row['company_name']; ?></td>
								</tr>
								<tr>
									<?php 
											$buyer = mysql_query("SELECT COUNT(orders.user_id),firstname,lastname FROM orders,customers WHERE orders.user_id=customers.user_id GROUP BY firstname")or die(mysql_error());
											$row = mysql_fetch_assoc($buyer);
											 
											?>
									<td>Top Customer:</td>
									<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
								</tr>
								
								
							</table>
						</div>
						
										
									</div>

                                </div>
                         </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <br>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
		
    </body>
</html>