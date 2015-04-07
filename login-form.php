<?php
	ini_set('display_errors', 'On');


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

		$sql="select * from user where user.password='".$password."' and user.email='aaa".$email."'";

		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0)
		{ 
	
			$row=mysqli_fetch_array($result);
			$user=$row[0];

			echo $user;
		}
		else{
			echo "dead ";
		}
		
	}
	
	
?>
