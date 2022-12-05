<?php
require 'connectie.php';

$id = $_GET["user_id"]; //17

$sql = "SELECT * FROM users WHERE user_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

   $user = mysqli_fetch_assoc($result);

   //var_dump($user);

   if (is_null($user)) {

      header("location: gebruiker_pagina.php");
   }
}
?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <main class="form-signin w-100 m-auto">
      <form action="update_verwerking.php?user_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
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
                  <input type="hidden" name="oudeProfielfoto" value="<?php echo $user["profilePicture"]; ?>">
                  <img src="<?php echo $user["profilePicture"]; ?>" alt="" width="100px" height="100px">
                  <input type="file" id="floatingInput" name="profielFoto" class="form-control"><br>
                  <label for="floatingInput">Current image:</label>
                  <a href="profielfoto_delete.php?path=<?php echo $user["profilePicture"]; ?>&id=<?php echo $id ?>" class="btn btn-danger">verwijder profiel foto</a>
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
         <?php if ($_SESSION['role'] == "gebruiker") : ?>
            <button class="w-100 btn btn-lg btn-success shadow" type="submit" name="submit">Update</button>
            <a href="index.php" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a><br>
            <a href="delete.php?user_id=<?php echo $id; ?>" class="w-100 btn btn-lg btn-warning shadow">Verwijder </a>
         <?php endif ?>
         <?php if ($_SESSION['role'] == "beheerder") : ?>
            <button class="w-100 btn btn-lg btn-success shadow" type="submit" name="submit">Update</button>
            <a href="gebruiker_pagina.php" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a>
         <?php endif ?>
      </form>
   </main>
</div>


<?php include "footer.php" ?>