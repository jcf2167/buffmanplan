<?php
session_start();

$goal=$_SESSION['goal'];
$weight=$_SESSION['weight'];
$activitylevel = $_SESSION['activitylevel'];
$bodyfat = $_POST['bodyfat'];
$calories = 0;
$carbs = 0;
$protein = 0;
$fat = 0;
$constraints = $_SESSION["constraints"];



$constraintsmap = array(
		0 => "None" , 
		1 =>"Vegetarian",
		2 =>"Nuts",
		3 =>"Lactose",
		4 =>"Fish",
		5 =>"Pork",
		6 =>"Beef"

);

$constraints = $constraintsmap[$constraints];

function getCalories($n){
	return $_SESSION['weight'] * ($_SESSION['activitylevel'] + 10) + $n;
}
function getCPF($calories,$n,$g){
	return ($n * $calories)/$g;
}

#maintain
if($goal==0 || $goal==3){
	$calories = getCalories(0);
	$carbs = getCPF($calories, .3,4);
	$protein= getCPF($calories, .4, 4);
	$fat = getCPF($calories, .3, 8);
}

#lose
else if ($goal==1){
	$calories = getCalories(-500);
	$carbs = getCPF($calories, .20,4);
	$protein= getCPF($calories, .50,4);
	$fat = getCPF($calories, .30,8);


}

#gain
else if($goal ==2){
	$calories = getCalories(250);
	$carbs = getCPF($calories, .40,4);
	$protein= getCPF($calories, .40,4);
	$fat = getCPF($calories, .20,8);
}

#bodyBUILD
else {
	$calories = getCalories(500);
	$carbs = getCPF($calories, .40,4);
	$protein= $weight/4;
	$fat = getCPF($calories, .20,8);
}

	$dburl = "cs4111temp.c1xwtu16srrr.us-east-1.rds.amazonaws.com";
	$dbuser = "jcf2167";
	$dbpassword = "mycatisdead";
	$dbname = "cs4111temp";
	$conn = mysqli_connect($dburl,$dbuser,$dbpassword,$dbname);
	if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		} else {

			#echo "success";
			#breakfast
			$sql = "select * from Food where ".$constraints."=0 and Meal=0";
			#echo $sql;
			$result = mysqli_query($conn,$sql);
			$breakfast = array();
			$total_calories = 0;
			while($row = $result->fetch_assoc()) {
				$breakfast[$row["food_name"]] = $row["calories"];
				#echo $breakfast[$row["food_name"]];
				echo "<h2>".$row["food_name"]."</h2>";
				

		    }


	}

?>

<html>

<?php include "header.php" ?>

<body background="img/background.png" background-attachment="fixed">

    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

         		<!--////////INCLUDE NAVIGATION///////-->
                <?php include "navbar.php" ?>

                <!--////////BODY////////-->
                <div class="inner cover" style="background-color:rgba(67, 66, 66, .6)">

                    <h1 class="cover-heading">Welcome 
                    <?php
					echo $_SESSION['constraints'];
					?>!</h1>
					<h4>Total Calories Needed: <?php echo $calories ?> </h4>
					<h4>Total Carbs Needed: <?php echo $carbs ?> </h4> 
					<h4>Total Fats Needed: <?php echo $fat ?> </h4> 
					<h4>Total Protein Needed: <?php echo $protein ?> </h4> 


                    <table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Firstname</th>
				        <th>Lastname</th>
				        <th>Email</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>John</td>
				        <td>Doe</td>
				        <td>john@example.com</td>
				      </tr>
				      <tr>
				        <td>Mary</td>
				        <td>Moe</td>
				        <td>mary@example.com</td>
				      </tr>
				      <tr>
				        <td>July</td>
				        <td>Dooley</td>
				        <td>july@example.com</td>
				      </tr>
				    </tbody>
				  </table>
                </div>
            </div>
        </div>

    </div>

    <?php include "footer.php" ?>
</body>

</html>