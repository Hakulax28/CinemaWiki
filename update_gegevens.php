<!--<?php require "connectie.php" ?>-->
<?php include "header.php" ?>

<div class="container">
   <main class="form-signin w-100 m-auto">
      <form>
         <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
         <h1 class="h3 mb-3 fw-normal">Update jouw gegevens</h1>

         <div class="form-floating">
            <input type="text" name="firstname" id="floatingInput" class="form-control" value="<?php echo $user["firstname"] ?>">
            <label for="floatingInput">Voornaam: </label>
         </div><br>
         <div class="form-floating">
            <input type="text" name="lastname" id="floatingInput" class="form-control" value="<?php echo $user["lastname"] ?>">
            <label for=" floatingInput">Achternaam: </label>
         </div><br>
         <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $user["email"] ?>">
            <label for=" floatingInput">E-mail</label>
         </div><br>
         <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?php echo $user["password"]  ?>">
            <label for=" floatingPassword">Wachtwoord</label>
         </div><br>
         <div class="form-floating">
            <input type="date" name="date_of_birth" id="floatingInput" class="form-control" value="<?php echo $user["date_of_birth"] ?>">
            <label for=" floatingInput">Geboortedatum: </label>
         </div><br>
         <div class="form-floating">
            <input type="tel" name="phonenumber" id="floatingInput" class="form-control" value="<?php echo $user["phonenumber"]  ?>">
            <label for=" floatingInput">Telefoonnummer: </label>
         </div><br>

         <button class="w-100 btn btn-lg btn-success" type="submit">Update</button>
         <a href="gebruiker_pagina.php" class="w-100 btn btn-lg btn-danger">Annuleer</a>
         <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
   </main>
</div>


<?php include "footer.php" ?>