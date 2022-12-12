<?php

require 'connectie.php';

session_start();

$_SESSION["temp_data"]["message"] = null;

if (empty($_POST["email"]) && empty($_POST["password"])) {
   header("location: inloggen.php");
}

$id = $_POST["user_id"];
$email = $_POST["email"];
$password = $_POST["password"];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM users WHERE email = '$email' ";

$result = mysqli_query($conn, $sql);
//var_dump(mysqli_num_rows($result));die;

if ($result) {
   $user = mysqli_fetch_assoc($result);

   if (is_null($user && password_verify($password, $user['password']))) {
      //gebruiker onbekend
      header("location: inloggen.php");
      echo "Gebruiker_Onbekend";
      var_dump($user);
      die;
   } else {

      //hier kent het de gebruiker
      $_SESSION["user_id"] = $user["user_id"];
      $_SESSION["email"] = $user["email"];
      $_SESSION["is_logged_in"] = true;
      $_SESSION["role"] = $user["role"];

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
