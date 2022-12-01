<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM users";

if ($result = mysqli_query($conn, $sql)) {
   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1">
   <h1>Uw gegevens</h1><br>
   <table class="table table-striped table-dark">
      <thead>
         <tr>
            <!--<th>ID</th>-->
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Wachtwoord</th>
            <th>Geboortedatum</th>
            <th>Telefoonnummer</th>
            <th>Rol</th>
            <th>Verwijder</th>
            <th>Update</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $user) : ?>
            <tr>
               <!--<td><?php echo $user["user_id"] ?></td>-->
               <td><?php echo $user["firstname"] ?></td>
               <td><?php echo $user["lastname"] ?></td>
               <td><?php echo $user["email"] ?></td>
               <td><?php echo $user["password"] ?></td>
               <td><?php echo $user["date_of_birth"] ?></td>
               <td><?php echo $user["phonenumber"] ?></td>
               <td><?php echo $user["role"] ?></td>
               <td><a href="gebruiker_delete.php?user_id=<?php echo $user["user_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
               <td><a href="gebruiker_update.php?user_id=<?php echo $user["user_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>
<?php include "footer.php" ?>