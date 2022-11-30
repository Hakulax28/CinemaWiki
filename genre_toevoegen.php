<?php
require "connectie.php";

if (isset($_POST["submit"]) && $_POST["genreName"] != "" && $_POST["genreDescription"] != "") {

    $genreName = $_POST['genreName'];
    $genreDesc = $_POST['genreDescription'];


    $sql = "INSERT INTO genre (genreName, genreDescription)
VALUES ('$genreName','$genreDesc')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location: genres.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else if (isset($_POST["submit"])) {
    echo "<script>alert('Vul alle velden in!!!')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleD.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<?php include "header.php"; ?>

<body class="bg-secondary bg-gradient">
    <div class="container bg-light rounded p-2">
        <h2>Genre toevoegen</h2>
        <form action="" method="POST">
            <input class="form-control" type="text" name="genreName" placeholder="Naam" aria-label="name">
            <input class="form-control" type="text" name="genreDescription" placeholder="Descriptie" aria-label="age">
            <button class="btn btn-primary" name="submit" type="submit">Voeg toe</button>
            <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>