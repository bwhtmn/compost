<?php
include("dbinfo.php");

$userid = utf8_decode($_GET["userid"]);
$name = utf8_decode($_GET["name"]);
$name = utf8_decode($_GET["firstname"]);
$name = utf8_decode($_GET["email"]);
$name = utf8_decode($_GET["lat"]);
$name = utf8_decode($_GET["lng"]);
$name = utf8_decode($_GET["flag"]);


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

//SQL Anlage
$sql = "INSERT INTO `composte`.`users` (`userID`, `name`, `firstname`, `email`, `lat`, `lng`, `flag`) VALUES ($userid, $name, $firstname, $email, $lat, $lng, $flag);";
$result = mysql_query($sql);

$num_results = mysql_affected_rows($connection);
mysql_close ($connection);

if ($num_results > 0) {
	echo '{"exists": "yes"}';
} else {
	echo '{"exists": "no"}';
}

?>