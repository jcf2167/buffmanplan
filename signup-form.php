<?php if (!isset($_SESSION)) {
  session_start();
}
ob_start();
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
		$goal = $_POST["goal"];
		$gender = $_POST["gender"];
		$restrictions = $_POST["restrictions"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$activitylevel = $_POST["activitylevel"];
		echo $activitylevel;
		echo "_____";
		$bodyfat = $_POST["bodyfat"];
		$exercisefreq = $_POST["exercisefreq"];

		$sql=sprintf("INSERT INTO `cs4111temp`.`user` (`email`, `password`, `activity_level`, `height`, `gender`, `weight`, `exercise_frequency`, `body_fat`) VALUES ('%s', '%s', '%d', '%d', '%s', '%d', '%d', '%d');", $email, $password, $activitylevel, $height, $gender, $weight, $exercisefreq, $bodyfat);


		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            $_SESSION['activity_level']=$activitylevel;
            $_SESSION['height']=$height;
            $_SESSION['gender']=$gender;
            $_SESSION['weight']=$weight;
            $_SESSION['exercise_frequency']=$exercisefreq;
            $_SESSION['body_fat']=$bodyfat;
            header("Location:stats.php");

		    
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}
	
	
?>