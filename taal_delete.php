<?php

session_start();

print_r($_GET["language_id"]);

require 'connectie.php';

$id = $_GET['language_id'];

$sql = "DELETE FROM language WHERE language_id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: taal.php");
}
