<?php
require "connectie.php";

$id = $_GET["page_id"]; //17
$sql = "SELECT * FROM wikipages WHERE page_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

  $page = mysqli_fetch_assoc($result);

  //var_dump($user);

  if (is_null($page)) {
    header("location: wikipagina.php?page_id=$id");
  }
}

if (isset($_POST["submit"]) && $_POST["pageMainText"] != "") {

  $pageMainText = $_POST['pageMainText'];

  $pageSidebarText = $_POST['pageSidebarText'];
  $pageSection1Title = $_POST['pageSection1Title'];
  $pageSection1Text1 = $_POST['pageSection1Text1'];
  $pageSection1Text2 = $_POST['pageSection1Text2'];

  $pageSection2Title = $_POST['pageSection2Title'];
  $pageSection2Text = $_POST['pageSection2Text'];

  $pageSources = $_POST['pageSources'];

  if (isset($_FILES['pageMainImage'])) {
    move_uploaded_file($_FILES['pageMainImage']['tmp_name'], "images/filmscenes/" . $_FILES['pageMainImage']['name']);
    $pageMainImage = "images/filmscenes/" . $_FILES['pageMainImage']['name'];
  } else {
    echo "page main image not found!";
    $pageMainImage = "";
  }

  if (isset($_FILES['pageSection1Image'])) {
    move_uploaded_file($_FILES['pageSection1Image']['tmp_name'], "images/filmscenes/" . $_FILES['pageSection1Image']['name']);
    $pageSection1Image = "images/filmscenes/" . $_FILES['pageSection1Image']['name'];
  } else {
    echo "page section 1 image not found!";
    $pageSection1Image = "";
  }
  if (isset($_FILES['pageExtraImage1'])) {
    move_uploaded_file($_FILES['pageExtraImage1']['tmp_name'], "images/filmscenes/" . $_FILES['pageExtraImage1']['name']);
    $pageExtraImage1 = "images/filmscenes/" . $_FILES['pageExtraImage1']['name'];
  } else {
    echo "page extra image 1 not found!";
    $pageExtraImage1 = "";
  }
  if (isset($_FILES['pageExtraImage2'])) {
    move_uploaded_file($_FILES['pageExtraImage2']['tmp_name'], "images/filmscenes/" . $_FILES['pageExtraImage2']['name']);
    $pageExtraImage2 = "images/filmscenes/" . $_FILES['pageExtraImage2']['name'];
  } else {
    echo "page extra image 2 not found!";
    $pageExtraImage2 = "";
  }

  $sql = "UPDATE wikipages SET 
    pageMainText = '$pageMainText',
    pageMainImage = '$pageMainImage',
    pageSidebarText = '$pageSidebarText',
    pageSection1Title = '$pageSection1Title',
    pageSection1Text1 = '$pageSection1Text1',
    pageSection1Text2 = '$pageSection1Text2',
    pageSection2Title = '$pageSection2Title',
    pageSection1Image = '$pageSection1Image',
    pageExtraImage1 = '$pageExtraImage1',
    pageExtraImage2 = '$pageExtraImage2',
    pageSection2Text = '$pageSection2Text',
    pageSources = '$pageSources' WHERE wikipages.page_id = '$id' ";

  if ($conn->query($sql) === TRUE) {
    $sql = "SELECT * FROM films where filmTitle= '$filmTitle'";
    $result = mysqli_query($conn, $sql);
    $film = mysqli_fetch_assoc($result);
    $film_id = $film['film_id'];
    echo "New record created successfully";
    header("location: wikipagina.php?page_id=$id");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
} else if (isset($_POST["submit"])) {
  echo "<script>alert('Vul alle velden in!!!')</script>";
}
?>
<?php include "header.php" ?>

<body class="bg-secondary bg-gradient">
  <div class="container bg-light rounded p-2">
    <h2>Film Updaten</h2>
    <form action="wikipagina_update.php?page_id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
      <input type="text" class="form-control" id="pageMainText" name="pageMainText" placeholder="Film Title" value="<?php echo $page["pageMainText"] ?>"><br>
      <div class="form-floating">
        <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageMainImage"]; ?>">
        <img src="<?php echo $page["pageMainImage"]; ?>" alt="" width="100px" height="100px">
        <input type="file" id="floatingInput" name="pageMainImage" class="form-control"><br>
        <label for="floatingInput">Current image:</label>
        <a href="profielfoto_delete.php?path=<?php echo $page["pageMainImage"]; ?>&id=<?php echo $id ?>" class="btn btn-danger">Verwijder Foto</a>
      </div><br>
      <input type="text" class="form-control" id="pageSidebarText" name="pageSidebarText" placeholder="Film Title" value="<?php echo $page["pageSidebarText"] ?>"><br>
      <input type="text" class="form-control" id="pageSection1Title" name="pageSection1Title" placeholder="Film Title" value="<?php echo $page["pageSection1Title"] ?>"><br>
      <input type="text" class="form-control" id="pageSection1Text1" name="pageSection1Text1" placeholder="Film Title" value="<?php echo $page["pageSection1Text1"] ?>"><br>
      <input type="text" class="form-control" id="pageSection1Text2" name="pageSection1Text2" placeholder="Film Title" value="<?php echo $page["pageSection1Text2"] ?>"><br>
      <input type="text" class="form-control" id="pageSection2Title" name="pageSection2Title" placeholder="Film Title" value="<?php echo $page["pageSection2Title"] ?>"><br>
      <input type="text" class="form-control" id="pageSection2Text" name="pageSection2Text" placeholder="Film Title" value="<?php echo $page["pageSection2Text"] ?>"><br>
      <div class="form-floating">
        <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageSection1Image"]; ?>">
        <img src="<?php echo $page["pageSection1Image"]; ?>" alt="" width="100px" height="100px">
        <input type="file" id="floatingInput" name="pageSection1Image" class="form-control"><br>
        <label for="floatingInput">Current image:</label>
        <a href="profielfoto_delete.php?path=<?php echo $page["pageSection1Image"]; ?>&id=<?php echo $id ?>" class="btn btn-danger">Verwijder Foto</a>
      </div><br>
      <div class="form-floating">
        <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageExtraImage1"]; ?>">
        <img src="<?php echo $page["pageExtraImage1"]; ?>" alt="" width="100px" height="100px">
        <input type="file" id="floatingInput" name="pageExtraImage1" class="form-control"><br>
        <label for="floatingInput">Current image:</label>
        <a href="profielfoto_delete.php?path=<?php echo $page["pageExtraImage1"]; ?>&id=<?php echo $id ?>" class="btn btn-danger">Verwijder Foto</a>
      </div><br>
      <div class="form-floating">
        <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageExtraImage2"]; ?>">
        <img src="<?php echo $page["pageExtraImage2"]; ?>" alt="" width="100px" height="100px">
        <input type="file" id="floatingInput" name="pageExtraImage2" class="form-control"><br>
        <label for="floatingInput">Current image:</label>
        <a href="profielfoto_delete.php?path=<?php echo $page["pageExtraImage2"]; ?>&id=<?php echo $id ?>" class="btn btn-danger">Verwijder Foto</a>
      </div><br>
      <input type="text" class="form-control" id="pageSources" name="pageSources" placeholder="Film Title" value="<?php echo $page["pageSources"] ?>"><br>
      <button class="btn btn-primary" name="submit" type="submit">Update</button>
      <button class="btn btn-danger" onclick="history.back()">Ga terug</button>
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>