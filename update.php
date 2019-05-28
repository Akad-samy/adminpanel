<?php
    require('header.php');
    require('conn.php');
    if(isset($_POST['submit'])){
        require('upload.php');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $cat = $_POST['category'];
        $update = $bdd->query("UPDATE items SET name='$name',description='$description', price=$price, category=$cat, image='$fileName' WHERE id=$id");
        header('location: /atelier1/view.php?id='.$id);
    }
        
?>

<div class="container">
    <h2 class="text-center p-2">Modifier un Item</h2>
    <div class="row">
        <div class="col-md-6 mt-5">
            <form class="p-3" action="update.php" method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $res = $bdd->query("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items, categories WHERE categories.id = items.category AND items.id = $id");
                        // $res->closeCursor();
                        $row = $res->fetch();
                        $pic = $row['image'];
                ?>
                            
                    <input type="hidden" class="form-control" placeholder="Nom" name="id" value="<?= $row['id']?>">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nom" name="name" value="<?= $row['name']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Description" name="description" value="<?= $row['description']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prix:(DH)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Prix" name="price" value="<?= $row['price']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Categories</label>
                        <div class="col-sm-10">
                            <select class="custom-select my-1 mr-sm-2" name="category" value="<?= $row['category']?>">
                                <option selected value="1">Tous les Livres</option>
                                <option value="2">HTML</option>
                                <option value="3">CSS</option>
                                <option value="4">JAVASCRIPT</option>
                                <option value="5">JQUERY</option>
                                <option value="6">PHP</option>
                            </select>
                        </div>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile">Choisir un Fichier</label>
                        <p class="text-right"><?= $row['image'] ?></p>
                    </div>

                    <div class="m-3">
                        <button type="submit" class="btn btn-success" name="submit">Enregistrer</button>
                        <a href="index.php"><button type="button" class="btn btn-secondary">Retour</button></a>
                    </div>

            </form>
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

                <?php
                }
                ?>

            </div>

        </div>

    </div>
</div>
<?php
    require('footer.php');
?>