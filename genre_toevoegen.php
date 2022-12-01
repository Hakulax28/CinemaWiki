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

<?php include "header.php"; ?>
<div class="container bg-light border border-white rounded-1">
    <h1>Genre toevoegen</h1><br>
    <form action="" method="POST">
        <input class="form-control" type="text" name="genreName" placeholder="Naam" aria-label="name"><br>
        <input class="form-control" type="text" name="genreDescription" placeholder="Descriptie" aria-label="age"><br>
        <button class="btn btn-primary" name="submit" type="submit">Voeg toe</button>
        <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
    </form><br>
</div>

<?php include "footer.php"; ?>

</html>