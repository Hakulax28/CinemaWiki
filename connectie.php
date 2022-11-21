<?php 
// Database configuratie
$host  = "shardserver.nl";
$dbuser = "tj105269_CinemaWiki";
$dbpass = "cinema123";
$dbname = "tj105269_CinemaWiki";

// Maak een  database connectie
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

// Controleer de verbinding
if(mysqli_connect_error())
{
 echo "Connection establishing failed!";
}
else
{
 echo "Connection established successfully.";
}
?>