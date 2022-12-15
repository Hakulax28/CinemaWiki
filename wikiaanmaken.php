

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki aanmaken</title>
    <link rel="stylesheet" href="styleD.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>

<?php include "header.php"; ?>

<?php 
require "connectie.php";
if (isset($_GET['film_id'])){
$film_id =  $_GET['film_id'];
$sql = "SELECT * FROM films where film_id= '$film_id'";

$result = mysqli_query($conn,$sql);
$film = mysqli_fetch_assoc($result);

mysqli_free_result($result);



if(isset($_POST["submit"]) && $_POST["pageMainText"] != "")
{
    
$pageMainText = $_POST['pageMainText']; 
 
$pageSidebarText = $_POST['pageSidebarText']; 
$pageSection1Title= $_POST['pageSection1Title']; 
$pageSection1Text1 = $_POST['pageSection1Text1']; 
$pageSection1Text2 = $_POST['pageSection1Text2']; 

$pageSection2Title = $_POST['pageSection2Title']; 
$pageSection2Text = $_POST['pageSection2Text']; 
 
$pageSources = $_POST['pageSources']; 
$pageTrailer = "https://www.youtube.com/embed/" . substr($_POST['pageTrailer'], -11);



if(isset($_FILES['pageSection1Image'])){
  move_uploaded_file($_FILES['pageSection1Image']['tmp_name'], "images/filmscenes/". $_FILES['pageSection1Image']['name']);
  $pageSection1Image = "images/filmscenes/". $_FILES['pageSection1Image']['name'];
}else{
  echo "page section 1 image not found!";
  $pageSection1Image = "";
}
if(isset($_FILES['pageExtraImage1'])){
  move_uploaded_file($_FILES['pageExtraImage1']['tmp_name'], "images/filmscenes/". $_FILES['pageExtraImage1']['name']);
  $pageExtraImage1 = "images/filmscenes/". $_FILES['pageExtraImage1']['name'];
}else{
  echo "page extra image 1 not found!";
  $pageExtraImage1 = "";
}
if(isset($_FILES['pageExtraImage2'])){
  move_uploaded_file($_FILES['pageExtraImage2']['tmp_name'], "images/filmscenes/". $_FILES['pageExtraImage2']['name']);
  $pageExtraImage2 = "images/filmscenes/". $_FILES['pageExtraImage2']['name'];
}else{
  echo "page extra image 2 not found!";
  $pageExtraImage2 = "";
}



$sql = "INSERT INTO wikipages (film_id,pageMainText,pageTrailer,pageSidebarText,pageSection1Title,pageSection1Text1,
pageSection1Text2,pageSection2Title,pageSection1Image,pageExtraImage1,pageExtraImage2,pageSection2Text,pageSources)
VALUES ('$film_id','$pageMainText','$pageTrailer','$pageSidebarText','$pageSection1Title','$pageSection1Text1',
'$pageSection1Text2','$pageSection2Title','$pageSection1Image','$pageExtraImage1','$pageExtraImage2','$pageSection2Text','$pageSources')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $last_id = mysqli_insert_id($conn);
    echo $last_id;
    echo "<script> window.location.href='wikipagina.php?page_id=$last_id'; </script>";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();
}

?>

<body class="bg-secondary bg-gradient">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="containerWikipage container">
      <div class="main">
      <div class="mainTitle">
          <h1 class="display-3"><div class="mb-3S">
            <?php echo $film['filmTitle']; ?>
          </h1>
      </div>
      
        </div>
          <div class="mainText"> 
            <div class="">
              <textarea class="form-control" id="Textarea1" name="pageMainText" rows="5" maxlength="5000">Hoofd tekst</textarea>
            </div>
          </div>
            <div class="mainImage">
              <input type="text" class="form-control"  id="pageTrailer" name="pageTrailer" placeholder="Youtube link van Trailer">
            <div class="mb-3">
        </div>

        </div>
      </div>
      <div class="sidebar">
        <div class="sideImage"><img src="<?php echo $film['filmCoverImage']; ?>" alt="" width="125px" height="200px">
    </div>
    <div class="mb-3">
        </div>

    <div><h1><?php echo $film['filmTitle']; ?></h1></div>
        <div class="sideList"><table class="table">
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">Speeltijd</th>
      <td colspan="3"><?php echo $film['filmRuntime']; ?> <p> Minuten</p><div class="mb-3S">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Leeftijdsgroep</th>
      <td>EU: <?php echo $film['filmAgeRatingEU']; ?></td>
      <td>US: <?php echo $film['filmAgeRatingUS']; ?></td>
    </tr>
    <tr>
      <th scope="row">Taal</th>
      <td colspan="3"><?php echo $film['filmLanguage']; ?><div class="mb-3S">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Score</th>
      <td colspan="3"><?php echo $film['filmScore']; ?></td>
    </tr>
    <tr>
      <th scope="row">Kosten</th>
      <td colspan="3">US$ <?php echo $film['filmCost']; ?><div class="mb-3S">
      </div></td>
    </tr>
    <tr>
      <th scope="row">Opbrengsten</th>
      <td colspan="3">US$ <?php echo $film['filmEarnings']; ?><div class="mb-3S">
      </div></td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th>Mensen</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th colspan="2">
    </tr>

  </tbody>
</table></div>
        <div class="sideText"><div class="">
            <textarea class="form-control" name="pageSidebarText" id="Textarea2" rows="5" maxlength="5000">Zijbalk Tekst</textarea>
            </div></div>
      </div>
      
      <div class="sections">
        <div class="section1Title"><div class="mb-3S">
      <input type="text" class="form-control"  id="section1Title" name="pageSection1Title" placeholder="section1Title">
      </div></div>

        <div class="section1MainText"><div class="">
            <textarea class="form-control" id="Textarea3" rows="5" name="pageSection1Text1" maxlength="5000">Sectie 1 Tekst</textarea>
            </div></div>

        <div class="section1Image"><img src="images/test-image.png" alt="" class="img-fluid rounded">
        <div class="mb-3">
        <input class="form-control" type="file" name="pageSection1Image" id="formFile">
        </div></div>

        <div class="section1ExtraText"><div class="">
            <textarea class="form-control" id="Textarea4" name="pageSection1Text2" rows="5" maxlength="5000">Sectie 1 Extra Tekst</textarea>
            </div></div>

        <div class="section2Title"><div class="mb-3S">
      <input type="text" class="form-control"  id="section2Title" name="pageSection2Title" placeholder="section2Title">
      </div></div>
        
        <div class="section2MainText"><div class="">
            <textarea class="form-control" name="pageSection2Text" id="Textarea4" rows="5" maxlength="5000">Sectie 2 Tekst</textarea>
            </div></div>
      </div>
    <div class="sideimages">
    <div class="">
        <input class="form-control" name="pageExtraImage1" type="file" id="formFile">
        </div>
<img src="images/test-image.png" alt="" class="img-fluid rounded">

<div class="">
        <input class="form-control" name="pageExtraImage2" type="file" id="formFile">
        </div>

    <img src="images/test-image.png" alt="" class="img-fluid rounded"></div>
    <div class="sources"><div class="">
            <textarea class="form-control" name="pageSources" id="Textarea5" rows="5" maxlength="5000">bronnen</textarea>
            </div></div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary mb-3">Bevestig</button>

  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<?php } ?>
<?php include "footer.php"; ?>

</html>