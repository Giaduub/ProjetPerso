

<?php // Action Ajouté + Apparition du tableau
   if(isset($_GET['add']))
    echo '
    <td><input  type="date" name="date" placeholder="date"></td>
    <td> <input  type="text" name="type" placeholder="type"></td>
    <td><input  type="text" name="floor" placeholder="floor"></td>
    <td><button type="submit" value="ajouter" name="add2">Ajouter</button></td>'

 ?>

 <?php //Ajout ligne modifié
 if(isset($_GET['edit']) && isset($_GET['idasupr']))
 echo'<td><input type="text" name="id" placeholder="'.$tenant['id'].'"></td>
      <td><input type="date" name="date_" placeholder="'.$tenant['date'].'"></td>
      <td><input type="text" name="type_" placeholder="'.$tenant['type'].'"></td>
      <td><input type="text" name="floor_" placeholder="'.$tenant['floor'].'"></td>
      <td><button type="submit" value="edit2" name="edit2">Envoyer</button></td>'
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