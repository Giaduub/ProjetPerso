<?php $title ='Administration'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
<table class="table table-dark col-6 justify-align-center">
  <thead>
    <tr>
        <th></th>
      <th scope="col">Date</th>
      <th scope="col">Type</th>
      <th scope="col">Etage</th>
    </tr>
  </thead>
  <tbody>

  <?php $tenant=showAll();?>
  <?php foreach($tenant as $tenant): ?>
    <tr>
    <td><input type="hidden" name="idasupr" value="<?= $tenant['id']?>"></td>
      <td><?= $tenant['date']?></td>
      <td><?= $tenant['type']?></td>
      <td><?= $tenant['floor']?></td>
      <td><button type="submit" value="remove" name="remove">Supprimer</button></td>
      <td><button type="submit" value="edit" name="edit">Modifier</button></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
</div>
</div>

<?php require ('add.php')?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>