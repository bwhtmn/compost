<?php
include("dbinfo.php");

$userid = utf8_decode($_GET["userid"]);

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
$sql = "Select userID From users where userID = ".$userid;
$result = mysql_query($sql);

$num_results = mysql_affected_rows($connection);
mysql_close ($connection);

if ($num_results > 0) {
	echo '{"exists": "yes"}';
} else {
	echo '{"exists": "no"}';
}

?>