<?php
require "connectie.php";
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

<?php
require "connectie.php";
if (isset($_GET['page_id'])) {
  $page_id =  $_GET['page_id'];
  $sql = "SELECT * FROM wikipages where page_id= '$page_id'";

  $result = mysqli_query($conn, $sql);
  $page = mysqli_fetch_assoc($result);

  mysqli_free_result($result);

  $film_id = $page['film_id'];
  $sql2 = "SELECT * FROM films where film_id= '$film_id'";

  $result2 = mysqli_query($conn, $sql2);
  $film = mysqli_fetch_assoc($result2);

  mysqli_free_result($result2);

?>


  <body class="bg-secondary bg-gradient">
    <div class="containerWikipage container text-start">
      <div class="main">
        <div class="mainTitle">
          <?php if (!empty($_SESSION)) : ?>
            <?php if ($_SESSION['role'] == "gebruiker") : ?>
              <a href="wikipagina_update.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-warning shadow">Bewerken</a>
              <a href="wikipagina_delete.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a>
            <?php endif ?>
            <?php if ($_SESSION['role'] == "beheerder") : ?>
              <a href="wikipagina_overzicht.php" class="shadow btn btn-warning shadow">Overzicht</a>
              <a href="wikipagina_update.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-warning shadow">Bewerken</a>
              <a href="wikipagina_delete.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a>
            <?php endif ?>
          <?php endif ?>
          <a href="geschiedenis.php" class="shadow btn btn-primary shadow">Geschiedenis</a>
          <h1 class="display-3"><?php echo $film['filmTitle']; ?></h1>
        </div>
        <div class="mainText">
          <p><?php echo $page['pageMainText']; ?></p>
        </div>
        <div class="mainImage">
          
          <iframe width="100%" height="500" class="rounded" src="<?php echo $page['pageTrailer']; ?>" title="Dune | Official Main Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
      </div>
      <div class="sidebar">
        <div class="sideImage"><img src="<?php echo $film['filmCoverImage']; ?>" alt="" width="125px" height="200px">
        </div>
        <div>
          <h1><?php echo $film['filmTitle']; ?></h1>
          <?php if (!empty($_SESSION)) : ?>
            <?php if ($_SESSION['role'] == "gebruiker") : ?>
              <a href="film_update.php?film_id=<?php echo $page["film_id"] ?>" class="shadow btn btn-warning shadow">Bewerken</a>
            <?php endif ?>
            <?php if ($_SESSION['role'] == "beheerder") : ?>
              <a href="film_update.php?film_id=<?php echo $page["film_id"] ?>" class="shadow btn btn-warning shadow">Update</a>
            <?php endif ?>
          <?php endif ?>
        </div>
        <div class="sideList">
        <table class="table">
            <thead>
              <tr>
                <th>Genres</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php 
              $sql = "SELECT film_genres.genre_id, film_genres.film_id, genre.genreName, genre.genreDescription FROM film_genres INNER JOIN genre ON film_genres.genre_id = genre.genre_id and film_genres.film_id = $film_id";
              $result = mysqli_query($conn,$sql);

              $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);

              ?>
              <?php foreach($genres as $genre): ?>
                <tr>
                  <th><?php echo $genre["genreName"] ?></th>
                  
                  <?php if (!empty($_SESSION)) : ?>
            <?php if ($_SESSION['role'] == "gebruiker" || $_SESSION['role'] == "beheerder") : ?>
              <?php $genre_id = $genre['genre_id'];  ?>
              <td><a href="delete_genre_van_film.php?film_id=<?php echo $film_id.'&genre_id='.$genre_id.'&page_id='.$page_id ?>" class="btn btn-danger">delete</a></td>
              <?php endif ?>
              <?php endif ?>
                </tr>
              <?php endforeach; ?>
              <?php if (!empty($_SESSION)) : ?>
            <?php if ($_SESSION['role'] == "gebruiker" || $_SESSION['role'] == "beheerder") : ?>
              <tr>
                <form action="process_GenreToevoegenAanFilm.php?id=<?php echo $film_id ?>&page_id=<?php echo $page_id ?>" method="POST">
                  <th scope="row" colspan="2">
                  <?php
                  $sql = "SELECT * FROM genre";
          $result = mysqli_query($conn,$sql);
          $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
      <input class="form-control" name="addGenre" list="datalistGenres" id="genreDataList" placeholder="Zoek een genre...">
        <datalist id="datalistGenres">
          <?php foreach($genres as $genre): ?>
            <option value="<?php echo $genre["genre_id"] ?>"><?php echo $genre["genreName"] ?></option>
          <?php endforeach; 
          mysqli_free_result($result);
?>
        </datalist></th></th>
                  <td colspan="1"><button type="submit" name="submit" class="btn btn-primary mb-3">Add to page</button></td>
                  <td><a href="genre_toevoegen.php">or add new genre</a></td>
                </form>
              </tr>
              <?php endif ?>
              <?php endif ?>

            </tbody>
          </table>
          <table class="table">
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">Runtime</th>
                <td colspan="3"><?php echo $film['filmRuntime']; ?><p> Minutes</p>
                </td>
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
                <td colspan="3">US$ <?php echo $film['filmCost']; ?></td>
              </tr>
              <tr>
                <th scope="row">Earnings</th>
                <td colspan="3">US$ <?php echo $film['filmEarnings']; ?></td>
              </tr>
            </tbody>
          </table>
          <table class="table">
            <thead>
              <tr>
                <th>image</th>
                <th>Role</th>
                <th colspan="2">Name</th>
                <th>Age</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php 
              $sql = "SELECT people_in_film.person_id, people_in_film.film_id, people.personName, people.personAge, people.personRole, people.personImage, people.personDescription FROM people_in_film INNER JOIN people ON people_in_film.person_id = people.person_id and people_in_film.film_id = $film_id";
              $result = mysqli_query($conn,$sql);

              $people = mysqli_fetch_all($result, MYSQLI_ASSOC);

              ?>
              <?php foreach($people as $person): ?>
                <tr>
                  <th><img src="<?php echo $person["personImage"] ?>" alt="" class="personImage rounded" style="object-fit: cover;" srcset=""></th>
                  <th><?php echo $person["personRole"] ?></th>
                  <td colspan="2"><a href="#" role="button" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $person["person_id"] ?>"><?php echo $person["personName"] ?></a></td>

                  <div class="modal fade" id="Modal<?php echo $person["person_id"] ?>" tabindex="-1" aria-labelledby="Modal<?php echo $person["person_id"] ?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="Modal<?php echo $person["person_id"] ?>Label"><?php echo $person["personName"] ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <img src="<?php echo $person["personImage"] ?>"class="rounded img-fluid float-start h-25 w-25 p-2" alt="<?php echo $person["personName"] ?>" >
                          <p><?php echo $person["personDescription"] ?></p>
                        </div>
                        <div class="modal-footer">
                          <a class="btn btn-primary" href="zoeken.php?query=<?php echo $person["personName"] ?>">Zoek persoon</a>
                          <a class="btn btn-warning" href="persoon_bewerken.php?person_id=<?php echo $person["person_id"] ?>">bewerk informatie</a>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  <td><?php echo $person["personAge"] ?></td>
                  <?php if (!empty($_SESSION)) : ?>
            <?php if ($_SESSION['role'] == "gebruiker" || $_SESSION['role'] == "beheerder") : ?>
              <?php $person_id = $person['person_id'];  ?>
              <td><a href="delete_persoon_van_film.php?film_id=<?php echo $film_id.'&person_id='.$person_id.'&page_id='.$page_id ?>" class="btn btn-danger">delete</a></td>
              <?php endif ?>
              <?php endif ?>
                </tr>
              <?php endforeach; 
              mysqli_free_result($result); ?>
              
              <?php if (!empty($_SESSION)) : ?>
            <?php if ($_SESSION['role'] == "gebruiker" || $_SESSION['role'] == "beheerder") : ?>
              <tr>
                <form action="process_persoonToevoegenAanPagina.php?id=<?php echo $film_id ?>&page_id=<?php echo $page_id ?>" method="POST">
                  <th scope="row" colspan="2">
                  <?php
                  $sql1 = "SELECT * FROM people";
          $result = mysqli_query($conn,$sql1);
          $people = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
      <input class="form-control" name="addPerson" list="datalistPersonen" id="persoonDataList" placeholder="Zoek een persoon...">
        <datalist id="datalistPersonen">
          <?php foreach($people as $person): ?>
            <option value="<?php echo $person["person_id"] ?>"><?php echo $person["personName"] ?></option>
          <?php endforeach; 
          mysqli_free_result($result);
?>
        </datalist></th></th>
                  <td colspan="1"><button type="submit" name="submit" class="btn btn-primary mb-3">Add to page</button></td>
                  <td><a href="persoon_toevoegen.php">or add new person</a></td>
                </form>
              </tr>
              <?php endif ?>
              <?php endif ?>

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