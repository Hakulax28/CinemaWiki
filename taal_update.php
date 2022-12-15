<?php
require "connectie.php";

$id = $_GET["language_id"]; //17
$sql = "SELECT * FROM language WHERE language_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

    $language = mysqli_fetch_assoc($result);

    //var_dump($user);

    if (is_null($language)) {
        header("location: taal.php");
    }
}

if (isset($_POST["submit"]) && $_POST["taal"] != "" && $_POST["land_van_oorsprong"] != "") {

    $taal = $_POST['taal'];
    $lvo = $_POST['land_van_oorsprong'];

    $sql = "UPDATE language SET
    taal = '$taal',
    land_van_oorsprong = '$lvo' WHERE language.language_id = '$id' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location: taal.php");
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
    <h1>Taal toevoegen</h1><br>
    <form action="" method="POST">
        <input class="form-control" type="text" name="taal" value="<?php echo $language["taal"] ?>" placeholder="taal" aria-label="name"><br>
        <input class="form-control" type="text" name="land_van_oorsprong" value="<?php echo $language["land_van_oorsprong"] ?>" placeholder="land_van_oorsprong" aria-label="age"><br>
        <button class="btn btn-primary" name="submit" type="submit">Update</button>
        <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
    </form>
</div>
<?php include "footer.php"; ?>