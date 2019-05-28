<?php
if (isset($_GET['oui'])) {
    $reponse = $bdd->query("DELETE FROM items WHERE id=$id");
    $reponse->closeCursor();
    header('location:/atelier1/index.php');
} else {
    header('location:/atelier1/index.php'); 
}
?>