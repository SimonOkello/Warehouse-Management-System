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
if(isset($_GET['delete'] , $_GET['id'])){
$product_id = (int) $_GET['id']; 
mysql_query("DELETE FROM `products` WHERE `product_id` = '$product_id' ") ; 
echo (mysql_affected_rows()) ? "Product deleted.<br /> " : "Nothing deleted.<br /> ";
}
?> 
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                <!--<a class="btn btn-large btn-primary" href="AddProduct.php"><i class="icon-plus icon-white"></i>Add Product</a><br/><br/>-->
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
                <th>Order Id</th>
                <th> Product Name</th>
                <th>Company Name</th>
                <th>Product Id</th>
                <th>Quantity</th>
                <th>Price(@)</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
                <th>Status</th>
                <th>Delivery Address</th>
                <th>ACTION</th>
        </thead>
    <tbody>
        <?php //if(isset($_SESSION['id'])){ 
                    
                          // $query= mysql_query("select * from tbluser where user_id = '$session_id'")or die(mysql_error());
                                   // $row = mysql_fetch_array($query);
                                   // $fname=$row['firstname'];
                                   // $sname=$row['lastname'];
                                //}
                            ?>
  <?php

$query = mysql_query("SELECT order_id,product_name,orders.product_id,products.company_name,products.price,orders.qty,orders.added_On,delivery_date,status,customers.address FROM products,customers,orders WHERE customers.user_id=orders.user_id AND products.product_id = orders.product_id ORDER BY delivery_date")or die(mysql_error());
//$i=0;
 while($row = mysql_fetch_array($query)){
//$i+=1;
    echo '<tr>';
        //echo '<td>'.$i.'</td>';
       echo '<td>'.$row['order_id'].'</td>';
        echo '<td>'.$row['product_name'].'</td>';
         echo '<td>'.$row['company_name'].'</td>';
        echo '<td>'.$row['product_id'].'</td>';
        echo '<td>'.$row['qty'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['qty']*$row['price'].'</td>';
        echo '<td>'.$row['added_On'].'</td>';
        echo '<td>'.$row['delivery_date'].'</td>';
        echo '<td>'.$row['status'].'</td>';
        echo '<td>'.$row['address'].'</td>';
        
        
         
             echo '<td  style="text-align: center">
                <a href=EditEmplOrders.php?edit=1&id=' . $row['order_id'] . ' class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a>  
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
