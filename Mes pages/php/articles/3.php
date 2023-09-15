<?php
session_start();
include_once "../euh.php";

if(isset($_SESSION['pseudo']) and !empty($_SESSION['pseudo'])) {
  // L'utilisateur est connecté
  echo "<form action='../deconnexion.php' method='POST'>";
  echo "<input type='submit' name='deconnexion'id='deconnect_article' value='Déconnexion'/>";
  echo "</form>";
} else {
  // L'utilisateur n'est pas connecté
  echo "<a href='../identifiant.php'><img src='../../Image/pascompte.png' id='identifiant_article'></a>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mon site de e-commerce</title>
	<link rel="stylesheet" type="text/css" href="../../Style/accueil.css"/> 
	<meta charset="utf-8">
</head>
<body>
<a href="../Accueil.php" class="link">Accueil</a>
<div class="icone">	
		<a href="../panier.php"><img src="../../Image/caddie.png" id="caddie"></a>
		<!-- <a href="identifiant.php"><img src="../Image/pascompte.png" id="identifiant"></a>-->
	</div>
<?php 
		include_once "../euh.php";
		$req = mysqli_query($con, 'SELECT * FROM produit WHERE id = 3');
		while($row=mysqli_fetch_assoc($req)){

		
		?>
		<form action="" >
			
				<img src="../../Image/<?=$row['img']?>" class="shirt">
			
			<div class="boutton">
				<h4 class="nom"><?=$row['nom']?></h4>
				<h2 class="prix"><?=$row['price']?>€</h2>
				<a href="../ajouter_panier.php?id=<?=$row['id']?>" class="panier2">Ajouter au panier</a>
			</div>
			<div class="Quantite">
				<h4>Quantité</h4>
				<h2 class="prix"><?=$row['quantite']?></h2>
			</div>
		</form>
		<?php }?>
		</body>
</html>