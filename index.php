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
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae dolore temporibus, obcaecati quam illo nam non repellendus mollitia. Et dolor optio aut unde officia maiores incidunt facere quas? Culpa voluptatum ipsam eveniet magnam? Sunt velit incidunt laboriosam, eius cumque molestias voluptates mollitia necessitatibus expedita corrupti! At cupiditate odio consequuntur soluta deleniti ad, quibusdam quos in modi quas ipsam nemo voluptas expedita reiciendis nulla placeat pariatur ipsum repellendus! Unde animi voluptas quod, amet veniam vitae nesciunt mollitia illum, sequi, facilis voluptates!</p>
      </div>
   </div><br>
   <h2>Sorteer bij genre: </h2><br>
   <div class="row g-5">
      <div class="col-md">
         <img src="images/test-image.png" height="180px" width="180px" alt="">
         <h2>Categorie</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsam nobis accusamus reprehenderit, laborum maxime commodi voluptas eius obcaecati. Sequi reprehenderit facere animi esse, cum suscipit, pariatur quisquam error rem ab deserunt necessitatibus at rerum laborum sed, illo voluptatibus cupiditate? Repudiandae sunt odit sed laborum, est dicta incidunt? Quidem, tempora!</p>
         <button onclick="document.location='gebruiker_pagina.php'" class="w-100 btn btn-lg btn-success shadow" type="submit">Browse</button>
      </div>
      <div class="col-md">
         <img src="images/test-image.png" height="180px" width="180px" alt="">
         <h2>Categorie</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsam nobis accusamus reprehenderit, laborum maxime commodi voluptas eius obcaecati. Sequi reprehenderit facere animi esse, cum suscipit, pariatur quisquam error rem ab deserunt necessitatibus at rerum laborum sed, illo voluptatibus cupiditate? Repudiandae sunt odit sed laborum, est dicta incidunt? Quidem, tempora!</p>
         <button onclick="document.location='gebruiker_pagina.php'" class="w-100 btn btn-lg btn-success shadow" type="submit">Browse</button>
      </div>
      <div class="col-md">
         <img src="images/test-image.png" height="180px" width="180px" alt="">
         <h2>Categorie</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsam nobis accusamus reprehenderit, laborum maxime commodi voluptas eius obcaecati. Sequi reprehenderit facere animi esse, cum suscipit, pariatur quisquam error rem ab deserunt necessitatibus at rerum laborum sed, illo voluptatibus cupiditate? Repudiandae sunt odit sed laborum, est dicta incidunt? Quidem, tempora!</p>
         <button onclick="document.location='gebruiker_pagina.php'" class="w-100 btn btn-lg btn-success shadow" type="submit">Browse</button>
      </div>
      <div class="col-md">
         <img src="images/test-image.png" height="180px" width="180px" alt="">
         <h2>Categorie</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt ipsam nobis accusamus reprehenderit, laborum maxime commodi voluptas eius obcaecati. Sequi reprehenderit facere animi esse, cum suscipit, pariatur quisquam error rem ab deserunt necessitatibus at rerum laborum sed, illo voluptatibus cupiditate? Repudiandae sunt odit sed laborum, est dicta incidunt? Quidem, tempora!</p>
         <button onclick="document.location='gebruiker_pagina.php'" class="w-100 btn btn-lg btn-success shadow" type="submit">Browse</button>
      </div>
   </div><br>
</div>
<?php include "footer.php" ?>