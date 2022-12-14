<?php

require 'connectie.php';

session_start();



if (empty($_POST["email"]) && empty($_POST["password"])) {
   header("location: inloggen.php");
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
   
   
   $email = $_POST["email"];
   $password = $_POST["password"];
   
   $sql = "SELECT * FROM users WHERE email = '$email' ";
   
   $result = mysqli_query($conn, $sql);
   //var_dump(mysqli_num_rows($result));die;
   
   if (mysqli_num_rows($result) > 0) {
      
     
      $user = mysqli_fetch_assoc($result);

      if ($user['password']  === $password) {
         //hier kent het de gebruiker en het wachtwoord
         $_SESSION["user_id"] = $user["user_id"];
         $_SESSION["email"] = $user["email"];
         $_SESSION["is_logged_in"] = true;
         $_SESSION["role"] = $user["role"];
         $_SESSION["profilePicture"] = $user["profilePicture"];

   
         //Hier bekijkt hij of degene die heeft ingelogd een klant of medewerker is.
         if ($_SESSION["role"] == "beheerder") {
            echo "U kan nu alles doen";
            header("location: index.php");
            exit;
         } else if ($_SESSION["role"] == "gebruiker") {
            echo "U kan alleen de website zelf bekijken";
            header("location: index.php");
            exit;
         }
      } 
      
   }

   $_SESSION['error_message'] = "Deze gegevens zijn onbekend!";
   header("location: inloggen.php");
}
