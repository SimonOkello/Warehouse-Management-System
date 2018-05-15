<?php
 include('header_dashboard.php'); 
 include('admin/dbcon.php'); ?>

    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<li><a href="#"><b>WAREHOUSE</b></a><span class="divider">/</span></li>
								<li><a href="#">Orders: </a></li>
						</ul>
						 <!-- end breadcrumb -->
                         
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                    <?php
if(isset($_GET['remove'] , $_GET['id'])){
$order_id = $_GET['id']; 
$sql = mysql_query("UPDATE orders SET status='Deleted' WHERE status='Delivered' AND order_id='$order_id'")or die(mysql_error());
echo (mysql_affected_rows()) ? "Removed.<br /> " : "The Order is not delivered yet!.<br /> ";

}
?> 
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<a class="btn  btn-primary" href="new_Order.php"><i class="icon-plus icon-white"></i>New Order</a>  ||  <a class="btn  btn-danger" href="deleteOrder.php"><i class="icon-remove icon-white"></i>Delete Order</a><br/><br/>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
                <th>Order Id</th>
                <th> Product Id</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price(@)</th>
                <th>Total Cost</th>
                <th>Order Date</th>
                <th>Exp. Delivery Date</th>
                <th>Status</th>
                <th>ACTION</th>
        </thead>
    <tbody>
        <?php if(isset($_SESSION['id'])){ 
                    
                           $query= mysql_query("select * from products where user_id = '$session_id'")or die(mysql_error());
                                    $row = mysql_fetch_array($query);
                                    $fname=$row['firstname'];
                                    $sname=$row['lastname'];
                                }
                            ?>
  <?php

$query = mysql_query("SELECT order_id,orders.product_id,orders.qty,orders.added_On,delivery_date,product_name,price,status FROM orders,products WHERE orders.user_id='$session_id' AND products.product_id=orders.product_id AND NOT status='deleted' ORDER BY delivery_date ")or die(mysql_error());
//$i=0;
 while($row = mysql_fetch_array($query)){
//$i+=1;
    echo '<tr>';
        //echo '<td>'.$i.'</td>';
       echo '<td>'.$row['order_id'].'</td>';
        echo '<td>'.$row['product_id'].'</td>';
        echo '<td>'.$row['product_name'].'</td>';
        echo '<td>'.$row['qty'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['price']*$row['qty'].'</td>';
        echo '<td>'.$row['added_On'].'</td>';
        echo '<td>'.$row['delivery_date'].'</td>';
        echo '<td>'.$row['status'].'</td>';
        
         
             echo '<td  style="text-align: center">
                <a href=?remove=1&id=' . $row['order_id'] . ' class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Remove Delivered Order</a> 
             </td>';
         

    echo '</tr>';
}
?>

</tbody>
</table>
<form>
    <input type="hidden" name="f_no" value="<?php echo $row['f_no'];?>" />
</form>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
	
            </div>
		
        </div>
        <?php include('footer.php'); ?>
		<?php include('script.php'); ?>
		
    </body>
</html>
