<?php

session_start();

require 'connectie.php';

$id = $_GET["user_id"]; //17

$sql = "SELECT * FROM users WHERE user_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

   $user = mysqli_fetch_assoc($result);

   var_dump($user);

   if (is_null($user)) {
      header("location: gebruiker_pagina.php");
   }
}
?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1">
   <main class="form-signin w-100 m-auto">
      <form action="update_verwerking.php?user_id=<?php echo $id; ?>" method="post">
         <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
         <h1 class="h3 mb-3 fw-normal">Update jouw gegevens</h1>
         <div class="row g-2">
            <div class="col-md">
               <div class="form-floating">
                  <input type="text" name="firstname" id="floatingInput" value="<?php echo $user["firstname"] ?>" class="form-control">
                  <label for="floatingInput">Voornaam: </label>
               </div><br>
               <div class="form-floating">
                  <input type="email" class="form-control" name="email" id="floatingInput" value="<?php echo $user["email"] ?>" placeholder="name@example.com">
                  <label for="floatingInput">E-mail</label>
               </div><br>
               <div class="form-floating">
                  <input type="password" class="form-control" name="password" id="floatingPassword" value="<?php echo $user["password"] ?>" placeholder="Password">
                  <label for="floatingPassword">Wachtwoord</label>
               </div><br>
               <div class="form-floating">
                  <input type="date" name="date_of_birth" id="floatingInput" value="<?php echo $user["date_of_birth"] ?>" class="form-control">
                  <label for="floatingInput">Geboortedatum: </label>
               </div><br>
            </div>
            <div class="col-md">
               <div class="form-floating">
                  <input type="text" name="lastname" id="floatingInput" value="<?php echo $user["lastname"] ?>" class="form-control">
                  <label for="floatingInput">Achternaam: </label>
               </div><br>
               <div class="form-floating">
                  <input type="file" id="floatingInput" name="img" accept="image/*" class="form-control"><br>
                  <label for="floatingInput">Select image: </label>
               </div>
               <div class="form-floating">
                  <input type="tel" name="phonenumber" id="floatingInput" value="<?php echo $user["phonenumber"] ?>" class="form-control">
                  <label for="floatingInput">Telefoonnummer: </label>
               </div><br>
               <div class="form-floating">
                  <input type="text" name="role" id="floatingInput" value="<?php echo $user["role"] ?>" class="form-control">
                  <label for="floatingInput">Rol: </label>
               </div><br>
            </div>
         </div>
         <button class="w-100 btn btn-lg btn-success shadow" type="submit" name="submit">Update</button>
         <a href="gebruiker_pagina.php" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a>
         <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
   </main>
</div>


<?php include "footer.php" ?>