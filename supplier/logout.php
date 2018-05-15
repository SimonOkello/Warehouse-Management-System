<?php
session_start();
include('../admin/dbcon.php');
$sql = mysql_query("UPDATE user_log SET logout_date= NOW() WHERE user_id='$session_id'");
$query = mysql_query($sql);
session_destroy();
header('location:../index.php');
?>