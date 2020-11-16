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

  <?php if(isset($_GET['remove']) && $_GET['remove']=="remove" && isset($_GET['idasupr'])){
      removeTask($_GET['idasupr']);
  }?>

  <?php foreach($tenant as $tenant): ?>
    <tr>
      <td><?= $tenant['date']?></td>
      <td><?= $tenant['type']?></td>
      <td><?= $tenant['floor']?></td>
      <form method="GET">
      <td><input type="hidden" name="idasupr" value="<?= $tenant['id']?>"></td>
      <td><button type="submit" value="remove" name="remove">Supprimer</button></td> 
      <td><button type="submit" value="edit" name="edit">Modifier</button></td>
 
    </tr>
  </tbody>
  <?php endforeach; ?>
  <?php require ('add.php')?></table></form>
  
</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>