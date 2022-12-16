<?php

session_start();

print_r($_GET["page_id"]);

require 'connectie.php';

$id = $_GET['page_id'];

$sql = "DELETE FROM wikipages WHERE page_id = $id";

if (mysqli_query($conn, $sql)) {
   header("location: index.php");
}
