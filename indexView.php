<?php $title ='Administration'; ?>

<?php ob_start(); ?><div class="container">
      <div class="row">
  <form method="GET">
  <button type="submit" value="ajouter" name="add">Ajouter</button>
  </form>
  </div>
  </div>
<div class="container">
    <div class="row">
    
<table class="table table-dark col-6 justify-align-center">
  <thead>
    <tr>
       
      <th scope="col">Date</th>
      <th scope="col">Type</th>
      <th scope="col">Etage</th>
      <th></th>
      <th></th> 
      <th></th>
    </tr>
  </thead>
  <tbody>

  <?php $tenant=showAll();?>

  <?php foreach($tenant as $tenant): ?>
    <tr> 
      <td><?= $tenant['date']?></td>
      <td><?= $tenant['type']?></td>
      <td><?= $tenant['floor']?></td>
      <form method="GET">
      <td><input type="text" name="idasupr" value="<?= $tenant['id']?>"></td>
      <td><button type="submit" value="remove" name="remove">Supprimer</button></td> 
      <td><button type="submit" value="edit" name="edit">Modifier</button></td>
 </form>
    </tr>
  </tbody>
  <?php endforeach; ?>
 <?php require ('controller.php')?></table>

<?php $task=taskShow();?>
  
  <?php $tenant=showAll();?>
   
  <table class="table table-dark  ml-1 col-5 justify-align-center">
  <thead>
    <tr>
       <th></th>
      <th scope="col">Date</th>
      <th scope="col">Type</th>
      <th scope="col">Etage</th>
      <th></th>
      <th></th> 
      <th></th>
    </tr>
  </thead>
  <tbody>
 
<?php foreach($task as $task): ?>
   <form method="GET"> <tr>
    <td><input type="hidden" name="idAdd" value="<?= $task['id']?>"></td>
      <td><?= $task['date']?></td>
      <input type="hidden" name="date" value="<?= $task['date']?>"></td>
      <td><?= $task['type']?></td>
      <input type="hidden" name="type" value="<?= $task['type']?>"></td>
      <td><?= $task['etage']?></td>
      <input type="hidden" name="etage" value="<?= $task['etage']?>"></td>
      
      <td><button type="submit" value="addtab" name="addtab">Valider</button></td>
    </tr>
  </tbody></form>

  <?php endforeach; ?>
</table>
<div class="container">
<?php require ('historiqueControl.php')?>
</div>
</div>
</div>  



<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>