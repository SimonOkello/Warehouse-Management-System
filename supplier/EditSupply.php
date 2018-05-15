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
                                <li><a href="#">Edit Supply: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                                                        <?php
//if (isset($_GET['edit']) && isset($_GET['id'])) {
    if (isset($_GET['id'])) {
    $product_id =  $_GET['id'];
    if (isset($_POST['submitted'])) {

        $sql = mysql_query("UPDATE `products` SET  `company_name` =  '{$_POST['company_name']}' ,`product_name` =  '{$_POST['product_name']}' , `qty` =  '{$_POST['qty']}' ,`price` =  '{$_POST['price']}' ,`qty_sold` =  '{$_POST['qty_sold']}'   WHERE `product_id` = '$product_id'  ")or die(mysql_error());

       
        echo (mysql_affected_rows()) ? "Product Updated.<br />" : "Nothing changed. <br />";
       
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `products` WHERE `product_id` = '$product_id' "));
  
    } ?> 
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">



  								<a href='supplies.php' class='btn btn-primary'><i class="icon-arrow-left icon-white"></i> Back To Supplies</a>
<form action='' method='POST' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="rate"> Company Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge"   name='company_name' value='<?php echo stripslashes($row['company_name'])?>' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Product Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge"   name='product_name' value='<?php echo stripslashes($row['product_name'])?>' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Quantity</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  name='qty' value='<?php echo stripslashes($row['qty'])?>' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Price(@)</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  name='price' value='<?php echo stripslashes($row['price'])?>' /> 
    </div>
    </div> 
     <div class="control-group">
        <label class="control-label" for="rate"> Quantity Sold</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  name='qty_sold' value='<?php echo stripslashes($row['qty_sold'])?>' /> 
    </div>
    </div> 
    <div class="control-group">

        <div class="controls">
            <input type='submit' value='Save' class="btn btn-primary  " /> 
            <input type='hidden' value='1' name='submitted' /> 
        </div>
    </div>
</form> 
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#datetimepicker1,#datetimepicker2').datetimepicker({
                language: 'pt-BR',
                pickTime:false,
                format:'yyyy-MM-dd'
            });
        });
    });
</script>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
	
            </div>
		
        </div>
        <?php include('footer.php'); ?>
		<?php include('script.php'); ?>
		<script src="../farmer/kcc/bootstrap/js/jquery-ui.js"></script>
    </body>
</html>
