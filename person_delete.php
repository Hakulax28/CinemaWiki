<?php

session_start();

print_r($_GET["person_id"]);

require 'connectie.php';

$id = $_GET['person_id'];

$sql = "DELETE FROM people WHERE person_id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: persoon.php");
}
