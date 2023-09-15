<?php
session_start() ; // Démarrer la session

include_once "euh.php"; // Inclure le fichier de configuration de la base de données

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
</head>
<body>
    <header>
        <!-- Liens de navigation -->
        <a href="Accueil.php" class="link" id="postion_link">Accueil</a>
        <a href="Admingestion.php" class="link" id="postion_link1">Ajout de produit</a>
    </header>
    <section class="afficher_article">
        <?php 
        // Sélectionner tous les produits dans la base de données
		$req = mysqli_query($con, "SELECT * FROM produit");
        // Sélectionner tous les articles dans la base de données
        $req1 = mysqli_query($con, "SELECT * FROM articles");
		
		// Boucle à travers tous les produits et afficher un formulaire pour chaque produit
		while($article=mysqli_fetch_assoc($req)){
		?>
        <form action="<?php $_SERVER["PHP_SELF"];?>" class="admin_form" method="post" >
            <div class="article_recherche">
                <p><?= $article['nom']?><img src="../Image/<?=$article['img']?>"></p>
                <!-- Champ de modification d'image -->
                <input type="file"  name="image_modif" accept="image/png, image/jpeg" >
                <!-- Champ de modification de nom -->
                <input type="text"  name="name_modif" placeholder="modifier le nom" >
                <p>Prix :<?=$article['price']?>€</p>
                <!-- Champ de modification de prix -->
                <input type="text"  name="price_modif"  placeholder="modifier le prix" >
                <!-- Bouton de soumission du formulaire de modification -->
                <input type="submit" value="Soumettre" id="ad_submit" >
                <!-- Bouton de soumission du formulaire de suppression -->
                <input type="submit" value="Supprimer" name="supprimer" id="sup_submit" >
                <!-- Champ caché pour stocker l'ID du produit -->
                <input type="hidden" name="id_modif" value="<?= $article['id'] ?>"> 
            </div>               
        </form>
        <?php }?>
        <?php// Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $i = $_POST['id_modif']; // Récupérer l'ID du produit depuis le champ caché
            $nm = $_POST['name_modif']; // Récupérer le nom modifié du produit
            $im = $_POST['image_modif']; // Récupérer l'image modifiée du produit
            $pm = $_POST['price_modif']; // Récupérer le prix modifié du produit
            
            // Vérifier si au moins un champ a été modifié
            if(!empty($nm or $pm or $im)){
                // Mettre à jour les informations du produit dans la base de données
                $sql = "UPDATE produit SET img = '$im' , price = '$pm ', nom = '$nm' WHERE id = '$i' ";
                $sql1 = "UPDATE articles SET img = '$im' , prix = '$pm' , nom = '$nm' WHERE id = '$i' ";
                    if (mysqli_query($con, $sql) and mysqli_query($con, $sql1)) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                }
                //Permet de supprimer un article en fonction de l'id
                if(isset($_POST['supprimer'])){
                    $sql2 ="DELETE FROM produit where id ='$i'";
                    $sql3 ="DELETE FROM articles where id ='$i'";
                    if (mysqli_query($con, $sql2) and mysqli_query($con, $sql3)) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                }
        }
        ?>
        </section>
    </body>
</html>