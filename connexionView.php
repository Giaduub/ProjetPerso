<?php ob_start(); ?>

<?php connexion();?>


<form method="GET"><input type="text"  name="username" placeholder='Pseudo' required>
<input type="password"  name="password" placeholder='Mot de passe' required>
<button type="submit" value="connexion" name="connexion">Connexion</button></form>

<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}

?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?> 
