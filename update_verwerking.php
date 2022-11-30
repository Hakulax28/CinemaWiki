<?php

if (isset($_POST["submit"])) {

   $id = $_GET["user_id"];

   if (
      !empty($_POST["firstname"])
      && !empty($_POST["lastname"])
      && !empty($_POST["email"])
      && !empty($_POST["password"])
      && !empty($_POST["date_of_birth"])
      && !empty($_POST["phonenumber"])
      && !empty($_POST["role"])

   ) {
      //allemaal moeten ze true zijn
      $voornaam = $_POST["firstname"];
      $achternaam = $_POST["lastname"];
      $email = trim($_POST["email"]);
      $wachtwoord = $_POST["password"];
      $geboortedatum = $_POST["date_of_birth"];
      $telefoonnummer = $_POST["phonenumber"];
      $rol = $_POST["role"];

      //database connectie

      require 'connectie.php';

      $sql = "UPDATE users SET 
      firstname = '$voornaam', 
      lastname = '$achternaam', 
      email = '$email', 
      password = '$wachtwoord',
      date_of_birth = '$geboortedatum', 
      phonenumber =  '$telefoonnummer',
      role = '$rol' WHERE users.user_id = '$id'  ";

      // Voer de INSERT INTO STATEMENT uit

      if (mysqli_query($conn, $sql)) {
         header("location: index.php");
      }

      echo "Updated successfully";
      mysqli_close($conn); // Sluit de database verbinding

   }
}
