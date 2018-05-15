<?php 
include('header_dashboard.php'); 
include('admin/dbcon.php');
?>
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
								<li><a href="#">New Order: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
<?php
                                    
function random_str($length)
{
   $keys = array_merge(range(0,9), range('A', 'Z'));
   $key = "";
   for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
   }
   return $key;
}//to generate a random string to put into order_id column
$success=0;
$itemexists=0;
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
      foreach ($_POST['check_list'] as $product_id)
      {
         $product_id=mysql_real_escape_string($product_id);
         foreach ($_POST['qty_list'][$product_id] as $qty)
         {
            $order_id=random_str(8);
            $query="SELECT order_id FROM orders";
            $response=@mysql_query($query);
            if(mysql_num_rows($response)>0)
            {
               while($row=mysql_fetch_array($response))
               {
                  if(strcmp($order_id,$row['order_id'])!=0)
                     $order_id=random_str(8);
               }
            }
            $random_number=rand(3,7);
            $current_date=date("Y-m-d");
            $delivery_date=date("Y-m-d",strtotime($current_date)+86400*$random_number);
            
            $sql = mysql_query("INSERT INTO `orders` ( `order_id` ,`user_id` ,`product_id` ,`qty` ,`added_On` ,`delivery_date`) VALUES(  '{$order_id}' ,'{$session_id}' ,'{$product_id}' ,'{$qty}' ,CURDATE() ,'{$delivery_date}')")or die(mysql_error());
            if(mysql_affected_rows())
            {
                $sql = mysql_query("UPDATE products SET qty=qty-$qty,qty_sold=qty_sold+$qty WHERE product_id='$product_id' ")or die(mysql_error());

               
               if(mysql_affected_rows())
               {
                  $success=1;
               }
               else
               {
                  $success=-1;
                  echo mysql_error();
               }
            }
            else
            {
               $success=-1;
               echo mysql_error();
            }

         }//inner for
      }//outer for
   }//else
}//isset if
?> <?php
                        if($success==1)
                        {
                           echo '<strong>Item(s) Successfully Added</strong>';
                        }
                        else if($success==-1)
                        {
                           echo '<strong class="text-danger">Item(s) was not Added. Please try again!</strong>';
                        }
                        if($needforecho==1)
                        {
                           echo '<strong>Please check some box before proceeding!</strong>';
                        }
                     ?>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
    
  								<a href='cust_Order.php' class='btn btn-primary'><i class="icon-arrow-left icon-white"></i> Back To Orders</a>
                                <br><br>

<form method="post" class="frm-wel" action="new_Order.php">
                  <div>
                    
                  </div>
               <div>
                  <?php
                  $query = mysql_query("SELECT product_id,product_name,qty,price FROM products ")or die(mysql_error());
               
            
                 
                  echo '<table cellspacing="5" class="table table-hover table-striped table-condensed table-bordered">
                  <tr>
                  <th class="text-center">Product Id</th>
                  <th class="text-center">Product Name</th>
                  <th class="text-center">Quantity Available</th>
                  <th class="text-center">Price/Item</th>
                  <th class="text-center">Select</th>
                  </tr>';
                  while($row=mysql_fetch_array($query))
                  {
                     echo '<tr>
                     <td class="text-center">'.$row['product_id'].'</td>
                     <td class="text-center">'.$row['product_name'].'</td>
                     <td class="text-center">';
                     if($row['qty']>0)
                     {
                        echo '<input type="number" min="0" max="'.$row['qty'].'" name="qty_list['.$row['product_id'].'][]" placeholder="Qty">/'.$row['qty'];
                     }
                     else
                     {
                        echo '<input type="number" min="0" max="'.$row['qty'].'" name="qty_list['.$row['product_id'].'][]" placeholder="Qty" disabled>/'.$row['qty'];
                     }
                     echo '</td>
                     <td class="text-center">'.$row['price'].'</td>
                     <td class="text-center">
                     <label class="checkbox-inline"><input type="checkbox" name="check_list['.$row['product_id'].']" value="'.$row['product_id'].'"></label>
                     </td>
                     </tr>';
                  }
                  echo '</table>';
              
               ?>
            </div>
               <div class="text-center col-md-12">
                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
               </div>
            </form>
                            </div>
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
