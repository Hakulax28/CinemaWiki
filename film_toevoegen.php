<?php 
require "connectie.php";

if(isset($_POST["submit"]) && $_POST["filmTitle"] != "")
{
    
$filmTitle = $_POST['filmTitle']; 
$filmReleaseDate = $_POST['filmReleaseDate']; 
$filmRuntime = $_POST['filmRuntime']; 
$filmAgeRatingEU = $_POST['filmAgeRatingEU']; 
$filmAgeRatingUS = $_POST['filmAgeRatingUS']; 
$filmLanguage = $_POST['filmLanguage']; 
$filmScore = $_POST['filmScore']; 
$filmCost = $_POST['filmCost']; 
$filmEarnings = $_POST['filmEarnings']; 

if(isset($_FILES['imageToUpload'])){
  move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "images/". $_FILES['imageToUpload']['name']);
  $filmCoverImage = "images/". $_FILES['imageToUpload']['name'];
}
else{
    echo "image not found!";
}

$sql = "INSERT INTO films (filmTitle,filmReleaseDate,filmAgeRatingEU,filmAgeRatingUS,filmLanguage,
filmRuntime,filmScore,filmCost,filmEarnings,filmCoverImage)
VALUES ('$filmTitle','$filmReleaseDate','$filmAgeRatingEU','$filmAgeRatingUS','$filmLanguage',
'$filmRuntime','$filmScore','$filmCost','$filmEarnings','$filmCoverImage')";

if ($conn->query($sql) === TRUE) {
    $sql = "SELECT * FROM films where filmTitle= '$filmTitle'";
    $result = mysqli_query($conn,$sql);
    $film = mysqli_fetch_assoc($result);
    $film_id = $film['film_id'];
    echo "New record created successfully";
    header("location: wikiaanmaken.php?film_id=$film_id");
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
    <h2>Film toevoegen</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control"  id="filmTitle" name="filmTitle" placeholder="Film Title">
    <div class="sideImage"><img src="images/test-image.png" alt="" width="125px" height="200px">
    <input class="form-control" type="file" name="imageToUpload" id="formFile">
    <table class="table">
  <tbody class="table-group-divider">
  <tr>
      <th scope="row">Release date</th>
      <td colspan="3"><div class="mb-3S">
      <input type="date" class="form-control" name="filmReleaseDate" id="filmRuntime" placeholder="Film Runtime">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Runtime</th>
      <td colspan="3"><div class="mb-3S">
      <input type="number" class="form-control" name="filmRuntime" id="filmRuntime" placeholder="Film Runtime">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Age Rating</th>
      <td>EU: <select class="form-select" name="filmAgeRatingEU" aria-label="Default select example">
  <option selected>Select EU age rating</option>
  <option value="3">3</option>
  <option value="7">7</option>
  <option value="12">12</option>
  <option value="16">16</option>
  <option value="18">18</option>
</select></td>
      <td>US: <select class="form-select" name="filmAgeRatingUS" aria-label="Default select example">
  <option selected>Select US age rating</option>
  <option value="ec">Early childhood</option>
  <option value="E">Everyone</option>
  <option value="E10+">Everyone 10+</option>
  <option value="T">Teen</option>
  <option value="M">Mature</option>
  <option value="Ao">Adult only</option>
</select></td>
    </tr>
    <tr>
      <th colspan="2">
        <?php
          $sql = "SELECT taal FROM language";
          $result = mysqli_query($conn,$sql);
          $talen = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
      <input class="form-control" name="filmLanguage" list="datalistOptions" id="taalDataList" placeholder="Zoek een Taal...">
        <datalist id="datalistOptions">
          <?php foreach($talen as $taal): ?>
            <option value="<?php echo $taal["taal"] ?>">
          <?php endforeach; 
          mysqli_free_result($result);
?>
        </datalist></th>

      <td colspan="1"><a href="taal.php">Of voeg een taal toe +</a></td>
    </tr>

    <tr>
      <th scope="row">Score</th>
      <td colspan="3"><select class="form-select" name="filmScore" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  
</select></td>
    </tr>
    <tr>
      <th scope="row">Cost</th>
      <td colspan="3"><div class="mb-3S">
      <input type="number" class="form-control" name="filmCost"  id="filmCost" placeholder="Film Cost">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Earnings</th>
      <td colspan="3"><div class="mb-3S">
      <input type="number" class="form-control" name="filmEarnings" id="filmEarnings" placeholder="Film Earnings">
      </div></td>
    </tr>
  </tbody>
</table>

        <button class="btn btn-primary" name="submit"  type="submit">Voeg toe</button>
        <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>