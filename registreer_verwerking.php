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

         if(isset($_FILES['profielFoto'])){
            move_uploaded_file($_FILES['profielFoto']['tmp_name'], "images/profielfotos/". $_FILES['profielFoto']['name']);
            $profilePicture = "images/profielfotos/". $_FILES['profielFoto']['name'];
          }
          else{
              echo "image not found!";
          }

         //database connectie

         require 'connectie.php';
         $sql = "INSERT INTO users (firstname, lastname, email, password, date_of_birth, phonenumber, role , profilePicture)
                VALUES ('$firstname', '$lastname', '$email', '$password', '$dateofbirth', '$phonenumber', '$role','$profilePicture')";

         // Voer de INSERT INTO STATEMENT uit
         if (mysqli_query($conn, $sql)) {
            header("location: inloggen.php");
         }
         mysqli_close($conn); // Sluit de database verbinding
      }
   }
}
