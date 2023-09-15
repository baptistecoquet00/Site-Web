<?php
session_start();
include_once "euh.php";

// Turn on error reporting and display all types of errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check the database connection for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
    </head>
    <body>
        <header>
           <a href="Accueil.php" class="link" id="postion_link">Accueil</a>
           <a href="Admingestion.php" class="link" id="postion_link1">Ajout de produit</a>
        </header>
        <section class="afficher_article">
        <?php 
		
		$req = mysqli_query($con, "SELECT * FROM produit");
        $req1 = mysqli_query($con, "SELECT * FROM articles");
       
		while($article = mysqli_fetch_assoc($req)) {
		    $id = $article['id'];
		    $nom = $article['nom'];
		    $img = $article['img'];
		    $prix = $article['price'];
		    ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="admin_form" method="post" enctype="multipart/form-data">
                <div class="article_recherche">
                    <p><?php echo $nom ?><img src="../Image/<?=$article['img']?>"></p>
                    <input type="file" name="image_modif" accept="image/png, image/jpeg" >
                    <input type="text" name="name_modif" placeholder="modifier le nom" >
                    <p>Prix : <?php echo $prix ?>€</p>
                    <input type="text" name="price_modif"  placeholder="modifier le prix" >
                    <input type="hidden" name="id_modif" value="<?php echo $id ?>">
                    <input type="submit" value="Soumettre" id="ad_submit" > 
                </div>               
            </form>
        <?php } ?>
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id_modif'];
                $nm = mysqli_real_escape_string($con, $_POST['name_modif']);
                $im = mysqli_real_escape_string($con, $_POST['image_modif']);
                $pm = mysqli_real_escape_string($con, $_POST['price_modif']);
                // Debugging statement to display the values of the input fields
                echo "id: " . $id . "<br>";
                echo "nom: " . $nm . "<br>";
                echo "image: " . $im . "<br>";
                echo "prix: " . $pm . "<br>";
                if (!empty($nm) || !empty($im) || !empty($pm)) {
                    $sql = "UPDATE produit SET nom = '$nm', img = '$im', price = '$pm' WHERE id = '$id'";
                    $sql1 = "UPDATE articles SET nom = '$nm', img = '$im', prix = '$pm' WHERE id = '$id'";
                    if (mysqli_query($con, $sql) and mysqli_query($con, $sql1)) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                } else {
                    echo "Please enter some data to update";
                }
            }
        ?>
        </section>
    </body>
</html>
