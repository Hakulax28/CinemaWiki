<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <h1>Maak contact met ons</h1><br>
   <div>
      <p>Wil je iets van ons weten? Dan kun je nu contact met ons maken zodat je jouw antwoord meteen krijg</p>
      <div>
         <div class="row g-2">
            <div class="col-md">
               <div class="form-floating">
                  <input type="text" name="firstname" id="floatingInput" class="form-control">
                  <label for="floatingInput">Voornaam: </label>
               </div>
            </div>
            <div class="col-md">
               <div class="form-floating">
                  <input type="text" name="lastname" id="floatingInput" class="form-control">
                  <label for=" floatingInput">Achternaam: </label>
               </div>
            </div>
         </div><br>
         <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for=" floatingInput">E-mail</label>
         </div><br>
         <div class="form-floating">
            <input type="tel" class="form-control" id="floatingInput">
            <label for=" floatingInput">Telefoonnummer</label>
         </div><br>
         <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
            <label for="floatingTextarea2">Comments</label>
         </div>
      </div><br>
      <button class="shadow w-100 btn btn-lg btn-success shadow" type="submit">Stuur</button>
   </div><br>
</div>
<?php include "footer.php" ?>