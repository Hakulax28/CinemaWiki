<?php 
require "connectie.php";

if(isset($_POST["submit"]) && $_POST["personName"] != "" && $_POST["personAge"] != "" && $_POST["personRole"] != "")
{
    
$personName = $_POST['personName']; 
$personAge = $_POST['personAge']; 
$personRole = $_POST['personRole']; 


$sql = "INSERT INTO people (personName, personAge, personRole)
VALUES ('$personName','$personAge','$personRole')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: index.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();
}else if (isset($_POST["submit"])) {
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
    <h2>Persoon toevoegen</h2>
    <form action="" method="POST">
        <input class="form-control" type="text" name="personName" placeholder="Naam" aria-label="name">
        <input class="form-control" type="number" name="personAge" placeholder="Leeftijd" aria-label="age">
        <select class="form-select" name="personRole" aria-label="Rol">
        <option value="Acteur">Acteur</option>
        <option value="Schrijver">Schrijver</option>
        <option value="Regisseur">Regisseur</option>
        </select>
        <button class="btn btn-primary" name="submit" type="submit">Voeg toe</button>
        <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>