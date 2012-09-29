<?php
	$userid = utf8_decode($_GET["user_id"]);
	//echo "hallo";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

    <h1>Signup</h1>
    
    <form class="form-horizontal" action="adduser.php">
    	<input type="hidden" name="userid" value="<?php echo $userid; ?>">
      <legend>Contributions</legend>
      <div class="control-group">
        <div class="controls">
          <label class="radio">
            <input type="radio" name="flag" id="optionsRadios1" value="a" checked>
            Provide Compost
          </label>
          <label class="radio">
            <input type="radio" name="flag" id="optionsRadios2" value="b">
            Receive Compost
          </label>
        </div>
      </div>
      <legend>Type</legend>
      <div class="control-group">
        <div class="controls">
          <label class="radio">
            <input type="radio" name="flag" id="optionsRadios1" value="c" checked>
            Deliver
          </label>
          <label class="radio">
            <input type="radio" name="flag" id="optionsRadios2" value="d">
            Pickup
          </label>
        </div>
      </div>
      <legend>Details</legend>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
          <input type="text" id="inputEmail" placeholder="Email" name="email">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputStreetName">Street Name/Number</label>
        <div class="controls">
          <input type="text" id="inputStreetName" name="street" placeholder="StreetName">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPostcode">Postcode</label>
        <div class="controls">
          <input type="text" id="inputPostcode" placeholder="Postcode" name="postcode">
        </div>
      </div>
      <button type="submit" class="btn">Save</button>
    </form>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </body>
</html>
