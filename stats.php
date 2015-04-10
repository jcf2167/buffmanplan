<?php
session_start();

$goal=$_SESSION['goal'];
$weight=$_SESSION['weight'];
$activitylevel = $_SESSION['activity_level'];
$bodyfat = $_SESSION['body_fat'];
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
	return $_SESSION['weight'] * ($_SESSION['activity_level'] + 10) + $n;
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

?>

<html>

<?php include "header.php" ?>

<body background="img/background.png" >
	<script>
		var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}
			];
			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
			};
	</script>

    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

         		<!--////////INCLUDE NAVIGATION///////-->
                <?php include "navbar.php" ?>

                <!--////////BODY////////-->
                <div class="inner cover" style="background-color:rgba(67, 66, 66, .6)">
                	<br><br><br><br><br><br><br>
                    <h1 class="cover-heading">Welcome 
                    <?php
					echo $_SESSION['email'];
								?>!</h1>
			

					 <table class="table table-condensed">
				    <thead>
				      <tr>

				        <th>Calories</th>
				        <th>Fats</th>
				        <th>Protein</th>
				        <th>Carbs</th>
				      </tr>
				    </thead>

				    <tbody>
				      <tr>

				        <td><?php echo $calories ?></td>
				        <td><?php echo $fat ?> </td>
				        <td><?php echo $protein ?> </td>

				        <td><?php echo $carbs ?></td>
				      </tr>
				   
				    </tbody>
				  </table>
					<?php


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
			$day= array(
				0 => "Monday" , 
				1 =>"Tuesday",
				2 =>"Wednesday",
				3 =>"Thursday",
				4 =>"Friday",
				5 =>"Saturday",
				6 =>"Sunday"

			);
			for($i = 0; $i<7; $i++){
				echo "<h1> ".$day[$i]."</h1>";
				
				$total_calories = 0;
				echo "<h4>B R E A K F A S T</h4>";
				if($constraints!=0)
					$sql = "select * from Food where ".$constraints."=0 and Meal=0 ORDER BY RAND()";
				else
					$sql = "select * from Food where Meal=0 ORDER BY RAND()";

				#echo $sql;

				$result = mysqli_query($conn,$sql);
				$food = array();
				echo '<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Food</th>
				        <th>Carbs</th>
				        <th>Protein</th>
				        <th>Fats</th>
				      </tr>
				    </thead>
				    <tbody>';

				$row = $result->fetch_assoc();
				
				while($row = $result->fetch_assoc()) {
					$food[$row["food_name"]] = $row["calories"];
			
					$totalCalories = $totalCalories +  $row["calories"];
			
					echo "
				      <tr>
				        <td>" . $row["food_name"]."</td>
				        <td>". $row["carbs"]."</td>
				        <td>". $row["protein"]."</td>
				        <td>". $row["fats"]."</td>
				      </tr>
				    ";
				    
 					if(($totalCalories > $calories*.3 ))
					{
							echo "</tbody>
				  			</table>";
				  			echo $totalCalories;
				  			echo $calories;
							$jdn = $calories*.3;
							break;
					}


			}
			echo "<h4>L U N C H</h4>";
			if($constraints!=0)
					$sql = "select * from Food where ".$constraints."=0 and Meal=1 ORDER BY RAND()";
				else
					$sql = "select * from Food where Meal=0 ORDER BY RAND()";
				#echo $sql;
				$result = mysqli_query($conn,$sql);
		
				echo '<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Food</th>
				        <th>Carbs</th>
				        <th>Protein</th>
				        <th>Fats</th>
				      </tr>
				    </thead>
				    <tbody>';
				while($row = $result->fetch_assoc()) {
					$food[$row["food_name"]] = $row["calories"];
			
					$totalCalories = $totalCalories +  $row["calories"];
			
					echo "
				      <tr>
				        <td>" . $row["food_name"]."</td>
				        <td>". $row["carbs"]."</td>
				        <td>". $row["protein"]."</td>
				        <td>". $row["fats"]."</td>
				      </tr>
				    ";
				    
 					if(($totalCalories > $calories*.8 ))
					{
							echo "</tbody>
				  			</table>";
				  			echo $totalCalories;
				  			echo $calories;
							break;
					}


			}
			echo "<h4>D I N N E R</h4>";
			if($constraints!=0)
					$sql = "select * from Food where ".$constraints."=0 and Meal=1 ORDER BY RAND()";
				else
					$sql = "select * from Food where Meal=0 ORDER BY RAND()";
				#echo $sql;
				$result = mysqli_query($conn,$sql);
				$lunch = array();
				echo '<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Food</th>
				        <th>Carbs</th>
				        <th>Protein</th>
				        <th>Fats</th>
				      </tr>
				    </thead>
				    <tbody>';
				while($row = $result->fetch_assoc()) {
					#echo $row["food_name"];
					#var_dump ($food);
					
					
							$food[$row["food_name"]] = $row["calories"];
					
							$totalCalories = $totalCalories +  $row["calories"];
					
							echo "
						      <tr>
						        <td>" . $row["food_name"]."</td>
						        <td>". $row["carbs"]."</td>
						        <td>". $row["protein"]."</td>
						        <td>". $row["fats"]."</td>
						      </tr>
						    ";
						    
		 					if(($totalCalories > $calories ))
							{
									echo "</tbody>
						  			</table>";
						  			#echo $totalCalories;
						  			#echo $calories;
									break;
							}

					
					

			}



		}

	}
	?>

                   
                </div>
            </div>
        </div>

    </div>

    <?php include "footer.php" ?>
</body>

</html>