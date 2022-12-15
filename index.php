<?php
require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM genre LIMIT 4";

if ($result = mysqli_query($conn, $sql)) {
   $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/*if (!$_SESSION["is_logged_in"]) {
   header("location: inloggen.php");
}*/
?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <h1>Welkom bij CinemaWiki</h1><br>
   <div class="row g-5">
      <div class="col-md">
         <img src="images/filmscenes/Fight-Club.webp" class="img-fluid" alt="">
      </div>
      <div class="col-md">
         <p>Welkom op CinemaWiki! We zijn blij dat je ons hebt gevonden en we hopen dat je veel interessante en leuke dingen op onze site zult vinden.
            Of je nu op zoek bent naar informatie over de laatste films, achtergrondinformatie over je favoriete acteurs of aanbevelingen voor nieuwe films om te bekijken, we hebben het allemaal. 
            Blijf gewoon bladeren om onze collectie te ontdekken en geniet van alles wat we te bieden hebben. Veel plezier!
            <a href="zoeken.php?query=" class="w-100 btn btn-lg btn-success shadow mt-4" type="submit">Zie alle films</a>
         </p>
      </div>
   </div><br>
   <h2>of sorteer op genre: </h2><br>
   <div class="row g-4 mx-auto">
      <?php foreach ($genres as $genre) : ?>
         <div class="card" style="width: 100%;">
            <!--<img src="images/test-image.png" class="card-img-top" alt="...">-->
            <div class="card-body">
               <h5 class="card-title"><?php echo $genre["genreName"] ?></h5><br>
               <p class="card-text" style="height: 100px;"><?php echo $genre["genreDescription"] ?></p>
               <a href="zoeken.php?query=<?php echo $genre["genreName"] ?>" class="btn btn-primary shadow" style="width: 100%;">Go to <?php echo $genre["genreName"] ?></a>
            </div><br>
         </div>
      <?php endforeach; ?>
   </div><br>
</div>
<?php include "footer.php" ?>