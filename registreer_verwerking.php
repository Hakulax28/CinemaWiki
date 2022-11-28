<?php
if (isset($_POST["submit"])) {

   if (
      !empty($_POST["firstname"])
      && !empty($_POST["lastname"])
      && !empty($_POST["email"])
      && !empty($_POST["password"])
      && !empty($_POST["date_of_birth"])
      && !empty($_POST["phonenumber"])
      && !empty($_POST["role"])

   ) {
      // als op registreer wordt gedrukt 
      if (isset($_POST['submit'])) {

         $firstname = $_POST['firstname'];
         $lastname = $_POST['lastname'];
         $email = trim($_POST["email"]);
         $password = $_POST['password'];
         $dateofbirth = $_POST['date_of_birth'];
         $phonenumber = $_POST['phonenumber'];
         $role = $_POST['role'];

         //database connectie

         require 'connectie.php';
         $sql = "INSERT INTO users (firstname, lastname, email, password, date_of_birth, phonenumber, role)
                VALUES ('$firstname', '$lastname', '$email', '$password', '$dateofbirth', '$phonenumber', '$role')";

         // Voer de INSERT INTO STATEMENT uit
         if (mysqli_query($conn, $sql)) {
            var_dump($_POST);
            die;
            header("location: inloggen.php");
         }
         mysqli_close($conn); // Sluit de database verbinding
      }
   }
}
