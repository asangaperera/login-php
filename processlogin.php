<?php
session_start();
include ("includes/mysqli_connection.php");

//$msg = "";
$form_user = $_POST['txtusername'];
$form_password = $_POST['txtpassword'];

	if($form_user  == "" || $form_password == "")
	{
		echo '<script>alert("Please Fill up all fields!");</script>';
		echo "<script>window.location.href='default.php';</script>";	
		exit;
	}
	
	//Store values in the tblChatUsers
	// $dbconnect = new DbConnect();
	// $dbconnect->open();
	
	$sql = "SELECT user_id, username, password, ac_type, status FROM `users` WHERE username = '$form_user' AND password = '$form_password';";
			
	$query = mysqli_query($db_conx, $sql);

	$row = mysqli_fetch_row($query);

	// var_dump($row);
	// die();
	
	$numrecs = $row ? 1 : 0;
	
	//instantiate object of query class
	// $dbquery = new DbQuery($sql);
	// $result = $dbquery->query();
	// $numrecs=$dbquery->numrows();
	$user_id = $row[0];
	$username = $row[1];
	$pass = $row[2];
	$ac_type = $row[3];
	$status = $row[4];
	
	if(($status == "0") AND ($ac_type == "Administrator"))
	{
		$_SESSION['status'] = "admin";
		
		echo "<script>alert('Welcome Back Webmaster Redirecting to personal home page')</script>";
		echo "<script>window.location.href='admin/index.php';</script>";
	}
	
	else if(($status == "1") AND ($ac_type == "user"))
	{
		$user_id = $row[0];
		$username = $row[1];
		echo "<script>alert('Welcome Back')</script>";
		echo "<script>window.location.href='index.php';</script>";
	}
	
	
	
	else
	{
		echo "<script>window.location.href='index.php';</script>";
	}
	
	mysqli_close($db_conx); 
	
	
	if($numrecs==0)
	{
		echo '<script>alert("username and/or password not found! \n\n Signup or Login again");</script>';
		session_unset();
		session_destroy();
		 echo "<script>window.location.href='default.php';</script>";
		//exit;
	}
	else
	{
		//store login information to trace user
		$_SESSION['username'] = $form_user;
		$User = $_SESSION['username'];
		$_SESSION['user_id'] = $user_id;
		$user_id = $_SESSION['user_id'];
		//$status = $_SESSION['status'];
		
		$_SESSION['code'] = rand();
	
		//echo "<script>parent.reloadUsers();</script>";
		echo "<script>window.location.href='index.php';</script>";
		//exit;
	}
		
	//instantiate object of query class
	// $dbquery = new DbQuery($sql);
	// $dbquery->query();
	// $dbquery->freeresult();
	// $dbquery->close();
