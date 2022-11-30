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
    header("location: wikiaanmaken.php");
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
    <form action="" method="POST">
    <input type="text" class="form-control"  id="filmTitle" name="filmTitle" placeholder="Film Title">
    <input type="text" class="form-control"  id="filmSubtitle" name="filmSubtitle" placeholder="Film subtitle">
    <div class="sideImage"><img src="images/test-image.png" alt="" width="125px" height="200px">
    <input class="form-control" type="file" name="filmCoverImage" id="formFile">
    <table class="table">
  <tbody class="table-group-divider">
  <tr>
      <th scope="row">Release date</th>
      <td colspan="3"><div class="mb-3S">
      <input type="date" class="form-control" name="filmRuntime" id="filmRuntime" placeholder="Film Runtime">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Runtime</th>
      <td colspan="3"><div class="mb-3S">
      <input type="text" class="form-control" name="filmRuntime" id="filmRuntime" placeholder="Film Runtime">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Age Rating</th>
      <td>EU: <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select></td>
      <td>US: <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select></td>
    </tr>
    <tr>
      <th colspan="2">
        <?php
          $sql = "SELECT taal FROM language";
          $result = mysqli_query($conn,$sql);
          $talen = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Zoek een persoon...">
        <datalist id="datalistOptions">
          <?php foreach($talen as $taal): ?>
            <option value="<?php echo $taal["taal"] ?>">
          <?php endforeach; ?>
        </datalist></th>

      <td colspan="1"><a href="persoon_toevoegen.php">Of voeg een taal toe +</a></td>
    </tr>

    <tr>
      <th scope="row">Score</th>
      <td colspan="3"><select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select></td>
    </tr>
    <tr>
      <th scope="row">Cost</th>
      <td colspan="3"><div class="mb-3S">
      <input type="text" class="form-control"  id="filmCost" placeholder="Film Cost">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Earnings</th>
      <td colspan="3"><div class="mb-3S">
      <input type="text" class="form-control"  id="filmEarnings" placeholder="Film Earnings">
      </div></td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th>People</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th colspan="2">
        <?php
          $sql = "SELECT personName FROM people";
          $result = mysqli_query($conn,$sql);
          $people = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Zoek een persoon...">
        <datalist id="datalistOptions">
          <?php foreach($people as $person): ?>
            <option value="<?php echo $person["personName"] ?>">
          <?php endforeach; ?>
        </datalist></th>

      <td colspan="1"><a href="persoon_toevoegen.php">Of voeg een persoon toe +</a></td>
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