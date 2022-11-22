<?php

session_start();

print_r($_GET["id"]);

require 'connectie.php';

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: index.php");
}
