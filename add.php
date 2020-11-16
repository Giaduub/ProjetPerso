<?php if(isset($_GET['add']) && !empty($_GET['date']) && !empty($_GET['type']) && !empty($_GET['floor'])){
    addTask();}
 ?>
 <div class="container">
     <div class="row">
<form method='GET'>
                            <input  type="date" name="date" placeholder='date'>
                            <input  type="text" name="type" placeholder='type'>
                            <input  type="text" name="floor" placeholder='floor'>
                            <button type="submit" value="ajouter" name="add">Ajouter</button>
                        </form>
</div></div>