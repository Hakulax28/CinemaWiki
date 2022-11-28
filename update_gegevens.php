<?php

session_start();

require 'connectie.php';

$id = $_GET["id"]; //17

$sql = "SELECT * FROM users WHERE id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

   $user = mysqli_fetch_assoc($result);

   //var_dump($user);

   if (is_null($user)) {
      header("location: gebruiker_pagina.php");
   }
}

if (isset($_POST["submit"])) {

   $id = $_GET["id"];
   if (
      !empty($_POST["firstname"])
      && !empty($_POST["lastname"])
      && !empty($_POST["email"])
      && !empty($_POST["password"])
      && !empty($_POST["date_of_birth"])
      && !empty($_POST["phonenumber"])

   ) {

      //allemaal moeten ze true zijn
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = trim($_POST["email"]);
      $password = $_POST['password'];
      $dateofbirth = $_POST['date_of_birth'];
      $phonenumber = $_POST['phonenumber'];

      //database connectie
      require 'classes/database.php';
      $sql = "UPDATE users SET 
         firstname = '$firstname', 
         lastname = '$lastname', 
         email = '$email', 
         password = '$password',
         date_of_birth = '$dateofbirth', 
         phonenumber =  '$phonenumber' WHERE id = '$id'  ";

      if (mysqli_query($conn, $sql)) {
         header("location: gebruiker_pagina.php");
      }

      echo "Updated successfully";
      mysqli_close($conn); // Sluit de database verbinding
   }
}

?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1">
   <main class="form-signin w-100 m-auto">
      <form>
         <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
         <h1 class="h3 mb-3 fw-normal">Update jouw gegevens</h1>
         <div class="row g-2">
            <div class="col-md">
               <div class="form-floating">
                  <input type="text" name="firstname" id="floatingInput" class="form-control">
                  <label for="floatingInput">Voornaam: </label>
               </div><br>
               <div class="form-floating">
                  <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">E-mail</label>
               </div><br>
               <div class="form-floating">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Wachtwoord</label>
               </div><br>
               <div class="form-floating">
                  <input type="date" name="date_of_birth" id="floatingInput" class="form-control">
                  <label for="floatingInput">Geboortedatum: </label>
               </div><br>
            </div>
            <div class="col-md">
               <div class="form-floating">
                  <input type="text" name="lastname" id="floatingInput" class="form-control">
                  <label for="floatingInput">Achternaam: </label>
               </div><br>
               <div class="form-floating">
                  <input type="file" id="floatingInput" name="img" accept="image/*" class="form-control"><br>
                  <input type="submit">
                  <label for="floatingInput">Select image: </label>
               </div><br>
               <div class="form-floating">
                  <input type="tel" name="phonenumber" id="floatingInput" class="form-control">
                  <label for="floatingInput">Telefoonnummer: </label>
               </div><br>
            </div>
         </div>
         <button class="w-100 btn btn-lg btn-success shadow" type="submit">Update</button>
         <a href="gebruiker_pagina.php" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a>
         <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
   </main>
</div>


<?php include "footer.php" ?>