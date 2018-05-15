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
								<li><a href="#">Employees: </a></li>
						</ul>
						 <!-- end breadcrumb -->
                         
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                    <?php
if(isset($_GET['delete'] , $_GET['id'])){
$employee_id = (int) $_GET['id']; 
mysql_query("DELETE FROM `employees` WHERE `employee_id` = '$employee_id' ") ; 
echo (mysql_affected_rows()) ? "Employee terminated.<br /> " : "Nothing terminated.<br /> ";
}
?> 
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<a class="btn  btn-primary" href="#AddEmployee.php"><i class="icon-plus icon-white"></i>Add Employee</a><br/><br/>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
                <th>ID</th>
                <th> Username</th>
                <th>Employee Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>ACTION</th>
        </thead>
    <tbody>
        <?php if(isset($_SESSION['id'])){ 
                    
                           $query= mysql_query("select * from admin where user_id = '$session_id'")or die(mysql_error());
                                    $row = mysql_fetch_array($query);
                                    $fname=$row['firstname'];
                                    $sname=$row['lastname'];
                                }
                            ?>
  <?php

$query = mysql_query("SELECT * FROM employees ")or die(mysql_error());
//$i=0;
 while($row = mysql_fetch_array($query)){
//$i+=1;
    echo '<tr>';
        //echo '<td>'.$i.'</td>';
       echo '<td>'.$row['user_id'].'</td>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['firstname']." ".$row['lastname'].'</td>';
        echo '<td>'.$row['phone'].'</td>';
        echo '<td>'.$row['address'].'</td>';
        
         
             echo '<td  style="text-align: center">
                <a href=EditEmployee.php?edit=1&id=' . $row['user_id'] . ' class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href=?delete=1&id=' . $row['user_id'] . ' class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
         

    echo '</tr>';
}
?>

</tbody>
</table>
<form>
    <input type="hidden" name="employee_id" value="<?php echo $row['employee_id'];?>" />
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
