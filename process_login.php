<?php

require 'connectie.php';

session_start();

$_SESSION["temp_data"]["message"] = null;

if (empty($_POST["email"]) && empty($_POST["password"])) {
   header("location: inloggen.php");
}

$id = $_POST["id"];
$email = $_POST["email"];
$password = $_POST["password"];
$rol = $_POST["role"];

$sql = "SELECT * FROM users WHERE email = '$email' ";

$result = mysqli_query($conn, $sql);
//var_dump(mysqli_num_rows($result));die;

if ($result) {
   $conn = mysqli_fetch_assoc($result);

   if (is_null($user)) {
      //gebruiker onbekend
      header("location: inloggen.php");
      //var_dump($user);
      //die;
   } else {

      //hier kent het de gebruiker

      $_SESSION["email"] = $_POST["email"];
      $_SESSION["is_logged_in"] = true;
      $_SESSION["role"] = $_POST["role"];
      $_SESSION["user_id"] = $_POST["user_id"];

      var_dump($_SESSION);
      //Hier bekijkt hij of degene die heeft ingelogd een klant of medewerker is.
      if ($_SESSION["role"] == "beheerder") {
         echo "U kan nu alles doen";
         header("location: index.php");
      } else if ($_SESSION["role"] == "gebruiker") {
         echo "U kan alleen de website zelf bekijken";
         header("location: index.php");
      }
   }
}
