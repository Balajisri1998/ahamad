<!DOCTYPE html>
<html>
  <head>
    <title>Auto Forecasting</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom-style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
  </head>
  <body>
    <div class="wrapper fadeInDown text-center">
      <h3 class="fadeIn first color" style="color: #747577">WELCOME TO AUTOFORECAST</h3>
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Login Form -->
        <form action="login.php" method="POST">
          <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
          <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
       <!--  <div id="formFooter">
          <a class="underlineHover" href="#">Forgot Password?</a>
        </div> -->
        <div style="color: red">
          <?php
            if(isset($_GET['msg'])) 
            {
              echo $_GET['msg'];
            }
          ?>
        </div>
      </div>
      <a href="index.php">HOME</a>
    </div>
  </body>
</html>
