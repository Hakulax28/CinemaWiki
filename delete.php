<?php

session_start();

print_r($_GET["user_id"]);

require 'connectie.php';

$id = $_GET['user_id'];

$sql = "DELETE FROM users WHERE user_id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: index.php");
}
