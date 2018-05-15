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
								<li><a href="#">Add Employee: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                    
<?php
                                    $id=0;
if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysql_real_escape_string($value);
    }
    $username=$_POST['username'];
    $employee_name=$_POST['employee_name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $salary=$_POST['salary'];
    $date_Of_Join=$_POST['date_Of_Join'];
    $address=$_POST['address'];
    $status=$_POST['status'];
    
 

    $sql = mysql_query("INSERT INTO `employees` ( `username` ,`employee_name` ,`contact` ,`email` ,`salary` ,`date_Of_Join` ,`address` ,`status`) VALUES(  '{$username}' ,'{$employee_name}' ,'{$contact}' ,'{$email}' ,'{$salary}' ,'{$date_Of_Join}' ,'{$address}' ,'{$status}')")or die(mysql_error());


    
    echo "Employee Added.<br />";
   
     
} else {
        echo "Nothing Added. <br />";
    }


 ?>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
    
  								<a href='employee.php' class='btn btn-primary'><i class="icon-arrow-left icon-white"></i>Back To Employees</a>
<form action='' method='POST' class="form-horizontal"> 
    
        <div class="control-group">
        <label class="control-label" for="rate"> Username</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Username" name='username' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Employee Name</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Employee Name" name='employee_name' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Contact</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Contact" name='contact' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Email</label >
        <div class="controls">
            <input type="email" class="input-xlarge"  placeholder="Email" name='email' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Salary</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Salary" name='salary' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Date of Join</label >
        <div class="controls">
            <input type="date" class="input-xlarge"  placeholder="Date of Join" name='date_Of_Join' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Address</label >
        <div class="controls">
            <input type="text" class="input-xlarge"  placeholder="Address" name='address' /> 
    </div>
    </div> 
    <div class="control-group">
        <label class="control-label" for="rate"> Status</label >
        <div class="controls">
            <select name="status" class="form-control">
            <option selected="selected" value="">Select Status </option>
            <option>Active</option>
            <option>Inactive</option>
          </select>
    </div>
    </div> 
    <div class="control-group">

        <div class="controls">
            <input type='submit' value='Save' class="btn btn-primary btn-large " /> 
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
