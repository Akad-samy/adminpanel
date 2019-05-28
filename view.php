<?php
    require('header.php');
    require('conn.php');
?>

<div class="container">
    <h2 class="text-center p-2">Voir un Item</h2>
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $res = $bdd->query("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items, categories WHERE categories.id = items.category AND items.id = $id");
                $row = $res->fetch();
                $pic = $row['image'];
        ?>
            <ul class="list my-5">
                <li class="li my-4"><strong>Nom: </strong><?php echo $row['name'] ?></li>
                <li class="li my-4"><strong>Description: </strong><?php echo $row['description']?></li>
                <li class="li my-4"><strong>Prix: </strong><?php echo $row['price'] . ' DH' ?></li>
                <li class="li my-4"><strong>Categorie: </strong><?php echo $row['category'] ?></li>
                <li class="li my-4"><strong>Image: </strong><?php echo $pic ?></li>
                <a href="update.php?id=<?= $row['id'] ?>"><button type="submit" name="submit" class="btn btn-success my-4">Modifier</button></a>
                <a href="index.php"><button type="submit" name="submit" class="btn btn-secondary my-4">Retour</button></a>
            </ul>
            
        </div>

        <div class="col-md-6 d-flex justify-content-center">

            <div class="card mb-5" style="width:23vw">
                <img src="<?= 'upload/' . $pic?>" class="card-img-top" style=" width: 100%;height: 19vw;object-fit: cover;" alt="..." width="300px">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['name']?></h5>
                    <p class="card-text"><?= $row['description']?></p>
                    <a href="#" class="btn btn-danger">Go somewhere</a>
                </div>
                <div class="badge badge-warning" style="position:absolute; height:35px; width:180px;right:0; top:-18px">
                    <h3 style="color:#fff; text-align:center; font-size:22px; margin-top:2px"><?= $row['price'].' DH'?></h3>
                </div>
            </div>

            <?php
            }
            ?>

        </div>

    </div>
    
    
</div>
<?php
    require('footer.php');
?>