<?php
    require('header.php');

    if(isset($_POST['submit'])){
        require('upload.php');
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        try{
            $bdd = new PDO('mysql:host=localhost; dbname=books; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e){
        
            die('Erreur : '.$e->getMessage());
        }
        
        if(!empty($name) && !empty($description) && !empty($price) && !empty($category)){
        
            $reponse = $bdd->query("INSERT INTO items VALUES('', '$name', '$description', '$price', '$fileName', '$category')");
            $reponse->closeCursor();
             ?>
                 <div class="alert alert-success text-center">livre enregistrer avec succes</div>
             <?php
             header('location: /atelier1/index.php');
         }else{
             ?>
        
                 <div class="alert alert-danger text-center">Veuillez Remplir les champs vide SVP</div>
        
             <?php
         }
        
        }
    

?>
    
<div class="container">
    <h2 class="text-center py-3">Ajouter un Item</h2>
    <form class="p-3" action="insert.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nom" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Description" name="description">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Prix: (en DH)</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Prix" name="price">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categories</label>
            <div class="col-sm-10">
                <select class="custom-select my-1 mr-sm-2" name="category">
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
        </div>
        <div class="text-center m-3">
            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
            <a href="index.php"><button type="button" class="btn btn-secondary">Retour</button></a>
        </div>

  </form>


</div>





<?php
    require('footer.php')
?>