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
                                <li><a href="#"><b>Employee</b></a><span class="divider">/</span></li>
                                <li><a href="#">Edit Order: </a></li>
                        </ul>
                         <!-- end breadcrumb -->
                     
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                                                        <?php
//if (isset($_GET['edit']) && isset($_GET['id'])) {
    if (isset($_GET['id'])) {
    $order_id =  $_GET['id'];
    if (isset($_POST['submitted'])) {

        $sql = mysql_query("UPDATE `orders` SET  `status` =  '{$_POST['status']}'WHERE `order_id` = '$order_id'  ")or die(mysql_error());

       
        echo (mysql_affected_rows()) ? "Order Updated.<br />" : "Nothing changed. <br />";
       
    }
    $row = mysql_fetch_array(mysql_query("SELECT status FROM `orders` WHERE `order_id` = '$order_id' "));
  
    } ?> 
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">



                                <a href='Empl_Orders.php' class='btn btn-primary'><i class="icon-arrow-left icon-white"></i> Back To Orders</a>
<form action='' method='POST' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="rate"> Status</label >
        <div class="controls">

<select name="status" class="input-xlarge" required />
<option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
<option value="Undelivered">Undelivered</option>
<option value="Delivered">Delivered</option>
<option value="Deleted">Deleted</option>
</select>
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
