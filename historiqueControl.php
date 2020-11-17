<form method="GET">
                    <input type="hidden" name='type'>
                    <input type="hidden" name='date'>
                    <input name='floor'>
                    <button type='submit' name='historique' value='historique'>Historique</button>
                    <input type="hidden" name='type'>
                    <input type="hidden" name='date'>
                    <input type="date" name='date'>
                    <button type='submit' name='historiquetwo' value='historiquetwo'>Chercher</button>
                </form>

                <?php  

if(isset($_GET['historique']) && $_GET['historique']=="historique"){
    showFloor();
}
?>

<?php 
if(isset($_GET['historiquetwo']) && $_GET['historiquetwo']=="historiquetwo"){
    showByDate();
}

?>