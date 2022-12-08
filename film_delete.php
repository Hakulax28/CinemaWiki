<?php

session_start();

print_r($_GET["film_id"]);

require 'connectie.php';

$id = $_GET['film_id'];

$sql = "DELETE FROM films WHERE film_id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: film_overzicht.php");
}
