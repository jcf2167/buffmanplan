<?php
	ini_set('display_errors', 'On');=

	//create connection
	
	$dburl = "cs4111temp.c1xwtu16srrr.us-east-1.rds.amazonaws.com";
	$dbuser = "jcf2167";
	$dbpassword = "mycatisdead";
	$dbname = "cs4111temp";

	$conn = mysqli_connect($dburl,$dbuser,$dbpassword,$dbname);

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else {
		$email=$_POST["email"];
		$password=$_POST["password"];
		$goal = $_POST["goal"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$bodyfat = $_POST["bodyfat"];
		$


		$sql="select * from user where user.password='".$password."' and user.email='".$email."'";

		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0)
		{ 

			
			$row=mysqli_fetch_array($result);
			session_start();
			$_SESSION['email']=$email;
			$_SESSION['password']=$password;
			$_SESSION['activity_level']=$row['activity_level'];	
			$_SESSION['height']=$row['height'];
			$_SESSION['gender']=$row['gender'];
			$_SESSION['weight']=$row['weight'];
			$_SESSION['exercise_frequency']=$row['exercise_frequency'];
			$_SESSION['body_fat']=$row['body_fat'];

			header("Location:stats.php");


	
		}
		else{
			 include "bad-login.php";
		}
		
	}
	
	
?>
