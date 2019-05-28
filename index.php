<?php
    require('header.php');
    require('conn.php');
    
        // $name = $_POST['name'];
        // $description = $_POST['description'];
        // $price = $_POST['price'];
        // $category = $_POST['category'];
        // $picture = $_POST['picture'];

       

        // function voir($id) {
        //     setcookie("id",$id);
        // }

        // if(isset($_GET['view'])){
        //     setcookie("id",$_GET['id']);
        //     header('location: /view.php');
        // }

?>
    
<div class="container">
    <h2 class="text-center p-2">Liste des Items</h2>
    <table class="table table-striped text-center">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Categorie</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $reponse = $bdd->query('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items, categories WHERE categories.id = items.category');






            while($donnees = $reponse->fetch()){
                ?>
                <tr>
                    <td><?php echo $donnees['name'] ?></td>
                    <td><?php echo $donnees['description']?></td>
                    <td><?php echo $donnees['price'] . ' DH' ?></td>
                    <td><?php echo $donnees['category'] ?></td>
                    <td>
                        <a href="view.php?id=<?= $donnees['id'];?>"><button type="submit" class="btn btn-warning">Voir</button></a>
                        <a href="update.php?id=<?= $donnees['id'];?>"><button type="submit" class="btn btn-success">Modifier</button></a>
                        <a href="delete.php?id=<?= $donnees['id'];?>&delete=<?= $donnees['image'];?>"><button type="submit" class="btn btn-danger">Supprimer</button></a>
                    </td>
                </tr>
                <?php
            }
        ?>

        </tbody>
    </table>
    <div class=" text-center m-3 p-3">
        <a href="insert.php"><button type="submit" name="submit" class="btn btn-primary">Ajouter</button></a>
    </div>
</div>





<?php
    require('footer.php')
?>