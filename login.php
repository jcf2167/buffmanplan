
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
               <form class="form-signin" action="login-form.php" method="post">
            
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label name="password" for="inputPassword" class="sr-only">Password</label>
            <input type="text" name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        
        </br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login!</button>
        </form>

            </div>
        </div>

    </div>

    <?php include "footer.php" ?>
</body>

