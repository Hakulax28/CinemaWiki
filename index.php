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
   <h2>Featured Film: </h2><br>
   <div class="row g-5">
      <div class="col-md">
         <img src="images/test-image.png" style="max-width: 100%; max-height: 225px" alt="">
      </div>
      <div class="col-md">
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, maxime. Ipsam, earum doloribus aperiam necessitatibus voluptates error quas aliquam labore? Aspernatur quis natus quasi repudiandae doloribus modi dignissimos qui praesentium nobis laboriosam officia veniam similique numquam esse vel dolores at veritatis totam, dolore saepe quia vero illum eius assumenda. Voluptatibus reprehenderit dicta necessitatibus, expedita quae eveniet doloribus blanditiis, quis veniam amet ut minima ipsam possimus?
            <a href="wikipagina.php?page_id=1" class="w-100 btn btn-lg btn-success shadow" type="submit">Browse</a>
         </p>
      </div>
   </div><br>
   <h2>Sorteer bij genre: </h2><br>
   <div class="row g-4 mx-auto">
      <?php foreach ($genres as $genre) : ?>
         <div class="card" style="width: 100%;">
            <!--<img src="images/test-image.png" class="card-img-top" alt="...">-->
            <div class="card-body">
               <h5 class="card-title"><?php echo $genre["genreName"] ?></h5><br>
               <p class="card-text" style="height: 100px;"><?php echo $genre["genreDescription"] ?></p>
               <a href="zoeken.php" class="btn btn-primary shadow" style="width: 100%;">Go somewhere</a>
            </div><br>
         </div>
      <?php endforeach; ?>
   </div><br>
</div>
<?php include "footer.php" ?>