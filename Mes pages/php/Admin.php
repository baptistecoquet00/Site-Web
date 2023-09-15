<?php 
session_start();
       
include_once "euh.php"; // Inclusion du fichier de connexion à la base de données

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
    </head>
    <body>
        <header> <!-- En-tête de la page -->
           <h1 id="connecter"> Espace Administrateur</h1> <!-- Titre principal de la page -->
           <a href="Accueil.php" class="link">Accueil</a> <!-- Lien vers la page d'accueil du site -->
        </header>
        <form method="post" action="<?php $PHP_SELF;?>">
            <div class="co">
                <input type="text" name="admin_id" placeholder="Identifiant" class="barre"/> <!-- Champ pour l'identifiant administrateur -->
                <input type="password" name="admin_mdp" placeholder="Mot de passe" class="case"/> <!-- Champ pour le mot de passe administrateur -->
                <input type="submit" name="q"/> <!-- Bouton de connexion -->
            </div>
           
        </form>
        <?php
            if(isset($_POST['admin_id'],$_POST['admin_mdp'])){ // Vérification de la soumission du formulaire
                $admin_mdp = $_POST['admin_mdp'];
                $admin_id = $_POST['admin_id'];
                if($admin_id == 'admin' AND $admin_mdp=='123'){ // Vérification de l'identifiant et du mot de passe administrateur
                    header("Location:Admingestion.php"); // Redirection vers la page d'administration

                }else{
                    echo "<p class='rouge'>identifiant administrateur incorrect ou vide </p>"; // Message d'erreur si l'identifiant ou le mot de passe est incorrect
                }
            }
            ?>
        </body>
    </html>
