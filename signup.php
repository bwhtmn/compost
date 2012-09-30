<?php
	$userid = utf8_decode($_GET["user_id"]);
	//echo "hallo";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>We Compost : Compost Matchmakers | Sign Up</title>
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
  <script>
    var user_id;
    var prmstr = window.location.search.substr(1);
    var prmarr = prmstr.split ("&");
    var params = {};

    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        user_id = tmparr[1];
    }

  </script>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar">About</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          

            <ul class="nav">
              <li>
                <img class="header-img" src="assets/img/logo.jpg"/>
              </li>
              <li class="right">
                <a href="about.html">About</a>
              </li>
            </ul>
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
            <input type="radio" name="provide_flag" id="optionsRadios1" value="p" checked>
            Provide Compost
          </label>
          <label class="radio">
            <input type="radio" name="provide_flag" id="optionsRadios2" value="r">
            Receive Compost
          </label>
        </div>
      </div>
      <legend>Type</legend>
      <div class="control-group">
        <div class="controls">
          <label class="radio">
            <input type="radio" name="deliver_flag" id="optionsRadios3" value="d" checked>
            <!-- IF provider -->
            Deliver: I am willing to <i><b>deliver</b></i> my compost / 
            <!-- IF receiver -->
            I would like compost <i><b>delivered</b></i> to me
          </label>
          <label class="radio">
            <input type="radio" name="deliver_flag" id="optionsRadios4" value="p">
            <!-- IF provider -->
            Pick Up: I would like my compost <i><b>picked up</b></i> / 
            <!-- IF receiver -->
            I am willing to <i><b>pick up</b></i> compost
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
