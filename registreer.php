<?php include "header.php" ?>

<body class="text-center">
   <main class="form-signin w-100 m-auto">
      <form>
         <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
         <h1 class="h3 mb-3 fw-normal">Registreer je nu in</h1>

         <div class="form-group">
            <label for="firstname">Voornaam: </label>
            <input type="text" name="firstname" id="" class="form-control">
         </div><br>
         <div class="form-group">
            <label for="lastname">Achternaam: </label>
            <input type="text" name="lastname" id="" class="form-control">
         </div><br>
         <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" id="" class="form-control" placeholder="name@example.com">
         </div><br>
         <div class="form-group">
            <label for="password">Wachtwoord: </label>
            <input type="password" name="password" id="" class="form-control" placeholder="Password">
         </div><br>
         <div class="form-group">
            <label for="date_of_birth">Geboortedatum: </label>
            <input type="date" name="date_of_birth" id="" class="form-control">
         </div><br>
         <div class="form-group">
            <label for="phonenumber">Telefoonnummer: </label>
            <input type="tel" name="phonenumber" id="" class="form-control">
         </div><br>

         <button class="w-100 btn btn-lg btn-primary" type="submit">registreer je nu in</button>
         <a href="index.php" class="w-100 btn btn-lg btn-danger">Annuleer</a>
         <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
   </main>
</body>

<?php include "footer.php" ?>