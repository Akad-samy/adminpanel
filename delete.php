<?php
require('header.php');
require('conn.php');

    if(isset($_GET['id'])){ 
        $id=$_GET['id'];
?>
        <div class="container py-3">
            <h2 class="text-center p-2">Supprimer un Item</h2>
            <div class="alert alert-warning">Etes-Vous sûr de vouloir supprimer cette ligne ? </div>
            <form method="POST">
                <button type="submit" name="oui" class="btn btn-outline-warning text-center">Oui</button>
                <button type="submit" name="non" class="btn btn-outline-warning  text-center">Non</button>
            </form>
                
        </div>
        
<?php



            // $select = $bdd->query("SELECT image from items WHERE id=$id");
            // $pic = $select->fetch();
            // unlink($pic);


        if (isset($_POST['oui'])) {

            unlink('upload/'.$_GET['delete']);
            $reponse = $bdd->query("DELETE FROM items WHERE id=$id");
            if($reponse){
                $reponse->closeCursor();
                header('location:/atelier1/index.php');
            }
        } else if (isset($_POST['non'])) {
            header('location:/atelier1/index.php'); 
        }

    }
    require('footer.php')
?>
