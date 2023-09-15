<?php
    // Démarrage de la session
    session_start();
    
    // Inclusion du fichier euh.php
    include_once "euh.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Paiement</title>
        
        <!-- Inclusion de la feuille de style accueil.css -->
        <link rel="stylesheet" type="text/css" href="../Style/accueil.css"/> 
    </head>
    
    <body>
        <!-- Liens vers les pages Accueil et panier.php -->
        <a href="Accueil.php" class="link">Accueil</a>
        <a href="panier.php" class="link" id="panier1">Retour au panier</a>
        
        <!-- Formulaire de paiement -->
        <form method="post" action="<?php $PHP_SELF;?>">
            <div class="carte_b">
                <!-- Numéro de la carte -->
                <p id="a">Numéro de la carte</p>
                <input type="text" name="carte" placeholder="1234 5678 9012 3456" class="bancaire" id="b"  maxlength="16" required>
                
                <!-- Nom sur la carte -->
                <p id="nom_carte">Nom sur la carte</p>
                <input type="text" name="P_N" placeholder="P.Nom" class="bancaire" id="c">
                
                <!-- Date d'expiration -->
                <p id="dateexpi">Date d'expiration</p>
                <input type="text" name="expi" onKeyup="modifie_date"() placeholder="MM/AA" class="bancaire" id="expicarte">
                
                <!-- Code CVC/CVV -->
                <p id="troischiffres"> CVC/CVV </p>
                <input type="text" name="CVC" placeholder="3 chiffres" class="bancaire" id="CVC" minlength="3" maxlength="3"required>
            </div>
            
            <!-- Bouton de paiement -->
            <input type="submit" name="paye" value="Payer" id="cb_paye">
        </form>
        
        <?php
        // Vérification des données du formulaire après soumission
        if(isset($_POST['carte'],$_POST['CVC'],$_POST['P_N'],$_POST['expi'])){
            // Récupération des données du formulaire
            $carte=$_POST['carte'];
            $cvc=$_POST['CVC'];
            $np=$_POST['P_N'];
            $expi=$_POST['expi'];
            
            // Fonction pour valider le numéro de carte selon l'algorithme de Luhn
            function luhn_validate($number) {
                $sum = 0;
                $numDigits = strlen($number);
                $parity = $numDigits % 2;
                
                for ($i = 0; $i < $numDigits; $i++) {
                    $digit = intval($number[$i]);
                    
                    if ($i % 2 == $parity) {
                        $digit *= 2;
                        
                        if ($digit > 9) {
                            $digit -= 9;
                        }
                    }
                    
                    $sum += $digit;
                }
                
                return $sum % 10 == 0;
            }

            // Validation du numéro de carte
            $credit_card_number = $_POST['carte'];
            if (luhn_validate($credit_card_number)) {
                echo "<p>Numéro de carte valide</p>";
            } else {
                echo "<p>Numéro de carte invalide</p>";
                }
            if($cvc<3){
                echo "<p>Le code CVC est invalide</p>";
            }else{
                echo "<p>Code CVC valide</p>";
            }
            if(!empty($carte and $cvc and $np and $expi)){
                $sql = "INSERT INTO carte_bancaire(num_carte,Nom_prenom,expi,cvc) values('$carte','$np','$expi','$cvc')";
                mysqli_query($con,$sql);
                echo "<script>alert('paiement effectué')</script>";
               }
        } 
    ?>
     <script>
            function modifie_date(){
            var formO=document.nom_formulaire;
            var madate=formO.date_a_entrer.value;
            if(madate!=undefined && madate!=""){
                if(madate.lenght==1){
                document.nom_formulaire.date_a_entrer.value=madate+"/";
                }
             }
            }
        </script>
    </body>
</html>