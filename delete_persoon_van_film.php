<?php 
require 'connectie.php';
$film_id = $_GET['film_id'];
$person_id = $_GET['person_id'];
$page_id = $_GET['page_id'];
$sql = "DELETE FROM people_in_film WHERE film_id=$film_id AND person_id=$person_id";

if (mysqli_query($conn,$sql)) {
    header("location: wikipagina.php?page_id=$page_id");
}
