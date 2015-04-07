<?php
session_start();
?>

<html>
<?php include "header.php" ?>

<body background="img/background.png">


    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

         		<!--////////INCLUDE NAVIGATION///////-->
                <?php include "navbar.php" ?>

                <!--////////BODY////////-->
                <div class="inner cover" style="background-color:rgba(67, 66, 66, .6)">

                    <h1 class="cover-heading">Welcome 
                    <?php
					echo $_SESSION['email'];
					?>!</h1>

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