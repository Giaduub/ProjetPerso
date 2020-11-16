<?php 

function dbConnect(){
    try
    {
        $db = New PDO('mysql:host=localhost;dbname=conciergerie;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function showAll(){
    $pdoStat = dbConnect()->prepare('SELECT * FROM `action` ');
    $executeIsOK=$pdoStat->execute();
    $tenant=$pdoStat->fetchAll();
    return $tenant;
}
    
function addTask(){

    $add=dbConnect()->prepare('INSERT INTO `action` (id,`date`, `type`, `floor`) VALUES (:id,:date_, :type_, :floor_) ');
    $add->bindParam(':id', $_GET['id'],PDO::PARAM_INT);
    $add->bindParam(':date_', $_GET['date'],PDO::PARAM_STR);
    $add->bindParam(':type_', $_GET['type'],PDO::PARAM_STR);
    $add->bindParam(':floor_', $_GET['floor'],PDO::PARAM_INT);
    $plus= $add->execute();

          if($plus){
              echo 'Cette action à bien été ajoutée.';
          }else{
              echo 'Veuillez ressayer.';
          }
          }

?>