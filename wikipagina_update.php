<?php
require "connectie.php";

$id = $_GET["page_id"]; //17
$sql = "SELECT * FROM wikipages WHERE page_id = $id LIMIT 1";

if ($result = mysqli_query($conn, $sql)) {

  $page = mysqli_fetch_assoc($result);

  //var_dump($user);

  if (is_null($page)) {
    header("location: wikipagina_overzicht");
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
    move_uploaded_file($_FILES['pageMainImage']['tmp_name'], "images/" . $_FILES['pageMainImage']['name']);
    $pageMainImage = "images/" . $_FILES['pageMainImage']['name'];
  } else {
    echo "page main image not found!";
    $pageMainImage = "";
  }

  if (isset($_FILES['pageSection1Image'])) {
    move_uploaded_file($_FILES['pageSection1Image']['tmp_name'], "images/" . $_FILES['pageSection1Image']['name']);
    $pageSection1Image = "images/" . $_FILES['pageSection1Image']['name'];
  } else {
    echo "page section 1 image not found!";
    $pageSection1Image = "";
  }
  if (isset($_FILES['pageExtraImage1'])) {
    move_uploaded_file($_FILES['pageExtraImage1']['tmp_name'], "images/" . $_FILES['pageExtraImage1']['name']);
    $pageExtraImage1 = "images/" . $_FILES['pageExtraImage1']['name'];
  } else {
    echo "page extra image 1 not found!";
    $pageExtraImage1 = "";
  }
  if (isset($_FILES['pageExtraImage2'])) {
    move_uploaded_file($_FILES['pageExtraImage2']['tmp_name'], "images/" . $_FILES['pageExtraImage2']['name']);
    $pageExtraImage2 = "images/" . $_FILES['pageExtraImage2']['name'];
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
    echo "New record created successfully";
    $last_id = mysqli_insert_id($conn);
    echo $last_id;
    echo "<script> window.location.href='wikipagina.php?page_id=$last_id'; </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}

?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
  <main class="form-signin w-100 m-auto">
    <form action="update_verwerking.php?user_id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
      <!--<img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">Update jouw gegevens</h1>
      <div class="row g-2">
        <div class="col-md">
          <div class="form-floating">
            <input type="text" name="pageMainText" id="pageMainText" value="<?php echo $page["pageMainText"] ?>" class="form-control">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageMainImage"]; ?>">
            <img src="<?php echo $page["pageMainImage"] ?>" alt="none" width="100px" height="100px">
            <input type="file" id="floatingInput" name="profielFoto" class="form-control"><br>
            <label for="floatingInput">Current image: <?php echo $page["pageMainImage"] ?></label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" name="pageSidebarText" id="floatingInput" value="<?php echo $page["pageSidebarText"] ?>" placeholder="name@example.com">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="text" class="form-control" name="pageSection1Title" id="floatingPassword" value="<?php echo $page["pageSection1Title"] ?>" placeholder="Password">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="text" name="pageSection1Text1" id="floatingInput" value="<?php echo $page["pageSection1Text1"] ?>" class="form-control">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="text" name="pageSection1Text2" id="floatingInput" value="<?php echo $page["pageSection1Text2"] ?>" class="form-control">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="text" name="pageSection2Title" id="floatingInput" value="<?php echo $page["pageSection2Title"] ?>" class="form-control">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageSection1Image"]; ?>">
            <img src="<?php echo $page["pageSection1Image"] ?>" alt="none" width="100px" height="100px">
            <input type="file" id="floatingInput" name="profielFoto" class="form-control"><br>
            <label for="floatingInput">Current image: <?php echo $page["pageSection1Image"] ?></label>
          </div>
          <div class="form-floating">
            <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageExtraImage1"]; ?>">
            <img src="<?php echo $page["pageExtraImage1"] ?>" alt="none" width="100px" height="100px">
            <input type="file" id="floatingInput" name="profielFoto" class="form-control"><br>
            <label for="floatingInput">Current image: <?php echo $page["pageExtraImage1"] ?></label>
          </div>
          <div class="form-floating">
            <input type="hidden" name="oudeProfielfoto" value="<?php echo $page["pageExtraImage2"]; ?>">
            <img src="<?php echo $page["pageExtraImage2"] ?>" alt="none" width="100px" height="100px">
            <input type="file" id="floatingInput" name="profielFoto" class="form-control"><br>
            <label for="floatingInput">Current image: <?php echo $page["pageExtraImage2"] ?></label>
          </div>
          <div class="form-floating">
            <input type="text" name="pageSection2Text" id="floatingInput" value="<?php echo $page["pageSection2Text"] ?>" class="form-control">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
          <div class="form-floating">
            <input type="text" name="pageSources" id="floatingInput" value="<?php echo $page["pageSources"] ?>" class="form-control">
            <label for="floatingInput">Voornaam: </label>
          </div><br>
        </div>
      </div>
      <?php if ($_SESSION['role'] == "gebruiker") : ?>
        <button class="w-100 btn btn-lg btn-success shadow" type="submit" name="submit">Update</button>
        <a href="index.php" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a><br>
        <a href="delete.php?user_id=<?php echo $id; ?>" class="w-100 btn btn-lg btn-warning shadow">Verwijder </a>
      <?php endif ?>
      <?php if ($_SESSION['role'] == "beheerder") : ?>
        <button class="w-100 btn btn-lg btn-success shadow" type="submit" name="submit">Update</button>
        <a href="wikipagina.php?page_id=<?php echo $page["page_id"] ?>" class="w-100 btn btn-lg btn-danger shadow">Annuleer</a>
      <?php endif ?>
    </form>
  </main>
</div>