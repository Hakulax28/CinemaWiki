<?php
require "connectie.php";

if (isset($_POST["submit"]) && $_POST["personName"] != "" && $_POST["personAge"] != "" && $_POST["personRole"] != "") {

    $personName = $_POST['personName'];
    $personAge = $_POST['personAge'];
    $personRole = $_POST['personRole'];


    $sql = "INSERT INTO people (personName, personAge, personRole)
VALUES ('$personName','$personAge','$personRole')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location: wikiaanmaken.php");
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
    <h1>Persoon toevoegen</h1><br>
    <form action="" method="POST">
        <input class="form-control" type="text" name="personName" placeholder="Naam" aria-label="name"><br>
        <input class="form-control" type="number" name="personAge" placeholder="Leeftijd" aria-label="age"><br>
        <select class="form-select" name="personRole" aria-label="Rol">
            <option value="Acteur">Acteur</option>
            <option value="Schrijver">Schrijver</option>
            <option value="Regisseur">Regisseur</option>
        </select><br>
        <button class="w-100 btn btn-lg btn-primary shadow" name="submit" type="submit">Voeg toe</button>
        <button class="w-100 btn btn-lg btn-danger shadow" onclick="history.back()">Ga terug</button>
    </form>
</div>

<?php include "footer.php"; ?>

</html>