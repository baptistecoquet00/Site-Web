<?php
 session_start() ;
 include_once "euh.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
    </head>
    <body>
  <?php
    $formulaireinscrit=1;
   

    if($formulaireinscrit==1){    
    ?>

    <form method="post" action="<?php $PHP_SELF;?>">
        <div class="account">
            <h1>Mes informations de connexion</h1>
                <input type="text" name="pseudo" class="case" placeholder="Pseudo"/>
                <input type="email" name="email" class="case" placeholder="Email"/>
                <input type="password" name="mdp" class="case" placeholder="Mot de passe"/>
            <h1>Mes informations personnelles</h1> 
                <input type="text" name="nom" class="case" placeholder="Nom"/>
                <input type="text" name="orenom" class="case" placeholder="Prénom"/>
                <input type="tel" name="num" class="case" placeholder="Numéro de téléphone" maxlength="10"/>
        <h4>Date de naissance</h4>
            <input type="date" name="day" class="date" placeholder="Jour"/>
        <h1>Mon adresse</h1>
            <input type="text" name="ville" class="case" placeholder="Ville"/>
            <input type="text" name="code" class="case" placeholder="Code postal"/> 
        </div>
        <input type="submit" value="Soumettre" id="centersubmit" >
    </form>
    <div class="bas">
       
       <a href="Accueil.php">Annuler</a>
   </div>
       <?php
   }
   ?>
    <?php 
        if(isset($_POST['email'],$_POST['mdp'],$_POST['nom'],$_POST['orenom'],$_POST['num'],$_POST['day'],$_POST['ville'],$_POST['code'],$_POST['pseudo'])){
            $pseudo=$_POST['pseudo'];
            $email=$_POST['email'];
            $mdp=$_POST['mdp'];
            $nom=$_POST['nom'];
            $prenom=$_POST['orenom'];
            $num=$_POST['num'];
            $day=$_POST['day'];
            $ville=$_POST['ville'];
            $code=$_POST['code'];
            if(empty($_POST['pseudo'])){
                echo "<p class='rouge' id='non_inscrit'>Le champ est vide</p>";
            }elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM inscription WHERE pseudo='".$_POST['pseudo']."'"))==1){
                echo "<p class='rouge'id='non_inscrit'>pseudo déjà utilisé </p>";
            }
            if(empty($_POST['email'])){
                echo "<p class='rouge'id='non_inscrit1'>Le champ est vide</p>";
            }elseif(mysqli_num_rows(mysqli_query($con,"SELECT * FROM inscription WHERE email='".$_POST['email']."'"))==1){
                echo "<p class='rouge'id='non_inscrit1'>email déjà utilisé </p>";
            }
            if(empty($_POST['mdp'])){
                echo "<p class='rouge'id='non_inscrit2'>Le champ est vide</p>";
            }
            if(empty($_POST['nom'])){
                echo "<p class='rouge'id='non_inscrit3'>Le champ est vide</p>";
            }
            if(empty($_POST['orenom'])){
                echo "<p class='rouge'id='non_inscrit4'>Le champ est vide</p>";
            }
            if(empty($_POST['num'])){
                echo "<p class='rouge'id='non_inscrit5'>Le champ est vide</p>";
            }
            if(empty($_POST['day'])){
                echo "<p class='rouge'id='non_inscrit6'>Le champ est vide</p>";
            }
            if(empty($_POST['ville'])){
                echo "<p class='rouge'id='non_inscrit7'>Le champ est vide</p>";
            }
            if(empty($_POST['code'])){
                echo "<p class='rouge'id='non_inscrit8'>Le champ est vide</p>";
            }
           if(!empty($email and $mdp and $nom and $prenom and $num and $day and $ville and $code and $pseudo)){
            $sql = "INSERT INTO inscription(email,mdp,nom,prenom,numtel,birthday,ville,codepostal,pseudo) values('$email','$mdp','$nom','$prenom','$num','$day','$ville','$code','$pseudo')";
            mysqli_query($con,$sql);
            header("Location:identifiant.php");
           } 
           
        }
    ?>
   
    </body>
</html>