<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$category=$_POST['category'];
		/* user */
		if ($category=="admin") {
		
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			
		if( $row > 0 ) { 
				$_SESSION['id']=$row['user_id'];
				$_SESSION['username']=$username;

				$userId=$_SESSION['id'];
				$user=$_SESSION['username'];
				$sql = "INSERT INTO `user_log` (`user_id`,`username`,`login_date`) VALUES ('$userId','$user', NOW())";
				$query = mysql_query($sql);
            header("Location:administrator/dasboard.php");
        }else{
        	echo "<script type='text/javascript'>alert('Username/Password Incorrect.Try again'); window.location.href='index.php'</script>";
        }
        }
        elseif($category=="supplier") {
		
			$query = "SELECT * FROM suppliers WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			
		if( $row > 0 ) { 
				$_SESSION['id']=$row['user_id'];
				$_SESSION['username']=$username;

				$userId=$_SESSION['id'];
				$user=$_SESSION['username'];
				$sql = "INSERT INTO `user_log` (`user_id`,`username`,`login_date`) VALUES ('$userId','$user', NOW())";
				$query = mysql_query($sql);
            header("Location:supplier/dasboard.php");
        }else{
        	echo "<script type='text/javascript'>alert('Username/Password Incorrect.Try again'); window.location.href='index.php'</script>";
        }
        }elseif($category=="customer") {
		
			$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			
		if( $row > 0 ) { 
				$_SESSION['id']=$row['user_id'];
				$_SESSION['username']=$username;

				$userId=$_SESSION['id'];
				$user=$_SESSION['username'];
				$sql = "INSERT INTO `user_log` (`user_id`,`username`,`login_date`) VALUES ('$userId','$user', NOW())";
				$query = mysql_query($sql);
            header("Location:customer/dasboard.php");
        }else{
        	echo "<script type='text/javascript'>alert('Username/Password Incorrect.Try again'); window.location.href='index.php'</script>";
        }
        }elseif($category=="employee") {
		
			$query = "SELECT * FROM employees WHERE username='$username' AND password='$password'";
			$result = mysql_query($query)or die(mysql_error());
			$row = mysql_fetch_array($result);
			
		if( $row > 0 ) { 
				$_SESSION['id']=$row['user_id'];
				$_SESSION['username']=$username;

				$userId=$_SESSION['id'];
				$user=$_SESSION['username'];
				$sql = "INSERT INTO `user_log` (`user_id`,`username`,`login_date`) VALUES ('$userId','$user', NOW())";
				$query = mysql_query($sql);
            header("Location:employee/dasboard.php");
        }else{
        	echo "<script type='text/javascript'>alert('Username/Password Incorrect.Try again'); window.location.href='index.php'</script>";
        }
        }
		?>