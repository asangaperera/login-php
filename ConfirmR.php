<?php
include ("includes/mysqli_connection.php");


$Uname = mysqli_real_escape_string($db_conx,$_POST['Username']);
$Pass = mysqli_real_escape_string($db_conx,$_POST['pw1']);
$Email = mysqli_real_escape_string($db_conx,$_POST['Email']);



	// This first query is just to get the total count of rows
	$sql = "SELECT COUNT(*) FROM users WHERE email LIKE '$Uname'";
	
	$query = mysqli_query($db_conx, $sql);

	$row = mysqli_fetch_row($query);
	
	// Here we have the total row count
	$rows = $row[0];

	if($rows == 0)
	{	
		$insertSQL = "INSERT INTO users (username,email,password,ac_type, status) VALUES ('$Uname', '$Email','$Pass','user', '1')";
			
		mysqli_query($db_conx, $insertSQL);
		
		if($insertSQL)
		{
			echo "<script>alert('Successfully Added!')</script>";
			echo "<br />Redirecting to Home Page...";
			echo "<script>alert('Login on Main Page!')</script>";
			
			if(!isset($_SESSION['username']))
			{
				$_SESSION['username'] = $Uname;
			}
			
			else
			{
				$_SESSION['username'] = "";
			}
			
			//echo "<br />Welcome: <b>" . $_SESSION['username'] . "</b><br />" ;
			 echo "<script>window.location.href='login.php'</script>"; 
        }
        else
		{
            echo "<script>alert('An error occured while uploading the entry to database. Please try again later.')</script>";
        }
	}
	
	else
	{
		echo "<font color='red'>Sorry This username already exists!</font>";
		echo "<script>alert('You will be redirected to Home Page')</script>";
   		echo "<script>window.location.href='login.php'</script>";
	}
	
	//Close your database connection
	mysqli_close($db_conx); 
?>