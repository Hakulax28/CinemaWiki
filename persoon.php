<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM people";

if ($result = mysqli_query($conn, $sql)) {
   $persons = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php"; ?>

<div class="container bg-light border border-white rounded-1"><br>
   <h1>Genres</h1><br>
   <table class="table table-striped table-dark rounded-1">
      <thead>
         <tr>
            <!--<th>ID</th>-->
            <th>Persoons naam</th>
            <th>Leeftijd</th>
            <th>De rol</th>
            <th>Foto</th>
            <th>Descriptie</th>
            <?php if (!empty($_SESSION)) : ?>
               <?php if ($_SESSION['role'] == "beheerder") : ?>
                  <th>Verwijder</th>
                  <th>Update</th>
               <?php endif ?>
            <?php endif ?>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($persons as $person) : ?>
            <tr>
               <!--<td><?php echo $person["genre_id"] ?></td>-->
               <td><?php echo $person["personName"] ?></td>
               <td><?php echo $person["personAge"] ?></td>
               <td><?php echo $person["personRole"] ?></td>
               <td><img src="<?php echo $person["personImage"] ?>" alt="" width="90px" height="100px"></td>
               <td><button type="button" class="btn btn-primary" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#ModalSection1Text1<?php echo $person["person_id"] ?>">Bekijk hun descriptie</button></td>

               <div class="modal fade" id="ModalSection1Text1<?php echo $person["person_id"] ?>" tabindex="-1" aria-labelledby="ModalSection1Text1<?php echo $person["person_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="ModalSection1Text1<?php echo $person["person_id"] ?>Label">Descriptie</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <?php echo $person["personDescription"] ?>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  <?php if (!empty($_SESSION)) : ?>
                     <?php if ($_SESSION['role'] == "beheerder") : ?>
                        <td><a href="persoon_bewerken.php?person_id=<?php echo $person["person_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                        <td><a href="persoon_bewerken.php?person_id=<?php echo $person["person_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
                     <?php endif ?>
                  <?php endif ?>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <?php if (!empty($_SESSION)) : ?>
      <?php if ($_SESSION['role'] == "beheerder") : ?>
         <a href="genre_toevoegen.php" class="w-100 btn btn-lg btn-warning shadow">Voeg een genre toe</a>
      <?php endif ?>
   <?php endif ?>
</div>
<?php include "footer.php"; ?>