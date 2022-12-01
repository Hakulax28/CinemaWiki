<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM genre";

if ($result = mysqli_query($conn, $sql)) {
   $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php"; ?>

<div class="container bg-light border border-white rounded-1">
   <h1>Genres</h1><br>
   <table class="table table-striped table-dark rounded-1">
      <thead>
         <tr>
            <!--<th>ID</th>-->
            <th>Genre naam</th>
            <th>Descriptie</th>
            <?php if (!empty($_SESSION)) : ?>
               <?php if ($_SESSION['role'] == "beheerder") : ?>
                  <th>Verwijder</th>
                  <th>Update</th>
               <?php endif ?>
            <?php endif ?>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($genres as $genre) : ?>
            <tr>
               <!--<td><?php echo $genre["genre_id"] ?></td>-->
               <td><?php echo $genre["genreName"] ?></td>
               <td><?php echo $genre["genreDescription"] ?></td>
               <?php if (!empty($_SESSION)) : ?>
                  <?php if ($_SESSION['role'] == "beheerder") : ?>
                     <td><a href="genre_delete.php?genre_id=<?php echo $genre["genre_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                     <td><a href="genre_update.php?genre_id=<?php echo $genre["genre_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
                  <?php endif ?>
               <?php endif ?>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <?php if (!empty($_SESSION)) : ?>
      <?php if ($_SESSION['role'] == "beheerder") : ?>
         <a href="genre_toevoegen.php" class="w-100 btn btn-lg btn-warning shadow">Voeg een genre toe</a>
      <?php endif ?>
   <?php endif ?>
</div>
</div>
<?php include "footer.php"; ?>

</html>