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
            <th>Verwijder</th>
            <th>Update</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <!--<td><?php echo $user["id"] ?></td>-->
            <td><?php echo $user["voornaam"] ?></td>
            <td><?php echo $user["achternaam"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo $user["wachtwoord"] ?></td>
            <td><?php echo $user["geboortedatum"] ?></td>
            <td><?php echo $user["telefoon"] ?></td>
            <td><a href="delete.php?id=<?php echo $user["id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
            <td><a href="update_gegevens.php?id=<?php echo $user["id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
         </tr>
      </tbody>
   </table>
</div>
<?php include "footer.php" ?>