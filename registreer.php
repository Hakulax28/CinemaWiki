<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <main class="form-signin w-100 m-auto">
      <form action="registreer_verwerking.php" method="post" enctype="multipart/form-data">
         <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
         <h1 class="h3 mb-3 fw-normal">Registreer je nu in</h1>
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
                  <input type="file" id="floatingInput" name="profielFoto" class="form-control"><br>
                  <label for="floatingInput">Select image: </label>
               </div>
               <div class="form-floating">
                  <input type="tel" name="phonenumber" id="floatingInput" class="form-control">
                  <label for="floatingInput">Telefoonnummer: </label>
               </div><br>
               <div class="form-floating">
                  <input type="text" name="role" id="floatingInput" class="form-control">
                  <label for="floatingInput">Rol: </label>
               </div><br>
            </div>
         </div>
         <button class="w-100 btn btn-lg btn-success shadow" type="submit" name="submit">Registreer je nu in</button>
         <a href="index.php" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a>
      </form>
   </main>
</div>


<?php include "footer.php" ?>