<?php
error_reporting(1);
include('config.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>:: STELLA BLANKETS ::</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body style="background-color: aliceblue;">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="container" style="width: 30%;">
      <form class="form-signin" role="form" method="post" action="login-exec.php">
        <center><img src="../images/logos/logo300.png" style="width: 200px;"></center><br/>
        <input type="text" name="login" class="form-control" placeholder="Username"  autofocus  /><br/>
        <input type="password" name="password" class="form-control" placeholder="Password"  ><br/>
   <br/>
		Enter Code : <img src="captcha.php"><input type="text" name="vercode" class="form-control" style="width: 113px;display: inline-block;margin-bottom: 10px;margin-left: 10px;"  /><br/>
	    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
	  <hr>
      <footer>
        <p>&copy; STELLA BLANKETS  <?php echo date('Y'); ?></p>
      </footer>
    </div> <!-- /container -->        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
