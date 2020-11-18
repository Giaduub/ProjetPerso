<?php 


// Connexion Base de donnée 

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

// Fonction pour afficher la base de donnée dans le tableau

function showAll(){
    $pdoStat = dbConnect()->prepare('SELECT * FROM `action` ORDER BY `date` ');
    $executeIsOK=$pdoStat->execute();
    $tenant=$pdoStat->fetchAll();
    return $tenant;
}
 
// Fonction d'ajout des tâches

function addTask(){

    $add=dbConnect()->prepare('INSERT INTO `action` (`date`, `type`, `floor`) VALUES (:date_, :type_, :floor_) ');
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

 // Supprimer une tâche 

 function removeTask($idtenant){

    $remove=dbConnect()->prepare('DELETE FROM `action` WHERE id=:id');
    $remove->bindParam(':id',$idtenant, PDO::PARAM_INT);

    $remove = $remove->execute();
    if($remove){
        echo 'votre enregistrement a bien été supprimé';
        
        $filename='index.php';
        if (!headers_sent())
        header('Location: '.$filename);
        else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$filename.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
        echo '</noscript>';
        }
        
    
    } else {
        echo 'Veuillez recommencer svp, une erreur est survenue';
    }
 }

 // Afficher par étage 

 function showFloor(){

     $floor_historik = $_GET['floor'];

     $recup= dbConnect()->prepare('SELECT `type`,`date` FROM `action` WHERE `floor`=:floors ');
     $recup->bindParam(':floors', $floor_historik);
     $recup->execute();

     while($data = $recup->fetch())
     {
         echo '<table class="table table-dark col-6 justify-align-center">
         <thead>
           <tr>
              
             <th scope="col">Date</th>
             <th scope="col">Type</th>
             <th></th>
           </tr>
         </thead>
         <tbody>';
         echo '<td>'.$data['date'].'</td>
         <td>'.$data['type'].'</td></tbody></table>';
     }

 }

 // Afficher par date
 function showByDate(){
    $date_ = $_GET['date'];
    
    

    $recup= dbConnect()->prepare('SELECT `type`,`floor` FROM `action` WHERE `date`=:date_ ');
    $recup->bindParam(':date_', $date_);
    $recup->execute();

    while($data = $recup->fetch())
    {
        echo '<table class="table table-dark col-6 justify-align-center">
        <thead>
          <tr>
             
            <th scope="col">Type</th>
            <th scope="col">Etage</th>
            <th></th>
          </tr>
        </thead>
        <tbody>';
        echo '<td>'.$data['type'].'</td>
        <td>'.$data['floor'].'</td></tbody></table>';
    }

}

//Modifier tâche

function editTask(){
    $edit_task= dbConnect()->prepare('UPDATE `action` SET `type`=:type_, `date`=:date_, `floor`=:floor_ WHERE id=:id_');
    $edit_task->bindParam(':id_',$_GET['id'], PDO::PARAM_INT);
    $edit_task->bindParam(':type_',$_GET['type_'], PDO::PARAM_STR);
    $edit_task->bindParam(':date_',$_GET['date_'], PDO::PARAM_STR);
    $edit_task->bindParam(':floor_',$_GET['floor_'], PDO::PARAM_INT);

    $edit_task= $edit_task->execute();

     if($edit_task){
         echo 'Votre engregistrement à bien été modifié';
     } else {
         echo 'Veuillez recommencer svp.';
     }
    }

 // Table tâche à effectué 
 function taskShow(){
    $pdoStat = dbConnect()->prepare('SELECT * FROM `task` ORDER BY `date` ');
    $executeIsOK=$pdoStat->execute();
    $task=$pdoStat->fetchAll();
    return $task;
 }

 // 

?>