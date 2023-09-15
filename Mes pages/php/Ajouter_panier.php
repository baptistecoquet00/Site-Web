<?php 

include_once "euh.php";


if(!isset($_SESSION)){
    session_start();

}
if(!isset($_SESSION['sae23'])){
    $_SESSION['sae23'] = array();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $produit = mysqli_query($con, "SELECT * FROM produit WHERE id = $id");
    if(empty(mysqli_fetch_assoc($produit))){
      die("Ce produit n'existe pas");  
    }
    if(isset($_SESSION['sae23'][$id])){
        $_SESSION['sae23'][$id]++;
    }else{
        $_SESSION['sae23'][$id] = 1 ;
        
    }
    if(isset($_POST['add_to_cart'])) {
        $product_id = $_GET['id'];
    
        // Vérifier si le produit est déjà dans le panier
        if(isset($_SESSION['sae23'][$product_id])) {
            $_SESSION['sae23'][$product_id]++;
        } else {
            $_SESSION['sae23'][$product_id] = 1;
        }
    
        // Mettre à jour la quantité du produit dans la base de données
        $update_query = mysqli_query($con, "UPDATE produit SET quantite = quantite - 1 WHERE id = '$product_id'");
    
        header("Location: articles/".$row['id'].".php");
        exit();
    }   

$row=mysqli_fetch_assoc($produit);
header("Location:articles/".$row['id'].".php");

}
?>