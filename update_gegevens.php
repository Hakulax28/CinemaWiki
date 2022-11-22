<?php include "header.php" ?>
<table class="table table-striped table-dark">
   <thead>
      <tr>
         <th>ID</th>
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
            <td><?php echo $user["id"] ?></td>
            <td><?php echo $user["voornaam"] ?></td>
            <td><?php echo $user["achternaam"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo $user["wachtwoord"] ?></td>
            <td><?php echo $user["geboortedatum"] ?></td>
            <td><?php echo $user["telefoonnummer"] ?></td>
            <td><?php echo $user["rol"] ?></td>
            <td><a href="gebruiker-delete.php?id=<?php echo $user["id"] ?>" class="btn btn-danger">Delete</a></td>
            <td><a href="gebruiker-update.php?id=<?php echo $user["id"] ?>" class="btn btn-warning">Update</a></td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>
<?php include "footer.php" ?>