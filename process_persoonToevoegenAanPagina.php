<?php 
require 'connectie.php';
$film_id = $_GET['id'];
$page_id = $_GET['page_id'];
$person_id = $_POST['addPerson'];
$sql = "INSERT INTO people_in_film (film_id, person_id)
VALUES ('$film_id','$person_id')";

// Voer de INSERT INTO STATEMENT uit
mysqli_query($conn, $sql);

echo "Inserted successfully";
header("location: wikipagina.php?page_id=$page_id");
mysqli_close($conn); 