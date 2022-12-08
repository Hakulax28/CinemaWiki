<?php 
require 'connectie.php';
$film_id = $_GET['film_id'];
$genre_id = $_GET['genre_id'];
$page_id = $_GET['page_id'];
$sql = "DELETE FROM film_genres WHERE film_id=$film_id AND genre_id=$genre_id";

if (mysqli_query($conn,$sql)) {
    header("location: wikipagina.php?page_id=$page_id");
}
