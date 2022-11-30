<?php 
require "connectie.php";

if(isset($_POST["submit"]))
{
    
$pageMainText = $_POST['pageMainText']; 
$pageMainImage = $_POST['pageMainImage']; 
$pageSidebarText = $_POST['pageSidebarText']; 
$pageSection1Title= $_POST['pageSection1Title']; 
$pageSection1Text1 = $_POST['pageSection1Text1']; 
$pageSection1Text2 = $_POST['pageSection1Text2']; 
$pageSection1Image = $_POST['pageSection1Image']; 
$pageSection2Title = $_POST['pageSection2Title']; 
$pageSection2Text = $_POST['pageSection2Text']; 
$pageExtraImage1 = $_POST['pageExtraImage1']; 
$pageExtraImage2 = $_POST['pageExtraImage2']; 
$pageSources = $_POST['pageSources']; 



$sql = "INSERT INTO wikipages (pageMainText,pageSidebarText,pageSection1Title,pageSection1Text1,
pageSection1Text2,pageSection2Title,pageSectionText,pageSources)
VALUES ('$pageMainText','$pageSidebarText','$pageSection1Title','$pageSection1Text1',
'$pageSection1Text2','$pageSection2Title','$pageSection2Text','$pageSources')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: index.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }$conn->close();
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
  <form action="" method="POST">
    <div class="containerWikipage container">
      <div class="main">
      <div class="mainTitle">
            <h1 class="display-3"><div class="mb-3S">
      <input type="text" class="form-control"  id="filmTitle" name="filmTitle" placeholder="Film Title">
      </div></h1>
            <h2><div class="mb-3S">
      <input type="text" class="form-control"  id="filmSubtitle" name="filmSubtitle" placeholder="Film subtitle">
      </div></h2>
        </div>
            <div class="mainText">
            <div class="">
            <textarea class="form-control" id="Textarea1" name="pageMainText" rows="5" maxlength="500">Main Text</textarea>
            </div>
            </div>
            <div class="mainImage">
            <img src="images/test-image.png" class="img-fluid rounded" alt="...">
            <div class="mb-3">
        <input class="form-control" type="file" name="pageMainImage" id="formFile">
        </div>

        </div>
      </div>
      <div class="sidebar">
        <div class="sideImage"><img src="images/test-image.png" alt="" width="125px" height="200px">
    </div>
    <div class="mb-3">
        <input class="form-control" type="file" name="filmCoverImage" id="formFile">
        </div>

    <div><h1>film title</h1></div>
        <div class="sideList"><table class="table">
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">Title</th>
      <td colspan="3">Film title</td>
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
      <th scope="row">language</th>
      <td colspan="3"><div class="mb-3S">
      <input type="text" class="form-control"  id="filmLanguage" placeholder="Film Language">
      </div></td>
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
</table></div>
        <div class="sideText"><div class="">
            <textarea class="form-control" name="pageSidebarText" id="Textarea2" rows="5" maxlength="500">Sidebar Text</textarea>
            </div></div>
      </div>
      
      <div class="sections">
        <div class="section1Title"><div class="mb-3S">
      <input type="text" class="form-control"  id="section1Title" name="pageSection1Title" placeholder="section1Title">
      </div></div>

        <div class="section1MainText"><div class="">
            <textarea class="form-control" id="Textarea3" rows="5" name="pageSection1Text1" maxlength="500">Section 1 Text</textarea>
            </div></div>

        <div class="section1Image"><img src="images/test-image.png" alt="" class="img-fluid rounded">
        <div class="mb-3">
        <input class="form-control" type="file" name="pageSection1Image" id="formFile">
        </div></div>



        <div class="section1ExtraText"><div class="">
            <textarea class="form-control" id="Textarea4" name="pageSection1Text2" rows="5" maxlength="500">Section 1 Extra Text</textarea>
            </div></div>

        <div class="section2Title"><div class="mb-3S">
      <input type="text" class="form-control"  id="section2Title" name="pageSection2Title" placeholder="section2Title">
      </div></div>
        
        <div class="section2MainText"><div class="">
            <textarea class="form-control" name="pageSection2Text" id="Textarea4" rows="5" maxlength="500">Section 2 Text</textarea>
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
            <textarea class="form-control" name="pageSources" id="Textarea5" rows="5" maxlength="500">Sources Text</textarea>
            </div></div>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Confirm</button>

  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>