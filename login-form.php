<?php
	ini_set('display_errors', 'On');

	// Create connection 
	$dburl = "cs4111.c1xwtu16srrr.us-east-1.rds.amazonaws.com";
	$dbuser = "jcf2167";
	$dbpassword = "mycatisdead";
	$dbname = "cs4111";
	$conn = mysqli_connect('cs4111.c1xwtu16srrr.us-east-1.rds.amazonaws.com','jcf2167','mycatisdead','cs4111');

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else {
		$result = mysqli_query($conn, "SHOW TABLES");

		while($row = mysqli_fetch_array($result)) {
			echo $row[0];
			echo "<br>";
		}

		mysqli_close($conn);
	}
?>