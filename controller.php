

<?php // Action Ajouté + Apparition du tableau
   if(isset($_GET['add']))
    echo '<form method="GET">
    <td><input  type="date" name="date" placeholder="date"></td>
    <td> <input  type="text" name="type" placeholder="type"></td>
    <td><input  type="text" name="floor" placeholder="floor"></td>
    <td><button type="submit" value="ajouter" name="add2">Ajouter</button></td></form>'

 ?>

 <?php //Ajout ligne modifié
 
 if(isset($_GET['edit']) && isset($_GET['idasupr'])){
 editPro();}
 ?>



<?php //Modifié
if(isset($_GET['edit2']) && !empty($_GET['id']) && !empty($_GET['date_']) && !empty($_GET['type_']) && !empty($_GET['floor_'])){
    editTask();
}?>
 

 <?php // Action Ajouté 
  if(isset($_GET['add2']) && !empty($_GET['date']) && !empty($_GET['type']) && !empty($_GET['floor'])){
        addTask();
    } ?>




<?php // Action supprimé
if(isset($_GET['remove']) && $_GET['remove']=="remove" && isset($_GET['idasupr'])){
      removeTask($_GET['idasupr']);
  }?>

  <?php //Add tab
  if(isset($_GET['addtab']) &&  !empty($_GET['type']) && !empty($_GET['date']) && !empty($_GET['etage'])){
      addTab() ; removeTab($_GET['idAdd']) ;

    //   if(isset(addTab())){
    //       removeTask();
    //   }
  }?>