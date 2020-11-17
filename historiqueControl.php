<form method="GET">
                    <input type="hidden" name='type'>
                    <input type="hidden" name='date'>
                    <input name='floor'>
                    <button type='submit' name='historique' value='historique'>Historique</button>
                </form>

                <?php  

if(isset($_GET['historique']) && $_GET['historique']=="historique"){
    showFloor();
}
?>