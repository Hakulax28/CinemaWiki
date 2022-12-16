<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM films";

if ($result = mysqli_query($conn, $sql)) {
   $films = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <h1>Alle films</h1><br>
   <div style="overflow-x:auto;">
      <table class=" table table-striped table-dark">
         <thead>
            <tr>
               <!--<th>ID</th>-->
               <th>Film</th>
               <th>Uitgebracht op</th>
               <th>Leeftijd EU</th>
               <th>Leeftijd US</th>
               <th>Talen</th>
               <th>Tijd duurt</th>
               <th>Score</th>
               <th>Film kosten</th>
               <th>Box Office</th>
               <th>Poster</th>
               <th>Verwijder</th>
               <th>Update</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($films as $film) : ?>
               <tr>
                  <!--<td><?php echo $film["film_id"] ?></td>-->
                  <td><?php echo $film["filmTitle"] ?></td>
                  <td><?php echo $film["filmReleaseDate"] ?></td>
                  <td><?php echo $film["filmAgeRatingEU"] ?></td>
                  <td><?php echo $film["filmAgeRatingUS"] ?></td>
                  <td><?php echo $film["filmLanguage"] ?></td>
                  <td><?php echo $film["filmRuntime"] ?></td>
                  <td><?php echo $film["filmScore"] ?></td>
                  <td><?php echo $film["filmCost"] ?></td>
                  <td><?php echo $film["filmEarnings"] ?></td>
                  <td><img src="<?php echo $film["filmCoverImage"] ?>" alt="" width="150px" height="250px"></td>
                  <td><a href="film_delete.php?film_id=<?php echo $film["film_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                  <td><a href="film_update.php?film_id=<?php echo $film["film_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</div>
<?php include "footer.php" ?>