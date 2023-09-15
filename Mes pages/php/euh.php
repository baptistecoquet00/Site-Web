<?php
// connexion à la base de donnée Saé 23 
$con = mysqli_connect("localhost","root","","sae23");

// Vérifie si la connexion a échoué, si c'est le cas, affiche un message d'erreur et arrête le script
if(!$con) die('Erreur :'.mysqli_connect_error());
?>
