<div class="span3" id="sidebar">
	<?php $query= mysql_query("select * from suppliers where user_id = '$session_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									
							?>

	<img id="avatar" src="admin/uploads/<?php $image=$row['image']; echo $image; ?>" class="img-polaroid">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class=""><a href="dasboard.php"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
				<li class=""><a href="supplies.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;SUPPLIES</a></li>
				<!--<li class=""><a href="sell.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;SELL</a></li>
				<li class=""><a href="employee.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;EMPLOYEES</a></li>
				<li class=""><a href="report.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;REPORTS</a></li>
				<li class=""><a href="message.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;MESSAGES</a></li>
				<li class=""><a href="kcc_notification.php<?php //echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;NOTIFICATION</a></li>-->
				
		</ul>
</div>