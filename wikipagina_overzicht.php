<?php require 'connectie.php';

// hier moet de info van de anderen tabelen te voor schijn komen. 

$sql = "SELECT * FROM wikipages";

$sql = "SELECT *, films.filmTitle as film_id
FROM wikipages 
JOIN films ON films.film_id = wikipages.page_id";

if ($result = mysqli_query($conn, $sql)) {
   $pages = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<?php include "header.php" ?>

<div class="container bg-light border border-white rounded-1"><br>
   <h1>Uw gegevens</h1><br>
   <div style="overflow-x:auto;">
      <table class=" table table-striped table-dark">
         <thead>
            <tr>
               <!--<th>ID</th>-->
               <th>Film</th>
               <th>Main Text</th>
               <th>Main Photo</th>
               <th>Zij Text</th>
               <th>Sectie1 Titel</th>
               <th>Sectie1 Text1</th>
               <th>Sectie1 Text2</th>
               <th>Sectie1 Foto</th>
               <th>Sectie2 Titel</th>
               <th>Sectie2 Text</th>
               <th>Extra foto1</th>
               <th>Extra foto2</th>
               <th>Bronnen</th>
               <th>Verwijder</th>
               <th>Update</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($pages as $page) : ?>
               <tr>
                  <!--<td><?php echo $page["page_id"] ?></td>-->
                  <td><?php echo $page["film_id"] ?></td>
                  <td><?php echo $page["pageMainText"] ?></td>
                  <td><?php echo $page["pageMainImage"] ?></td>
                  <td><?php echo $page["pageSidebarText"] ?></td>
                  <td><?php echo $page["pageSection1Title"] ?></td>
                  <td><?php echo $page["pageSection1Text1"] ?></td>
                  <td><?php echo $page["pageSection1Text2"] ?></td>
                  <td><?php echo $page["pageSection1Image"] ?></td>
                  <td><?php echo $page["pageSection2Title"] ?></td>
                  <td><?php echo $page["pageSection2Text"] ?></td>
                  <td><?php echo $page["pageExtraImage1"] ?></td>
                  <td><?php echo $page["pageExtraImage2"] ?></td>
                  <td><?php echo $page["pageSources"] ?></td>
                  <td><a href="wikipagina_delete.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                  <td><a href="wikipagina_update.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</div>
<?php include "footer.php" ?>