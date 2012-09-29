<?php
include("dbinfo.php");

$street = utf8_decode($_GET["street"]);
$postcode = utf8_decode($_GET["postcode"]);

$userid = utf8_decode($_GET["userid"]);
$name = utf8_decode($_GET["name"]);
$email = utf8_decode($_GET["email"]);
$deliver_flag = utf8_decode($_GET["deliver_flag"]);
$provide_flag = utf8_decode($_GET["provide_flag"]);

//Geocode 

$address = $street." ".$postcode." canada";


$base_url = "http://maps.google.com/maps/api/geocode/json?language=en&region=ca&sensor=false";
// Anfrage URL
$request_url = $base_url."&address=".urlencode($address);
// Anfrage an Geocode-Server schicken
$json = file_get_contents($request_url) or die("url not loading");
// Resultat in Array umwandeln
$result = json_decode($json,true);

$status = $result['status'];

if (strcmp($status, "OK") == 0) {
   // Successful geocode
   $lat_address = $result['results']['0']['geometry']['location']['lat'];
	 $lng_address = $result['results']['0']['geometry']['location']['lng'];
   
	 $vaddress = utf8_decode(preg_replace('/,/', '<br>', $result['results']['0']['formatted_address']));
   
	 $fault = FALSE;
   
	 if (!isset($lat)) {
      $lat = $lat_address;
      $lng = $lng_address;
   }
}
else {
   // failure to geocode
   $fault = TRUE;
   if (!isset($lat)) {
      $lat = 49.2779;
      $lng = -123.113;
   }
}


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
$sql = "INSERT INTO `composte`.`users` (`userID`, `name`, `firstname`, `email`, `lat`, `lng`, `provide_flag`, `deliver_flag`) VALUES (".$userid.", '".$name."', '".$firstname."', '".$email."', ".$lat.", ".$lng.", '".$provide_flag."', '".$deliver_flag."');";
$result = mysql_query($sql);

$num_results = mysql_affected_rows($connection);
mysql_close ($connection);

header('Location: homepage.html?userid='.$userid);

?>