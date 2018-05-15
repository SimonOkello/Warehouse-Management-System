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
                                <li><a href="#"><b>Administrator</b></a><span class="divider">/</span></li>
                                <li><a href="#">Edit Employee: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                                                        <?php
//if (isset($_GET['edit']) && isset($_GET['id'])) {
    if (isset($_GET['id'])) {
    $user_id = (int) $_GET['id'];
    if (isset($_POST['submitted'])) {

        $sql = mysql_query("UPDATE `employees` SET  `username` =  '{$_POST['username']}' , `firstname` =  '{$_POST['firstname']}' ,`lastname` =  '{$_POST['lastname']}' ,`phone` =  '{$_POST['phone']}',`address` =  '{$_POST['address']}'  WHERE `user_id` = '$user_id'  ")or die(mysql_error());

       
        echo (mysql_affected_rows()) ? "Employee Updated.<br />" : "Nothing changed. <br />";
       
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `employees` WHERE `user_id` = '$user_id' "));
  
    } ?> 
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">



  								<a href='employee.php' class='btn btn-primary'><i class="icon-arrow-left icon-white"></i> Back To Employees</a>
<form action='' method='POST' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="rate"> Username</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  name='username' value='<?php echo stripslashes($row['username']) ?>' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> First Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge" name='firstname' value='<?php echo stripslashes($row['firstname']) ?>' /> 
    </div>
    </div> 
     <div class="control-group">
        <label class="control-label" for="rate"> Last Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge" name='lastname' value='<?php echo stripslashes($row['lastname']) ?>' /> 
    </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="rate"> Contact</label >
        <div class="controls">
            <input type="text" class="input-xlarge" name='phone' value='<?php echo stripslashes($row['phone']) ?>' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Address</label >
        <div class="controls">
            <input type="text" class="input-xlarge" name='address' value='<?php echo stripslashes($row['address']) ?>' /> 
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
