<?php 
require 'connectie.php';
$film_id = $_GET['id'];
$page_id = $_GET['page_id'];
$genre_id = $_POST['addGenre'];
$sql = "INSERT INTO film_genres (film_id, genre_id)
VALUES ('$film_id','$genre_id')";

// Voer de INSERT INTO STATEMENT uit
mysqli_query($conn, $sql);

echo "Inserted successfully";
header("location: wikipagina.php?page_id=$page_id");
mysqli_close($conn); 