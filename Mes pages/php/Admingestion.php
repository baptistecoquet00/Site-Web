<?php
 session_start() ; // Démarrer la session pour stocker les informations de session
 include_once "euh.php"; // Inclure le fichier de connexion à la base de données
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
    </head>
    <body class="panier3">
        <header>
           <a href="Accueil.php" class="link" id="ad_accueil">Accueil</a>
        </header>
        <section>
            <!-- Formulaire pour ajouter un nouveau produit -->
            <form method="post" action="<?php $PHP_SELF;?>">
                <table>    
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                    </tr>
                    <tr>
                        <td><input type="text"  name="id_article"></td>
                        <td><input type="file"  name="image_article" accept="image/png, image/jpeg"></td>
                        <td><input type="text"  name="name_article" ></td>
                        <td><input type="text"  name="price_article" >€</td>
                        <td><input type="text"  name="quantite_article" >€</td>
                    </tr>
                </table>
                 <!-- Bouton de soumission du formulaire -->
                <input type="submit" value="Soumettre" id="ad_submit1" >
            </form>
         </section>
       <a href="gestion_produit.php" class="link" id="ad_ajout">modifier les produits</a>
        <?php
        if(isset($_POST['id_article'],$_POST['image_article'],$_POST['name_article'],$_POST['price_article'],$_POST['quantite_article'])){
            // Récupérer les données soumises par le formulaire
            $quantite_a =$_POST['quantite_article'];
            $id_a = $_POST['id_article'];
            $image_a = $_POST['image_article'];
            $name_a = $_POST['name_article'];
            $price_a = $_POST['price_article'];
             // Vérifie si le champ ID est vide
            if(empty($id_a)){
                echo "<p>Le champ est vide</p>";
            }
            // Vérifie si l'ID est déjà utilisé
            elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM articles WHERE id='".$id_a."'"))==1 and mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM produit WHERE id='".$id_a."'"))==1){
                echo "<p>Le champ id est déja utilisé</p>";
            } 
            // Vérifie si le champ image est vide
            if(empty( $image_a)){
                echo "<p>Le champ est vide</p>";
            }
              // Vérifie si l'image est déjà utilisée
            elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM articles WHERE img='".$image_a."'"))==1 and mysqli_num_rows(mysqli_query($con,"SELECT * FROM produit WHERE img='".$image_a."'"))==1){
                echo "<p>Le champ image est déja utilisé</p>";
            }
              // Vérifie si l'image est déjà utilisée
            if(empty($name_a)){
                echo "<p>Le champ est vide</p>";
            }
            // Vérifie si le nom est déjà utilisé
            elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM articles WHERE nom='".$name_a."'"))==1 and mysqli_num_rows(mysqli_query($con,"SELECT * FROM produit WHERE nom='".$name_a."'"))==1){
                echo "<p>Le champ nom est déja utilisé</p>";
            }
              // Vérifie si le champ prix est vide
            if(empty( $price_a)){
                echo "<p>Le champ est vide</p>";
            }
             // Vérifie si le champ quantité est vide
            if(empty( $quantite_a)){
                echo "<p>Le champ est vide</p>";
            }
            // Si tous les champs ne sont pas vides, insère les données dans les tables de la base de données
            if(!empty($image_a and $name_a and $price_a and $id_a)){
                $sql = "INSERT INTO produit(id,img,price,nom) values(' $id_a','$image_a','$price_a','$name_a')";
                $sql1 = "INSERT INTO articles(id,img,prix,nom) values(' $id_a','$image_a','$price_a','$name_a')";
                mysqli_query($con,$sql);
                mysqli_query($con,$sql1);
               }else{
                echo "Toutes les cases sont obligatoires";
               } 
        }
        ?>
     </body>
</html>
