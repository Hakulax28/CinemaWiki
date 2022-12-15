<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM users";

if ($result = mysqli_query($conn, $sql)) {
   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <h1>Uw gegevens</h1><br>
   <table class="table table-striped table-dark">
      <thead>
         <tr>
            <!--<th>ID</th>-->
            <th>Foto</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th hidden>Wachtwoord</th>
            <th>Geboortedatum</th>
            <th>Telefoonnummer</th>
            <th>Rol</th>
            <?php if (!empty($_SESSION)) : ?>
               <?php if ($_SESSION['role'] == "beheerder") : ?>
                  <th>Verwijder</th>
                  <th>Update</th>
               <?php endif ?>
            <?php endif ?>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $user) : ?>
            <tr>
               <td><img src="<?php echo $user["profilePicture"] ?>" alt="" class="profielFoto"></td>
               <!--<td><?php echo $user["user_id"] ?></td>-->
               <td><?php echo $user["firstname"] ?></td>
               <td><?php echo $user["lastname"] ?></td>
               <td><?php echo $user["email"] ?></td>
               <td hidden><?php echo $user["password"] ?></td>
               <td><?php echo $user["date_of_birth"] ?></td>
               <td><?php echo $user["phonenumber"] ?></td>
               <td><?php echo $user["role"] ?></td>
               <?php if (!empty($_SESSION)) : ?>
                  <?php if ($_SESSION['role'] == "beheerder") : ?>
                     <td><a href="gebruiker_delete.php?user_id=<?php echo $user["user_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                     <td><a href="gebruiker_update.php?user_id=<?php echo $user["user_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
                  <?php endif ?>
               <?php endif ?>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>
<?php include "footer.php" ?>