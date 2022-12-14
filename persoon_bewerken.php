<?php
require 'connectie.php';

$id = $_GET["person_id"]; //17
$sql = "SELECT * FROM people WHERE person_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

   $person = mysqli_fetch_assoc($result);

   //var_dump($user);

   if (is_null($person)) {
      header("location: persoon_toevoegen.php");
   }
}

if (isset($_POST["submit"]) && $_POST["personName"] != "" && $_POST["personAge"] != "") {
    
    $personName = $_POST['personName'];
    $personAge = $_POST['personAge'];
    $personRole = $_POST['personRole'];
    $personDescription = $_POST['personDescription'];

    if(isset($_FILES["personImage"]) && !empty($_FILES["personImage"]["name"])){
        unlink($_POST["oldImage"]);
        move_uploaded_file($_FILES['personImage']['tmp_name'], "images/personenplaatjes/". $_FILES['personImage']['name']);
        $personImage = "images/personenplaatjes/". $_FILES['personImage']['name'];

   }
   else{
       echo "image not found!";
       $personImage = $_POST["oldImage"];
   }



   $sql = "UPDATE people SET
   personName = '$personName',
   personAge = '$personAge',
   personRole = '$personRole',
   personDescription = '$personDescription',
   personImage = '$personImage' WHERE people.person_id = '$id' ";

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
<div class="container bg-light border border-white rounded-1"><br>
   <h1>Genre toevoegen</h1><br>
   <form action="" method="POST" enctype="multipart/form-data">
        <input class="form-control" type="text" value="<?php echo $person["personName"] ?>" name="personName" placeholder="Naam" aria-label="name"><br>
        <input class="form-control" type="number" name="personAge" value="<?php echo $person["personAge"] ?>" placeholder="Leeftijd" aria-label="age"><br>
        <select class="form-select" name="personRole" aria-label="Rol">
            <option value="<?php echo $person["personRole"] ?>"><?php echo $person["personRole"] ?></option>
            <option value="Acteur">Acteur</option>
            <option value="Schrijver">Schrijver</option>
            <option value="Regisseur">Regisseur</option>
        </select><br>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Omschrijving van persoon" id="floatingTextarea2" name="personDescription" style="height: 100px"><?php echo $person["personDescription"] ?></textarea>
            <label for="floatingTextarea2">Persoon omschrijving</label>
         </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Persoon plaatje:</label>
            <img src="<?php echo $person["personImage"] ?>" alt="" srcset="" width="100px" height="auto">
            <input class="form-control" name="personImage" type="file" id="formFile">
            <input type="hidden" value="<?php echo $person["personImage"] ?>" name="oldImage">
        </div>
        <button class="w-100 btn btn-lg btn-primary shadow" name="submit" type="submit">Voeg toe</button>
        <button class="w-100 btn btn-lg btn-danger shadow" onclick="history.back()">Ga terug</button>
    </form>
</div>
</div>

<?php include "footer.php" ?>