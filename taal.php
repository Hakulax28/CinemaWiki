<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM language";

if ($result = mysqli_query($conn, $sql)) {
    $languages = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php"; ?>

<div class="container bg-light border border-white rounded-1">
    <h1>Talen van de films</h1><br>
    <table class="table table-striped table-dark rounded-1">
        <thead>
            <tr>
                <!--<th>ID</th>-->
                <th>De taal</th>
                <th>De land van Oorsprong</th>
                <?php if (!empty($_SESSION)) : ?>
                    <?php if ($_SESSION['role'] == "beheerder") : ?>
                        <th>Verwijder</th>
                        <th>Update</th>
                    <?php endif ?>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($languages as $language) : ?>
                <tr>
                    <!--<td><?php echo $language["language_id"] ?></td>-->
                    <td><?php echo $language["taal"] ?></td>
                    <td><?php echo $language["land_van_oorsprong"] ?></td>
                    <?php if (!empty($_SESSION)) : ?>
                        <?php if ($_SESSION['role'] == "beheerder") : ?>
                            <td><a href="taal_delete.php?taal_id=<?php echo $language["taal_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                            <td><a href="taal_update.php?taal_id=<?php echo $language["taal_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
                        <?php endif ?>
                    <?php endif ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if (!empty($_SESSION)) : ?>
        <?php if ($_SESSION['role'] == "beheerder") : ?>
            <a href="taal_toevoegen.php" class="w-100 btn btn-lg btn-warning shadow">Voeg een taal toe</a>
        <?php endif ?>
    <?php endif ?>
</div>
<?php include "footer.php"; ?>