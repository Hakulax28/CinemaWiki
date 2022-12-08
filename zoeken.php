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

$sql = "SELECT films.filmTitle as fTitle, films.filmCoverImage as fImage, wikipages.pageMainText as pMain FROM wikipages INNER JOIN films ON wikipages.film_id = films.film_id AND films.filmTitle LIKE '%$query%'";
$result = mysqli_query($conn,$sql);

$pages = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<div class="container bg-light border border-white rounded-1"><br>
    <h1>Pages featuring "<?php echo $query ?>"</h1><br>
    <div class="d-flex flex-column mb-3 mt-3 bg-light rounded">
    <?php foreach($pages as $page): ?>
        <div class="p-2 col justify-content-start d-flex align-items-center">
            <img src="<?php echo $page["fImage"] ?>" alt="" width="100px" height="150px" class="rounded">
            <div class="text-start p-2">
                <div class="d-flex flex-row justify-content-start align-items-end">
                    <h2 class="p-2"><?php echo $page["fTitle"] ?></h2>
                    <p class="p-2">Categorie: </p>
                </div>
                <div class="d-flex flex-row justify-content-start align-items-center">
                    <p><?php echo $page["pMain"] ?></p>
                    <button type="button" class="btn btn-primary shadow">Go</button>
                </div>
            </div>
        </div>
<?php endforeach; ?>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>