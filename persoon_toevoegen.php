<?php
require "connectie.php";

if (isset($_POST["submit"]) && $_POST["personName"] != "" && $_POST["personAge"] != "" && $_POST["personRole"] != "") {

    $personName = $_POST['personName'];
    $personAge = $_POST['personAge'];
    $personRole = $_POST['personRole'];
    $personDescription = $_POST['personDescription'];

    if(isset($_FILES["personImage"]) && !empty($_FILES["personImage"]["name"])){
        move_uploaded_file($_FILES['personImage']['tmp_name'], "images/personenplaatjes/". $_FILES['personImage']['name']);
        $personenPlaatje = "images/personenplaatjes/". $_FILES['personImage']['name'];

   }


    $sql = "INSERT INTO people (personName, personAge, personRole , personImage, personDescription)
VALUES ('$personName','$personAge','$personRole','$personenPlaatje','$personDescription')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.history.go(-2);</script>";
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
    <form action="" method="POST" enctype="multipart/form-data">
        <input class="form-control" type="text" name="personName" placeholder="Naam" aria-label="name"><br>
        <input class="form-control" type="number" name="personAge" placeholder="Leeftijd" aria-label="age"><br>
        <select class="form-select" name="personRole" aria-label="Rol">
            <option value="Acteur">Acteur</option>
            <option value="Schrijver">Schrijver</option>
            <option value="Regisseur">Regisseur</option>
        </select><br>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="personDescription" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Persoon omschrijving</label>
         </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Persoon plaatje</label>
            <input class="form-control" name="personImage" type="file" id="formFile">
        </div>
        <button class="w-100 btn btn-lg btn-primary shadow" name="submit" type="submit">Voeg toe</button>
        <button class="w-100 btn btn-lg btn-danger shadow" onclick="history.back()">Ga terug</button>
    </form>
</div>

<?php include "footer.php"; ?>