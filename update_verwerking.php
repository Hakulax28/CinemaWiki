<?php

if (isset($_POST["submit"])) {

   $id = $_GET["user_id"];
   echo $id;

   if (
      !empty($_POST["firstname"])
      || !empty($_POST["lastname"])
      && !empty($_POST["email"])
      && !empty($_POST["password"])
      && !empty($_POST["date_of_birth"])
      && !empty($_POST["phonenumber"])
      && !empty($_POST["role"])

   ) {

      //allemaal moeten ze true zijn
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = trim($_POST["email"]);
      $password = $_POST['password'];
      $dateofbirth = $_POST['date_of_birth'];
      $phonenumber = $_POST['phonenumber'];
      $role = $_POST['role'];

      //database connectie
      require 'connectie.php';
      $sql = "UPDATE users SET
      firstname = '$firstname',
      lastname = '$lastname',
      email = '$email',
      password = '$password',
      date_of_birth = '$dateofbirth',
      phonenumber = '$phonenumber',
      role = '$role' WHERE user_id = '$id' ";

      if (mysqli_query($conn, $sql)) {
         var_dump($id);
         die;
         header("location: gebruiker_pagina.php");
      }

      echo "Updated successfully";
      mysqli_close($conn); // Sluit de database verbinding
   }
}
