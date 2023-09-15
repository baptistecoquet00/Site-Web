<?php 
 // Connexion à la base de données
 $bdd = new PDO('mysql:host=localhost;dbname=sae23;', 'root', '');

 // Récupération de tous les articles, triés par ordre décroissant d'id
 $allarticles = $bdd-> query('SELECT * FROM articles ORDER BY id DESC');

 // Vérification si une recherche a été effectuée
 if(isset($_GET) AND !empty($_GET['r'])){
	$recherche = htmlspecialchars($_GET['r']);
	// Récupération des articles correspondant à la recherche, triés par ordre décroissant d'id
	$allarticles = $bdd->query('SELECT * FROM articles WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC');
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Azix</title>
        <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
        <meta charset="utf-8">
    </head>
    <body>
        <a href="Accueil.php" class="link1">Accueil</a> 
        <section class="afficher_article">
			<?php 
				// Vérification si des articles ont été trouvés
				if($allarticles->rowCount() > 0){
                    // Affichage de chaque article trouvé
                    while($article = $allarticles -> fetch()){
                        ?>
                        <form action="" class="RR">
                        <a href="articles/<?=$article['id']?>.php" class="panier5">
                            <div class="article_recherche">
                                <p><?= $article['nom']?><img src="../Image/<?=$article['img']?>"></p>
                                <p>Prix :<?=$article['prix']?>€</p>
                            </div>
                            </a> 
                        </form>
                        <?php 
                    }

				}else{
					// Affichage d'un message si aucun article n'a été trouvé
					?>
					<p> Aucun article trouvé </p>
					<?php
				}
			?>
        </section>
    </body>
</html>
