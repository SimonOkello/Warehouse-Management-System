 <?php
 include('admin/dbcon.php');
 include('session.php');
 $new_password  = $_POST['new_password'];
 mysql_query("update suppliers set password = '$new_password' where user_id = '$session_id'")or die(mysql_error());
 ?>