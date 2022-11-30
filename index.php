<?php
require 'connectie.php';

/*if (!$_SESSION["is_logged_in"]) {
   header("location: inloggen.php");
}*/
?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1">
   <h1>Welkom bij CinemaWiki</h1><br>
   <h2>Featured Film: </h2><br>
   <div class="row g-5">
      <div class="col-md">
         <img src="images/test-image.png" height="180px" width="320px" alt="">
      </div>
      <div class="col-md">
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, maxime. Ipsam, earum doloribus aperiam necessitatibus voluptates error quas aliquam labore? Aspernatur quis natus quasi repudiandae doloribus modi dignissimos qui praesentium nobis laboriosam officia veniam similique numquam esse vel dolores at veritatis totam, dolore saepe quia vero illum eius assumenda. Voluptatibus reprehenderit dicta necessitatibus, expedita quae eveniet doloribus blanditiis, quis veniam amet ut minima ipsam possimus? <button onclick="document.location='wikipagina.php'" class="w-100 btn btn-lg btn-success shadow" type="submit">Browse</button></p>
      </div>
   </div><br>
   <h2>Sorteer bij genre: </h2><br>
   <div class="row g-4 gap-1 mx-auto">
      <div class="card" style="width: 20rem;">
         <img src="images/test-image.png" class="card-img-top" alt="...">
         <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
      </div>

      <div class="card" style="width: 20rem;">
         <img src="images/test-image.png" class="card-img-top" alt="...">
         <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
      </div>

      <div class="card" style="width: 20rem;">
         <img src="images/test-image.png" class="card-img-top" alt="...">
         <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
      </div>

      <div class="card" style="width: 20rem;">
         <img src="images/test-image.png" class="card-img-top" alt="...">
         <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
      </div>
   </div><br>
</div>
<?php include "footer.php" ?>