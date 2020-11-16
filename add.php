<?php if(isset($_GET['add']))
    echo '
    <td><input  type="date" name="date" placeholder="date"></td>
    <td> <input  type="text" name="type" placeholder="type"></td>
    <td><input  type="text" name="floor" placeholder="floor"></td>
    <td><button type="submit" value="ajouter" name="add2">Ajouter</button></td>'

 ?>

 <?php if(isset($_GET['add2']) && !empty($_GET['date']) && !empty($_GET['type']) && !empty($_GET['floor'])){
        addTask();
    } ?>