<?php
$valide = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valide = true;

    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $deliveryOption = filter_input(INPUT_POST, 'deliveryOption', FILTER_SANITIZE_STRING);
    $checkCondition = filter_input(INPUT_POST, 'checkCondition', FILTER_SANITIZE_STRING);
    $checkPub = filter_input(INPUT_POST, 'checkPub', FILTER_SANITIZE_STRING);
    
    if(empty($country)){$valide = false;}
    if(empty($name)){$valide = false;}
    if(empty($lastname)){$valide = false;}
    if(empty($adresse)){$valide = false;}
    if(empty($email)){$valide = false;}
    if($checkCondition != "Yes"){$valide = false;}
    if(!$valide){$error = true;}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/shippingAddress.css">
</head>

<body>
    <header>
    <div class="sep-raw">
        <p class="-true"><span class="caseNumberTrue">1</span> EXPÉDITION</p>
        <?php
        if(!$valide){
        ?>
        <p class="-false"><span class="caseNumberFalse">2</span> PAIEMENT</p>
        <?php
        }else{
        ?>
        <p class="-true"><span class="caseNumberTrue">2</span> PAIEMENT</p>
        <?php
        }
        ?>
    </div>
    <div><p>BESOIN D'AIDE ? NUMÉRO D'APPEL GRATUIT : 0800 81843 📞 PAIEMENT SÉCURISÉ 🔒</p></div>
    </header>
    <main>
        <?php
        if(!$valide){
        ?>
        <div class="form-adresse">
        <form id="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <?php 

                    if($error){
                    echo "<h2>ERREUR</h2>";
                    echo "<hr>";
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "<p class=\"error\">Email non valide</p>";
                    }
                    if(empty($country)){echo "<p class=\"error\">Champs du pays vide !</p>";}
                    if(empty($name)){echo "<p class=\"error\">Champs du nom vide !</p>";}
                    if(empty($lastname)){echo "<p class=\"error\">Champs du prénom vide !</p>";}
                    if(empty($adresse)){echo "<p class=\"error\">Champs de l'adresse vide !</p>";}
                    if(empty($email)){echo "<p class=\"error\">Champs du mail vide !</p>";}
                    if($checkCondition != "Yes"){echo "<p class=\"error\">Veillez accepter les CGU.</p>";}
                } 
            ?>


            
            <h2>DÉTAILS</h2>
            <hr>
            <div class="input">
                <label>Pays:</label>
                <input class="inputfield" type="text" id="country" name="country" placeholder="Votre pays" required>
                <label>Nom:</label>
                <input class="inputfield" type="text" id="name" name="name" placeholder="Votre nom" required>
                <label>Prénom:</label>
                <input class="inputfield" type="text" id="lastname" name="lastname" placeholder="Votre prénom" required>
                <label>adresse:</label>
                <input class="inputfield" type="text" id="adresse" name="adresse" placeholder="Votre adresse" required>
                <label>Genre:</label>
                <select class="inputfield" id="gender" name="gender" required>
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                    <option value="HDC">Hélicoptère de combat</option>
                </select>
                <label>Telephone:</label>
                <input class="inputfield" type="text" id="phoneNumber" name="phoneNumber" placeholder="Votre numéro de telephone">
                <label class="comment">Pour te parler de ta commande</label>
                <label>Email:</label>
                <input class="inputfield" type="email" id="email" name="email" placeholder="Votre email" required>
                <label class="comment">Pour envoyer tes infos et suivis de commande</label>
            </div>

            <h2>Option</h2>
            <hr>

            <select class="livraisonSelect" id="gender" name="gender" required>
                <option value="standard">Livraison standard  [ 2 à 4 jours ouvrés* ]</option>
                <option value="express">Livraison Express  [ 24-48 heures* ]</option>
            </select>

            <div class="CGU"><input type="checkbox" name="checkCondition" value="Yes" required> <label class="comment">J'accepte les conditions générales de Vans de VANS et je reconnais avoir lu et compris la Politique de confidentialité de Vans .</label></div>
            <div class="CGU"><input type="checkbox" name="checkPub" value="Yes"> <label class="comment">Je veux être au courant des offres spéciales, des nouveaux produits et actualités Vans.<br> <span>Je consens au traitement de mes données personnelles à des fins de marketing basé sur le profil, comme décrit dans notre Politique de confidentialité.</span></label></div>

            <button type="submit">PAIEMENT</button>
        </form>
    </div>
    <?php
    }else{
        ?>
        <div class="form-adresse">
            <h2>ADRESSE DE FACTURATION</h2>
            <hr>
            <?php
            echo "<p class=\"paiment-text\">$name $lastname</p>";
            echo "<p class=\"paiment-text\">$adresse</p>";
            echo "<p class=\"paiment-text\">$country</p>";
            if(!empty($phoneNumber)){
            echo "<p class=\"paiment-text\">$phoneNumber</p>";
            }
            echo "<p class=\"paiment-text\">$email</p>";
            ?>
            <br>
            <br>
            <h2>SELECTIONNEZ VOTRE MODE DE PAIEMENT</h2>
            <hr>
            <br>
            <div class="paiement">
                <button class="paiement-button">PAYPAL</button>
                <button class="paiement-button">BANCONTACT</button>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="shopCard">
        <h2>RÉSUMÉ DE LA COMMANDE</h2>
        <hr>
        <p class="card-article">X ARTICLE DANS VOTRE PANIER</p>
        <div class="sep"><p class="card-total">Sous-total</p><p class="card-total">€ 95,00</p></div>
        <div class="sep"><p class="card-livraison">Livraison</p><p class="card-livraison">GRATUITE</p></div>
        <p class="eco">Tres bien!<br><span class="card-message">En atteignant le seuil d’expédition, vous avez contribué à minimiser l’impact environnemental de votre envoi</span></p>
        <div class="total">
            <div class="sep"><p class="total-total">Total</p><p class="total-total">€ 95,00</p></div>
            <p class="total-tva">(21% TVA comprise)</p>
        </div>
        <?php
        if($valide){
            echo "<br>";
            echo "<h3>ADRESSE DE LIVRAISON</h3>";
            echo "<hr>";
            echo "<p class=\"paiment-text\">$name $lastname</p>";
            echo "<p class=\"paiment-text\">$adresse</p>";
            echo "<p class=\"paiment-text\">$country</p>";
        }
        ?>
    </div>
</main>
<footer>
</footer>
</body>
</html>