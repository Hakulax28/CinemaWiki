<?php

session_start();

print_r($_GET["genre_id"]);

require 'connectie.php';

$id = $_GET['genre_id'];

$sql = "DELETE FROM genre WHERE genre_id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: genres.php");
}
