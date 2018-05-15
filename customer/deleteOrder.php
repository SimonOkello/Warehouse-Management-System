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
                <li><a href="#"><b>Customer</b></a><span class="divider">/</span></li>
								<li><a href="#">Delete Orders: </a></li>
						</ul>
						 <!-- end breadcrumb -->
                         
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                    <?php
$success=0;
$needforecho=0;
$badexpiry=0;
if(isset($_POST['submit']))
{
   if(empty($_POST['check_list']))
   {
      $needforecho=1;
   }
   else
   {
      $current_date=date("Y-m-d");
      foreach ($_POST['check_list'] as $order_id)
      {
         $query="SELECT delivery_date,qty,product_id FROM orders WHERE order_id='$order_id'";
         $dateQ=@mysql_query($query);
         if(mysql_num_rows($dateQ)>0)
         {
            $row=mysql_fetch_array($dateQ);
            if(strtotime($row['delivery_date'])-strtotime($current_date)<=2*86400)
            {
               $badexpiry=1;
            }
            else
            {
               $query="DELETE FROM orders WHERE order_id='$order_id'";
               $response=@mysql_query($query);
               if(mysql_affected_rows())
               {
                  $query="UPDATE products SET qty=qty+'".$row['qty']."',qty_sold=qty_sold-'".$row['qty']."' WHERE product_id='".$row['product_id']."'";
                  $response=@mysql_query($query);
                  if(mysql_affected_rows())
                  {
                     $success=1;
                  }
                  else
                  {
                     $success=-1;
                     echo mysqli_error();
                  }
               }
               else
               {
                  $success=-1;
                  echo mysqli_error();
               }
            }
         }
      }//end of for
   }
}
?> 
<?php
                        if($success==1)
                        {
                           echo '<strong>Order(s) Successfully Deleted</strong>';
                        }
                        else if($success==-1)
                        {
                           echo '<strong class="text-danger">Order(s) was not Deleted. Please try again!</strong>';
                        }
                        if($needforecho==1)
                        {
                           echo '<strong>Please check some box before proceeding!</strong>';
                        }
                        if($badexpiry==1)
                        {
                           echo '<strong>Order cannot be Deleted</strong>';
                        }
                     ?>
                                
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<a class="btn  btn-primary" href="cust_Order.php"><i class="icon-arrow-left icon-white"></i>Back To Orders</a>
                  <br/><br/>

<form method="post" class="frm-wel" action="AddProduct.php">
                  <div>
                    
                  </div>
               <div>
                  <?php
                  $query = mysql_query("SELECT order_id,orders.product_id,orders.qty,orders.added_On,delivery_date,product_name,price,status FROM orders,products WHERE orders.user_id='$session_id' AND products.product_id=orders.product_id AND NOT status='deleted' ORDER BY delivery_date ")or die(mysql_error());
               
            
                 
                  echo '<table cellspacing="5" class="table table-hover table-striped table-condensed table-bordered">
                  <tr>
                <th class="text-center">Order Id</th>
                <th class="text-center"> Product Id</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Price(@)</th>
                <th class="text-center">Total Cost</th>
                <th class="text-center">Order Date</th>
                <th class="text-center">Exp. Delivery Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Select</th>
                  </tr>';
                  while($row=mysql_fetch_array($query))
                  {
                     echo '<tr>
                     <td class="text-center">'.$row['order_id'].'</td>
                     <td class="text-center">'.$row['product_id'].'</td>
                     <td class="text-center">'.$row['product_name'].'</td>
                     <td class="text-center">'.$row['qty'].'</td>
                     <td class="text-center">'.$row['price'].'</td>
                     <td class="text-center">'.$row['price']*$row['qty'].'</td>
                     <td class="text-center">'.$row['added_On'].'</td>
                     <td class="text-center">'.$row['delivery_date'].'</td>
                     <td class="text-center">'.$row['status'].'</td>
                     <td class="text-center">
                     <label class="checkbox-inline"><input type="checkbox" name="check_list['.$row['order_id'].']" value="'.$row['order_id'].'"></label>
                     </td>
                     </tr>';
                  }
                  echo '</table>';
              
               ?>
            </div><br>
               <div class="text-center col-md-12">  
                  <button type="submit" name="submit" class="btn btn-danger" formaction="deleteOrder.php"><i class="icon-remove icon-white"></i>Delete Orders</button>
               </div>
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
