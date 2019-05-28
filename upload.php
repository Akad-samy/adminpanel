<?php
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);   // Pour séparer le nom de l'image et son extension sous forme d'un tableau
        $fileActualExt = strtolower(end($fileExt));  // cette fonction permet de prendre la derniere valeur du $fileExt qui est son extension
        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){     // Verifier si le bon type (jpg, jpeg, png)
            if($fileError === 0){
                if($fileSize <= 1000000){
                    // $fileNameNew = uniqid('', true).'.'.$fileActualExt;
                    $fileDestination = 'upload/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // if(move_uploaded_file($fileTmpName, $fileDestination)){

                    //     try{
                    //         $bdd = new PDO('mysql:host=localhost; dbname=books; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    //     }catch(Exception $e){
                            
                    //        die('Erreur : '.$e->getMessage());
                    //     }

                    //     $reponse = $bdd->query("INSERT INTO items(image) VALUES ('$fileName')");



                    // };

                } else {
                    ?>
                    <div class="alert alert-danger">Fichier trop grand</div>
                    <?php 
                }
            } else {
                ?>
                <div class="alert alert-danger">Erreur pendant le telechargement</div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger">Veuillez Choisir les images de type JPG, JPEG ou PNG</div>
            <?php
        }
    }
?>