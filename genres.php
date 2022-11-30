<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM genre";

if ($result = mysqli_query($conn, $sql)) {
   $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="styleD.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<?php include "header.php"; ?>

<body class="bg-secondary bg-gradient">
   <h2 class="display-1 text-light">Genres</h2>
   <div class="container bg-light rounded p-2 gap-3 justify-content-between flex-wrap d-flex">
      <table class="table table-striped table-dark">
         <thead>
            <tr>
               <!--<th>ID</th>-->
               <th>Genre naam</th>
               <th>Descriptie</th>
               <th>Verwijder</th>
               <th>Update</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($genres as $genre) : ?>
               <tr>
                  <!--<td><?php echo $genre["genre_id"] ?></td>-->
                  <td><?php echo $genre["genreName"] ?></td>
                  <td><?php echo $genre["genreDescription"] ?></td>
                  <td><a href="delete.php?genre_id=<?php echo $genre["genre_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                  <td><a href="update_gegevens.php?genre_id=<?php echo $genre["genre_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      <a href="genre_toevoegen.php" class="w-100 btn btn-lg btn-warning shadow">Voeg een genre toe</a>
   </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>