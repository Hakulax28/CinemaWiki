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
   <h1>Alle wiki paginas</h1><br>
   <div style="overflow-x:auto;">
      <table class=" table table-striped table-dark">
         <thead>
            <tr>
               <!--<th>ID</th>-->
               <th>Film Titel</th>
               <th>Main Text</th>
               <th>Film Trailer</th>
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
               <th>De pagina zelf</th>
               <th>Verwijder</th>
               <th>Update</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($pages as $page) : ?>
               <tr>
                  <!--<td><?php echo $page["page_id"] ?></td>-->
                  <td><?php echo $page["film_id"] ?></td>
                  <td><button type="button" class="btn btn-primary" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#ModalMainTekst<?php echo $page["page_id"] ?>">zie main tekst</button></td>

                  <div class="modal fade" id="ModalMainTekst<?php echo $page["page_id"] ?>" tabindex="-1" aria-labelledby="ModalMainTekst<?php echo $page["page_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalMainTekst<?php echo $page["page_id"] ?>Label">Main Tekst</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php echo $page["pageMainText"] ?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  </div>

                  <td><iframe width="200px" height="100px" class="rounded" src="<?php echo $page['pageTrailer']; ?>" title="Official Main Trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>

                  <td><button type="button" class="btn btn-primary" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#ModalSidebarTekst<?php echo $page["page_id"] ?>">zie sidebar tekst</button></td>

                  <div class="modal fade" id="ModalSidebarTekst<?php echo $page["page_id"] ?>" tabindex="-1" aria-labelledby="ModalSidebarTekst<?php echo $page["page_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalSidebarTekst<?php echo $page["page_id"] ?>Label">Sidebar Tekst</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php echo $page["pageSidebarText"] ?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  </div>

                  <td><?php echo $page["pageSection1Title"] ?></td>

                  <td><button type="button" class="btn btn-primary" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#ModalSection1Text1<?php echo $page["page_id"] ?>">zie sectie 1 tekst 1</button></td>

                  <div class="modal fade" id="ModalSection1Text1<?php echo $page["page_id"] ?>" tabindex="-1" aria-labelledby="ModalSection1Text1<?php echo $page["page_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalSection1Text1<?php echo $page["page_id"] ?>Label">Section 1 Text 1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php echo $page["pageSection1Text1"] ?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  
                  <td><button type="button" class="btn btn-primary" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#ModalSection1Text2<?php echo $page["page_id"] ?>">zie sectie 1 tekst 2</button></td>

                  <div class="modal fade" id="ModalSection1Text2<?php echo $page["page_id"] ?>" tabindex="-1" aria-labelledby="ModalSection1Text2<?php echo $page["page_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalSection1Text2<?php echo $page["page_id"] ?>Label">Section 1 Text 2</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php echo $page["pageSection1Text2"] ?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  
                  <td><img src="<?php echo $page["pageSection1Image"] ?>" alt="" width="200px" height="100px"></td>
                  <td><?php echo $page["pageSection2Title"] ?></td>
                  
                  <td><button type="button" class="btn btn-primary"  style="width: 100px;" data-bs-toggle="modal" data-bs-target="#ModalSection2Text<?php echo $page["page_id"] ?>">zie sectie 2 tekst</button></td>

                  <div class="modal fade" id="ModalSection2Text<?php echo $page["page_id"] ?>" tabindex="-1" aria-labelledby="ModalSection2Text<?php echo $page["page_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalSection2Text<?php echo $page["page_id"] ?>Label">Section 2</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php echo $page["pageSection2Text"] ?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>

                  <td><img src="<?php echo $page["pageExtraImage1"] ?>" alt="" width="200px" height="100px"></td>
                  <td><img src="<?php echo $page["pageExtraImage2"] ?>" alt="" width="200px" height="100px"></td>

                  <td class="w-50"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalSources<?php echo $page["page_id"] ?>">zie bronnen</button></td>

                  <div class="modal fade" id="ModalSources<?php echo $page["page_id"] ?>" tabindex="-1" aria-labelledby="ModalSources<?php echo $page["page_id"] ?>Label" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalSources<?php echo $page["page_id"] ?>Label">Section 2</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <?php echo $page["pageSources"] ?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>

                  <td><a href="wikipagina.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-success shadow">Bezoek</a></td>
                  <td><a href="wikipagina_delete.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-danger shadow">Verwijder</a></td>
                  <td><a href="wikipagina_update.php?page_id=<?php echo $page["page_id"] ?>" class="shadow btn btn-warning shadow">Update</a></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
   <button class="w-100 btn btn-lg btn-danger shadow" onclick="history.back()">Ga terug</button>
</div>
<?php include "footer.php" ?>