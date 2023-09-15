<?php
session_start(); // démarrer la session

include_once "euh.php"; // inclure le fichier de connexion à la base de données

// suppression d'un produit du panier si l'ID est spécifié dans l'URL
if(isset($_GET['del'])){
	$id_del = $_GET['del'];
	unset($_SESSION['sae23'][$id_del]); // suppression de l'article du tableau de session
 }
 
 // suppression d'un article du panier si l'ID est spécifié dans l'URL
 if(isset($_GET['delone'])){
	$id_delone = $_GET['delone'];
	if(isset($_SESSION['sae23'][$id_delone])){
		if($_SESSION['sae23'][$id_delone]>1){
			$_SESSION['sae23'][$id_delone]--;
		}else{
			unset($_SESSION['sae23'][$id_delone]);
		}
	}
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
</head>
<body class="panier3">
	<?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "") { } // vérification de la connexion de l'utilisateur ?>
	<a href="Accueil.php" class="link">Accueil</a>
	<section>
		<table>
			<tr>
				<th></th>
				<th>Nom</th>
				<th>Prix</th>
				<th>Nombre d'article</th>
				<th>Action</th>
			</tr>
			<?php
			$total = 0 ; 
			// affichage des produits du panier
			if(isset($_SESSION['sae23'])){
				$ids = array_keys($_SESSION['sae23']);
				if(empty($ids)){
					echo "Votre panier est vide"; 
				}else {
					$produits = mysqli_query($con, "SELECT * FROM produit WHERE id IN(".implode(',',$ids).")");
					foreach($produits as $product) :
						$total = $total + $product['price'] * $_SESSION['sae23'][$product['id']] ;
			?>
				<tr>
					<td><img src="../Image/<?=$product['img']?>"></td>
					<td><?=$product['nom']?></td>
					<td><?=$product['price']?>€</td>
					<td><?=$_SESSION['sae23'][$product['id']]?></td>
					<td><a href="panier.php?delone=<?=$product['id']?>"><img src="../Image/poubelle.png"></a></td>
					<td><a href="panier.php?del=<?=$product['id']?>"><img src="../Image/poubelle1.png"></a></td>
				</tr>
			<?php endforeach ;} }?>
			<tr class="total">
				<th>Total : <?= $total?>€</th>
			</tr>
		</table>
	</section>
	<?php 
	if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "" && $total > 0) { // vérification de la connexion de l'utilisateur et du montant total du panier ?>
	<a href="paiement.php" class="link">Aller au paiement</a>
	<?php } else if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== "" && $total == 0) { // si le panier est vide ?>
	<p>Votre panier est vide, veuillez ajouter des produits pour procéder au paiement</p>
	<?php } else { // si l'utilisateur n'est pas connecté ?>
	<p>Veuillez vous connecter pour procéder au paiement</p>
	<a href="identifiant.php" class="link">Se connecter</a>
	<?php } ?>
</body>
</html>
