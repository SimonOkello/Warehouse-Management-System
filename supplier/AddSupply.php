<?php include('header_dashboard.php'); ?>
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
								<li><a href="#"><b>Supplier</b></a><span class="divider">/</span></li>
								<li><a href="#">Add Supplies: </a></li>
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
   }
                                    $id=0;
if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
     $product_id=random_str(5);
     $company_name=$_POST['company_name'];
    $product_name=$_POST['product_name'];
    $qty=$_POST['qty'];
   
    $price=$_POST['price'];
 
 
    $sql = mysql_query("INSERT INTO `products` ( `product_id`,`company_name`,`product_name` ,`qty` ,`price` ,`user_id` ,`added_On`  ) VALUES(  '{$product_id}' ,'{$company_name}','{$product_name}' ,'{$qty}' ,'{$price}' ,'{$session_id}' ,CURDATE())")or die(mysql_error());


    
    echo "Product Added.<br />";
   
     
} else {
        echo "Nothing Added. <br />";
    }


 ?>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
    
  								<a href='supplies.php' class='btn btn-primary'><i class="icon-arrow-left icon-white"></i> Back To Supplies</a>
<form action='' method='POST' class="form-horizontal"> 
    
        <div class="control-group">
        <label class="control-label" for="rate"> Company Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Company" name='company_name' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Product Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Product Name" name='product_name' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Quantity</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Quantity" name='qty' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Price(@)</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Price Per Product" name='price' /> 
    </div>
    </div> 
    <div class="control-group">

        <div class="controls">
            <input type='submit' value='Save' class="btn btn-primary  " /> 
            <input type='hidden' value='1' name='submitted' /> 
        </div>
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
