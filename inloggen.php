<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1">
   <main class="form-signin w-100 m-auto">
      <form action="process_login.php" method="post">
         <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
         <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

         <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">E-mail</label>
         </div><br>
         <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Wachtwoord</label>
         </div><br>
         <div class="form-floating">
            <input type="text" name="role" id="floatingInput" class="form-control" placeholder="Wat is uw rol"><br>
            <label for="floatingInput">Rol</label>
         </div>
         <br>
         <div class="checkbox mb-3">
            <label>
               <input type="checkbox" value="remember-me"> Remember me
            </label>
         </div><br>
         <button class="w-100 btn btn-lg btn-success shadow" type="submit">Log nu in</button>
         <a href="registreer.php" class="w-100 btn btn-lg btn-warning shadow">Registreer je nu</a>
         <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
      </form>
      <a href="gebruiker_pagina.php" class="w-100 btn btn-lg btn-warning shadow">Alle gebruikers</a>
   </main><br>
</div>

<?php include "footer.php" ?>