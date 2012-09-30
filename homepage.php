<?php
include("dbinfo.php");

$userid = utf8_decode($_GET["userid"]);
$deliver_flag = utf8_decode($_GET["deliver_flag"]);
$provide_flag = utf8_decode($_GET["provide_flag"]);
$lat = utf8_decode($_GET["lat"]);
$lng = utf8_decode($_GET["lng"]);

// Opens a connection to a mySQL server
$connection = mysql_connect ($host, $username, $password);
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}

if ($provide_flag == 'p') {
	$sql = "Select userid, email, ( 6371 * acos( cos( radians(".$lat.") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$lng.") ) + sin( radians(".$lat.") ) * sin( radians( lat ) ) ) ) AS distance From users Where provide_flag = 'r' AND deliver_flag = '".$deliver_flag."' ORDER BY distance ASC";
} else {
	$sql = "Select userid, email, ( 6371 * acos( cos( radians(".$lat.") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$lng.") ) + sin( radians(".$lat.") ) * sin( radians( lat ) ) ) ) AS distance From users	Where provide_flag = 'p' AND deliver_flag = '".$deliver_flag."' ORDER BY distance ASC";
}

$result = mysql_query($sql);

$num_rows = mysql_affected_rows($connection);
mysql_close ($connection);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>We Compost : Compost Matchmakers</title>
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
    <script type="text/javascript">
    
    var results = new Array();
    
    <?php
    $i = 0;
    if ($num_rows<>0) {
		// Iterate through the rows, adding JSON nodes for each
		while ($row = @mysql_fetch_assoc($result)){
			echo "results[".$i."] = new Array();\n";
			echo "results[".$i."][0] = ".utf8_encode($row['userid']).";\n";
			echo "results[".$i."][1] = '".utf8_encode($row['email'])."';\n";
			echo "results[".$i."][2] = ".utf8_encode($row['distance']).";\n";
			
		
			$i++;	
		}
	  
	}
    
    ?>
	
	
	</script>
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

      <h1>Homepage</h1>
      <?php //echo $sql; ?>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </body>
</html>
