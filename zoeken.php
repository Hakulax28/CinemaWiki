<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleD.css">
    <link rel="stylesheet" href="styleD.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<?php include "header.php"; ?>


<?php require 'connectie.php';
$query = $_GET['query'];

$sql = "SELECT *, genre.genreName, films.filmTitle FROM wikipages INNER JOIN films ON wikipages.film_id = films.film_id INNER JOIN film_genres ON films.film_id = film_genres.film_id INNER JOIN genre ON film_genres.genre_id = genre.genre_id AND (genre.genreName LIKE '%$query%' or films.filmTitle LIKE '%$query%')";
$result = mysqli_query($conn,$sql);

$pages = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<div class="container bg-light border border-white rounded-1"><br>
    <h1>Pages featuring "<?php echo $query ?>"</h1><br>
    <div class="d-flex flex-column mb-3 mt-3 bg-light rounded">
    <?php foreach($pages as $page): ?>
        <div class="p-2 col justify-content-start d-flex align-items-center">
            <img src="<?php echo $page["filmCoverImage"] ?>" alt="" width="100px" height="150px" class="rounded">
            <div class="text-start p-2">
                <div class="d-flex flex-row justify-content-start align-items-end">
                    <h2 class="p-2"><?php echo $page["filmTitle"] ?></h2>
                    <p class="p-2">Genre: 
                    <?php 
                    $film_id = $page["film_id"];
                    $sql = "SELECT genre.genreName FROM film_genres INNER JOIN genre ON film_genres.genre_id = genre.genre_id WHERE film_id=$film_id LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    $genre = mysqli_fetch_assoc($result);
                    mysqli_free_result($result);
                    echo "<a class=\"badge bg-secondary\" href=\"zoeken.php?query=".$genre['genreName']."\">".$genre['genreName']."</a>";

                    ?>
                    </p>
                </div>
                <div class="d-flex flex-row justify-content-start align-items-center">
                    <div class="p-2">
                        <div style="overflow: scroll; height: 100px;" >
                        <?php echo $page["pageMainText"] ?>
                        </div>
                    </div>
                    <a class="btn btn-primary shadow" href="wikipagina.php?page_id=<?php echo $page["page_id"] ?>">Go</a>
                </div>
            </div>
        </div>
<?php endforeach; ?>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>