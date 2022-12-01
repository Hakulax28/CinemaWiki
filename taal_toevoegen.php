<?php
require "connectie.php";

if (isset($_POST["submit"]) && $_POST["taal"] != "" && $_POST["land_van_oorsprong"] != "") {

    $taal = $_POST['taal'];
    $lvo = $_POST['land_van_oorsprong'];


    $sql = "INSERT INTO language (taal, land_van_oorsprong)
VALUES ('$taal','$lvo')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else if (isset($_POST["submit"])) {
    echo "<script>alert('Vul alle velden in!!!')</script>";
}
?>
<?php include "header.php"; ?>

<body class="bg-secondary bg-gradient">
    <div class="container bg-light rounded p-2">
        <h1>Taal toevoegen</h1>
        <form action="" method="POST">
            <input class="form-control" type="text" name="taal" placeholder="Taal" aria-label="name">
            <input class="form-control" type="text" name="land_van_oorsprong" placeholder="Land van Oorsprong" aria-label="age">
            <button class="btn btn-primary" name="submit" type="submit">Voeg toe</button>
            <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>