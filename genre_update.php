<?php
require 'connectie.php';

$id = $_GET["genre_id"]; //17
$sql = "SELECT * FROM genre WHERE genre_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

   $genre = mysqli_fetch_assoc($result);

   //var_dump($user);

   if (is_null($genre)) {
      header("location: genres.php");
   }
}

if (isset($_POST["submit"]) && $_POST["genreName"] != "" && $_POST["genreDescription"] != "") {

   $genreName = $_POST['genreName'];
   $genreDesc = $_POST['genreDescription'];

   $sql = "UPDATE genre SET
   genreName = '$genreName',
   genreDescription = '$genreDesc' WHERE genre.genre_id = '$id' ";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      header("location: genres.php");
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
   $conn->close();
} else if (isset($_POST["submit"])) {
   echo "<script>alert('Vul alle velden in!!!')</script>";
}
?>

<?php include "header.php"; ?>
<div class="container bg-light border border-white rounded-1"><br>
   <h1>Genre toevoegen</h1><br>
   <form action="update_genre.php?genre_id=<?php echo $id; ?>" method="POST">
      <input class="form-control" type="text" name="genreName" value="<?php echo $genre["genreName"] ?>" placeholder="Naam" aria-label="name"><br>
      <input class="form-control" type="text" name="genreDescription" value="<?php echo $genre["genreDescription"] ?>" placeholder="Descriptie" aria-label="age"><br>
      <button class="btn btn-primary" name="submit" type="submit">Voeg toe</button>
      <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
   </form><br>
</div>

<?php include "footer.php" ?>