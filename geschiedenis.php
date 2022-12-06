<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM changes";

$sql = "SELECT *, users.lastname as user_id, films.filmTitle as page_id
FROM changes 
JOIN users ON users.user_id = changes.user_id
JOIN films ON films.film_id = changes.page_id";

if ($result = mysqli_query($conn, $sql)) {
    $changes = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<?php include "header.php"; ?>

<body class="bg-secondary bg-gradient">
    <div class="container bg-light rounded p-2">
        <h2 class="display-1">Bewerkingen geschiedenis</h2>
        <?php foreach ($changes as $change) : ?>
            <div class="d-flex flex-column mb-3 mt-3 border bg-light shadow-sm bg-gradient rounded">
                <div class="p-2 col justify-content-start d-flex align-items-center">
                    <img src="images/test-image.png" alt="" width="100px" height="100px" class="rounded">
                    <h2 class="p-2"><?php echo $change["user_id"] ?> has edited <?php echo $change["page_id"] ?> with <?php echo $change["changeText"] ?></h2>
                    <p>on <?php echo $change["changeDate"] ?> </p>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="wikipagina.php?page_id=1" class="w-100 btn btn-lg btn-success shadow" type="submit">Ga hier terug</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>