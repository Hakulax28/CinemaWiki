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
            <!--<td>test</td>-->
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td><a href="delete.php" class="shadow btn btn-danger">Verwijder</a></td>
            <td><a href="update_gegevens.php" class="shadow btn btn-warning">Update</a></td>
         </tr>
      </tbody>
   </table>
</div>
<?php include "footer.php" ?>