<!DOCTYPE html>
<html>
<head>
	<title>Ma boutique en ligne</title>
	<style>
		.produit {
			display: flex;
			align-items: center;
			margin: 10px 0;
		}
		.produit img {
			width: 100px;
			height: 100px;
			margin-right: 20px;
		}
	</style>
</head>
<body>
	<h1>Ma boutique en ligne</h1>
	<?php
	// Tableau contenant les articles
	$articles = array(
		array('nom' => 'T-shirt', 'prix' => 20, 'image' => '../Image/t-shirt.png'),
		array('nom' => 'Pantalon', 'prix' => 30, 'image' => '../Image/pantalon.jpg'),
		array('nom' => 'Chaussures', 'prix' => 50, 'image' => '../Image/chaussures.jpg'),
		array('nom' => 'Casquette', 'prix' => 10, 'image' => 'casquette.jpg')
	);
	?>
	<div class="produits">
	<?php
	// Afficher les articles
	foreach ($articles as $article) {
		echo "<div class='produit'>";
		echo "<img src='" . $article['image'] . "' alt='" . $article['nom'] . "'>";
		echo "<div><h2>" . $article['nom'] . "</h2><p>" . $article['prix'] . "€</p></div>";
		echo "</div>";
	}
	?>
	</div>
</body>
</html>