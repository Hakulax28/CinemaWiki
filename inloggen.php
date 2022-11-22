<?php include "header.php" ?>

<body class="text-center">
   <div class="container">
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
            </div>

            <div class="checkbox mb-3">
               <label>
                  <input type="checkbox" value="remember-me"> Remember me
               </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log nu in</button>
            <a href="registreer.php" class="w-100 btn btn-lg btn-warning">Registreer je nu</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
         </form>
      </main>
   </div>

</body>

<?php include "footer.php" ?>