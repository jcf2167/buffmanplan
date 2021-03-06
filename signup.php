
<html>
<?php include "header.php" ?>
<!-- Custom styles for this template -->
    <link href="static/signin.css" rel="stylesheet">
<body background="img/background.png">


    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

         		<!--////////INCLUDE NAVIGATION///////-->
                <?php include "navbar.php" ?>


                <!--////////BODY////////-->
               <form class="form-signin" action="signup-form.php" method="post">
					</br></br></br></br>
					<label for="email" >Email address</label>
					<input type="text" name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
					
					<label  for="inputPassword">Password</label>
					<input type="text" name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				
		            <label for="gender">Gender</label>
		            <select class="form-control" name="gender">
		                <option value="f">F</option>
		                <option value="m">M</option>
		            </select>
		      

		            <label for="Goal"> Goal </label>
		            <select class="form-control" name="goal">
		            	<option value="Maintain">Maintain</option>
		            	<option value="Lose">Lose Weight</option>
		         		<option value="Gain">Gain Weight</option>
		         		<option value="Physique">Physique</option>
		            	<option value="Building">Body Building</option>
		            </select>

		            <label for="restrictions"> Dietary Restrictions </label>
		            <select class="form-control" name="restrictions">
		            	<option value="None">None</option>
		         		<option value="Vegetarian">Vegetarian</option>
		         		<option value="NoNuts">No Nuts</option>
		            	<option value="Lactose">Lactose</option>
		            	<option value="NoFish">No Fish</option>
						<option value="NoPork">No Pork</option>
						<option value="NoBeef">No Beef</option>

		            </select>

		            <label for="height" >Height (cm)</label>
					<input type="number" name="height"class="form-control" placeholder="Height" required autofocus>

		            <label for="weight" >Weight (lb)</label>
					<input type="number" name="weight"class="form-control" placeholder="Weight" required autofocus>

					<label for="activitylevel">Activity Level (1-10)</label>
			        <?php
					echo "<select class='form-control' name='activitylevel'>";
					for ($h = 1; $h <= 10; $h++) {
						echo "<option value='$h'>$h</option>";
					}
					echo "</select>";
					?>

					<label for="bodyfat	"> Body Fat (%)</label>
					<input type="number" name="bodyfat"class="form-control" placeholder="Body Fat" required autofocus>

					<label for="exercisefreq" >Exercise Frequency (1-10)</label>
					<?php
					echo "<select class='form-control' name='exercisefreq'>";
					for ($h = 1; $h <= 10; $h++) echo "<option value='$h'>$h</option>";
					echo "</select>";
					?>
					</br>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>

            </div>
        </div>

    </div>

    <?php include "footer.php" ?>
</body>

