<?php 
// Démarrage de la session
session_start();
       
// Inclusion du fichier "euh.php"
include_once "euh.php";

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
    </head>
    <body>
        <header>
           <h1 id="connecter"> Se connecter</h1>
           <a href="Accueil.php" class="link">Accueil</a>
        </header>
        <!-- Formulaire de connexion -->
        <form method="post" action="<?php $PHP_SELF;?>">
            <div class="co">
                <input type="text" name="a" placeholder="Email" class="barre"/>
                <input type="password" name="b" placeholder="Mot de passe" class="case"/>
                <input type="submit" name="q"/>
                <a href="inscription.php" id="create">Créer un compte</a>
            </div>
        </form>
        <?php
            // Vérification si l'adresse email et le mot de passe ont été renseignés
            if(isset($_POST['a'],$_POST['b'])){
                    $email=$_POST['a'];
                    $mdp=$_POST['b'];
                    if(!empty($email OR $mdp)){
                        // Vérification de l'existence de l'adresse email et du mot de passe dans la base de données
                        $verif=mysqli_query($con,"SELECT pseudo FROM inscription WHERE email='".$email."' AND mdp='".$mdp."'");
                        $reponse=mysqli_fetch_array($verif);
                        $count=$reponse['pseudo'];
                        $_SESSION['pseudo']=$count;
                        if($count!=0){
                            // Si l'adresse email et le mot de passe sont corrects, redirection vers la page d'accueil
                            header("Location:Accueil.php");
                        }else{
                            // Si l'adresse email et/ou le mot de passe sont incorrects, affichage d'un message d'erreur
                            echo "<p class='rouge'>identifiant incorrect ou non-existant</p>";
                        }
                    }else{
                        // Si l'adresse email et/ou le mot de passe sont vides, affichage d'un message d'erreur
                        echo "<p class='rouge'>identifiant incorrect ou non-existant</p>";
                    }
                              
                }

            
          ?>       	
    </body>
</html>
