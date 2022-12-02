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

<?php 
require "connectie.php";
if (isset($_GET['page_id'])){
$page_id =  $_GET['page_id'];
$sql = "SELECT * FROM wikipages where page_id= '$page_id'";

$result = mysqli_query($conn,$sql);
$page = mysqli_fetch_assoc($result);

mysqli_free_result($result);

$film_id = $page['film_id'];
$sql2 = "SELECT * FROM films where film_id= '$film_id'";

$result2 = mysqli_query($conn,$sql2);
$film = mysqli_fetch_assoc($result2);

mysqli_free_result($result2);

?>


<body class="bg-secondary bg-gradient">
  <div class="containerWikipage container">
    <div class="main">
      <div class="mainTitle">
        <h1 class="display-3"><?php echo $film['filmTitle']; ?></h1>
      </div>
      <div class="mainText">
        <p><?php echo $page['pageMainText']; ?></p>
      </div>
      <div class="mainImage">
        <img src="<?php echo $page['pageMainImage']; ?>" class="img-fluid rounded" alt="...">
      </div>
    </div>
    <div class="sidebar">
      <div class="sideImage"><img src="<?php echo $film['filmCoverImage']; ?>" alt="" width="125px" height="200px">
      </div>
      <div>
        <h1><?php echo $film['filmTitle']; ?></h1>
      </div>
      <div class="sideList">
        <table class="table">
          <tbody class="table-group-divider">
            <tr>
              <th scope="row">Runtime</th>
              <td colspan="3"><?php echo $film['filmRuntime']; ?></td>
            </tr>
            <tr>
              <th scope="row">Age Rating</th>
              <td>EU: <?php echo $film['filmAgeRatingEU']; ?></td>
              <td>US: <?php echo $film['filmAgeRatingUS']; ?></td>
            </tr>
            <tr>
              <th scope="row">language</th>
              <td colspan="3"><?php echo $film['filmLanguage']; ?></td>
            </tr>
            <tr>
              <th scope="row">Score</th>
              <td colspan="3"><?php echo $film['filmScore']; ?></td>
            </tr>
            <tr>
              <th scope="row">Cost</th>
              <td colspan="3"><?php echo $film['filmCost']; ?></td>
            </tr>
            <tr>
              <th scope="row">Earnings</th>
              <td colspan="3"><?php echo $film['filmEarnings']; ?></td>
            </tr>
          </tbody>
        </table>
        <table class="table">
          <thead>
            <tr>
              <th>Role</th>
              <th>Name</th>
              <th>Age</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <th scope="row">Actor</th>
              <td colspan="2">Bob bob</td>
              <td>87</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="sideText">
        <p><?php echo $page['pageSidebarText']; ?></p>
      </div>
    </div>

    <div class="sections">
      <div class="section1Title">
        <h2><?php echo $page['pageSection1Title']; ?></h2>
      </div>

      <div class="section1MainText">
        <p><?php echo $page['pageSection1Text1']; ?></p>
      </div>

      <div class="section1Image"><img src="<?php echo $page['pageSection1Image']; ?>" alt="" class="img-fluid rounded"></div>

      <div class="section1ExtraText">
        <p><?php echo $page['pageSection1Text2']; ?></p>
      </div>

      <div class="section2Title">
        <h2><?php echo $page['pageSection2Title']; ?></h2>
      </div>

      <div class="section2MainText">
        <p><?php echo $page['pageSection2Text']; ?>
        </p>
      </div>
    </div>
    <div class="sideimages"><img src="<?php echo $page['pageExtraImage1']; ?>" alt="" class="img-fluid rounded">
      <img src="<?php echo $page['pageExtraImage2']; ?>" alt="" class="img-fluid rounded">
    </div>
    <div class="sources"><?php echo $page['pageSources']; ?></div>

  </div>

</body>
<?php } ?>
<?php include "footer.php"; ?>

</html>