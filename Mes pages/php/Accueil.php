<?php
session_start(); // Démarre une session PHP
include_once "euh.php"; // Inclut un fichier PHP

if(isset($_SESSION['pseudo']) and !empty($_SESSION['pseudo'])) { // Si la session 'pseudo' est définie et non vide
  // L'utilisateur est connecté
  $pseudo = $_SESSION['pseudo']; // Récupère le pseudo de l'utilisateur
  echo "<p class='rouge' id='rouge1'>Bonjour $pseudo, vous êtes connecté</p>"; // Affiche un message de bienvenue
  echo "<form action='deconnexion.php' method='POST'>"; // Formulaire pour se déconnecter
  echo "<input type='submit' name='deconnexion'id='deconnect' value='Déconnexion'/>"; // Bouton de déconnexion
  echo "</form>"; // Fin du formulaire
} else {
  // L'utilisateur n'est pas connecté
  echo "<a href='identifiant.php'><img src='../Image/pascompte.png' id='identifiant'></a>"; // Affiche l'icône "pas de compte" qui mène à la page de connexion
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Azix</title>
	<link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> <!-- Fichier CSS pour la mise en forme -->
	<meta charset="utf-8">
</head>
<body>
	<header>
		<div id="bienvenue">
			<h1>Azix</h1> <!-- Titre de la page -->
		</div>
		<div class="recherche">  
			<form action="recherche.php" method="GET" > <!-- Formulaire de recherche -->
				<input type="search" name="r" placeholder="Rechercher..." autocomplete="off" id="search"/> <!-- Barre de recherche -->
				<input type="image" name="q" src="../Image/Loupe.png" id="button-search"/> <!-- Bouton de recherche -->
			</form>
		</div>
 	<div class="icone">	
		<a href="panier.php"><img src="../Image/caddie.png" id="panier"></a> <!-- Icône du panier -->
		<!-- <a href="identifiant.php"><img src="../Image/pascompte.png" id="identifiant"></a>--> <!-- Icône "pas de compte" -->
	</div>
	</header>
	<section class="produit_list">
	<?php 
		
		$req = mysqli_query($con, "SELECT * FROM produit"); // Requête SQL pour sélectionner tous les produits dans la table 'produit'
		while($row=mysqli_fetch_assoc($req)){ // Boucle while pour parcourir chaque ligne de la requête

		
		?>
		<form action="" class="produit" > <!-- Formulaire pour afficher chaque produit -->
		<a href="articles/<?=$row['id']?>.php" class="panier5"> <!-- Lien vers la page détaillée du produit -->
			<div class="image_produit">
				<img src="../Image/<?=$row['img']?>"> <!-- Image du produit -->
			</div>
			<div class="content">
				<h4 class="nom"><?=$row['nom']?></h4> <!-- Nom du produit -->
				<h2 class="prix"><?=$row['price']?>€</h2> <!-- Prix du produit -->
				
			</div>
			</a>
		</form>
		<?php }?>
	</section>
	<footer>
		<p>&copy; Mon site de e-commerce</p>
	</footer>
	 <script scr="./javascript/java.js"></script>
</body>
</html>
