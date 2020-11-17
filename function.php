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
    $pdoStat = dbConnect()->prepare('SELECT * FROM `action` ');
    $executeIsOK=$pdoStat->execute();
    $tenant=$pdoStat->fetchAll();
    return $tenant;
}
 
// Fonction d'ajout des tâches

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
     $type_historik = $_GET['type'];
     $date_historik = $_GET['date'];

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
         <td>'.$data['type'].'</td>';
     }

 }

 // Afficher par date


    

?>